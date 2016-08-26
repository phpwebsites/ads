<?php
  class AdsImagesModel extends CI_Model
  {
	  
	  function __construct()
	  {
			// Call the Model constructor
			parent::__construct();

	  }
		
	public function upload_image($filename,$adid)
    {
		if($filename!='' ){
		      $filename1 = explode(',',$filename);
		      foreach($filename1 as $file){
			  $file_data = array(
			  	'name' => $file,
			  	'ad_id' => $adid
			  );
			    $this->db->insert('adsimages', $file_data);
			  }
		  }
     }

    public function getimage ($id)
    {
    	  //echo $id; exit;
    	   $this->db->where('ad_id', $id);
           $query = $this->db->get('adsimages'); //get all data from user_profiles table that belong to the respective user
           return $query->row(); //return the data 
    }

    public function getallimages ($id)
    {
    	  //echo $id; exit;
    	   $this->db->where('ad_id', $id);
    	   $this->db->limit(3,1);
           $query = $this->db->get('adsimages'); //get all data from user_profiles table that belong to the 
           return $query->result(); //return the data 
           // $query = $this->db->select('id,name')->from('adsimages')->where('ad_id', $id)->limit(3,1);
           // return $this->db->get()->result_array(); 
    }

    public function getsingleimage($id)
    {
      
    }
  }
?>