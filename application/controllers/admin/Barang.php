<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
          $this->load->view("admin/index");
    }



}

/* End of file index.php */
