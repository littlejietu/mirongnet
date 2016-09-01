<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
    {
      parent::__construct();
    }


	public function index() {
        $this->load->model('Article_model');

        $list = $this->Article_model->get_list('status=1 and class_id=21','*','updatetime desc',6);

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

        $data = array();


        $this->load->view('test',$data);


        //echo _aes_decode('3\/VsxW01QrEd9YcByIsKNKpOzOi6cohsa6cjonESD94=','731ef48daf92415ae55298f0846c33c0');

/*
        echo _aes_encode('181d0ecef6e3d3a6cb8c1008ddfa9055','7e3485449e9d96ff1e844b14914980dd');
        exit;

        $this->load->service('message_service');
        $tpl_id = 5;
        //$sender_id = 0;
        $receiver = '68';
        $receiver_type = 6;
        $arrParam = array('{money}'=>10,'{order_id}'=>10111);

        $this->message_service->send_sys($tpl_id,$receiver,$receiver_type,$arrParam);

        */

        
    }

    public function test2(){
        // $this->load->helper('cookie');
        // echo get_cookie('token');

        $url = $this->input->post('url');
        $include_path = $this->input->post('include_path');

        $rules = $this->input->post('rules');



                //require_once "phpQuery.php";
        $this->load->library('phpQuery');
        $doc = phpQuery::newDocumentFile($url);  

        $aa = $doc->find($rules);
        //$companies = $doc->find('#hotcoms .coms')->html();  
        //echo pq($companies)->find('h3 a')->text()."<br>";  
        //$urls = $aa['a'];

        foreach ($aa as  $url) {
            echo pq($url)->attr('href').'--'.pq($url)->text() .'<br />';
        }
        
        //print_r($aa);
        
        $doc->unloadDocument();

        //phpQuery::$documents=array();

        echo memory_get_usage().'<br />';
    }

    public function test3(){
        $detail_url = $this->input->post('detail_url');
        $title_rule = $this->input->post('title_rule');
        $title_filter = $this->input->post('title_filter');
        $content_rules = $this->input->post('content_rules');
        $content_filter = ($this->input->post('content_filter'));
        $time_rules = $this->input->post('time_rules');
        $time_filter = $this->input->post('time_filter');
        $from_rules = $this->input->post('from_rules');
        $from_filter = $this->input->post('from_filter');

        $is_download_img = $this->input->post('is_download_img');
//echo $title_rule;die;
        $this->load->library('phpQuery');
        $doc = phpQuery::newDocumentFile($detail_url);
        $title = $doc->find($title_rule)->text();
        $content = $doc->find($content_rules)->html();
        $time = $doc->find($time_rules)->text();
        $from = $doc->find($from_rules)->text();
        $from_link = $doc->find($from_rules)->attr('href');

        /*
        $arrImg = $doc->find('.yc_con_l .yc_con_txt img');
        foreach ($arrImg as $rule) {
            $img_url = pq($rule)->attr('src');

            $img_content = file_get_contents($img_url);
            $dir = BASE_UPLOAD_PATH.'/tmp/'.date('Ym');
            if(!is_dir($dir))
                mkpath($dir);

            $filename = basename($img_url);
            $img_url_new = UPLOAD_SITE_URL.'/tmp/'.date('Ym').'/'.$filename;
            $filename = $dir.'/'.$filename;
            if (!file_exists($filename)) {  
                file_put_contents($filename, $img_content);  
            }
            pq($rule)->attr('src',$img_url_new);
        }
        */
        

        $content_filter_html = pq($content_filter)->htmlOuter();
        $content = str_replace($content_filter_html, '', $content);






        echo "title:$title<br />content:$content<br />time:$time<br />from:$from<br />from link:$from_link";

    }

}
