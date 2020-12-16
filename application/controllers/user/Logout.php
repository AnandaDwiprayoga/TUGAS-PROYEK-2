<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	  
    public function __construct()
    {
        parent::__construct();
	}
	

    public function index()
    {
        // delete session for user login
        $this->session->unset_userdata('datauser');

        $this->load->view('template/header_login');
        $this->load->view('user/login');
		$this->load->view('template/footer_login');   
    }

}