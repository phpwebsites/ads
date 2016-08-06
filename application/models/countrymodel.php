<?php
  class CountryModel extends CI_Model{
	  
	  function __construct()
	  {
			// Call the Model constructor
			parent::__construct();

	  }
		
	  public function add($data)
	  {
		 if ($this->db->insert("country", $data)) { 
		   return true; 
		 } 
	  }
		
	  public function getAll()
	  {
		$query = $this->db->get('country');
		return $query->result();
	  }
		
	    public function update($data , $id)
	    {
		   $this->db->where('id', $id);
		   $result = $this->db->update('country', $data);
		   return $result; 
			
		}

		public function getrow($id)
		{
		   $this->db->where('id', $id);
           $query = $this->db->get('country'); //get all data from user_profiles table that belong to the respective user
           return $query->row(); //return the data 
		
		}
		
		public function delete($id)
		{
			$this -> db -> where('id', $id);
  		    $this -> db -> delete('country');
		}
		
		
		
		
  }
?>