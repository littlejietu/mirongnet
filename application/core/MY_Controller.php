<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class MY_Controller extends CI_Controller{
    public $NAV_LIST = null;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();

        $this->load->model('nav_model');
        $this->NAV_LIST = $this->nav_model->getList();

        

		// if (substr($this->uri->uri_string,0,8) == 'modules/')
		// {
		// 	header('location:/');exit;
		// }
		// if ($this->router->is_in_module === TRUE)
		// {
		// 	$this->load->add_package_path(APPPATH.$this->router->fetch_module());
		// }
		// $this->view->assign('assets_url', config_item('assets_url'));
	}

}

// END Controller class
/* End of file Controller.php */
/* Location: ./system/core/Controller.php */

/**
 * 管理员
 */
class MY_Admin_Controller extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->library('session');
        //$this->admin_info = $this->systemLogin();
        $this->admin_info = array ( 'admin_name' => 'admin', 'admin_id' => 1, 'role_id' => 1, 'is_super' => 1 );
        //echo 'checkPermission:'.$this->checkPermission();
        //die;
        if (empty($this->admin_info['admin_id'])||!$this->checkPermission()){
           // 验证权限
           redirect(ADMIN_SITE_URL.'/login2');
        }
    }

    /**
     * 取得当前管理员信息
     *
     * @param
     * @return 数组类型的返回结果
     */
    protected final function getAdminInfo(){
        return $this->admin_info;
    }

    /**
     * 验证当前管理员权限是否可以进行操作
     */
    function checkPermission($link_nav = null){
        if ($this->admin_info['is_super'] == 1) return true;
        $act = $this->router->fetch_class();  
        $op = $this->router->fetch_method(); 
     
        if (empty($this->permission)){
            $this->load->model('Admin_role_model');
            
            $gadmin = $this->Admin_role_model->get_by_id($this->admin_info['role_id']);
            $permission = $this->encrypt->decode($gadmin['limits']);
            $this->permission = $permission = explode('|',$permission);
        }else{
            $permission = $this->permission;
        }
        //显示隐藏小导航，成功与否都直接返回
        if (is_array($link_nav)){
            if (!in_array("{$link_nav['act']}.{$link_nav['op']}",$permission) && !in_array($link_nav['act'],$permission)){
                return false;
            }else{
                return true;
            }
        }

        //以下几项不需要验证
        $tmp = array('index','dashboard','login','common','home');
        if (in_array($act,$tmp)) return true;
        if (in_array($act,$permission) || in_array("$act.$op",$permission)){
            return true;
        }else{
            $extlimit = array('ajax','export_step1');
            if (in_array($op,$extlimit) && (in_array($act,$permission) || strpos(serialize($permission),'"'.$act.'.'))){
                return true;
            }
            $bResult = false;
            //带前缀的都通过
            foreach ($permission as $v) {
                if (!empty($v) && strpos("$act.$op",$v.'_') !== false) {
                    $bResult = true;
                    break;
                }
            }
            return $bResult;
        }
        return false;
    }

    /**
     * 系统后台登录验证
     *
     * @param
     * @return array 数组类型的返回结果
     */
    function systemLogin(){
        if(empty($_SESSION['sys_key']))
            return null;

        //取得cookie内容，解密，和系统匹配
        $user = unserialize($this->encrypt->decode($_SESSION['sys_key'],C('basic_info.MD5_KEY') ) );
        if (!key_exists('role_id',(array)$user) || !isset($user['is_super']) || (empty($user['admin_name']) || empty($user['admin_id']))){
            @header('Location: '.ADMIN_SITE_URL.'/login');exit;
        }else {
            //$this->systemSetKey($user);
        }
        //else {
            //print_r($user);die; 
            //$this->systemSetKey($user);
        //}
        return $user;

        /*return array(
            'admin_id'      => !empty($_COOKIE['admin_id'])?$_COOKIE['admin_id']:'',
            'admin_name'    => !empty($_COOKIE['admin_name'])?$_COOKIE['admin_name']:'',
            'is_super'      => !empty($_COOKIE['is_super'])?$_COOKIE['is_super']:'',
            'role_id'       => !empty($_COOKIE['role_id'])?$_COOKIE['role_id']:'',
        );*/
    }

    /**
     * 系统后台 会员登录后 将会员验证内容写入对应cookie中
     *
     * @param string $name 用户名
     * @param int $id 用户ID
     * @return bool 布尔类型的返回结果
     */
    protected final function systemSetKey($user){
        //$this->session->set_userdata('sys_key',$this->encrypt->encode(serialize($user),C('basic_info.MD5_KEY')),36000);
        $_SESSION['sys_key'] = $this->encrypt->encode(serialize($user),C('basic_info.MD5_KEY'));
        //$this->input->set_cookie('sys_key',$this->encrypt->encode(serialize($user),C('basic_info.MD5_KEY')),3600,'',null);
    }


    /**
     * 取得所有权限项
     *
     * @return array
     */
    public function permission() {

        $limit =  array(
            array('name'=>'设置', 'child'=>array(
                //array('name'=>'站点设置',  'op'=>null,'act'=>'base_setting'),
                //array('name'=>'上传设置', 'op'=>null, 'act'=>'upload'),
                //array('name'=>'SEO设置', 'op'=>'seo', 'act'=>'setting'),
                // array('name'=>'支付方式', 'op'=>null, 'act'=>'payment'),
                //array('name'=>'消息通知', 'op'=>'email','act'=>'message'),
                array('name'=>'权限设置', 'op'=>null, 'act'=>'admin'),
                array('name'=>'物流工具', 'op'=>null, 'act'=>'shop_transport'),
                //array('name'=>'快递公司', 'op'=>'index', 'act'=>'express'),
                //array('name'=>'运单模板', 'op'=>null, 'act'=>'waybill'),
                //array('name'=>'配送地区', 'op'=>'index', 'act'=>'offpay_area'),
                //array('name'=>'清理缓存', 'op'=>null, 'act'=>'cache'),
                //array('name'=>'性能优化', 'op'=>null, 'act'=>'perform'),
                //array('name'=>'搜索设置', 'op'=>null, 'act'=>'search'),
                //array('name'=>'操作日志', 'op'=>null, 'act'=>'log'),
            )),
            array('name'=>'商品', 'child'=>array(
                // array('name'=>'商品管理', 'op'=>null, 'act'=>'goods'),
                array('name'=>'分类管理', 'op'=>null, 'act'=>'category'),
                array('name'=>'规格管理', 'op'=>null, 'act'=>'spec_name'),
                //array('name'=>'品牌管理', 'op'=>null, 'act'=>'brand'),
                array('name'=>'标准商品模板管理', 'op'=>null, 'act'=>'goods_tpl'),
                array('name'=>'商品价格审核管理', 'op'=>'', 'act'=>'goods_audit'),
                //array('name'=>'类型管理', 'op'=>null, 'act'=>'type'),
                //array('name'=>'规格管理', 'op'=>null, 'act'=>'spec'),
                //array('name'=>'图片空间', 'op'=>null, 'act'=>'goods_album'),
            )),
            /*array('name'=>'店铺', 'child'=>array(
                array('name'=>'店铺管理', 'op'=>null, 'act'=>'store'),
                array('name'=>'店铺等级', 'op'=>null, 'act'=>'store_grade'),
                array('name'=>'店铺分类', 'op'=>null, 'act'=>'store_class'),
                array('name'=>'二级域名', 'op'=>null, 'act'=>'domain'),
                array('name'=>'店铺动态', 'op'=>null, 'act'=>'sns_strace'),
                array('name'=>'店铺帮助', 'op'=>null, 'act'=>'help_store'),
                array('name'=>'开店首页', 'op'=>null, 'act'=>'store_joinin'),
                array('name'=>'自营店铺', 'op'=>null, 'act'=>'ownshop'),
            )),*/
            array('name'=>'会员', 'child'=>array(
                array('name'=>'会员管理', 'op'=>null, 'act'=>'user'),
                //array('name'=>'会员级别', 'op'=>null, 'act'=>'member_grade'),
                //array('name'=>'经验值管理', 'op'=>null, 'act'=>'exppoints'),
                array('name'=>'会员通知',   'op'=>'send', 'act'=>'message'),
                array('name'=>'店铺管理',   'op'=>null, 'act'=>'shop'),
                array('name'=>'派送员管理', 'op'=>'index', 'act'=>'deliver'),
                //array('name'=>'积分管理', 'op'=>null, 'act'=>'integral_goods'),
                //array('name'=>'分享绑定', 'op'=>null, 'act'=>'sns_sharesetting'),
                //array('name'=>'会员相册', 'op'=>null, 'act'=>'sns_malbum'),
                //array('name'=>'买家动态', 'op'=>null, 'act'=>'snstrace'),
                //array('name'=>'会员标签', 'op'=>null, 'act'=>'sns_member'),
                //array('name'=>'预存款', 'op'=>null, 'act'=>'predeposit'),
                //array('name'=>'聊天记录', 'op'=>null, 'act'=>'chat_log'),
            )),
            array('name'=>'交易', 'child'=>array(
                array('name'=>'订单管理', 'op'=>'index', 'act'=>'order'),
                array('name'=>'充值管理', 'op'=>null,    'act'=>'recharge'),
                array('name'=>'提现管理', 'op'=>null,    'act'=>'cash'),
                //array('name'=>'虚拟订单', 'op'=>null, 'act'=>'vr_order'),
                array('name'=>'退款管理', 'op'=>'refund_manage', 'act'=>'refund'),
                array('name'=>'派送管理', 'op'=>'index_deliver', 'act'=>'order'),
                //array('name'=>'退货管理', 'op'=>'return_manage', 'act'=>'return'),
                //array('name'=>'虚拟订单退款', 'op'=>null, 'act'=>'vr_refund'),
                //array('name'=>'咨询管理', 'op'=>null, 'act'=>'consulting'),
                //array('name'=>'举报管理', 'op'=>null, 'act'=>'inform'),
                array('name'=>'评价管理', 'op'=>null, 'act'=>'comment'),
                //array('name'=>'投诉管理', 'op'=>null, 'act'=>'complain'),
            )),
            //array('name'=>'网站', 'child'=>array(
                //array('name'=>'文章分类', 'op'=>null, 'act'=>'article_class'),
                //array('name'=>'文章管理', 'op'=>null, 'act'=>'article'),
                //array('name'=>'友情链接', 'op'=>null, 'act'=>'link'),
                //array('name'=>'会员协议', 'op'=>null, 'act'=>'document'),
                //array('name'=>'页面导航', 'op'=>null, 'act'=>'navigation'),
                //array('name'=>'广告管理', 'op'=>null, 'act'=>'adv'),
                //array('name'=>'首页管理', 'op'=>null, 'act'=>'web_config|web_api'),
                //array('name'=>'推荐位', 'op'=>null, 'act'=>'rec_position'),
                //array('name'=>'专题管理', 'op'=>null, 'act'=>'web_special'),
            //)),
            array('name'=>'运营', 'child'=>array(
                array('name'=>'基本设置', 'op'=>null, 'act'=>'operation'),
                //array('name'=>'抢购管理', 'op'=>null, 'act'=>'groupbuy'),
                //array('name'=>'虚拟抢购设置', 'op'=>null, 'act'=>'vr_groupbuy'),
                array('name'=>'活动管理', 'op'=>null, 'act'=>'activity'),
                array('name'=>'优惠券管理', 'op'=>null, 'act'=>'coupon'),
                //array('name'=>'限时折扣', 'op'=>null, 'act'=>'promotion_xianshi'),
                //array('name'=>'满即送', 	'op'=>null, 'act'=>'promotion_mansong'),
                //array('name'=>'优惠套装', 'op'=>null, 'act'=>'promotion_bundling'),
                //array('name'=>'推荐展位', 'op'=>null, 'act'=>'promotion_bundling'),
                array('name'=>'兑换礼品', 'op'=>null, 'act'=>'integral_goods'),
                array('name'=>'推首管理', 'op'=>null, 'act'=>'first'),
                array('name'=>'分类推首管理', 'op'=>null, 'act'=>'first_category'),
                array('name'=>'分佣记录', 'op'=>'index', 'act'=>'invite'),
                array('name'=>'分佣关系', 'op'=>'userlist', 'act'=>'invite'),
                array('name'=>'客服',     'op'=>'index', 'act'=>'service'),
                array('name'=>'意见反馈1',     'op'=>null, 'act'=>'feedback'),
                //array('name'=>'代金券', 	'op'=>null, 'act'=>'voucher'),
                //array('name'=>'结算管理', 'op'=>null, 'act'=>'bill'),
                //array('name'=>'虚拟订单结算', 'op'=>null, 'act'=>'vr_bill'),
                //array('name'=>'平台客服', 'op'=>null, 'act'=>'mall_consult'),
                //array('name'=>'平台充值卡', 'op'=>null, 'act'=>'rechargecard'),
                //array('name'=>'物流自提服务站', 'op'=>null, 'act'=>'delivery')
            )),
            /*array('name'=>'统计', 'child'=>array(
                array('name'=>'概述及设置', 'op'=>null, 'act'=>'stat_general'),
                array('name'=>'行业分析', 'op'=>null, 'act'=>'stat_industry'),
                array('name'=>'会员统计', 'op'=>null, 'act'=>'stat_member'),
                array('name'=>'店铺统计', 'op'=>null, 'act'=>'stat_store'),
                array('name'=>'销量分析', 'op'=>null, 'act'=>'stat_trade'),
                array('name'=>'商品分析', 'op'=>null, 'act'=>'stat_goods'),
                array('name'=>'营销分析', 'op'=>null, 'act'=>'stat_marketing'),
                array('name'=>'售后分析', 	'op'=>null, 'act'=>'stat_aftersale'),
            )),*/
            /*array('name'=>'闲置', 'child'=>array(
                array('name'=>'SEO设置', 'op'=>NULL, 'act'=>'flea_index'),
                array('name'=>'分类管理', 'op'=>NULL, 'act'=>'flea_class'),
                array('name'=>'首页分类管理', 'op'=>NULL, 'act'=>'flea_class_index'),
                array('name'=>'闲置管理', 'op'=>NULL, 'act'=>'flea'),
                array('name'=>'地区管理', 'op'=>NULL, 'act'=>'flea_cs')
            )),*/
            /*array('name'=>'手机端', 'child'=>array(
                array('name'=>'首页设置', 'op'=>NULL, 'act'=>'mb_special'),
                array('name'=>'专题设置', 'op'=>NULL, 'act'=>'mb_special'),
                array('name'=>'分类图片设置', 'op'=>NULL, 'act'=>'mb_category'),
                array('name'=>'下载设置', 'op'=>NULL, 'act'=>'mb_app'),
                array('name'=>'意见反馈', 'op'=>NULL, 'act'=>'mb_feedback'),
                array('name'=>'手机支付', 'op'=>NULL, 'act'=>'mb_payment'),
            )),*/
            /*array('name'=>'微商城', 'child'=>array(
                array('name'=>'微商城管理', 'op'=>'manage', 'act'=>'microshop'),
                array('name'=>'随心看管理', 'op'=>'goods|goods_manage', 'act'=>'microshop'),//op值重复(goods_manage,goodsclass_list,personal_manage...)是为了无权时，隐藏该菜单
                array('name'=>'随心看分类', 'op'=>'goodsclass|goodsclass_list', 'act'=>'microshop'),
                array('name'=>'个人秀管理', 'op'=>'personal|personal_manage', 'act'=>'microshop'),
                array('name'=>'个人秀分类', 'op'=>'personalclass|personalclass_list', 'act'=>'microshop'),
                array('name'=>'店铺街管理', 'op'=>'store|store_manage', 'act'=>'microshop'),
                array('name'=>'评论管理', 'op'=>'comment|comment_manage', 'act'=>'microshop'),
                array('name'=>'广告管理', 'op'=>'adv|adv_manage', 'act'=>'microshop')
            )),*/
            /*array('name'=>'CMS', 'child'=>array(
                array('name'=>'CMS管理', 'op'=>null, 'act'=>'cms_manage'),
                array('name'=>'首页管理', 'op'=>null, 'act'=>'cms_index'),
                array('name'=>'文章管理', 'op'=>null, 'act'=>'cms_article|cms_article_class'),
                array('name'=>'画报管理', 'op'=>null, 'act'=>'cms_picture|cms_picture_class'),
                array('name'=>'专题管理', 'op'=>null, 'act'=>'cms_special'),
                array('name'=>'导航管理', 'op'=>null, 'act'=>'cms_navigation'),
                array('name'=>'标签管理', 'op'=>null, 'act'=>'cms_tag'),
                array('name'=>'评论管理', 'op'=>null, 'act'=>'cms_comment')
            )),*/
            /*array('name'=>'圈子', 'child'=>array(
                array('name'=>'圈子设置', 'op'=>null, 'act'=>'circle_setting'),
                array('name'=>'成员头衔设置', 'op'=>null, 'act'=>'circle_memberlevel'),
                array('name'=>'圈子分类管理', 'op'=>null, 'act'=>'circle_class'),
                array('name'=>'圈子管理', 'op'=>null, 'act'=>'circle_manage'),
                array('name'=>'圈子话题管理', 'op'=>null, 'act'=>'circle_theme'),
                array('name'=>'圈子成员管理', 'op'=>null, 'act'=>'circle_member'),
                array('name'=>'圈子举报管理', 'op'=>null, 'act'=>'circle_inform'),
                array('name'=>'圈子首页广告','op'=>'adv_manage', 'act'=>'circle_setting')
            )),*/
        );

        if (is_array($limit)){
            foreach ($limit as $k=>$v) {
                
                if (is_array($v['child'])){
                    $tmp = array();
                    foreach ($v['child'] as $key => $value) {
                        $act = (!empty($value['act'])) ? $value['act'] : '';
                        if (strpos($act,'|') == false){//act参数不带|
                            $op = empty($value['op'])?'':$value['op'];
                            $limit[$k]['child'][$key]['op'] = rtrim($act.'.'.str_replace('|','|'.$act.'.',$op),'.');
                        }else{//act参数带|
                            $tmp_str = '';
                            if (empty($value['op'])){
                                $limit[$k]['child'][$key]['op'] = $act;
                            }elseif (strpos($value['op'],'|') == false){//op参数不带|
                                foreach (explode('|',$act) as $v1) {
                                    $tmp_str .= "$v1.{$value['op']}|";
                                }
                                $limit[$k]['child'][$key]['op'] = rtrim($tmp_str,'|');
                            }elseif (strpos($value['op'],'|') != false && strpos($act,'|') != false){//op,act都带|，交差权限
                                foreach (explode('|',$act) as $v1) {
                                    foreach (explode('|',$value['op']) as $v2) {
                                        $tmp_str .= "$v1.$v2|";
                                    }
                                }
                                $limit[$k]['child'][$key]['op'] = rtrim($tmp_str,'|');
                            }
                        }
                    }
                }
            }

            return $limit;
        }else{
            return array();
        }
    }
}

