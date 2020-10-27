<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori/kategori_model');
      
        $this->load->library('form_validation');
        
        
    }
    

    public function index()
    {
        $data["kategori"] = $this->kategori_model->getKategori();
        $this->load->view("admin/kategori/index",$data);
    }

    public function detail($id){
        $data['kategori']=$this->kategori_model->getKategori($id);
        $this->load->view('admin/kategori/detail',$data);
    }

    public function delete($id)
    {  
            $this->kategori_model->deleteKategori($id);
            redirect('admin/kategori');
        
    }

    public function tambah()
    {
    
        $this->form_validation->set_rules('nama_kategori','Nama','required');
  
    
        if ($this->form_validation->run()){
        $this->kategori_model->createKategori(); 
        redirect('admin/kategori','refresh');
        }
        else{
            $this->load->view("admin/kategori/add");//tampil form add, yamg tampil viewnya

        }
  
    }

    public function edit($id)
    {
        $data['kategori']=$this->kategori_model->getKategori($id);
        $this->form_validation->set_rules('nama_kategori','Nama','required');
    
        
    
        if ($this->form_validation->run()){
            $this->kategori_model->updateKategori($id); 
            redirect('admin/kategori','refresh');
        }
        else{
            $data["kategori"] = $this->kategori_model->getKategori($id);//mengambil data untuk disimpan dalam form
           if(!$data["kategori"]) show_404();
            $this->load->view("admin/kategori/edit",$data);

        }
    }

    

}

/* End of file kuebas.php */
