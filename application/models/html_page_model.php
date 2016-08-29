<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Html_page_model extends XT_Model {

	protected $mTable = 'html_page';
	protected $mCache = 'html_page_arr';

	// protected $mCache_list = 'html_page_list';
	// protected $mCache_detail = 'html_page_detail';

	public function getPage(){
		$data = rkcache($this->mCache);
		if(!$data){
			$data = array();
			$list = $this->get_list();
			foreach ($list as $key => $v) {
				$data[] = $v['path'];
			}

			wkcache($this->mCache, $data);
		}

		return $data;
	}

}