<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cases extends CI_Controller {

	public function __construct()
    {
      parent::__construct();
    }




    public function index() {

        $this->load->model('Cases_model');
        
       
        $arrWhere = array('status'=>1);
        
        $list = $this->Cases_model->get_list($arrWhere);
        //print_r($list);die;
       
        $result = array(
            'list' => $list,
            );
            

        $this->load->view('front/cases',$result);

    }
}
