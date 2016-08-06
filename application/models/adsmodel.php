<?php
  class AdsModel extends CI_Model
  {
	  
	  function __construct()
	  {
			// Call the Model constructor
			parent::__construct();

	  }
		
	public function adddata($data)
    {
	   $this->db->insert('ads',$data);
    }
		
  }
?>