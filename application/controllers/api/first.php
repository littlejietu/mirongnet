<?php
defined('BASEPATH') or exit('No direct script access allowed');

class First extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('First_model');
    }

    public function index()
    {
        
    }
}
