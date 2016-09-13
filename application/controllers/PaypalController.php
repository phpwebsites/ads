<?php
   class PaypalController extends CI_Controller
   {
   	function __construct() 
   	{ 
            parent::__construct(); 
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->helper('form'); 
            $this->load->library('session');
            $this->load->model('paymentmodel');
   }

     public function sucess()
     {

        // $paymentdetails = array('ad_id' => $this->session->userdata('ad_id') ,'user_id' => $this->session->userdata('user_id') ,'transaction_id' => $_REQUEST['txn_id']);
        // $this->payments->addpayment($paymentdetails);       
        $this->load->view('sucess');
     }

     public function cancel()
     {
       $this->load->view('cancel');
     }
   }
?>