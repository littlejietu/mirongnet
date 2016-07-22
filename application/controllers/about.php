<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index(){
    	$data = array(
    		'page_nav'=>'关于我们',
    		);

    	$this->load->view('front/about',$data);
    }
}