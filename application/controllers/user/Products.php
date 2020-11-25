<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function index(){
        $this->load->model('user/kategori_model', 'kategori');
        $this->load->model('user/barang_model', 'barang');
        
        $data['kategories'] = $this->kategori->index();
        $data['barangs'] = $this->barang->getAllBarang();
        $data['from'] = "Products";

        $this->load->view('user/products', $data);
    }

}

/* End of file Products.php */
