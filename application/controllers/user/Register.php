<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class  Register extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('register_model');
           
    }
    

    public function index()
    {
     $this->load->view('register/index');
     
    }

    public function register(){

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('nama_user','Nama User','required');
        $this->form_validation->set_rules('password','Password','required');
        
        if ($this->form_validation->run()==false){

            $this->load->view("register/index");
        
        }
        else{
            $this->register_model->tambahdatauser();
            redirect('user/Login','refresh');

        }

    }

}

/* End of file .php */
