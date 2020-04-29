<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ClientaddC extends CI_Controller
{
    public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->model('Clientadd_model');
        
    }

    public function index()
    {
        $id=$this->input->get('id');
        $result = array();
        $this->load->view('Clientadd_view', $result);
    }

    public function insert()
    {
        if (!empty($this->input->post('btn_add'))) {
    
            $name = $this->input->post('add_name', true);
            $number = $this->input->post('add_number', true);
            $staff = $this->input->post('add_staff', true);
            $remarks = $this->input->post('add_remarks', true);
            $user_id = null;
            if(isset($_SESSION['Id'])) {
                $user_id = $_SESSION['Id'];
            }
            $date = date('Y年m月d日');

            $data = [
                'name' => $name,
                'number' => $number,
                'staff' => $staff,
                'remarks' => $remarks,
                'user_id' => $user_id,
                'registration_date' => $date
            ];

            $this->Clientadd_model->insert_record($data);
            $url = base_url();
            redirect($url.'index.php/ClientTableC?alert=2');
        }
    }
}
