<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class register_model extends CI_Model {

   public function getUser($id = null){
        if($id === null){
            return $this->db->get('user')->result_array();
        }
        else {        
            return $this->db->get_where('user', ['id' => $id])->row_array();
        }
    }

    public function tambahdatauser(){
        $data=[
            "nama_user" => $this->input->post('nama_user', true),
            "alamat" => $this->input->post('alamat', true),
            "no_telp" => $this->input->post('no_telp', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "role" => 1
		];
		
        $this->db->insert('user', $data);
        return $this->db->affected_rows(); 
	}
	
    
    public function getuserByID($id){
        return $this->db->get_where('user',['id'=>$id])->row_array();
    }
    
    public function ubahdatauser($id){
        $post = $this->input->post();
            $this->id = $id;
            $this->nama_user = $post["nama_user"];
            $this->alamat =$post['alamat'];
            $this->no_telp =$post['no_telp'];
            $this->username = $post['username'];
            $this->password = $post['password'];

            $this->db->update('user',$this, array('id' => $id));
    }    
    
    public function hapusdatauser($id){
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
    public function datatabels(){
        $query= $this->db->order_by('id','DESC')->get('user');
        return $query->result();
    }

}

/* End of file varian_models.php */

?>
