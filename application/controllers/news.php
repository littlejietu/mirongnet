<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
         $this->load->model('Article_Class_model');
         $this->load->model('Article_model');
    }
    public function index(){

        $class_id = $this->input->post_get('class_id');
        $cKey = $this->input->post_get('txtKey');
        $page     = _get_page();//接收前台的页码
        $pagesize = 3;
        $arrParam = array();
        $arrWhere = array();
        if($class_id)
        {
            $arrParam['class_id'] = $class_id;
            $arrWhere['class_id_1'] = $class_id;
        }
        
        if($cKey)
        {
            $arrParam['txtKey'] = $cKey;
            $arrWhere['title like '] = "'%$cKey%'";
        }

        $strOrder = 'sort asc';
        $arrWhere['status <>'] = -1;
        $arrParam['orderby'] = 'updatetime DESC';
        $list = $this->Article_model->fetch_page($page, $pagesize, $arrWhere,'*',$arrParam['orderby']);
     
        //分页
        $pagecfg = array();
        $pagecfg['base_url']     = _create_url(ADMIN_SITE_URL.'/News', $arrParam);
        $pagecfg['total_rows']   = $list['count'];
        $pagecfg['cur_page'] = $page;
        $pagecfg['per_page'] = $pagesize;
        $this->pagination->initialize($pagecfg);
        $list['pages'] = $this->pagination->create_links();

        $class_name = '';
        $classInfo = $this->Article_Class_model->get_by_id($class_id);
        if(!empty($classInfo))
            $class_name = $classInfo['name'];
        $parent_id = 21;
        $where = array('status <>'=>-1,'parent_id'=>$parent_id);
        $p = $this->Article_Class_model->get_list($where,'parent_id');
        $whereList = array('status <>'=>-1,'parent_id'=>$parent_id);
        $list_class = $this->Article_Class_model->get_list($whereList);
        $parent_id = array();
        foreach ($p as $key=>$value)
        {
            array_push($parent_id,$value['parent_id']);
        }
        foreach ($list_class as $key => $value)
        {
            if (in_array($value['id'],$parent_id))
            {
                $list_class[$key]['have_child'] = 1;
            }
            else
            {
                $list_class[$key]['have_child'] = 0;
            }
        }

    	$nav = array('page'=>'news',
    		'page_title'=>'APP开发资讯',
            'class_name'=>$class_name,

    		);
        
        $data = array(
            'nav'=>$nav,
            'list'=>$list,
            'list_class'=>$list_class,
            
            );

    	$this->load->view('front/news',$data);
    }

    public function detail()
    {
        $id = $this->input->get('id');

        if(!empty($id)){
            $info = $this->Article_model->get_by_id($id);
        }

        $parent_id = 21;
        $where = array('status <>'=>-1,'parent_id'=>$parent_id);
        $p = $this->Article_Class_model->get_list($where,'parent_id');
        $whereList = array('status <>'=>-1,'parent_id'=>$parent_id);
        $list = $this->Article_Class_model->get_list($whereList);
        //print_r($list);die;
        $parent_id = array();
        foreach ($p as $key=>$value)
        {
            array_push($parent_id,$value['parent_id']);
        }
        foreach ($list as $key => $value)
        {
            if (in_array($value['id'],$parent_id))
            {
                $list[$key]['have_child'] = 1;
            }
            else
            {
                $list[$key]['have_child'] = 0;
            }
        }
        $nav = array('page'=>'news',
            'page_title'=>'APP开发资讯',
            );

        $result = array(
            'list' => $list,
            'nav' => $nav,
            'info' => $info,
        );
        $this->load->view('front/news_detail',$result);
    }

}