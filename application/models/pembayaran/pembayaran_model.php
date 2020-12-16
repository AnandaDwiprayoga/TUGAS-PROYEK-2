<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran_model extends CI_Model {
   
 
	public function tampil_data($id = null){
        // return $this->db->get('mahasiswa')->result_array();
        if($id === null){
        return $this->db->get('pembayaran')->result_array();
        } else {
            
            return $this->db->get_where('pembayaran', ['id' => $id])->row_array();
        }
    }

	
   public function detailSewa($id){
	$this->db->select('a.jumlah_barang,
					   a.lama_sewa,a.total,batas_bayar,b.nama_user nama_user,c.nama_barang');
	$this->db->from('detail_penyewaan a');
	$this->db->join('user b','a.id_user=b.id','INNER');
	$this->db->join('barang c', 'a.id_barang = c.id', 'INNER');
	$this->db->where('a.id', $id);
	
	$query=$this->db->get();
	$data=$query->result_array();
	return $data;

    
  }
   
  public function deleteBayar($id){
	return $this->db->delete('pembayaran',array("id" => $id));
}

    public function updateStatus($id){
            $data = [
                'id' => $id ,
                'status_bayar' => $this->input->post('status_bayar'),
    
            ];
            $this->db->update('pembayaran',$data, array('id' => $id));

    
    }

   


}

/* End of file mahasiswa_model.php */
