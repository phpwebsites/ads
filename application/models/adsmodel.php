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

    public function getrecentads($subid)
    {
        $this->db->where('subcategory_id',$subid);
        $this->db->order_by('id','desc');
        $query = $this->db->get('ads');
        return $query->result();    
    }

    public function getadscount($id)
    {
       // return $this->db->where('subcategory_id',$id)->count_all('ads');
       $result = $this->db->where('subcategory_id',$id)
         ->from('ads')
         ->count_all_results();
        return $result;
       
    }

    public function getlatestads()
    {
        $this->db->order_by('createdon','desc');
        $this->db->limit(3,4);
        $query = $this->db->get('ads');
        return $query->result();    
    }
  }
?>