/**
 * 无需登录token的Api父类
 */
class ApiController extends CI_Controller {
    
     public function __construct(){
        parent::__construct();

        //验证签名是否正确
        //$token  = $this->input->post('token');
        $get_sign = $this->input->post('sign');
        $timestamp = $this->input->post('timestamp');
        $post = $_POST;
        $loginUser = array();
        //第一次处理
        foreach ($post as $key => $value)
        {
            //$value = trim($value);
            if (is_array($value))
            {
                foreach ($value as $k=>$v)
                {
                    $a = $key.'['.$k.']';
                    $post[$a] = $v;
                }
                unset($post[$key]);
            }
        }
        //第二次处理
        foreach ($post as $key => $value)
        {
            if (is_array($value))
            {
                foreach ($value as $k=>$v)
                {
                    $a = $key.'['.$k.']';
                    $post[$a] = $v;
                }
                unset($post[$key]);
            }
        }
        ksort($post);
        unset($post['timestamp']);
        unset($post['sign']);
        foreach ($post as $key => $value)
        {
            $post[$key] = $key.'='.$value;
        }
        $str = implode('&',$post);
        if (empty($post))
        {
            $str = 'appkey=number9street&timestamp='.$timestamp;
        }
        else 
        {
            $str.= '&appkey=number9street&timestamp='.$timestamp;
        }
        
        $sign = md5(urlencode($str));
        if ($sign != $get_sign)
        {
            output_error(-3,'签名出错-'.$sign);exit;
            echo json_encode($result);exit;
        }
     }
     
}

