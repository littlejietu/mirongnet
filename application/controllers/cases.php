<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cases extends MY_Controller {

	public function __construct()
    {
      parent::__construct();
    }




    public function index() {

        $this->load->model('Cases_model');
        
       
        $arrWhere = array('status'=>1);
        
        $list = $this->Cases_model->get_list($arrWhere);
        //print_r($list);die;
        
        $nav = array('page'=>'cases',
            'page_title'=>'案例展示',
            );

        $result = array(
            'list' => $list,
            'nav'=>$nav,
            );
            

        $this->load->view('front/cases',$result);

    }
}
