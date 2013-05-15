<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mytwitter extends CI_Controller {

    public function index()
    {
        $this->load->view('mytwitter_topmenu_view');
    }
    	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
}

?>