/**
 * 需要登录token信息的Api父类
 */
class TokenApiController extends ApiController{
    public $loginUser = array();
    public function __construct(){
        parent::__construct();
        
        //验证token信息是否正确
        $this->load->model('User_token_model');

        $token  = $this->input->post('token');
        $where['token'] = "'$token'";
        $this->loginUser = $this->User_token_model->get_by_where($where);
       
        if (empty($this->loginUser))
        {
            output_error(-1,'请先登录');exit;
        }
        else 
        {
            if ($this->loginUser['status'] == -2)
            {
                output_error(-1000,'用户登录信息已失效，请重新登录');
            }
        }
    }
}

/**
 * 店铺 control新父类
 *
 */
class BaseSellerController extends CI_Controller {

    //店铺信息
    protected $store_info = array();
    //店铺等级
    protected $store_grade = array();

    public function __construct(){
    	parent::__construct();

        $this->load->model('Shop_model');


        $user_id = !empty($_SESSION['user_id'])?$_SESSION['user_id']:''; 
        if(!empty($user_id)){
             $this->loginUser = array('shop_id'=>$_SESSION['shop_id'],'user_id'=>$_SESSION['user_id'],'user_name'=>$_SESSION['user_name'],'user_logo'=>$_SESSION['user_logo'],'name'=>$_SESSION['name'],'shop_name'=>$_SESSION['shop_name']);

        }else{
            redirect(SELLER_SITE_URL.'/login');
        }

        //$this->load->lang(array('common','shop_layout','member_layout'));
        //if(!C('site_status')) halt(C('closed_reason'));
        Tpl::setDir('seller');
        Tpl::setLayout('seller_layout');

        //输出会员信息
        //$this->getMemberAndGradeInfo(false);

        //Tpl::output('nav_list', rkcache('nav',true));
        if (true || $_GET['act'] !== 'seller_login') {
        	/*
            if(empty($_SESSION['seller_id'])) {
                @header('location: index.php?act=seller_login&op=show_login');die;
            }

            // 验证店铺是否存在
            $model_store = Model('store');
            $this->store_info = $model_store->getStoreInfoByID($_SESSION['store_id']);
            if (empty($this->store_info)) {
                @header('location: index.php?act=seller_login&op=show_login');die;
            }

            // 店铺关闭标志
            if (intval($this->store_info['store_state']) === 0) {
                Tpl::output('store_closed', true);
                Tpl::output('store_close_info', $this->store_info['store_close_info']);
            }

            // 店铺等级
            if (checkPlatformStore()) {
                $this->store_grade = array(
                    'sg_id' => '0',
                    'sg_name' => '自营店铺专属等级',
                    'sg_goods_limit' => '0',
                    'sg_album_limit' => '0',
                    'sg_space_limit' => '999999999',
                    'sg_template_number' => '6',
                    // see also store_settingControl.themeOp()
                    // 'sg_template' => 'default|style1|style2|style3|style4|style5',
                    'sg_price' => '0.00',
                    'sg_description' => '',
                    'sg_function' => 'editor_multimedia',
                    'sg_sort' => '0',
                );
            } else {
                $store_grade = rkcache('store_grade', true);
                $this->store_grade = $store_grade[$this->store_info['grade_id']];
            }

            if ($_SESSION['seller_is_admin'] !== 1 && $_GET['act'] !== 'seller_center' && $_GET['act'] !== 'seller_logout') {
                if (!in_array($_GET['act'], $_SESSION['seller_limits'])) {
                    showMessage('没有权限', '', '', 'error');
                }
            }
            

            // 卖家菜单
            Tpl::output('menu', $_SESSION['seller_menu']);
            // 当前菜单
            $current_menu = $this->_getCurrentMenu($_SESSION['seller_function_list']);
            Tpl::output('current_menu', $current_menu);
            // 左侧菜单
            if($_GET['act'] == 'seller_center') {
                if(!empty($_SESSION['seller_quicklink'])) {
                    $left_menu = array();
                    foreach ($_SESSION['seller_quicklink'] as $value) {
                        $left_menu[] = $_SESSION['seller_function_list'][$value];
                    }
                }
            } else {
                $left_menu = $_SESSION['seller_menu'][$current_menu['model']]['child'];
            }
            Tpl::output('left_menu', $left_menu);
            Tpl::output('seller_quicklink', $_SESSION['seller_quicklink']);

            $this->checkStoreMsg();

            */
        }
    }

