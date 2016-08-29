<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nav_model extends XT_Model {

	protected $mTable = 'sys_nav';
	protected $mCache = 'nav_list';

	public function getList() {
        $data = rkcache('nav_list');
        if (!$data) {
            $data = $this->get_list('status=1','*','sort desc');
            wkcache('nav_list', $data);
        }

        return $data;
    }
	
}