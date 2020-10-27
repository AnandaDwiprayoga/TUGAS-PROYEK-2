<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang/barang_model');
        $this->load->model('kategori/kategori_model');
        $this->load->library('form_validation');
        
        
    }

    public function index()
    {
         $data["barang"] = $this->barang_model->getBarang();
         $data['kategori'] = $this->kategori_model->getKategori();
         $this->load->view("admin/barang/index",$data);
    }

    public function tambah()
    {
    
        $this->form_validation->set_rules('nama_barang','Nama','required');
        $this->form_validation->set_rules('stok_barang','Stok Barang','required');
        $this->form_validation->set_rules('harga','Harga','required');
    
        if ($this->form_validation->run()){
        $this->barang_model->createBarang(); 
        redirect('admin/barang','refresh');
        }
        else{
            $data["kategori"] = $this->kategori_model->getKategori();
            $this->load->view("admin/barang/add",$data);//tampil form add, yamg tampil viewnya

        }
  
    }

    
    public function edit($id)
    {
        $data['barang']=$this->barang_model->getBarang($id);
        $this->form_validation->set_rules('nama_barang','Nama','required');
        $this->form_validation->set_rules('stok_barang','Stok Barang','required');
        $this->form_validation->set_rules('harga','Harga','required');
        
    
        if ($this->form_validation->run()){
            $this->barang_model->updateBarang($id); 
            redirect('admin/barang','refresh');
        }
        else{
            $data["barang"] = $this->barang_model->getBarang($id);//mengambil data untuk disimpan dalam form
            $data["kategori"] = $this->kategori_model->getKategori();
            if(!$data["barang"]) show_404();
            $this->load->view("admin/barang/edit",$data);

        }
    }

    public function detail($id){
        $data['barang']=$this->barang_model->getBarang($id);
        $this->load->view('admin/barang/detail',$data);
    }

    public function delete($id)
    {  
            $this->barang_model->deleteBarang($id);
            redirect('admin/barang');
        
    }



}

/* End of file index.php */
