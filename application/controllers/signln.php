<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signln extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index(){
    	$data = array(
    		'page_nav'=>'登录',
    		);

    	$this->load->view('front/signln',$data);
    }
}