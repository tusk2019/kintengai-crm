<?php
class ClientTable_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_record_list()
    {   
        if (isset($_SESSION['Id'])) {
        $query = $this->db->get_where('guest', array('user_id' => $_SESSION['Id']));
        $query = $query->result_array();
        return $query;
        }
    }
    
    public function get_shop_name() {
        
        if (isset($_SESSION['Id'])) {
        $query = $this->db->select('shop_name')
        ->get_where('user', array('id' => $_SESSION['Id']));
        $query = $query->result_array();
        return $query;
        }
    }
	
	public function search_client_name($search_data)
    {
        $this->db->like('name', $search_data['name']);
        $this->db->where('user_id', $_SESSION['Id']);
        $query = $this->db->get('guest');
        $query = $query->result_array();
        return $query;
    }
}
