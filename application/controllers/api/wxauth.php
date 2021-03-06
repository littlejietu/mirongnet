<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wxauth extends CI_Controller {
	public function __construct()
    {
      	parent::__construct();

      	$this->load->library('WeixinAuth');
    }

    public function index(){
        $this->weixinauth->token();
    }

    public function menu_create()
    {
        $this->weixinauth->menu_create();
    }

    public function token(){
    	$arrReturn = array('code'=>'EMPTY','message'=>'','data'=>'');
    	$arrReturn['data'] = $this->weixinauth->token();

    	echo json_encode($result);
    }

    public function authorize(){
    	$code = $this->input->post_get('code');
    	$url = $this->input->post_get('url');
        $invite_id = $this->input->post_get('invite_id');
        $client_type = $this->input->post_get('client_type');
        if(!$client_type)
            $client_type = 'app';

    	$this->weixinauth->init_auth($code, $url, $invite_id,$client_type);

    }

    public function go(){
        $gotoUrl = str_replace('$', '&', $this->input->get('url') ) ;
        $invite_id = $this->input->get('invite_id');
        $invite_param = '';
        if(!empty($invite_id))
            $invite_param = "&invite_id=$invite_id";


        $redirect_uri = BASE_SITE_URL.'/api/wxauth/authorize?url='.$gotoUrl.$invite_param.'&client_type=wap';
        $this->weixinauth->authz($redirect_uri);
    }

    public function jsapi(){
    	$url = $_POST['url'];
    	$this->load->library('WxJsApi');

    	$arrReturn = $this->wxjsapi->getSignPackage($url);
        output_data($arrReturn);

    }
}

