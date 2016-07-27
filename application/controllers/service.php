<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Service extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function index(){
        $this->doPage();
        
    }

    public function ios(){
        $this->doPage('ios');
    }

    public function android(){
        $this->doPage('android');
    }

    public function wx(){
        $this->doPage('wx');
    }

    public function h5(){
        $this->doPage('h5');
    }

    public function web(){
        $this->doPage('web');
    }

    public function shop(){
        $this->doPage('shop');
    }

    private function doPage($type='index'){

        $nav = array('page'=>'service',
            'page_title'=>'APP开发服务',
            );
        $view = 'service';
        switch ($type) {
            case 'ios':
                $nav = array('page'=>'service',
                    'page_title'=>'<a href="'.base_url().'service">APP开发服务</a> / IOS开发',
                );
                $view = 'service_ios';
                break;
            case 'android':
                $nav = array('page'=>'service',
                    'page_title'=>'<a href="'.base_url().'service">APP开发服务</a> / Android开发',
                );
                $view = 'service_android';
                break;
            case 'wx':
                $nav = array('page'=>'service',
                    'page_title'=>'<a href="'.base_url().'service">APP开发服务</a> / 微信开发',
                );
                $view = 'service_wx';
                break;
            case 'h5':
                $nav = array('page'=>'service',
                    'page_title'=>'<a href="'.base_url().'service">APP开发服务</a> / H5开发',
                );
                $view = 'service_h5';
                break;
            case 'web':
                $nav = array('page'=>'service',
                    'page_title'=>'<a href="'.base_url().'service">APP开发服务</a> / Web开发',
                );
                $view = 'service_web';
                break;
            case 'shop':
                $nav = array('page'=>'service',
                    'page_title'=>'<a href="'.base_url().'service">APP开发服务</a> / 电商APP',
                );
                $view = 'service_shop';
                break;

            default:
                # code...
                break;
        }
            

        $data = array(
            'nav'=>$nav,
            );

        $this->load->view('front/'.$view,$data);

    }
}