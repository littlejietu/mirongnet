<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class solution extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function index(){
        $nav = array('page'=>'solution',
            'page_title'=>'APP解决方案',
            );

    	$data = array(
    		'nav'=>$nav,
    		);

    	$this->load->view('front/solution',$data);
    }
}