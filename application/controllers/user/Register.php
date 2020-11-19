<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_model');
        $this->load->library('form_validation');
        
       
    }

    public function index()
    {
        $data["user"] = $this->register_model->getUser();
        $this->load->view("register/index",$data);
    }

    public function tambah()
    {
        $data['title']='Form Register';

        $this->form_validation->set_rules('nama_user', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'NoTelp', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if($this->form_validation->run()){
            $this->register_model->createUser(); 
            redirect('user/register','refresh');
        } else {
            $this->session->set_flashdata('flash-data','ditambahkan');
            $this->load->view("user/register");
        }
    }

    
   
}
/* End of file Controllername.php */
?>