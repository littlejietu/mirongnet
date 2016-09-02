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
        $class_id = empty($class_id)?21:$class_id;
        $cKey = $this->input->post_get('txtKey');
        $path = C('Html_Page.news_list');//'news?class_id={class_id}&page={page}';
        $is_html_close = $this->input->get('close');

        $this->load->model('Html_page_model');


        $page     = _get_page();//接收前台的页码
        $pagesize = C('Page_Style.pagesize');
        $arrParam = array();
        $arrWhere = array();
        if($class_id)
        {
            $arrParam['class_id'] = $class_id;
            $aChildClass = $this->Article_Class_model->getChildClassIds($class_id);
            $arrWhere['class_id_1'] = $aChildClass;
        }
        
        if($cKey)
        {
            $arrParam['txtKey'] = $cKey;
            $arrWhere['title like '] = "'%$cKey%'";
        }

        if($is_html_close)
            $arrParam['close'] = 1;


        $strOrder = 'sort asc';
        $arrWhere['status <>'] = -1;
        $list = $this->Article_model->fetch_page($page, $pagesize, $arrWhere,'*','updatetime DESC');
     
        //分页
        $pagecfg = array();
        $pagecfg['base_url']     = _create_url(base_url().'news', $arrParam);
        $pagecfg['total_rows']   = $list['count'];
        $pagecfg['cur_page'] = $page;
        $pagecfg['per_page'] = $pagesize;

        $pagecfg = array_merge(C('Page_Style.front'), $pagecfg);

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

        $list_is_html = 0;
        $detail_is_html = 0;
        if($is_html_close==0){
            if(get_is_html($path))
                $list_is_html = 1;
            if(get_is_html(C('Html_Page.news_detail')))
                $detail_is_html=1;
        }

        if($list_is_html){
            $page_url = base_url().'html/news_'.$arrParam['class_id'].'_{page}.html';
            $pattern = '/<a href="(.*?)"(.*?)>(.*?)<\/a>/i';

            $list['pages'] = _get_html_url($pattern, $page_url, $list['pages']);

        }



    	$nav = array('page'=>'news',
    		'page_title'=>'APP开发资讯',
            'class_name'=>$class_name,
    		);
        
        $data = array(
            'nav'=>$nav,
            'list'=>$list,
            'list_class'=>$list_class,
            'list_is_html'=>$list_is_html,
            'detail_is_html'=>$detail_is_html,
            'arrParam'=>$arrParam,
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

        $arrPrevNext = $this->Article_model->getPrevNext($info['addtime'], $info['class_id']);

        $nav = array('page'=>'news',
            'page_title'=>'APP开发资讯',
            );

        $result = array(
            'list' => $list,
            'nav' => $nav,
            'info' => $info,
            'arrPrevNext'=>$arrPrevNext,
        );
        $this->load->view('front/news_detail',$result);
    }

}