<?php
  class PaymentModel extends CI_Model{
	  
	  function __construct()
	  {
			// Call the Model constructor
			parent::__construct();

	  }

	  public function addpayment($data)
	  {
	  	
	  	 if( $this->db->insert("payments", $data) )
	  	 {
	  	 	return true;
	  	 }
	  }

	  public function getAllPayments()
	  {
	  	$query = $this->db->get('payments');
		return $query->result();
	  }
 }
?>