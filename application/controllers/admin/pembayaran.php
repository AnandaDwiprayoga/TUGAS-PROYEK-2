<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaran/pembayaran_model');
		$this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['bayar'] = $this->pembayaran_model->tampil_data();
        $this->load->view('admin/pembayaran/index', $data);
        
	}
	
	public function edit($id)
    {
        $data['bayar']=$this->pembayaran_model->tampil_data($id);
        $this->form_validation->set_rules('status_bayar','Status Bayar','required');
        
        
    
        if ($this->form_validation->run()){
            $this->pembayaran_model->updateStatus($id); 
            redirect('admin/pembayaran','refresh');
        }
        else{
            $data["bayar"] = $this->pembayaran_model->tampil_data($id);//mengambil data untuk disimpan dalam form
            
            if(!$data["bayar"]) show_404();
            $this->load->view("admin/pembayaran/edit",$data);

        }
    }



    public function detail($id){
        $data['detail'] = $this->pembayaran_model->detailSewa($id);
        
        $this->load->view("admin/pembayaran/detail", $data);
        
    
    }

    public function delete($id)
    {  
            $this->pembayaran_model->deleteBayar($id);
            redirect('admin/pembayaran');
        
    }


}


