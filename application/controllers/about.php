<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index(){
    	$nav = array('page'=>'about',
    		'page_title'=>'关于米荣',
    		);
        
        $data = array(
            'nav'=>$nav,
            );

    	$this->load->view('front/about',$data);
    }
}