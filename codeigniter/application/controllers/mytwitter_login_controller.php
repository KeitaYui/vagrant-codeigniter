<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mytwitter_Login_Controller extends CI_Controller {

    public function index()
    {
        $this->load->view('mytwitter_login_view');
    }

    public function loginsession()
    {
        $this->load->model( 'Mytwitter_login_model', '', true);
        $id = $this->input->post('loginID');
        $pw = $this->input->post('loginPW');
        if($this->Mytwitter_login_model->loginsession( $id, $pw) == true){
        	$this->load->library('session');
            $this->session->set_userdata('ID',$id);
            redirect(base_url('index.php/mytwitter_main_controller/'));
        }
        else{
            echo "login Error";
        }
    }
        
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
    }
}

?>