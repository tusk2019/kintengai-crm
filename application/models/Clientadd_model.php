<?php
class Clientadd_model extends CI_Model
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

    public function insert_record($data)
    {
        //guestに入れるデータのuser_idをsession('id')の値と同じものにする
        if (isset($_SESSION['Id'])) {
            return $this->db->insert('guest', $data);
            return $this->db->update('guest', array('user_id' => $_SESSION['Id']));
        }
    }
}
