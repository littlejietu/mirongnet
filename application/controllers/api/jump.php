<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jump extends CI_Controller
{
	public function __construct()
    {
      	parent::__construct();
    }


    public function index(){
    	$url = $this->input->get('url');
    	$openid = $this->input->get('openid');
    	$unionid = $this->input->get('unionid');
    	$get_userid = $this->input->get('userid');
    	$sex = $this->input->get('sex');
    	$nickname = $this->input->get('nickname');
    	$head_url = $this->input->get('head_url');
        $invite_id = $this->input->get('invite_id');

    	if($url=='none'){
    		// $arrReturn = array('code'=>'-1','data'=>null,'msg'=>'','action'=>'jump');
    		// echo json_encode($arrReturn);
    		// die;
            header("location:".WAP_SITE_URL);
    	}
    	/*else if($url =='app'){
    		$data = array('openid'=>$openid, 'unionid'=>$unionid, 'user_id'=>$get_userid,'sex'=>$sex,'nickname'=>$nickname,'head_url'=>$head_url);

    		$arrReturn = array('code'=>'1','data'=>$data,'msg'=>'Success','action'=>'jump');
    		echo json_encode($arrReturn);
    		die;
    	}*/
    	else{
            //用户自动登录
            // $this->load->helper('cookie');
            $this->load->service('user_service');
            $this->load->service('invite_service');
            $this->load->model('User_auth_model');
            $this->load->model('User_token_model');
            
            

            $ip = $_SERVER["REMOTE_ADDR"];
            $userid = 0;
            $client_type = 1;
            $bLogin = false;

            if(empty($get_userid)){
                $aUser = $this->User_model->get_by_where(array('user_name'=>"'$unionid'"));
                if(empty($aUser)){
                    $user_data = array('user_name'=>$unionid,'mobile'=>'','pwd'=>$openid,'name'=>$nickname, 'logo'=>$head_url,'platform_id' =>1,'ip'=>$ip);
                    $arrReturn = $this->user_service->reg_user($user_data);
                    $userid = $arrReturn['data'];
                    if($arrReturn['code']=='SUCCESS')
                        $bLogin = true;
                    $aUser = $this->User_model->get_by_id($userid);
                }

                //修改auth绑定用户
                $this->User_auth_model->update_by_where(array('unionid'=>$unionid),array('user_id'=>$userid));

                //生成分佣
                $this->invite_service->add_invites_record($userid, $invite_id);
            }
            else{
                $userid = $get_userid;
                $user_data = array();
                $aUser = $this->User_model->get_by_id($userid);

                if(empty($aUser['name']))
                    $user_data['name'] = $nickname;
                if(empty($aUser['logo']))
                    $user_data['logo'] = $head_url;
                if(empty($aUser['platform_id']))
                    $user_data['platform_id'] = 1;

                if(!empty($user_data))
                    $this->User_model->update_by_id($aUser['user_id'],$user_data);
                $bLogin = true;
            }

            if($bLogin){
                //自动登录 写token
                $tokenData = array(
                    'user_id' => $aUser['user_id'],
                    'user_name' => $aUser['user_name'],
                    'token' => md5(time().mt_rand(0,1000)),
                    'refresh_token' => md5(time().mt_rand(1000,2000)),
                    'addtime' => time(),
                    'expire_time' => time()+86400*7,
                    'client_type' => $client_type,
                );
                if ($this->User_token_model->insert($tokenData))
                {
                    //写cookie
                    // set_cookie("token",$tokenData['token'],60*60*24,'/');
                    // set_cookie("refresh_token",$tokenData['refresh_token'],60*60*24,'/');
                    // set_cookie("key",md5($aUser['user_id']),60*60*24,'/');
                    // $expire = time() + 86400;
                    // setcookie('my_token',$tokenData['token'],$expire);
                    // setcookie("refresh_token",$tokenData['refresh_token'],$expire+86400,'/');
                    // setcookie("key",md5($aUser['user_id']),$expire,'/');

                    if($url =='app'){
                        $data = array('token'=>$tokenData['token'], 'refresh_token'=>$tokenData['refresh_token'], 'openid'=>$openid, 'unionid'=>$unionid, 'user_id'=>$aUser['user_id'],'sex'=>$sex,'nickname'=>$nickname,'head_url'=>$head_url);

                        $arrReturn = array('code'=>'1','data'=>$data,'msg'=>'Success','action'=>'jump');
                        echo json_encode($arrReturn);
                        exit;
                    }else{
                        $cookie_url = WAP_SITE_URL.'/home/login.html';
                        $cookie_url = $cookie_url.'?token='.$tokenData['token'].'&refresh_token='.$tokenData['refresh_token'].'&key='.md5($aUser['user_id']).'&url='.$url.'&'.time();
                        
                        header("location:".$cookie_url);
                        exit;
                    }
                }
            }

 			header("location:".$url);
            exit;
        }
    }

    //--只支持未获取openid，需页面间的跳转取得openid
    public function getWxJSAPI(){
        $payMethod = $this->input->get('payMethod');
        $fund_order_id = $this->input->get('fundId');

        $this->load->model('FundOrder_model');

        if(!in_array($payMethod, array(11,12))  ){
            output_error('支付参数异常');
            die;
        }

        $obj = null;
        if($payMethod==12)
        {
            $this->load->library('WeixinPayJs');
            $obj = new WeixinPayJs();
        }
        
        if($payMethod==11)
        {
            $this->load->library('WeixinPayApp');
            $obj = new WeixinPayApp();
        }

        if( in_array($payMethod, array(12)) ){
            $openid = $obj->GetOpenid();
            $arrFundOrder = $this->FundOrder_model->get_by_id($fund_order_id);
            $msg = $obj->payRequest($arrFundOrder, $openid);
 
            echo json_encode($msg);

        }


    }
}