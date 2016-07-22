<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index(){
    	$data = array(
    		'page_nav'=>'注册',
    		);

    	$this->load->view('front/signup',$data);
    }
}