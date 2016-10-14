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

	   public function getdatabyemail($email)
	   {
	   	 $this->db->where('email',$email);
	   	 $query = $this->db->get('users');
	   	 return $query->row();
	   }

	   public function updatepassword($hash,$pwd)
	   {
		   $this->db->where("hash", "'".$hash."'");
		   $result = $this->db->get('users');
		   $data = array(
                           'password' => md5($pwd)
                        );
		   // $result = $this->db->update('users',$data);
		   return $result; 
	   }

	   public function updatehashuserdata($hash)
	   {
	   	   $this->db->where("hash", "'".$hash."'");
		   $result = $this->db->get('users');
		   $data = array('status' => 1);
           $result = $this->db->update('users',$data);
		   return $result; 
	   }

	  //  public function gethashdata($hash)
	  //  {

	  //  	 $this->db->where("hash", str_replace(' ', '', $hash));
		 // $result = $this->db->get('users');
		 // $data = $result->row();
		 // print_r($data);
		 // exit;
		 // return $result;
	  //  }
    
  }
?>