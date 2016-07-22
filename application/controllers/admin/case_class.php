<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Case_class extends MY_Admin_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Case_class_model');
        //$this->load->model('Article_model');
        //$this->load->model('Article_Class_model');
    }
    
    public function index()
    {
        //$this->lang->load('admin_Page');//无法加载语言包就去掉着一句
        $ad_place = $this->input->post_get('ad_place');

        
        $cKey = $this->input->post_get('txtKey');
        
        $page     = _get_page();//接收前台的页码
        
        $pagesize = 8;
        $arrParam = array();
        $arrWhere = array();
        if($ad_place)
        {
            $arrParam['ad_place'] = $ad_place;
            $arrWhere['ad_place'] = $ad_place;
        }
        
        if($cKey)
        {
            $arrParam['txtKey'] = $cKey;
            $arrWhere['title like '] = "'%$cKey%'";
        }

        $strOrder = 'id desc';
        $arrWhere['status <>'] = -1;
        
        $list = $this->Case_class_model->fetch_page($page, $pagesize, $arrWhere,'*',$strOrder);
        //echo $this->Case_class_model->db->last_query();die;
        //print_r($list);die;

        //var_dump($page, $pagesize);die;
        //echo $this->db->last_query();die;
        //$this->load->model('Page_Place_Model');
        //$ad_placeList = $this->Page_Place_Model->get_list();
        
        //分页
        $pagecfg = array();
        $pagecfg['base_url']     = _create_url(ADMIN_SITE_URL.'/Case_class', $arrParam);
        $pagecfg['total_rows']   = $list['count'];
        $pagecfg['cur_page'] = $page;
        $pagecfg['per_page'] = $pagesize;
        //$this->load->library('pagination');
        $this->pagination->initialize($pagecfg);
        $list['pages'] = $this->pagination->create_links();
        // foreach ($ad_placeList as $key=>$value){
        //     $ad_place[$value['id']] = $value['title'];
        // }
        $result = array(
            'list' => $list,
        
            'arrParam' => $arrParam,
            );
            //var_dump($list);die;
        $this->load->view('admin/Case_class',$result);
    }
    

    
    
    public function add()
    {
        //输出添加时间然后结束
        //echo time();die;//
        //var_dump($id);
        //$this->lang->load('admin_Page');//语言包
        
        //需要修改
        $id = $this->input->get('id');
        $result = array();
        $info = array();
        
        
        
        $this->load->model('Case_class_Model');
        $arrPlace = $this->Case_class_Model->get_list();
    
        if(!empty($id))
        {
            $info = $this->Case_class_model->get_by_id($id);
            // $place = $this->Case_class_Model->get_by_id($info['id'],'title');
            // $info['title'] = $place['title'];
        }
    
        $result = array(
            'info'=>$info,
            'arrPlace'=>$arrPlace,
        );
    //var_dump($info);die;
        $this->load->view('admin/Case_class_add', $result);
    }
    
    public function save()
    {       
    
        //输出所有post提交的表单内元素
    //var_dump($_POST);exit;
        if ($this->input->is_post())
        {
            //验证规则
            $config = array(
                array(
                    'field'   => 'name',//后台验证，表中的字段名
                    'label'   => '分类名',
                    'rules'   => 'trim|required'//验证规划
                ),
               
                
                // array(
                //     'field'   => 'content',
                //     'label'   => '内容',
                //     'rules'   => 'trim|required'
                // )
            );
       // echo time();
      // print_r();
            $this->form_validation->set_rules($config);
        
            if ($this->form_validation->run() === TRUE)
            {
                $id = (int)$this->input->post('id');
                echo $id;
                 //echo '1119';die;
                $this->load->model('Case_class_model');
                //$oPlace = $this->Page_Place_model->get_by_id($id);
                
                //将需要保存的数据赋值给数组$data
                $data = array(
                    'name'=>$this->input->post('name'),
                    'class_id'=>$this->input->post('class_id'),
                    'status'=>$this->input->post('status'),
                );
        
                $id = $this->input->post('id');
                if($id)
                    $data['id'] = $id;

//接收图片必须用这个，数据库里才会有图片名字                 
             // if($this->input->post('img'))
             //    {
             //        $data['pic'] = $this->input->post('img');
             //    }
             //    else 
             //    { 
             //        $data['pic'] = $this->input->post('orig_img');
             //    }
             //    $id = $this->input->post('id');
             //    if($id)
             //        $data['id'] = $id;
                    
                    
                    
                //保存至数据库
                $this->Case_class_model->insert($data);
                
            
                //echo '成功,<a href="/admin/aa">返回列表页</a>';
                
                //echo base_url('/admin/link');die;
                redirect(ADMIN_SITE_URL.'/case_class');
                exit;
            }
            else
            {//echo base_url('/admin/link1');die;
                redirect(ADMIN_SITE_URL.'/case_class/add');
            }
                
        }
    }
    
    
    function del(){
        if ($this->input->is_post())
        {   
            $id = $this->input->post('del_id');
            //var_dump($id);
            //var_dump($id);die;
            foreach($id as $k=>$v){
                
                $page = _get_page();
                $data['status'] = -1;
                // 调用修改状态方法
                $this->Case_class_model->update_by_id($v,$data);
            }
            
        }
        else
        {
            $id = $this->input->get('id');
            $page = _get_page();
            $data['status'] = -1;
        // 调用修改状态方法
            $this->Case_class_model->update_by_id($id,$data);
            ;
        }
        
        redirect( ADMIN_SITE_URL.'/case_class' );
        
    
    }
}
?>