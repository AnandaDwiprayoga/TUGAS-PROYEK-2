<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin_user_model extends CI_Model {
   
 
	public function getUser(){
		$this->db->where('role', 1);
		$result = $this->db->get('user');
		return $result->result_array();
		
	}

	 
    public function deleteUser($id){
        return $this->db->delete('user',array("id" => $id));
    }

}
