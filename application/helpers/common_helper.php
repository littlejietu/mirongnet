<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('get_json') ){
	function _get_json($data)
	{
		$callback = isset($_GET['callback']) ? $_GET['callback'] : '';
		$data = json_encode($data);
		if ($callback && preg_match('~^(jQuery)[\d\_]+$~', $callback))
		{
			echo $callback.'('.$data.')';
		}
		else
		{
			echo $data;
		}
		exit;
	}
}

if ( ! function_exists('ip_long') ){
	function _ip_long($ip='')
	{
		$CI =& get_instance();
		return sprintf('%u', ip2long( $ip ? $ip : $CI->input->ip_address() ));
	}
}

function _current_url(){//获取当前URL
	$url = $_SERVER['PHP_SELF']; 
	$filename= substr( $url , strrpos($url , '/')+1 );
	return $filename;
}


function _get_db($group='xt')
{
	static $db=array();
	if (!isset($db[$group])){
		$CI =& get_instance();
		$db[$group] = $CI->load->database($group, TRUE);
		$db_name = 'xt_'.$group;
		$CI->$db_name = $db[$group];
	}
	return $db[$group];
}

function _get_config($key)
{
	$CI     =& get_instance();
	return $CI->config->item($key);
}

/**
 * 返回加密串
 * @param $val
 * @param $flag
 * @return unknown_type
 */
function _get_key_val($val, $flag=FALSE)
{
	if (!$val)return '';
	if ($flag)
	{
		$md5 = substr($val, -32);
		$str = substr($val,0,-32);
		if(_get_config('encrypt_open'))
		{
			if ( $md5 == md5(session_id().'!#%&)'.$str))
				return $str;
			else
			{
				//redirect('/home/expired');
				return '';
			}
			
		}
		else
			return $str;

	}
	else
	{
		return $val.md5(session_id().'!#%&)'.$val);
	}
}

function _get_html_cssjs($pathKey, $files, $type='css')
{
	$strResult = '';

	$path = _get_cfg_path($pathKey);
	$files = trim($files, ',');
	$arr = explode(',', $files);
	foreach ($arr as $v) {
		$v = trim($v);
		if($type=='css')
			$strResult .='<link rel="stylesheet" href="'.$path.$v.'" />'."\r\n";
		else
			$strResult .='<script src="'.$path.$v.'"></script>'."\r\n";
	}

	return $strResult;
}


function _get_cfg_path($key)
{
	$CI     =& get_instance();
	$arrCfgpath = $CI->config->item('cfg_path');
	if(!empty($arrCfgpath[$key]))
		return $arrCfgpath[$key];
	else
		return '';
}

function _create_url($base_url, $params=array())
{
	if (substr($base_url, 0, 7) !='http://')$base_url = base_url($base_url);
	return $base_url._array_to_url($params);
}

function _array_to_url($params=array())
{
	$url = array();
	if ($params)
	foreach($params as $k=>$v)
	{
		if (strlen($v)==0)continue;
		$url[] = $k.'='.urlencode($v);
	}
	return $url ? '?'.join('&',$url):'';
}

function _get_html_url($pattern, $html_url, $page_content, $is_detail=0 ){
    preg_match_all($pattern, $page_content, $arrMat);

    $arrTmp = array_unique($arrMat[1]);
    arsort($arrTmp);
    foreach ($arrTmp as $k => $value)
    {
      $strSearch =  str_replace('&amp;', '&', $value);
      $urlarr = parse_url(str_replace('&amp;', '&', $strSearch) );
      parse_str($urlarr['query'],$arr);

      if($is_detail){
      	$page_url = str_replace('{id}', $arr['id'], $html_url);
      }else{
	      if( empty($arr['page']) )
	        $page_url = str_replace('{page}', '1', $html_url);
	      else
	        $page_url = str_replace('{page}', $arr['page'], $html_url);
	    }

      $page_content = str_replace($value, $page_url, $page_content);
    }

    return $page_content;
}

function _get_page($name='page')
{
	$CI =& get_instance();
	$page = (int)$CI->input->get($name);
	return max($page,1);
}

function _is_empty($val)
{
	if(empty($val))
		return '';
	else
		return $val;
}

function _aes_encode($data,$privateKey){
	$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $privateKey, $data, MCRYPT_MODE_CBC,_get_config('AESAPPCLIENT_KEY') );
	return rtrim((base64_encode($encrypted)));
}

function _aes_decode($data,$privateKey){
	$encryptedData = base64_decode($data);
	$decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $privateKey, $encryptedData, MCRYPT_MODE_CBC,_get_config('AESAPPCLIENT_KEY') );
	return rtrim($decrypted);
}

/**
 * 模拟post请求
 * @param unknown_type $url
 * @param unknown_type $data
 * @return mixed
 */
 function http_post_data($url,$data){
    // 参数数组
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, 1 );
    curl_setopt ( $ch, CURLOPT_HEADER, 0 );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
    $return = curl_exec ( $ch);
    curl_close ( $ch );
    return $return;
}



// function http_post_data($url, $data_string){

