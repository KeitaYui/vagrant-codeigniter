<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mytwitter extends CI_Controller {

	public function index()
	{
		$this->load->view('mytwitter_topmenu_view');
	}

    public function login()
    {
		$this->load->view('mytwitter_login_view');
	}
	
	public function loginsession(){
        $this->load->model( 'Mytwitter_login_model', '', true);
        $id = $this->input->post('loginID');
        $pw = $this->input->post('loginPW');
        if($this->Mytwitter_login_model->loginsession( $id, $pw) == true){
            $this->session->set_userdata('ID',$id);
            $this->mainpage();
		}
		else{
            echo "Login Error";
        }
    }
	
	public function signup()
	{
        $this->load->view('mytwitter_signup_view');
	}
	
    public function signupsession()
    {   
    	$this->load->library('form_validation');
        $this->form_validation->set_rules('signupID','ID????????','required');
        $this->form_validation->set_rules('signupPW','PW????????','required');
        $this->form_validation->set_rules('signupID','ID??????','alpha_dash');
        $this->form_validation->set_rules('signupPW','PW??????','alpha_dash');
        $this->form_validation->set_rules('signupID','ID?16????','max_length[16]');
        $this->form_validation->set_rules('signupPW','PW?16????','max_length[16]');

        if($this->form_validation->run() == false){
        	echo "signup ERROR";
        }
        else{
            $this->load->model( 'Mytwitter_signup_model', '', true);
            $id = $this->input->post('signupID');
            $pw = $this->input->post('signupPW');
	        if($this->Mytwitter_signup_model->check_user_id($id) == true){
		        $this->Mytwitter_signup_model->register( $id, $pw);
		        $this->index();
            }
            else{
                echo "sign up error";
            }
        }
    }
	
    public function mainpage()
    {   
        //$this->tweetload($this->session->userdata('ID'));
        $this->load->view('mytwitter_main_view');
    }
    
    public function tweetsave()
    {
        $this->load->model( 'Mytwitter_tweetsave_model', '', true);
        $id = $this->session->userdata('ID');
        $str = $this->input->post('text');
        $this->Mytwitter_tweetsave_model->tweetsave( $id, $str);
    }
    
    public function tweetload($userID)
    {
        $this->load->model( 'Mytwitter_tweetsave_model', '', true);
        $query = $this->Mytwitter_tweetsave_model->tweetload($userID);
        //var_dump(mysql_fetch_object($query->result_id));exit;
        $result = array();
        $result[0] = array('num' => $query->num_rows);
        foreach ($query->result() as $row){
            $result[] = array('tweet' => $row->tweet);
        }
        $encode = json_encode($result);
        echo $encode;
    }
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('form','url'));
    }
}

?>