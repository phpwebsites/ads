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

    public function getads($subcat_id)
    {
	  $this->db->where('subcategory_id',$subcat_id);
	  $query = $this->db->get('ads');
	  return $query->result();		
    }

    public function getdescads($adid)
    {
    	$this->db->where('id',$adid);
    	$query = $this->db->get('ads');
    	return $query->row();
    }
  }
?>