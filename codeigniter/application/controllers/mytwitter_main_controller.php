<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mytwitter_main_controller extends CI_Controller {

    public function index()
    {   
        $this->load->view('mytwitter_main_view');
    }

    public function tweetsave()
    {
        $this->load->model( 'Mytwitter_tweetsave_model', '', true);
        $id  = $this->session->userdata('ID');
        $str = $this->input->post('text');
        $this->Mytwitter_tweetsave_model->tweetsave( $id, $str);
    }
    
    public function tweetload($userID)
    {
        $this->load->model( 'Mytwitter_tweetsave_model', '', true);
        $query = $this->Mytwitter_tweetsave_model->tweetload($userID);
        //var_dump(mysql_fetch_object($query->result_id));exit;
        $result    = array();
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