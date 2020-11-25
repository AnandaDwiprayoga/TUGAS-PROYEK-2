<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products_detail extends CI_Controller {

    //agar bisa dipanggil dengan products_detail/:id, 
    //fungsi ini agar tidak perlu menulikan products_detail/index/:id
    function _remap($idBarang){
        $this->index($idBarang);
    }

    public function index($idBarang)
    {
        $this->load->model('barang/barang_model', 'barang');  

        $data['barang'] = $this->barang->getBarang($idBarang);
        $data['from'] = "Products Detail";
        
        $this->load->view('user/products_detail.php', $data);       
    }

}

/* End of file Products_detail.php */
