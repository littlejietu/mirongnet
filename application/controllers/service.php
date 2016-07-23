<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class service extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function index(){
        $nav = array('page'=>'service',
            'page_title'=>'服务',
            );

    	$data = array(
    		'nav'=>$nav,
    		);

    	$this->load->view('front/service',$data);
    }
}