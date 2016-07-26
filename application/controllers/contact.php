<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index(){
    	$nav = array('page'=>'contact',
            'page_title'=>'联系我们',
            );

        $data = array(
            'nav'=>$nav,
            );

    	$this->load->view('front/contact',$data);
    }
}