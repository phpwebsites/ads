<?php
  class stateModel extends CI_Model{
	  
	  function __construct()
	  {
			// Call the Model constructor
			parent::__construct();

	  }
		
	  public function add($data)
	  {
		 if ($this->db->insert("state", $data)) { 
		   return true; 
		 } 
	  }
		
	  public function getAll()
	  {
		$query = $this->db->get('state');
		return $query->result();
	  }
		
	    public function update($data , $id)
	    {
		   $this->db->where('id', $id);
		   $result = $this->db->update('state', $data);
		   return $result; 
			
		}

		public function getrow($id)
		{
		   $this->db->where('id', $id);
           $query = $this->db->get('state'); //get all data from user_profiles table that belong to the respective user
           return $query->row(); //return the data 
		
		}
		
		public function delete($id)
		{
			$this -> db -> where('id', $id);
  		    $this -> db -> delete('state');
		}

		public function getAllStates($country_id)
		{
			$this->db->where('country_id',$country_id);
			$query = $this->db->get('state');
		    return $query->result();
		}
		
		
		
		
  }
?>