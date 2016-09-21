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
        $this->db->order_by('id','desc');
        $this->db->where('status',1); 
        $this->db->limit(3);
        $query = $this->db->get('ads');
        return $query->result();    
    }

    public function getAllRow()
    {
       $query = $this->db->get('ads');
       return $query->result();   
    }

    public function getcategoryads($category_id)
    {
      $this->db->limit(3);
      $this->db->where('category_id',$category_id);
      // $this->db->order_by('id','desc');
      $query = $this->db->get('ads');
      return $query->result();    
    }

    public function gettotalads($offset)
    {
       $this->db->limit(3);
       $this->db->where('id >', $offset); 
       $query = $this->db->get('ads');
       return $query->result();  
    }

    public function activeupdate($adid)
    {
      
      $data = array('status' => '1');
      $this->db->where('id',$adid);
       $this->db->update('ads',$data); 
      
    }

    public function inactiveupdate($adid)
    {
      $data = array('status' => '0' );
      $this->db->where('id',$adid);
      $this->db->update('ads', $data); 
    }

    public function getpopularads()
    {
       $this->db->where('status',1); 
       $this->db->where('adplanprice IS NOT NULL', null, false);
       $query = $this->db->get('ads');
       return $query->result();  
    }

    public function getfreeads()
    {
      // $this->db->where('  adplanprice IS', null);

      $this->db->where('adplanprice', NULL);
      $query = $this->db->get('ads');
      return $query->result();  
    }
  }
?>