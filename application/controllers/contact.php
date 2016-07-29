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

    public function save(){

        $this->load->model('Feedback_model');
        $name = $this->input->post('name');
        $contact = $this->input->post('contact');
        $content = $this->input->post('content');

        if ($this->input->is_post())
        {
            //验证规则
            $config = array(
                array(
                    'field'   => 'content',//后台验证，表中的字段名
                    'label'   => '内容',
                    'rules'   => 'trim|required'//验证规划
                ),
            );
            $this->form_validation->set_rules($config);
        
            if ($this->form_validation->run() === TRUE)
            {
                $data = array(
                    'id'=>$this->input->post('id'),
                    'name'=>$this->input->post('name'),
                    'contact'=>$this->input->post('contact'),
                    'content'=>$this->input->post('content'),
                    'addtime'=>time(),
                    'status'=>1,
                );

                $this->Feedback_model->insert($data);
                echo 1;
                exit;
              
            }else{
                echo 0;
                exit;
            }
        }

    }
}