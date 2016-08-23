<?php
  class blogModel extends CI_Model{
	  
	  function __construct()
	  {
			// Call the Model constructor
			parent::__construct();

	  }

	  public function add($data)
	  {
		 if ($this->db->insert("blogs", $data)) { 
		   return true; 
		 } 
	  }

	  public function getAll()
	  {
		$query = $this->db->get('blogs');
		return $query->result();
	  }

	  public function getrow($id)
	  {
		   $this->db->where('id', $id);
           $query = $this->db->get('blogs'); 
           return $query->row(); //return the data 
	  }

	  public function update($data , $id)
	  {
		   $this->db->where('id', $id);
		   $result = $this->db->update('blogs', $data);
		   return $result; 
			
	  }

	  public function delete($id)
	  {
		$this -> db -> where('id', $id);
  		$this -> db -> delete('blogs');
	  }

  }
?>