    protected function getSellerMenuList($is_admin, $limits) {
        $seller_menu = array();
        if (intval($is_admin) !== 1) {
            $menu_list = $this->_getMenuList();
            foreach ($menu_list as $key => $value) {
                foreach ($value['child'] as $child_key => $child_value) {
                    if (!in_array($child_value['act'], $limits)) {
                        unset($menu_list[$key]['child'][$child_key]);
                    }
                }

                if(count($menu_list[$key]['child']) > 0) {
                    $seller_menu[$key] = $menu_list[$key];
                }
            }
        } else {
            $seller_menu = $this->_getMenuList();
        }
        $seller_function_list = $this->_getSellerFunctionList($seller_menu);
        return array('seller_menu' => $seller_menu, 'seller_function_list' => $seller_function_list);
    }

    private function _getCurrentMenu($seller_function_list) {
        $current_menu = $seller_function_list[$_GET['act']];
        if(empty($current_menu)) {
            $current_menu = array(
                'model' => 'index',
                'model_name' => '首页'
            );
        }
        return $current_menu;
    }

    private function _getSellerFunctionList($menu_list) {
        $format_menu = array();
        foreach ($menu_list as $key => $menu_value) {
            foreach ($menu_value['child'] as $submenu_value) {
                $format_menu[$submenu_value['act']] = array(
                    'model' => $key,
                    'model_name' => $menu_value['name'],
                    'name' => $submenu_value['name'],
                    'act' => $submenu_value['act'],
                    'op' => $submenu_value['op'],
                );
            }
        }
        return $format_menu;
    }

