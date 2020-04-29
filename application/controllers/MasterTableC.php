<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterTableC extends CI_Controller
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->model('MasterTable_model');
    }

    public function index()
    {
        $result = array();
        $result['data'] = $this->MasterTable_model->get_record();
        $code_id = $this->input->get("error");
        $result["array_data"] = $code_id;
        $this->load->view('MasterTable_view', $result);
    }

    public function MTedit_view()
    {
        $this->load->view('MTedit_view');
    }
}