// 	$ch = curl_init();  
//     curl_setopt($ch, CURLOPT_POST, 1);  
//     curl_setopt($ch, CURLOPT_URL, $url);  
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
//         'Content-Type: application/json; charset=utf-8',  
//         'Content-Length: ' . strlen($data_string))  
//     );  
//     ob_start();  
//     curl_exec($ch);  
//     $return_content = ob_get_contents();  
//     ob_end_clean();  

//     $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
//     return array($return_code, $return_content); 

// }

/**
 * 返回以原数组某个值为下标的新数据
 *
 * @param array $array
 * @param string $key
 * @param int $type 1一维数组2二维数组
 * @return array
 */
function array_under_reset($array, $key, $type=1){
	if (is_array($array)){
		$tmp = array();
		foreach ($array as $v) {
			if ($type === 1){
				$tmp[$v[$key]] = $v;
			}elseif($type === 2){
				$tmp[$v[$key]][] = $v;
			}
		}
		return $tmp;
	}else{
		return $array;
	}
}


/**
 * 取得系统配置信息
 *
 * @param string $key 取得下标值
 * @return mixed
 */
function C($key){

	if(strpos($key, '.'))
	{
		$key = explode('.',$key);

		$CI =& get_instance();
		$arrConfig = $CI->config->item($key[0]);

	 	if (isset($key[2])){
            return $arrConfig[$key[1]][$key[2]];
        }elseif(isset($key[1]) ){
            return $arrConfig[$key[1]];
        }else
        	return '';
	}
	else
	{
		$setting = ($setting = rkcache('setting')) ? $setting : rkcache('setting',true);

		if(!empty($setting[$key]))
            return $setting[$key];
        else
        	return false;
	}
}

function M($model)
{
	$model = ucfirst($model).'_model';
	$CI =& get_instance();
	$CI->load->model($model);
	return $CI->$model;
}


// function T($table)
// {
// 	$model = 'XT_Model';
// 	$CI =& get_instance();
// 	$CI->load->model($model);
// 	return $CI->$model->set_table(strtolower($table));
// }

/*
 * 重写$_SERVER['REQUREST_URI']
 */
function request_uri()
{
    if (isset($_SERVER['REQUEST_URI']))
    {
        $uri = $_SERVER['REQUEST_URI'];
    }
    else
    {
        if (isset($_SERVER['argv']))
        {
            $uri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['argv'][0];
        }
        else
        {
            $uri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING'];
        }
    }
    return $uri;
}




/***------------------cache begin-------------------------------***/
/**
 * KV缓存 读
 *
 * @param string $key 缓存名称
 * @param boolean $callback 缓存读取失败时是否使用回调 true代表使用cache.model中预定义的缓存项 默认不使用回调
 * @param callable $callback 传递非boolean值时 通过is_callable进行判断 失败抛出异常 成功则将$key作为参数进行回调
 * @return mixed
 */
function rkcache($key, $callback = false)
{
	$CI     =& get_instance();

    if ($CI->config->item('cache_open')) {
        $cacher = $CI->cache->redis;
    } else {
        $cacher = $CI->cache->file;
        $key = str_replace(':', '_', $key);
    }
    if (!$cacher) {
        throw new Exception('Cannot fetch cache object!');
    }

    $value = $cacher->get($key);

    if ($value === false && $callback !== false) {
        if ($callback === true) {
        	
            $callback = array(M('cache'), 'call');
        }

        if (!is_callable($callback)) {
            throw new Exception('Invalid rkcache callback!');
        }

        $value = call_user_func($callback, $key);
        wkcache($key, $value);
    }

    return $value;
}

/**
 * KV缓存 写
 *
 * @param string $key 缓存名称
 * @param mixed $value 缓存数据 若设为否 则下次读取该缓存时会触发回调（如果有）
 * @param int $expire 缓存时间 单位秒 null代表不过期
 * @return boolean
 */
function wkcache($key, $value, $expire = null)
{
	$CI     =& get_instance();

    if ($CI->config->item('cache_open')) {
        $cacher = $CI->cache->redis;
    } else {
        $cacher = $CI->cache->file;
        $key = str_replace(':', '_', $key);
    }
    if (!$cacher) {
        throw new Exception('Cannot fetch cache object!');
    }

    return $cacher->save($key, $value, $expire);
}
/**
 * KV缓存 删
 *
 * @param string $key 缓存名称
 * @return boolean
 */
function dkcache($key)
{
	$CI     =& get_instance();

    if ($CI->config->item('cache_open')) {
        $cacher = $CI->cache->redis;
    } else {
        $cacher = $CI->cache->file;
        $key = str_replace(':', '_', $key);
    }
    if (!$cacher) {
        throw new Exception('Cannot fetch cache object!');
    }

    return $cacher->delete($key);
}

/***------------------cache end-------------------------------***/

function cutStr($content, $len){
	$result = $content;
	if(mb_strlen($content,'utf-8')>$len) 
		$result = mb_substr($content,0,$len,'utf-8').'..';
	
	return $result;
}


?>