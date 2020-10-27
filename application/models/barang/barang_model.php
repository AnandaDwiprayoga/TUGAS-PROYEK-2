<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class barang_model extends CI_Model {
   
    
    public $foto="default.jpg";
    public $id;

    public function getBarang($id = null){
        // return $this->db->get('mahasiswa')->result_array();
        if($id === null){
        $data =  $this->db->get('barang')->result_array();
        foreach ($data as &$d) {
            $d['kategori'] = $this->get_kategori($d['id_kategori'] ??NULL);
          }
          return $data;

        } else {
            return $this->db->get_where('barang', ['id' => $id])->row_array();
        }
    }

   
    public function deleteBarang($id){
        $this->_deleteImage($id);
        return $this->db->delete('barang',array("id" => $id));
    }
   
    public function createBarang(){
        $id = uniqid();
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'stok_barang' => $this->input->post('stok_barang'),
            'harga' => $this->input->post('harga'),
            'foto' => $this->_uploadImage(),
            'id_kategori' => $this->input->post('id_kategori')

        ];

        $this->db->insert('barang',$data);
        return $this->db->affected_rows();
        
    }

   
    public function updateBarang($id)
    {
        
            $post = $this->input->post();
            $this->id = $id;
            $this->nama_barang = $post["nama_barang"];
            $this->stok_barang =$post['stok_barang'];
            $this->harga =$post['harga'];
            $this->id_kategori = $post['id_kategori'];
   
            if(!empty($_FILES["foto"]["name"])){
                $this->foto = $this->_uploadImage();
    
            }
            else{
                $this->foto = $post["old_image"];
            }

            $this->db->update('barang',$this, array('id' => $id));
    
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
 
     if ($this->upload->do_upload('foto')) {
        $data = array('upload_data' =>$this->upload->data());
        return $data['upload_data']['file_name'];
     }
     
     return "default.jpg";
 }

 private function _deleteImage($id)
{
    $barang = $this->getBarang($id);
    if ($barang['foto'] != "default.jpg") {
	    $filename = explode(".", $barang['foto'])[0];
		return array_map('unlink', glob(FCPATH."upload/$filename.*"));
    }
}

public function get_kategori($id = ''){
    $this->db->select('a.id,a.nama_kategori as name')->from('kategori a');
    if (!empty($id)) {
      $this->db->where('a.id', $id);
      return $this->db->get()->row_array();exit;
    }
    return $this->db->get()->result_array();
  }



}

/* End of file mahasiswa_model.php */
?>