    /**
     * 商家消息数量
     */
    // private function checkStoreMsg() {//判断cookie是否存在
    //     $cookie_name = 'storemsgnewnum'.$_SESSION['seller_id'];
    //     if (cookie($cookie_name) != null && intval(cookie($cookie_name)) >=0){
    //         $countnum = intval(cookie($cookie_name));
    //     }else {
    //         $where = array();
    //         $where['store_id'] = $_SESSION['store_id'];
    //         $where['sm_readids'] = array('notlike', '%,'.$_SESSION['seller_id'].',%');
    //         if ($_SESSION['seller_smt_limits'] !== false) {
    //             $where['smt_code'] = array('in', $_SESSION['seller_smt_limits']);
    //         }
    //         $countnum = Model('store_msg')->getStoreMsgCount($where);
    //         setNcCookie($cookie_name,intval($countnum),2*3600);//保存2小时
    //     }
    //     Tpl::output('store_msg_num',$countnum);
    // }

}

/**
 * 需要登录token信息的Api父类
 */
class TokenDeliverApiController extends CI_Controller{
    public $loginUser = array();
    public function __construct(){
        parent::__construct();

        //验证token信息是否正确
        $this->load->model('Deliver_user_pwd_model');

        $token  = $this->input->post('token');

        $where['token'] = "'$token'";
        $this->loginUser = $this->Deliver_user_pwd_model->get_by_where($where);

        if (empty($this->loginUser))
        {
            $arrRes = array('data'=>new \stdClass,'code' =>'-1','msg'=>'USER_NOT_EXIST');
            echo json_encode($arrRes);exit;
        }
    }
}