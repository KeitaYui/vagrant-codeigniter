<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mytwitter_Signup_Controller extends CI_Controller {
    
    public function index()
    {
        $this->load->view('mytwitter_signup_view');
    }

    public function signupsession()
    {   
    	$this->load->library('form_validation');
        $this->form_validation->set_rules('signupID','ID','required|max_length[16]|alpha_dash');
        $this->form_validation->set_rules('signupPW','PW','required|max_length[16]|alpha_dash');

        if($this->form_validation->run() == false){
        	echo "sign up ERROR";
        }
        else{
            $this->load->model( 'Mytwitter_signup_model', '', true);
            $id = $this->input->post('signupID');
            $pw = $this->input->post('signupPW');
            if($this->Mytwitter_signup_model->check_user_id($id) == true){
                $this->Mytwitter_signup_model->register( $id, $pw);
                redirect(base_url('index.php/mytwitter/'));
            }
            else{
                echo "sign up error";
            }
        }
    }
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
    }
}

?>