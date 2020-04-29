<?php
class MasterTable_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_record()
    {
        $query = $this->db->get_where('user', array('id >=' => "2"));
        $query = $query->result_array();
        return $query;
    }
}
