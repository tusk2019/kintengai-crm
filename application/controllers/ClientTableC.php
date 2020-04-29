<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClientTableC extends CI_Controller
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->model('ClientTable_model');
    }

    public function index()
    {
        $result = array();
        $result['data'] = $this->ClientTable_model->get_record_list();
        $result['shop_name'] =$this->ClientTable_model->get_shop_name();
        $this->load->view('ClientTable_view', $result);
    }
}
