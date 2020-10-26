<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    

    public function index(){
        $kategori =  $this->db->get('kategori');
        return $kategori->result_array();
    }
}

/* End of file ModelName.php */
