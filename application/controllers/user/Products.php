<?php


defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Products extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('user/kategori_model', 'kategori');
		$this->load->model('user/CheckoutModel', 'cm');
	}


	public function index()
	{
		$this->load->model('user/barang_model', 'barang');

		$data['kategories'] = $this->kategori->index();
		$data['barangs'] = $this->barang->getAllBarang();
		$data['from'] = "Products";

		$this->load->view('user/products', $data);
	}

	public function checkout()
	{
		$this->load->model('barang/barang_model', 'bro');
		$data['ses'] = $this->session->userdata('datauser');
		$idBarang = $this->uri->segment(4);
		$data['barang'] = $this->bro->getBarang($idBarang);
		$data['from'] = "Checkout Products";

		$this->load->view('user/checkout', $data);
	}

	public function pesan()
	{
		$this->load->model('barang/barang_model', 'barang');

		$user_w = array('id_user' => $this->input->post('idu'));
		$user = $this->cm->getW($user_w, 'detail_penyewaan')->row();

		if ($user == null) {
			// print_r($this->input->post('idb'));die;
			$barang = $this->barang->getBarang($this->input->post('idb'));
			$total = $this->input->post('hrg') * $this->input->post('lama');
			$startTime = date("Y-m-d H:i:s");
			$cenvertedTime = date('Y-m-d H:i:s', strtotime('+24 hour', strtotime($startTime)));
			$data = array(
				'id_barang' => $this->input->post('idb'),
				'id_user' => $this->input->post('idu'),
				'jumlah_barang' => $this->input->post('jumlah'),
				'lama_sewa' => $this->input->post('lama'),
				'total' => $total,
				'batas_bayar' => $cenvertedTime
			);
			$this->cm->ins('detail_penyewaan', $data);

			$a = $this->cm->getDataL('detail_penyewaan', 'id', 1)->row();
			$data2 = array(
				'id_detail_penyewaan' => $a->id,
				'status_bayar' => 2
			);
			$this->cm->ins('pembayaran', $data2);

			$w = array('id' => $this->input->post('idb'));
			$bstok = $this->cm->getW($w, 'barang')->row();
			$stok = $bstok->stok_barang - $this->input->post('jumlah');
			$barang = array('stok_barang' => $stok);
			$this->cm->updData('barang', $barang, $w);
			redirect('user/Products/listTagihan');
		} else {
			echo "<script>alert('Anda masih meminjam barang!');history.go(-1);</script>";
			// redirect('user/Products');
		}
	}

	public function listTagihan()
	{
		$this->load->model('barang/barang_model', 'bro');
		$data['ses'] = $this->session->userdata('datauser');
		$data['wkt'] = date("Y-m-d H:i:s");
		$data['barang'] = $this->cm->gdj()->result();
		$data['from'] = "Pembayaran";
		$this->load->view('user/bayar', $data);
	}

	public function bayar()
	{
		$data['from'] = "list tagihan";
		$data['ses'] = $this->session->userdata('datauser');
		$this->load->view('user/uplod', $data);
	}

	public function uploadBT()
	{
	
		$startTime = date("Y-m-d H:i:s");
	
		
			$data2 = array(
				'tanggal_bayar' => $startTime,
				'bukti_bayar' => $this->_uploadImage(),
			
			);
	
		
		$w = array('id' => $this->input->post('id'));
		$this->cm->updData('pembayaran', $data2, $w);
		
		redirect('user/Products/listTagihan','refresh');
		
	}

	private function _uploadImage()
	{
	 $this->load->helper(array('form', 'url'));
	  
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';//menentukan format file
		$config['overwrite']			= true;//menindih file yg sudah di upload saat di upload file baru
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
	
		$this->load->library('upload', $config);
	
		if ($this->upload->do_upload('file')) {
		   $data = array('upload_data' =>$this->upload->data());
		   return $data['upload_data']['file_name'];
		}
		
		return "default.jpg";
	}

    public function delete($id)
    {  
            $this->cm->deletePesanan($id);
            redirect('user/Products');
        
    }
	
}

/* End of file Products.php */
