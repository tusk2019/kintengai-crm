<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_email($email)
    {
        $query = $this->db->get_where('user', array('email' => $email));
        return $query->row_array();
    }
}
