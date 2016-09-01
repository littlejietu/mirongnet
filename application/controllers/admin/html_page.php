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
		    $pagesize = 10;
		    
		    $list = $this->nav_model->fetch_page($page, $pagesize, array('status<>'=>-1),'*','sort desc');
		    foreach ($list['rows'] as $key => $v) {
		    	$url = base_url().$v['path'];
		    	$make_html = str_replace('/', '_', $v['path']).'.html';

		    	$bResult= $this->html->createhtml($url, time(), BASE_ROOT_PATH."/html", $make_html);

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
		    $num = $page*$pagesize;
		    $total = $list['count'];
		    if($num>$total)
		    	$num = $total;
		}
		else{
			$url = base_url().$path;
			$make_html = str_replace('/', '_', $v['path']).'.html';

			$bResult = $this->html->createhtml($url, time(), BASE_ROOT_PATH."/html",$make_html);
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
					'next_make_url' => ADMIN_SITE_URL.'/html_page/make_nav?path='.$path.'&page='.($page+1),
					'second' => $second,
					'total' => $total,
					'num' => $num,
					);
		$this->load->view('admin/html_making',$result);
	}

	public function news_list(){
		$this->lang->load('admin_layout');

		$this->load->model('Article_Class_model');
		$list = $this->Article_Class_model->getClassList();

		$result = array('list'=>$list);
		$this->load->view('admin/html_news_list', $result);
	}

	public function make_news_list(){
		$class_id = $this->input->post_get('class_id');

		$this->load->model('Article_model');
		$this->load->model('Article_Class_model');


		$path = 'news?class_id={class_id}&page={page}';
		$make_path = 'news_{class_id}_{page}.html';
		$beginTime = time();

		$arrClassIds = array();
		$strWhere = 'status=1';
		if($class_id != 'all'){
			$arrClassIds = $this->Article_Class_model->getChildClassIds($class_id);
		}else{
			$arrClassList = $this->Article_Class_model->getClassList();
			foreach ($arrClassList['data'] as $k => $a) {
				$arrClassIds[$k] = $a['id'];
			}
		}
		//$num 当前生成到达个数
		$num = 0;
		$total = 0;
		foreach ($arrClassIds as $k => $v) {
			$making_class_id = $v;

			$arrClassIds_11 = $this->Article_Class_model->getChildClassIds($making_class_id);
			$classIds_11 = implode(',', $arrClassIds_11);
			$strWhere_11 = " status=1 and class_id_1 in($classIds_11)";

		    $pagesize = C('Page_Style.pagesize');
		    $total_num = $this->Article_model->get_count($strWhere_11);

		    

		    //$total 生成总数
		    $total_11 = intval( $total_num / $pagesize);
		    $total_11 = $total_11==0?1:$total_11;
		    if($total_num%$pagesize!=0)
		    	$total_11 = $total_11 + 1;
		    $total = $total + $total_11;

		    for($page=1; $page<=$total_11; $page++){
			    $url = base_url().str_replace(array('{class_id}','{page}'), array($making_class_id,$page), $path);
			    $make_html = str_replace(array('{class_id}','{page}'), array($making_class_id,$page), $make_path);
			    $this->html->createhtml($url, time(), BASE_ROOT_PATH.'/html', $make_html);

			    $num++;

			}

		}



		//全部生成完毕
    	$info = $this->Html_page_model->get_by_where("path='".$path."'");
		$data = array('path'=>$path,
			'last_make_time'=>time(),
			);
		if(empty($info))
			$this->Html_page_model->insert($data);
		else
			$this->Html_page_model->update_by_id($info['id'],$data);


		$endTime = time();
		$second = $endTime - $beginTime;
		//$next_make_url = ADMIN_SITE_URL."/html_page/make_news_list?class_id=$class_id";


		$result = array('page'=>$page,
					'next_make_url' => '',
					'second' => $second,
					'total' => $total,
					'num' => $num,
					);
		$this->load->view('admin/html_making',$result);
	}

	public function news_detail(){
		$this->lang->load('admin_layout');

		$this->load->model('Article_Class_model');
		$list = $this->Article_Class_model->getClassList();

		$result = array('list'=>$list);
		$this->load->view('admin/html_news_detail', $result);
	}

	public function make_news_detail(){
		$class_id = $this->input->post_get('class_id');


		$this->load->model('Article_model');
		$this->load->model('Article_Class_model');


		$path = 'news/detail?id={id}';
		$make_path = 'news_detail_{id}.html';
		$beginTime = time();

		$arrClassIds = array();
		$arrWhere = array('status'=>1);
		if($class_id != 'all'){
			$arrClassIds = $this->Article_Class_model->getChildClassIds($class_id);
		}else{
			$arrClassList = $this->Article_Class_model->getClassList();
			foreach ($arrClassList['data'] as $k => $a) {
				$arrClassIds[$k] = $a['id'];
			}
		}
		if(!empty($arrClassIds))
			$arrWhere['class_id'] = $arrClassIds;


		$page = _get_page();
		$pagesize = 3;
		$list = $this->Article_model->fetch_page($page, $pagesize, $arrWhere,'id','sort desc');
		foreach ($list['rows'] as $key => $v) {
	    	$url = base_url().str_replace('{id}', $v['id'], $path);
	    	$make_html = str_replace('{id}', $v['id'], $make_path);

	    	$this->html->createhtml($url, time(), BASE_ROOT_PATH.'/html', $make_html);
	    }

	    $total = $list['count'];
		$num = $page * $pagesize;

	    if($num>$total)
	    	$num = $total;

		//全部生成完毕
		if($num == $total){
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
		$next_make_url = ADMIN_SITE_URL."/html_page/make_news_detail?class_id=$class_id&page=".($page+1);


		$result = array('page'=>$page,
					'next_make_url' => $next_make_url,
					'second' => $second,
					'total' => $total,
					'num' => $num,
					);
		$this->load->view('admin/html_making',$result);



	    
	}

}