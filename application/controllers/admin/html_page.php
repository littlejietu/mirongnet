<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Html_page extends MY_Admin_Controller {
	public function __construct()
	{
	    parent::__construct();
	    $this->load->library('Html');

	    $this->load->model('Html_page_model');
	    $this->load->model('nav_model');
	    
	}

	public function index()
	{
		$this->lang->load('admin_layout');

		
		$list = $this->nav_model->get_list(array('status<>'=>-1), '*', 'sort desc');

        $result = array(
            'list' => $list,
        );
		$this->load->view('admin/html_page',$result);
	}

	public function make_nav(){
		$path = $this->input->post_get('path');
		$page = 0;
		$total = 1;
		$num = 1;

		$beginTime = time();

		if($path=='all'){
			$page     = _get_page();
		    $pagesize = 2;
		    $num = $page*$pagesize;
		    $list = $this->nav_model->fetch_page($page, $pagesize, array('status<>'=>-1),'*','sort desc');
		    foreach ($list['rows'] as $key => $v) {
		    	$url = base_url().$v['path'];
		    	$bResult= $this->html->createhtml($url, time(), BASE_ROOT_PATH);

		    	if($bResult){
		    		//生成成功
		    		$info = $this->Html_page_model->get_by_where("path='".$v['path']."'");
		    		$data = array('path'=>$v['path'],
		    			'last_make_time'=>time(),
		    			);
		    		if(empty($info))
		    			$this->Html_page_model->insert($data);
		    		else
		    			$this->Html_page_model->update_by_id($info['id'],$data);
		    	}

		    }

		    $total = $list['count'];
		    if($num>$total)
		    	$num = $total;
		}
		else{
			$url = base_url().$path;
			$bResult = $this->html->createhtml($url, time(), BASE_ROOT_PATH);
			if($bResult){
				$info = $this->Html_page_model->get_by_where("path='".$path."'");
				$data = array('path'=>$path,
	    			'last_make_time'=>time(),
	    			);
	    		if(empty($info))
	    			$this->Html_page_model->insert($data);
	    		else
	    			$this->Html_page_model->update_by_id($info['id'],$data);
			}
		}

		$endTime = time();
		$second = $endTime - $beginTime;

		$result = array('page'=>$page,
					'path' => $path,
					'second' => $second,
					'total' => $total,
					'num' => $num,
					);
		$this->load->view('admin/html_making',$result);
	}

	public function news(){
		$this->lang->load('admin_layout');

		$this->load->model('Article_Class_model');
		$list = $this->Article_Class_model->getClassList();

		$result = array('list'=>$list);
		$this->load->view('admin/html_news', $result);
	}

	public function make_news_list(){
		$type = $this->input->post_get('type');
		$class_id = $this->input->post_get('class_id');

		$this->load->model('Article_model');
		$this->load->model('Article_Class_model');

		$path = base_url().'news?class_id={class_id}&page={page}';
		$make_path = 'news_{class_id}_{page}.html';
		$beginTime = time();

		$strWhere = 'status=1';
		if($class_id != 'all'){
			$arrClassIds = $this->Article_Class_model->getChildClassIds($class_id);
			$classIds = implode(',', $arrClassIds);
			$strWhere .= " and class_id_1 in($classIds)";
		}

		$page     = _get_page();
	    $pagesize = 2;
	    $total = $this->Article_model->get_count($strWhere);

	    $url = str_replace(array('{class_id}','{page}'), array($class_id,$page), $path);
	    $make_html = str_replace(array('{class_id}','{page}'), array($class_id,$page), $make_path);
	    $this->html->createhtml($url, time(), BASE_ROOT_PATH, $make_html);

	    $num = $page*$pagesize;
	    if($num>$total)
	    	$num = $total;

	    //全部生成完毕
	    if($num==$total){
	    	$info = $this->Html_page_model->get_by_where("path='".$path."'");
    		$data = array('path'=>$path,
    			'last_make_time'=>time(),
    			);
    		if(empty($info))
    			$this->Html_page_model->insert($data);
    		else
    			$this->Html_page_model->update_by_id($info['id'],$data);
	    }
	
		$endTime = time();
		$second = $endTime - $beginTime;

		$result = array('page'=>$page,
					'path' => $path,
					'second' => $second,
					'total' => $total,
					'num' => $num,
					);
		$this->load->view('admin/html_making',$result);
	}

	public function make_news_detail(){
		$arrWhere = array('status'=>1);
		if($class_id!='all'){
			
			$arrWhere['class_id_1'] = $arrClassIds;
		}
		
	    $list = $this->Article_model->fetch_page($page, $pagesize, $arrWhere,'id,title,class_id,class_id_1','sort desc');
	    
	    foreach ($list['rows'] as $key => $v) {
	    	$url = str_replace(array('{class_id}','{page}'), $v['class_id_1'],$page, $path);
	    	$make_html = str_replace(array('{class_id}','{page}'), $v['class_id_1'],$page, $make_path);
echo $url;die;
	    	$this->html->createhtml($url, time(), BASE_ROOT_PATH, $make_html);
	    }

	    
	}

}