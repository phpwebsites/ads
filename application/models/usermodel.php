<?php
  class UserModel extends CI_Model{
	  
		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
		}
		
		public function insert($data) 
	    { 
		      
			 if ($this->db->insert("users", $data)) 
			 { 
				return true; 
			 } 
        } 
		
		public function get_user($email, $pwd)
        {
			    
				$query = $this->db->query("select * from users where email = '" .$email. "'and password = '" .$pwd."'");
				return $query->num_rows();
        }
	   
	   public function get_userid($email, $pwd)
	   {
		   $query = $this->db->query("select * from users where email = '" .$email. "'and password = '" .$pwd."'");
		   
		   return $query -> row();
	   }
	   
	   public function update($data)
	   {
		   $id = $this->session->userdata('user_id');
		   $this->db->where('id', $id);
		   $result = $this->db->update('users', $data);
		   return $result; 
	   }
	   
	   public function get_userdata($id)
	   {
		   $this->db->where('id', $id);
           $query = $this->db->get('users'); //get all data from user_profiles table that belong to the respective user
           return $query->row(); //return the data 
	   }
    
  }
?>