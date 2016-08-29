<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nav extends MY_Admin_Controller {
	
    public function __construct()
	{
	    parent::__construct();
	    $this->load->model('nav_model');
	}
	
	public function index()
	{
		$this->lang->load('admin_layout');
        
        $list = $this->nav_model->get_list(array('status<>'=>-1), '*', 'sort desc');

        $result = array(
            'list' => $list,
        );
		$this->load->view('admin/nav',$result);
	}
	
	public function add()
	{
	    $this->lang->load('admin_layout');
	    $id = $this->input->get('id');
	    $info = array();
	    if(!empty($id))
	    	$info = $this->nav_model->get_by_id($id);

	    $result = array(
	        'info' => $info,
	    );
	    $this->load->view('admin/nav_add',$result);
	}
	
	


	public  function del()
	{
	    if ($this->input->get('id'))
	    {
	        $id = $this->input->get('id');
	        $data['status'] = -1;
	        $this->nav_model->update_by_id($id,$data);
	    }
	    if ($this->input->post())
	    {
	        $ids = $this->input->post('check_ac_id');
	        $data['status'] = -1;
	        foreach ($ids as $key => $value)
	        {
	            $this->nav_model->update_by_id($value,$data);
	        }
	    }
	    redirect(ADMIN_SITE_URL.'/nav');
	}

	
	public function save()
	{
	    if ($this->input->post())
	    {
	        $config = array(
	            array(
	                'field'   => 'title',
	                'label'   => '名称',
	                'rules'   => 'trim|required'
	            ),
	            array(
	                'field'   => 'path',
	                'label'   => '路径',
	                'rules'   => 'trim|required'
	            ),
	            array(
	                'field'   => 'sort',
	                'label'   => '排序',
	                'rules'   => 'trim|required'
	            ),
	        );
	        
	        $this->form_validation->set_rules($config);
	        if ($this->form_validation->run() === TRUE)
	        {
	            $data = array(
	                'name' => $this->input->post('title'),
	                'path' => $this->input->post('path'),
	                'sort' => $this->input->post('sort'),
	                'is_blank' => $this->input->post('is_blank'),
	                'status' => $this->input->post('status'),
	            );

	            $id = (int)$this->input->post('id');
	            if($id)
	                $data['id'] = $id;

	            $this->nav_model->insert($data);
	            
	            
	        }
	    }

	    redirect(ADMIN_SITE_URL.'/nav');
	}
	
	public function ajax()
	{
		$branch = $this->input->get('branch');
		$column = $this->input->get('column');
		$value = $this->input->get('value');
		$id = $this->input->get('id');
	    
        $arr = array('nav_sort','nav_name','nav_path','nav_blank', 'nav_status');
		if(in_array($branch, $arr))
		{
			if($branch=='nav_status')
				$value = $value==1?1:2;

			$this->nav_model->update_by_id($id, array($column=>trim($value)));
			exit(true);
		}

	}
}
