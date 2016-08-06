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
		
  }
?>