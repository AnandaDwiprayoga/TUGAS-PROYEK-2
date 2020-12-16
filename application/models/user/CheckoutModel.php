<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CheckoutModel extends CI_Model {

	public function getData($t)
	{
		return $this->db->get($t);
	}
	public function getDataL($t, $tl, $l)
	{
		$this->db->order_by($tl, 'desc');
		return $this->db->get($t, $l);
	}
	public function getW($w, $t)
	{
		$this->db->where($w);
		return $this->db->get($t);
	}
	
	public function gdj()
	{
		return $this->db->query('SELECT a.id,a.id_detail_penyewaan, a.status_bayar ,b.nama_barang ,d.id_user, d.jumlah_barang, d.lama_sewa, d.total, d.batas_bayar FROM pembayaran as a 
		JOIN detail_penyewaan as d ON a.id_detail_penyewaan = d.id 
		JOIN barang as b ON d.id_barang = b.id');
	}

	public function ins($t, $d)
	{
		$this->db->insert($t, $d);
	}
	public function updData($t, $object, $w)
	{
		$this->db->update($t, $object, $w);
	}

	public function deletePesanan($id){
		$this->db->delete('detail_penyewaan',array("id" => $id));
		return $this->db->delete('pembayaran',array("id_detail_penyewaan" => $id));
	}
	
}

/* End of file CheckoutModel.php */

