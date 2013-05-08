<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Mytwitter extends CI_Controller {

	public function index()	{
		$this->load->view('mytwitter_topmenu_view');
	}
	
	public function loginform(){
		$this->load->model('Mytwitter_login_model','',TRUE);
		if($this->Mytwitter_login_model->loginsession() == true){
			$this->load->helper('url');
			$this->load->view('mytwitter_main_view');
		}
		else{
			$this->load->view('mytwitter_login_view');
		}
	}
	
	public function signup(){
		$this->load->model('Mytwitter_signup_model','',TRUE);
		if($this->Mytwitter_signup_model->check_user_id() == true){
			$this->Mytwitter_signup_model->register();
			$this->load->view('mytwitter_login_view');
		}
		else{
			$this->load->view('mytwitter_signup_view');
		}
	}
}

?>