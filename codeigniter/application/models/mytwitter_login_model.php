<?php
class Mytwitter_login_model extends CI_Model{

    public function loginsession($id, $pw)
    {			
        $sql   = "SELECT * FROM UserIDPW WHERE ID = ?";
        $query = $this->db->query($sql, array($id));
        $row   = $query->row();

        if($row != null && $row->PW == $pw){      
            return true;
        }
        else{
            return false;
        }
    }

    function __construct()
    {
        parent::__construct();
    }
}

?>