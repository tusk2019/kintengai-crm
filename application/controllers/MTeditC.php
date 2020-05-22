<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MTeditC extends CI_Controller
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->model('MTedit_model');
    }

    public function index()
    {
        $id=$this->input->get('id');
        $result = array();
        $result['data'] = $this->MTedit_model->get_record($id);
        $this->load->view('MTedit_view', $result);
    }

    public function update()
    {
        if (!empty($this->input->post('btn_save'))) {
            //hidden_idの値をMTedit_modelのwhereで使うので、$idにセットする。
            $id = $this->input->post('hidden_id', true);

            $save_email = $this->input->post('save_email', true)?: null;
            $email = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $save_email);

            $save_password = $this->input->post('save_password', true)?: null;
            $pre_password = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $save_password);
            $password = password_hash($pre_password, PASSWORD_DEFAULT);

            $save_shop_name = $this->input->post('save_shop_name', true)?: null;
            $shop_name = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $save_shop_name);

            $save_shop_address = $this->input->post('save_shop_address', true)?: null;
            $shop_address = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $save_shop_address);

            $save_rep = $this->input->post('save_rep', true)?: null;
            $rep = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $save_rep);

            $save_remarks = $this->input->post('save_remarks', true)?: null;
            $remarks = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $save_remarks);

            //$error_message = null;
            
            $date = date('Y年m月d日');

            $data = [
                'email' => $email,
                'password' => $password,
                'shop_name' => $shop_name,
                'shop_address' => $shop_address,
                'rep' => $rep,
                'remarks' => $remarks,
                'update_date' => $date
            ];

            $this->MTedit_model->update_record($id, $data);
            $url = base_url();
            redirect($url.'index.php/MasterTableC?alert=3');
        }
    }
}
