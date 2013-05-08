<?php

class Mytwitter_signup_model extends CI_Model{
	function check_user_id(){
		if(	isset($_POST["signup"]) && 
			isset($_POST["signupID"]) && isset($_POST["signupPW"])){
			
			$sql = "SELECT * FROM UserIDPW WHERE ID = ?";
			$query = $this->db->query($sql,array($_POST["signupID"]));
			$row = $query->row();
			
			if($row == null){
				return true;
			}
			else{
				echo "this ID is already registed";
			}
		}
		return false;
	}
	
	function register(){
		if(	isset($_POST["signup"]) && 
			isset($_POST["signupID"]) && isset($_POST["signupPW"])){
			
			$sql = "INSERT INTO UserIDPW(ID,PW) VALUES (?,?)";
			$this->db->query($sql,array($_POST["signupID"],$_POST["signupPW"]));
			
			$_SESSION["ID"] = $_POST["signupID"];
			$_SESSION["PW"] = $_POST["signupPW"];
		}
	}
	
}

?>