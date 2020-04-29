<?php
class MTadd_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_record($id)
    {
        $query = $this->db->where("id", $id)->get('user')->row_array();
        return $query;
    }

    public function insert_record($data)
    {
        return $this->db->insert('user', $data);
    }
}