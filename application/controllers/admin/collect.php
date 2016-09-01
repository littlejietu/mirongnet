<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collect extends MY_Admin_Controller {
	public function __construct()
	{
	    parent::__construct();

	}

	public function index()
	{
		$this->load->model('Collect_model');
		
		$cKey = $this->input->post_get('txtKey');
		
		$page     = _get_page();//接收前台的页码
		
		$pagesize = 8;
		$arrParam = array();
		$arrWhere = array();
		
		
		if($cKey)
		{
		    $arrParam['txtKey'] = $cKey;
		    $arrWhere['name like '] = "'%$cKey%'";
		}

		$strOrder = 'add_time desc';
		$arrWhere['status <>'] = -1;
		
		$list = $this->Collect_model->fetch_page($page, $pagesize, $arrWhere,'*',$strOrder);
		
		//分页
		$pagecfg = array();
		$pagecfg['base_url']     = _create_url(ADMIN_SITE_URL.'/Collect', $arrParam);
		$pagecfg['total_rows']   = $list['count'];
		$pagecfg['cur_page'] = $page;
		$pagecfg['per_page'] = $pagesize;
		//$this->load->library('pagination');
		$this->pagination->initialize($pagecfg);
		$list['pages'] = $this->pagination->create_links();

		$result = array(
		    'list' => $list,
		
		    'arrParam' => $arrParam,
			);
		$this->load->view('admin/collect',$result);
	}

	public function add()
	{
		$id	= $this->input->get('id');
	    $info = array();

	    $this->load->model('Article_Class_model');
		$list = $this->Article_Class_model->getClassList();
		
	    $this->load->model('Collect_model');

	    if(!empty($id))
	    {
	        $info = $this->Collect_model->get_by_id($id);

	    }
        $result = array(
            'info' => $info,
            'list'=>$list
        );
		$this->load->view('admin/collect_add',$result);
	}

	public function save()
	{		
		
		//输出所有post提交的表单内元素
	    if ($this->input->is_post())
	    {
	        //验证规则
	        $config = array(
	            array(
	                'field'   => 'name',//后台验证，表中的字段名
	                'label'   => '采集项目名',
	                'rules'   => 'trim|required'//验证规划
	            ),
	           
	        );

	        $this->form_validation->set_rules($config);
	    
	        if ($this->form_validation->run() === TRUE)
	        {
	            $id = (int)$this->input->post('id');
	            $this->load->model('Collect_model');

	            $status = $this->input->post('status');
	            $status = empty($status)?1:$status;
	            
	            //将需要保存的数据赋值给数组$data
	            $data = array(
	                'class_id'=>$this->input->post('class_id'),
	                'class_id_1'=>$this->input->post('class_id_1'),
	                'name'=>$this->input->post('name'),
	                'charset'=>$this->input->post('charset'),
	                'attribute'=>$this->input->post('attribute'),
	                'batch_match_url'=>$this->input->post('batch_match_url'),
	                'batch_start_num'=>$this->input->post('batch_start_num'),
	                'batch_end_num'=>$this->input->post('batch_end_num'),
	                'batch_per_num'=>$this->input->post('batch_per_num'),
	                'manual_url'=>$this->input->post('manual_url'),
	                'url_rule'=>$this->input->post('url_rule'),
	                'url_must_contain'=>$this->input->post('url_must_contain'),
	                'url_not_contain'=>$this->input->post('url_not_contain'),
	                'status'=>$status,
	                'add_time'=>time(),
	                'collect_time'=>time(),
	                'title_rule'=>$this->input->post('title_rule'),
	                'content_rule'=>$this->input->post('content_rule'),
	                'time_rule'=>$this->input->post('time_rule'),
	                'from_ruie'=>$this->input->post('from_ruie'),
	                'title_filter'=>$this->input->post('title_filter'),
	                'content_filter'=>$this->input->post('content_filter'),
	                'time_filter'=>$this->input->post('time_filter'),
	                'from_filter'=>$this->input->post('from_filter'),
	                'is_download_img'=>$this->input->post('is_download_img'),
	                'is_watermark'=>$this->input->post('is_watermark'),
	                'is_import_order'=>$this->input->post('is_import_order'),
	            );
	    
	            $id	= $this->input->post('id');
	            if($id)
	                $data['id'] = $id;

	            $id	= $this->input->post('id');
	            if($id)
	                $data['id'] = $id;
					
					
	            //保存至数据库
	            $this->Collect_model->insert($data);
				
			
	            //echo '成功,<a href="/admin/aa">返回列表页</a>';
				
	            redirect(ADMIN_SITE_URL.'/collect');
	            exit;
	        }
	        else
	        {
	            redirect(ADMIN_SITE_URL.'/collect/add');
	        }
	        	
	    }
	}
	
	
	function del(){
		$this->load->model('Collect_model');
	    if ($this->input->is_post())
	    {	
	        $id = $this->input->post('del_id');

			foreach($id as $k=>$v){
				
				$page = _get_page();
				$data['status'] = -1;
				// 调用修改状态方法
	    		$this->Collect_model->update_by_id($v,$data);
			}
			
	    }
	    else
	    {
	        $id	= $this->input->get('id');
			$page = _get_page();
			$data['status'] = -1;
		// 调用修改状态方法
	    	$this->Collect_model->update_by_id($id,$data);
			;
	    }
	    
	    redirect( ADMIN_SITE_URL.'/Collect' );
		
	
	}

}