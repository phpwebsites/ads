<?php
  class cityModel extends CI_Model{
	  
	  function __construct()
	  {
			// Call the Model constructor
			parent::__construct();

	  }
		
	  public function add($data)
	  {
		 if ($this->db->insert("city", $data)) { 
		   return true; 
		 } 
	  }
		
	  public function getAll()
	  {
		$query = $this->db->get('city');
		return $query->result();
	  }
		
	    public function update($data , $id)
	    {
		   $this->db->where('id', $id);
		   $result = $this->db->update('city', $data);
		   return $result; 
			
		}

		public function getrow($id)
		{
		   $this->db->where('id', $id);
           $query = $this->db->get('city'); //get all data from user_profiles table that belong to the respective user
           return $query->row(); //return the data 
		
		}
		
		public function delete($id)
		{
			$this -> db -> where('id', $id);
  		    $this -> db -> delete('city');
		}

		public function getAllCites($state_id)
		{
			$this->db->where('state_id',$state_id);
			$query = $this->db->get('city');
		    return $query->result();
		}
		
		
		
		
  }
?>