<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_model extends CI_Model {
   
 

public function getKategori($id = null){
        // return $this->db->get('mahasiswa')->result_array();
        if($id === null){
        return $this->db->get('kategori')->result_array();
        } else {
            
            return $this->db->get_where('kategori', ['id' => $id])->row_array();
        }
    }

  
    public function deleteKategori($id){
        return $this->db->delete('kategori',array("id" => $id));
    }
   
    public function createKategori(){
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
        ];

        $this->db->insert('kategori',$data);
        return $this->db->affected_rows();
        
    }

    public function updateKategori($id){
       
     
            $data = [
                'id' => $id ,
                'nama_kategori' => $this->input->post('nama_kategori'),
    
            ];
            $this->db->update('kategori',$data, array('id' => $id));
      
    
    }

   


}

/* End of file mahasiswa_model.php */
?>