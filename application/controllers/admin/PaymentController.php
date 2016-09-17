<?php
  class PaymentController extends CI_Controller 
  {
	   function __construct() 
	   {
	   	  parent::__construct(); 
	   	  $this->load->model('paymentmodel');
	   	  $this->load->model('usermodel');
	   	  $this->load->helper('timeinfo');
	   	  $this->load->model('adsmodel');
	   }

	   public function index()
	   {
	   	  $data['payment_result'] = $this->paymentmodel->getAllPayments();
	   	  $this->load->view('admin/includes/header.php');
	      $this->load->view('admin/transactions/index',$data);		
	      $this->load->view('admin/includes/footer.php');
	   }

	   public function getuserdata($user_id)
	   {
	   		$userdata = $this->usermodel->get_userdata($user_id);
	   		return $userdata;
	   }

	   public function getaddata($adid)
	   {
	   		$data = $this->adsmodel->getdescads($adid);
	   		return $data;
	   }

	   public function active()
	   {
	   	  $adid = $this->uri->segment(2);
	   	  $this->adsmodel->activeupdate($adid);
	   	  redirect('transactions');
	   }

	   public function inactive()
	   {
	   	  $id = $this->uri->segment(2);
	   	  $this->adsmodel->inactiveupdate($id);
	   	  redirect('transactions');
	   }

	   
   }

?>