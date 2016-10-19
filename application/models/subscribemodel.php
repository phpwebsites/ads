<?php
  class SubScribeModel extends CI_Model{
	  
	  function __construct()
	  {
			// Call the Model constructor
			parent::__construct();

	  }

	  public function insert($data)
	  {
	  	if ($this->db->insert("subscribe", $data)) { 
		     return true; 
		 } 
	  }

	  public function getallusers()
	  {
	  	$query = $this->db->get('subscribe');
       	return $query->result();
	  }
  }
?>