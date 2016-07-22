<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index(){
    	$data = array(
    		'page_nav'=>'联系我们',
    		);

    	$this->load->view('front/contact',$data);
    }
}