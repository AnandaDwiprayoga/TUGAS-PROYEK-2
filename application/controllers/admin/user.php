<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_user/admin_user_model');
        $this->load->library('form_validation');
        
        
    }

    public function index()
    {
         $data["user"] = $this->admin_user_model->getUser();
         $this->load->view("admin/user/index",$data);
    }

    public function delete($id)
    {  
            $this->admin_user_model->deleteUser($id);
            redirect('admin/user');
        
    }



}

/* End of file index.php */
