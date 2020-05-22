<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MTaddC extends CI_Controller
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->model('MTadd_model');
    }

    public function index()
    {
        $id=$this->input->get('id');
        $result = array();
        $this->load->view('MTadd_view', $result);
    }

    public function insert()
    {
        if (!empty($this->input->post('btn_add'))) {
            $add_email = $this->input->post('add_email', true)?: null;
            $email = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $add_email);

            $add_password = $this->input->post('add_password', true)?: null;
            $pre_password = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $add_password);
            $password = password_hash($pre_password, PASSWORD_DEFAULT);


            $add_shop_name = $this->input->post('add_shop_name', true)?: null;
            $shop_name = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $add_shop_name);

            $add_shop_address = $this->input->post('add_shop_address', true)?: null;
            $shop_address = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $add_shop_address);

            $add_rep = $this->input->post('add_rep', true)?: null;
            $rep = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $add_rep);

            $add_remarks = $this->input->post('add_remarks', true)?: null;
            $remarks = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $add_remarks);

            //$error_message = null;
            
            $date = date('Y年m月d日');

            $data = [
                'email' => $email,
                'password' => $password,
                'shop_name' => $shop_name,
                'shop_address' => $shop_address,
                'rep' => $rep,
                'remarks' => $remarks,
                'registration_date' => $date
            ];

            $this->MTadd_model->insert_record($data);
            $url = base_url();
            redirect($url.'index.php/MasterTableC?alert=2');
        }
    }
}
