<?php
class Mytwitter_login_model extends CI_Model{

	function loginsession(){
		if(isset($_POST["login"])){
			if(isset($_POST["loginID"]) && isset($_POST["loginPW"])){
			
				$sql = "SELECT * FROM UserIDPW WHERE ID = ?";
				$query = $this->db->query($sql,array($_POST["loginID"]));
				$row = $query->row();
				
				if($row != null && $row->PW == $_POST['loginPW']){
					$_SESSION["ID"] = $_POST["loginID"];
					return true;
				}
				else{
					echo "Login Error";
				}
			}
		}
		return false;
	}

	function __construct(){
		parent::__construct();
	}
}

?>