<?php 
 

defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
          $this->load->model('user/kategori_model', 'kategori');
          $this->load->model('user/barang_model', 'barang');
          

          $data['kategories'] = $this->kategori->index();
          $data['barangs'] = $this->barang->getAllBarang();
          
          $this->load->view("user/index", $data);
    }

}

