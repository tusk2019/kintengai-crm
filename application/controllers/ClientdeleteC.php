<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ClientdeleteC extends CI_Controller
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->model('Clientdelete_model');
    }

    public function index()
    {
        $id=$this->input->get('id');
        $result = array();
        $result['data'] = $this->Clientdelete_model->get_record($id);
        $this->load->view('Clientdelete_view', $result);
    }

    public function delete()
    {
        if (!empty($this->input->post('btn_delete'))) {
            $id = $this->input->post('hidden_id', true);
            $name = $this->input->post('add_name', true);
            $number = $this->input->post('add_number', true);
            $staff = $this->input->post('add_staff', true);
            $remarks = $this->input->post('add_remarks', true);

            $data = [
                'name' => $name,
                'number' => $number,
                'staff' => $staff,
                'remarks' => $remarks
            ];

            

            $this->Clientdelete_model->delete_record($id, $data);
            $url = base_url();
            redirect($url.'index.php/ClientTableC?alert=1');
        }
    }

    public function deleteAlert()
    {
        //$alert_array = array();
        //$alert_array['alert'] = $alert;
        //$this->load->view('MasterTable_view');

        //$alert=1を渡す
        $alert=1;
        $data = array(
            'alert_data' => $alert
            //'viewで使うときの名前' => $bbb,
        );

        $this->load->view('ClientTable_view', $data);
    }
}
