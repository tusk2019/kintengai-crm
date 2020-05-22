<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ClienteditC extends CI_Controller
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->model('Clientedit_model');
    }

    public function index()
    {
        $id=$this->input->get('id');
        $result = array();
        $result['data'] = $this->Clientedit_model->get_record($id);
        $this->load->view('Clientedit_view', $result);
    }

    public function update()
    {
        if (!empty($this->input->post('btn_save'))) {
            $id = $this->input->post('hidden_id', true);

            $save_name = $this->input->post('save_name', true);
            $name = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $save_name);

            $save_number = $this->input->post('save_number', true);
            $number = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $save_number);

            $save_staff = $this->input->post('save_staff', true);
            $staff = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $save_staff);

            $save_remarks = $this->input->post('save_remarks', true);
            $remarks = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $save_remarks);

            $date = date('Y年m月d日');

            $data = [
                'name' => $name,
                'number' => $number,
                'staff' => $staff,
                'remarks' => $remarks,
                'update_date' => $date
            ];

            $this->Clientedit_model->update_record($id, $data);
            $url = base_url();
            redirect($url.'index.php/ClientTableC?alert=3');
        }
    }
}
