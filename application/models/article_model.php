<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends XT_Model {

	protected $mTable = 'cms_article';

	//上一条,下一条
    public function  getPrevNext($addtime,$class_id=0){
        $where = array('status'=>1);
        if(!empty($class_id))
            $where['class_id']=$class_id;
        $where_prev = $where_next =$where;
        $where_prev['addtime >']=$addtime;
        $where_next['addtime <']=$addtime;
        $info_prev = $this->get_by_where($where_prev,'id,title');
        $info_next = $this->get_by_where($where_next,'id,title');


        $arrReturn = array('prev'=>$info_prev,'next'=>$info_next);

        return $arrReturn;
    }
	
}