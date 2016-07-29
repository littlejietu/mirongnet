<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
      parent::__construct();
    }


	public function index() {
        $this->load->model('Article_model');

        $page     = _get_page();//接收前台的页码
        $pagesize = 4;
        $arrParam = array();
        $arrWhere = array();

        $arrParam['orderby'] = 'updatetime DESC';
        $list = $this->Article_model->fetch_page($page, $pagesize, $arrWhere,'*',$arrParam['orderby']);

        $nav = array('page'=>'home',
            'page_title'=>'首页',
            );
        $data = array(
            'nav'=>$nav,
            'list'=>$list,
            );
        $this->load->view('front/index',$data);

    }


 

    public function test(){
        //echo _aes_decode('3\/VsxW01QrEd9YcByIsKNKpOzOi6cohsa6cjonESD94=','731ef48daf92415ae55298f0846c33c0');


        echo _aes_encode('181d0ecef6e3d3a6cb8c1008ddfa9055','7e3485449e9d96ff1e844b14914980dd');
        exit;

        $this->load->service('message_service');
        $tpl_id = 5;
        //$sender_id = 0;
        $receiver = '68';
        $receiver_type = 6;
        $arrParam = array('{money}'=>10,'{order_id}'=>10111);

        $this->message_service->send_sys($tpl_id,$receiver,$receiver_type,$arrParam);

        
    }

    public function test2(){
        $this->load->helper('cookie');
        echo get_cookie('token');
    }

}
