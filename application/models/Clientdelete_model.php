<?php
class Clientdelete_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_record($id)
    {
        $query = $this->db->where("id", $id)->get('guest')->row_array();
        return $query;
    }

    public function delete_record($id, $data)
    {
        return $this->db->where('id', $id)
            ->delete('guest');
    }
}
