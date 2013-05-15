<?php

class Mytwitter_signup_model extends CI_Model{

    public function check_user_id($id)
    {
        $sql   = "SELECT * FROM UserIDPW WHERE ID = ?";
        $query = $this->db->query($sql, array($id));
        $row   = $query->row();

        if($row == null){
            return true;
        }
        return false;
    }
	
    public function register($id,$pw)
    {
        $sql = "INSERT INTO UserIDPW(ID,PW) VALUES (?,?)";
        $this->db->query($sql, array($id, $pw));
    }
}

?>