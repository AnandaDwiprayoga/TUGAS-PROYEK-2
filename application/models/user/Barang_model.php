<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAllBarang(){
        $this->db->limit(12);
        $result = $this->db->query('SELECT b.*, k.nama_kategori FROM barang b, kategori k WHERE b.id_kategori = k.id');
        return $result->result_array();
    }

}

/* End of file ModelName.php */
    