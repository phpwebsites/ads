<?php
  class AdminUserModel extends CI_Model{
  	
    	public function addadminuserdata($data)
    	{
    		if ($this->db->insert("users", $data)) 
    		{ 
  				return true; 
  		  } 
    	}

      public function getAllAdminUsers()
      {
          $this->db->select('*');
          $this->db->from('users');
          $where = "role = 2";
          $this->db->where($where);
          $q = $this->db->get();
          return $q->result();
      }

      public function getSingleRecord($id)
      {
         $this->db->where('id', $id);
         $query = $this->db->get('users'); //get all data from user_profiles table that belong to the respective user
         return $query->row();
      }

      public function updateadminuserdata($data,$id)
      {
          
           $this->db->where('id', $id);
           $result = $this->db->update('users', $data);
           return $result; 
      }

      public function getregisteruser()
      {
          $this->db->select('*');
          $this->db->from('users');
          $where = "role = 3";
          $this->db->where($where);
          $q = $this->db->get();
          return $q->result();
      }

      public function deleterecord($id)
      {
          $this -> db -> where('id', $id);
          $this -> db -> delete('users');
      }


  }
?>

