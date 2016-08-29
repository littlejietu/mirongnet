<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_Class_model extends XT_Model {

	protected $mTable = 'cms_article_class';
	protected $mCache = 'article_class';
	
	public function get_class_list($where,$fields='*')
	{
	    $class_list = $this->get_list($where);
	    $result = array();
	    foreach ($class_list as $key => $value)
	    {
	        $result[$value['id']] = $value;
	    }
	    return $result;
	}
	
	public function get_child_list($where,$fields='*')
	{
	    $class_list = $this->get_list($where);
	    $result = array();
	    foreach ($class_list as $key => $value)
	    {
	        if ($value['parent_id'] == 0)
	        {
	            foreach ($class_list as $k=>$v)
	            {
	                if ($value['id'] == $v['parent_id'])
	                {
	                    $result[$value['id']][] = $v['id'];
	                }
	            }
	        }
	    }
	    return $result;
	}

	//得到前台使用的分类
	public function getClassList(){

		$data = rkcache($this->mCache);
        if (!$data) {
            $data = array();
            foreach ((array) $this->get_list('status=1') as $v) {
                $id = $v['id'];
                $pid = $v['parent_id'];
                $data['data'][$id] = $v;
                $data['parent'][$id] = $pid;
                $data['children'][$pid][] = $id;
            }
            /*
            foreach ((array) $data['children'][0] as $id) {
                foreach ((array) $data['children'][$id] as $cid) {
                    foreach ((array) $data['children'][$cid] as $ccid) {
                        $data['children2'][$id][] = $ccid;
                    }
                }
            }
            */
            wkcache($this->mCache, $data);
        }
        return $data;
	}

	//取得子分类id
	public function getChildClassIds($parent_id){
		
		$list = $this->getClassList();

		if(empty($list['children'][$parent_id]))
			return array($parent_id);

		$arr = $list['children'][$parent_id];
		$arr[] = $parent_id;

		return $arr;
	}
}