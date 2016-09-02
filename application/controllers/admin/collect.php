<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collect extends MY_Admin_Controller {
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Collect_model');
	}

	public function index()
	{
		
		$cKey = $this->input->post_get('txtKey');
		
		$page     = _get_page();//接收前台的页码
		
		$pagesize = 8;
		$arrParam = array();
		$arrWhere = array();
		
		
		if($cKey)
		{
		    $arrParam['txtKey'] = $cKey;
		    $arrWhere['name like '] = "'%$cKey%'";
		}

		$strOrder = 'add_time desc';
		$arrWhere['status <>'] = -1;
		
		$list = $this->Collect_model->fetch_page($page, $pagesize, $arrWhere,'*',$strOrder);
		
		//分页
		$pagecfg = array();
		$pagecfg['base_url']     = _create_url(ADMIN_SITE_URL.'/Collect', $arrParam);
		$pagecfg['total_rows']   = $list['count'];
		$pagecfg['cur_page'] = $page;
		$pagecfg['per_page'] = $pagesize;
		//$this->load->library('pagination');
		$this->pagination->initialize($pagecfg);
		$list['pages'] = $this->pagination->create_links();

		$result = array(
		    'list' => $list,
		
		    'arrParam' => $arrParam,
			);
		$this->load->view('admin/collect',$result);
	}

	public function add()
	{
		$id	= $this->input->get('id');
	    $info = array();

	    $this->load->model('Article_Class_model');
		$list = $this->Article_Class_model->getClassList(); 

	    if(!empty($id))
	    {
	        $info = $this->Collect_model->get_by_id($id);

	    }
        $result = array(
            'info' => $info,
            'list'=>$list
        );
		$this->load->view('admin/collect_add',$result);
	}

	public function save()
	{		
		
		//输出所有post提交的表单内元素
	    if ($this->input->is_post())
	    {
	        //验证规则
	        $config = array(
	            array(
	                'field'   => 'name',//后台验证，表中的字段名
	                'label'   => '采集项目名',
	                'rules'   => 'trim|required'//验证规划
	            ),
	           
	        );

	        $this->form_validation->set_rules($config);
	    
	        if ($this->form_validation->run() === TRUE)
	        {
	            $id = (int)$this->input->post('id');

	            $class_id = $class_id_1 = $class_id_2 = 0;
	            $class_ids = $this->input->post('class_ids');
	            if($class_ids){
	            	$arrClass = explode(',', $class_ids);
	            	$class_id = $arrClass[0];
	            	if(!empty($arrClass[1]))
	            		$class_id_1 = $arrClass[1];
	            	if(!empty($arrClass[2]))
	            		$class_id_2 = $arrClass[2];
	            }

	            $status = $this->input->post('status');
	            $status = empty($status)?1:$status;
	            
	            //将需要保存的数据赋值给数组$data
	            $data = array(
	                'class_id'=>$class_id,
	                'class_id_1'=>$class_id_1,
	                'class_id_2'=>$class_id_2,
	                'name'=>$this->input->post('name'),
	                'charset'=>$this->input->post('charset'),
	                'attribute'=>$this->input->post('attribute'),
	                'batch_match_url'=>$this->input->post('batch_match_url'),
	                'batch_start_num'=>$this->input->post('batch_start_num'),
	                'batch_end_num'=>$this->input->post('batch_end_num'),
	                'batch_per_num'=>$this->input->post('batch_per_num'),
	                'manual_url'=>$this->input->post('manual_url'),
	                'url_rule'=>$this->input->post('url_rule'),
	                'url_must_contain'=>$this->input->post('url_must_contain'),
	                'url_not_contain'=>$this->input->post('url_not_contain'),
	                'detail_test_url'=>$this->input->post('detail_test_url'),
	                'status'=>$status,
	                'add_time'=>time(),
	                'collect_time'=>time(),
	                'title_rule'=>str_replace(array('ti_tle','li_nk'), array('title','link'),$this->input->post('title_rule')),
	                'content_rule'=>$this->input->post('content_rule'),
	                'time_rule'=>$this->input->post('time_rule'),
	                'from_ruie'=>$this->input->post('from_ruie'),
	                'title_filter'=>$this->input->post('title_filter'),
	                'content_filter'=>$this->input->post('content_filter'),
	                'time_filter'=>$this->input->post('time_filter'),
	                'from_filter'=>$this->input->post('from_filter'),
	                'is_download_img'=>$this->input->post('is_download_img'),
	                'is_watermark'=>$this->input->post('is_watermark'),
	                'is_import_order'=>$this->input->post('is_import_order'),
	            );
	    
	            $id	= $this->input->post('id');
	            if($id)
	                $data['id'] = $id;

	            $id	= $this->input->post('id');
	            if($id)
	                $data['id'] = $id;
					
					
	            //保存至数据库
	            $this->Collect_model->insert($data);
				
			
	            //echo '成功,<a href="/admin/aa">返回列表页</a>';
				
	            redirect(ADMIN_SITE_URL.'/collect');
	            exit;
	        }
	        else
	        {
	            redirect(ADMIN_SITE_URL.'/collect/add');
	        }
	        	
	    }
	}
	
	
	function del(){
	    if ($this->input->is_post())
	    {	
	        $id = $this->input->post('del_id');

			foreach($id as $k=>$v){
				
				$page = _get_page();
				$data['status'] = -1;
				// 调用修改状态方法
	    		$this->Collect_model->update_by_id($v,$data);
			}
			
	    }
	    else
	    {
	        $id	= $this->input->get('id');
			$page = _get_page();
			$data['status'] = -1;
		// 调用修改状态方法
	    	$this->Collect_model->update_by_id($id,$data);
			;
	    }
	    
	    redirect( ADMIN_SITE_URL.'/collect' );
		
	
	}

	public function geturl_test(){
		$start_time = time();

		$this->load->model('Collect_get_model');
		$this->load->library('phpQuery');

		$cur_list_url = '';
		$attribute = $this->input->post('attribute');
		$manual_url = $this->input->post('manual_url');
		$batch_match_url = $this->input->post('batch_match_url');
		$batch_start_num = $this->input->post('batch_start_num');
		// $batch_end_num = $this->input->post('batch_end_num');
		// $batch_per_num = $this->input->post('batch_per_num');
		$url_rule = $this->input->post('url_rule');
    	$url_must_contain = $this->input->post('url_must_contain');
    	$url_not_contain = $this->input->post('url_not_contain');

    	if($attribute==1){
    		$cur_list_url = str_replace('(*)', $batch_start_num, $batch_match_url);
    	}
		else{
			$arrTmp = explode('\r\n', $manual_url);
			if(!empty($arrTmp))
				$cur_list_url = $arrTmp[0];
		}

		$arrGetUrl = array();
		if(!empty($cur_list_url)){
			$doc = phpQuery::newDocumentFile($cur_list_url);  

			$arrUrl = $doc->find($url_rule);
	        foreach ($arrUrl as $v) {
	        	$detail_url = pq($v)->attr('href');
	        	$title = pq($v)->text();
	        	$arrGetUrl[] = array('url'=>$detail_url, 'title'=>trim($title) );
	        }

			$doc->unloadDocument();
		}

		$str = '';
		foreach ($arrGetUrl as $k => $a) {

			if(!empty($url_must_contain) && strpos($a['url'],$url_must_contain)===false)
				continue;

			if(!empty($url_not_contain) && strpos($a['url'],$url_not_contain)>-1)
				continue;

			$str .= $a['title'].'--'.$a['url'].'<br />';
		}
		echo $str;


	}

	public function geturl(){
		// $aa = 'http://www.sunnsoft.com/ios-630.html';
		// $bb = 'http://www.sunnsoft.com/ios';
		// echo strpos($aa, $bb)>-1;

		// die;
		$start_time = time();

		$id = $this->input->get('id');
		$page = $this->input->get('page');
		$page = !empty($page)?$page:1;
		$this->load->model('Collect_get_model');
		$this->load->library('phpQuery');

		$cur_list_url = '';
		$info = array();
		
		$info = $this->Collect_model->get_by_id($id);
		$attribute = $info['attribute'];
		$manual_url = $info['manual_url'];
		$batch_match_url = $info['batch_match_url'];
		$batch_start_num = $info['batch_start_num'];
		$batch_end_num = $info['batch_end_num'];
		$batch_per_num = $info['batch_per_num'];
		$url_rule = $info['url_rule'];
    	$url_must_contain = $info['url_must_contain'];
    	$url_not_contain = $info['url_not_contain'];
    	$total = $batch_end_num;
    	$repeat_num = 0;

    	if($attribute==1){
    		if( $page>=$batch_start_num && $page<=$total )
    			$cur_list_url = str_replace('(*)', $page, $batch_match_url);
    		//for($i=$batch_start_num; $i<=$batch_end_num; $i=$i+$batch_per_num){
    			// $cur_list_url = str_replace('(*)', $batch_start_num, $batch_match_url);
    		//}
    	}else{
    		$arrUrlList = array( explode('\r\n', $manual_url) );
    		if($page < count($arrUrlList))
    			$cur_list_url = $arrUrlList[$page-1];
    		$total = count($arrUrlList);
    	}
		
		$arrGetUrl = array();
		if(!empty($cur_list_url)){
			$doc = phpQuery::newDocumentFile($cur_list_url);  

			$arrUrl = $doc->find($url_rule);
	        foreach ($arrUrl as $v) {
	        	$detail_url = pq($v)->attr('href');
	        	$title = pq($v)->text();
	        	$arrGetUrl[] = array('url'=>$detail_url, 'title'=>trim($title) );
	        }

			$doc->unloadDocument();

			// sleep(2);
		}
		
		if(!empty($arrGetUrl)){
			$arrGetUrl_tmp = array();
			foreach ($arrGetUrl as $k => $a) {
				$arrGetUrl_tmp[] = $a['url'];
			}

			$arrGetUrl_exist = array();
			$list_exist = $this->Collect_get_model->get_list(array('url'=>$arrGetUrl_tmp),'url');
			foreach ($list_exist as $k => $a) {
				$arrGetUrl_exist[] = $a['url'];
			}

			foreach ($arrGetUrl as $k => $a) {
				if(empty($arrGetUrl_exist) || !in_array($a['url'], $arrGetUrl_exist) ){

					if(!empty($url_must_contain) && strpos($a['url'],$url_must_contain)===false)
						continue;

					if(!empty($url_not_contain) && strpos($a['url'],$url_not_contain)>-1)
						continue;

					$data = array('collect_id'=>$info['id'],
						'class_id'=>$info['class_id'],
						'class_id_1'=>$info['class_id_1'],
						'class_id_2'=>$info['class_id_2'],
						'url'=>$a['url'],
						'title'=>$a['title'],
						'add_time'=>time(),
					);

					$this->Collect_get_model->insert($data);
				}elseif(!empty($arrGetUrl_exist)){
					$repeat_num++;
				}
			}

			//更新最后采集时间
			$this->Collect_model->update_by_id($id, array('collect_time'=>time()));
			
			$num = $page;
			if($num > $total)
				$num = $total;
			$end_time = time();
			$second = $end_time - $start_time;

			$next_make_url = ADMIN_SITE_URL.'/collect/geturl?id='.$info['id'].'&page='.($page+1);
			$go_url = ADMIN_SITE_URL.'/collect';
			
			$result = array('page'=>$page,
					'next_make_url' => $next_make_url,
					'go_url' => $go_url,
					'second' => $second,
					'total' => $total,
					'num' => $num,
					'txtMsg' => '重复:'.$repeat_num.' 条数:'.count($arrGetUrl),
					);
			$this->load->view('admin/html_making',$result);
		}else{
			showMessage('无数据，请确认配置！',ADMIN_SITE_URL.'/collect');
		}
	}

	public function gettxt_test(){
		$detail_test_url = $this->input->post('detail_test_url');

        $title_rule = str_replace(array('ti_tle','li_nk'), array('title','link'), $this->input->post('title_rule'));
        $title_filter = str_replace(array('ti_tle','li_nk'), array('title','link'), $this->input->post('title_filter'));
        $content_rule = $this->input->post('content_rule');
        $content_filter = ($this->input->post('content_filter'));
        $time_rule = $this->input->post('time_rule');
        $time_filter = $this->input->post('time_filter');
        $from_rule = $this->input->post('from_rule');
        $from_filter = $this->input->post('from_filter');

        $this->load->library('phpQuery');

        if(!empty($detail_test_url)){

        	$title = $content = $time = $from = $from_link = '';
	        
	        $doc = phpQuery::newDocumentFile($detail_test_url);
	        if(!empty($title_rule))
	        	$title = $doc->find($title_rule)->text();
	        if(!empty($title_filter)){
	        	$tmp_filter_html = pq($title_filter)->htmlOuter();
        		$title = str_replace($tmp_filter_html, '', $title);
	        }

	        if(!empty($content_rule))
	        	$content = $doc->find($content_rule)->html();
	        if(!empty($content_filter)){
	        	$tmp_filter_html = pq($content_filter)->htmlOuter();
        		$content = str_replace($tmp_filter_html, '', $content);
	        }

	        if(!empty($time_rule))
	        	$time = $doc->find($time_rule)->text();
	        if(!empty($time_filter)){
	        	$tmp_filter_html = pq($time_filter)->htmlOuter();
        		$time = str_replace($tmp_filter_html, '', $time);
	        }

	        if(!empty($from_rule)){
	        	$from = $doc->find($from_rule)->text();
	        	$from_link = $doc->find($from_rule)->attr('href');
	        }
	        if(!empty($from_filter)){
	        	$tmp_filter_html = pq($from_filter)->htmlOuter();
        		$from = str_replace($tmp_filter_html, '', $from);
	        }

	        $msg = "标题:$title<br />时间:$time<br />";
	        if(!empty($from_rule))
	        	$msg .= "来源:$from<br />";

	        $msg .="内容:$content";
	        print_r($msg);

		}else
			showMessage('请填写测试地址！',ADMIN_SITE_URL.'/collect');
		
	}

	public function gettxt(){
		$start_time = time();
		$id = $this->input->get('id');
		$total = $this->input->get('total');
		$limit = 5;

		$this->load->model('Collect_get_model');

		$info = $this->Collect_model->get_by_id($id);
		if(empty($total))
			$total = $this->Collect_get_model->get_count(array('collect_id'=>$id,'is_get'=>0));

		$unget_num = $this->Collect_get_model->get_count(array('collect_id'=>$id,'is_get'=>0));
		$num = $total - $unget_num;
		$list = $this->Collect_get_model->get_list(array('collect_id'=>$id,'is_get'=>0), 'id,url,collect_id,is_get','add_time', $limit);

        $this->load->library('phpQuery');

        foreach ($list as $k => $a) {
        	$detail_url = $a['url'];
        	$title = $content = $time = $from = $from_url = '';
	        
	        $doc = phpQuery::newDocumentFile($detail_url);
	        if(!empty($info['title_rule']))
	        	$title = $doc->find($info['title_rule'])->text();
	        if(!empty($info['title_filter'])){
	        	$tmp_filter_html = pq($info['title_filter'])->htmlOuter();
        		$title = str_replace($tmp_filter_html, '', $title);
	        }

	        if(!empty($info['content_rule']))
	        	$content = $doc->find($info['content_rule'])->html();
	        if(!empty($info['content_filter'])){
	        	$tmp_filter_html = pq($info['content_filter'])->htmlOuter();
        		$content = str_replace($tmp_filter_html, '', $content);
	        }

	        if(!empty($info['time_rule']))
	        	$time = $doc->find($info['time_rule'])->text();
	        if(!empty($info['time_filter'])){
	        	$tmp_filter_html = pq($info['time_filter'])->htmlOuter();
        		$time = str_replace($tmp_filter_html, '', $time);
	        }

	        if(!empty($info['from_rule'])){
	        	$from = $doc->find($info['from_rule'])->text();
	        	$from_url = $doc->find($info['from_rule'])->attr('href');
	        }
	        if(!empty($info['from_filter'])){
	        	$tmp_filter_html = pq($info['from_filter'])->htmlOuter();
        		$from = str_replace($tmp_filter_html, '', $from);
	        }

	        $data = array('title_more'=>trim($title), 'content'=>trim($content),
	        	'publish_time'=>trim($time),
	        	'from_url'=>trim($from_url), 'from_name'=>trim($from),
	        	'is_get'=>1, 'detail_time'=>time(),
	        	);
	        $this->Collect_get_model->update_by_id($a['id'],$data);

        }

        $next_make_url = ADMIN_SITE_URL.'/collect/gettxt?id='.$info['id'].'&total='.$total;
		$go_url = ADMIN_SITE_URL.'/collect';

		if(count($list)==0)
			$num = $total;

		$end_time = time();
		$second = $end_time - $start_time;

        $result = array(
					'next_make_url' => $next_make_url,
					'go_url' => $go_url,
					'second' => $second,
					'total' => $total,
					'num' => $num,
					);
		$this->load->view('admin/html_making',$result);

	}

	public function getlist(){
		$collect_id = $this->input->get('collect_id');
		$cKey = $this->input->post_get('txtKey');
		$is_import = $this->input->post_get('is_import');

		$this->load->model('Collect_get_model');
		
		$page     = _get_page();//接收前台的页码
		$pagesize = 10;
		$arrParam = array();
		$arrWhere = array();
		
		if($collect_id){
			$arrParam['collect_id'] = $collect_id;
			$arrWhere['collect_id'] = $collect_id;
		}
		if($cKey)
		{
		    $arrParam['txtKey'] = $cKey;
		    $arrWhere['title like '] = "'%$cKey%'";
		}
		if(isset($is_import)){
			$arrParam['is_import'] = $is_import;
			$arrWhere['is_import'] = $is_import;
		}else{
			$arrParam['is_import'] = 0;
			$arrWhere['is_import'] = 0;
		}
		$arrWhere['is_get'] = 1;
		$strOrder = 'add_time desc';
		
		$list = $this->Collect_get_model->fetch_page($page, $pagesize, $arrWhere,'*',$strOrder);
		
		//分页
		$pagecfg = array();
		$pagecfg['base_url']     = _create_url(ADMIN_SITE_URL.'/collect/getlist', $arrParam);
		$pagecfg['total_rows']   = $list['count'];
		$pagecfg['cur_page'] = $page;
		$pagecfg['per_page'] = $pagesize;
		//$this->load->library('pagination');
		$this->pagination->initialize($pagecfg);
		$list['pages'] = $this->pagination->create_links();

		$result = array(
		    'list' => $list,
		
		    'arrParam' => $arrParam,
			);
		$this->load->view('admin/collect_get',$result);
	}

	public function detail_import(){
		$this->load->model('Collect_get_model');
		$this->load->model('Article_model');

		$this->load->library('phpQuery');
		if ($this->input->is_post())
	    {	
	        $ids = $this->input->post('ids');

	        $list = $this->Collect_get_model->get_list(array('id'=>$ids));
			foreach($list as $k=>$a){
				$info = $this->Article_model->get_by_where(array('title'=>$a['title']));
				if(empty($info)){

					//图片处理
					
					$doc = phpQuery::newDocument($a['content']);
			        $arrImg = $doc->find('img');
			        foreach ($arrImg as $rule) {
			            $img_url = pq($rule)->attr('src');

			            if(substr($img_url, 0, 7)!='http://'){
			            	$arrPart = parse_url($a['url']);
				            if( substr($img_url, 0, 1)=='/')
				            	$img_url = $arrPart['scheme'].'://'.$arrPart['host'].$img_url;
				            else
				            	$img_url = $arrPart['scheme'].'://'.$arrPart['host'].$arrPart['path'].$img_url;
			            }
			            $img_content = file_get_contents($img_url);
			            $dir = BASE_UPLOAD_PATH.'/img/'.date('Ym');
			            if(!is_dir($dir))
			                mkpath($dir);

			            $filename = rand(1000,9999).'_'.basename($img_url);
			            $img_url_new = UPLOAD_SITE_URL.'/img/'.date('Ym').'/'.$filename;
			            $filename = $dir.'/'.$filename;
			            if (!file_exists($filename)) {  
			                file_put_contents($filename, $img_content);  
			            }
			            pq($rule)->attr('src',$img_url_new);
			        }
			        $a['content'] = $doc->html();

					$data = array(
						'class_id'=>$a['class_id'],
						'class_id_1'=>$a['class_id_1'],
						'class_id_2'=>$a['class_id_1'],
						'title'=>$a['title'],
						'content'=>$a['content'],
						'status'=>1,
						'addtime'=>time()
					);

	    			$this->Article_model->insert_string($data);

				}

				$this->Collect_get_model->update_by_id($a['id'],array('is_import'=>1));
			}


			
	    }
	    
	    redirect( ADMIN_SITE_URL.'/collect/getlist' );
	}

	public function detail_del(){
		$this->load->model('Collect_get_model');
	    if ($this->input->is_post())
	    {
	    	$arrIds = $this->input->post('ids');
			$this->Collect_get_model->delete_by_id($arrIds);
	    }
	    else
	    {
	        $id	= $this->input->get('id');
	    	$this->Collect_get_model->delete_by_id($id);
	    }
	    
	    redirect( ADMIN_SITE_URL.'/collect/getlist' );
		
	
	}

}