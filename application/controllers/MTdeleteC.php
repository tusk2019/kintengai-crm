<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MTdeleteC extends CI_Controller
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->model('MTdelete_model');
    }

    public function index()
    {
        $id=$this->input->get('id');
        $result = array();
        $result['data'] = $this->MTdelete_model->get_record($id);
        $this->load->view('MTdelete_view', $result);
    }

    public function delete()
    {
        if (!empty($this->input->post('btn_delete'))) {
            //hidden_idの値をMTedit_modelのwhereで使うので、$idにセットする。
            $id = $this->input->post('hidden_id', true);
            $email = $this->input->post('save_email', true)?: null;
            $password = $this->input->post('save_password', true)?: null;
            $shop_name = $this->input->post('save_shop_name', true)?: null;
            $shop_address = $this->input->post('save_shop_address', true)?: null;
            $rep = $this->input->post('save_rep', true)?: null;
            $remarks = $this->input->post('save_remarks', true)?: null;
            $error_message = null;

            $data = [
                'email' => $email,
                'password' => $password,
                'shop_name' => $shop_name,
                'shop_address' => $shop_address,
                'rep' => $rep,
                'remarks' => $remarks
            ];

            $this->MTdelete_model->delete_record($id, $data);
            $url = base_url();
            redirect($url.'index.php/MasterTableC?alert=1');
        }
    }
}
