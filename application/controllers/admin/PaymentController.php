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
	   	  $ad_data = $this->adsmodel->getdescads($adid);
	   	  $memberid = $ad_data->user_id; 
	   	  $userdata = $this->usermodel->get_userdata($memberid);
          $useremail = $userdata->email;
          $subject = "Promotionsads Updations";
	   	  $message = "<html>
                       <body>
                        <div style='width: 460px;height: 145px;background-color: #d0cfcf;padding: 20px;font-size: 20px;text-align: center;'>
                           <img src='https://i.imgsafe.org/bb8d8a3854.png' width='100' height='70' />
                           <p>
                             Your ad is inactivated by promotads admin .please renewal of your ad on promotads.com
                             <a href='http://localhost/sites/newbieaddsdev'>Promoteads.com</a>
                           </p>
                        </div>
                       </body>
                      </html>
                      ";
          $this->_sendEmail("vsv1414@gmail.com",$subject,$message);
	   	  $this->adsmodel->activeupdate($adid);
	   	  redirect('transactions');
	   }

	   public function inactive()
	   {
	   	  $id = $this->uri->segment(2);
	   	  $ad_data = $this->adsmodel->getdescads($id);
	   	  $memberid = $ad_data->user_id; 
	   	  $userdata = $this->usermodel->get_userdata($memberid);
	   	  $useremail = $userdata->email;
          $subject = "Promotionsads Updations";
	   	  $message = "<html>
                       <body>
                        <div style='width: 460px;height: 145px;background-color: #d0cfcf;padding: 20px;font-size: 20px;text-align: center;'>
                           <img src='https://i.imgsafe.org/bb8d8a3854.png' width='100' height='70' />
                           <p>
                             Your ad is activated by promotads admin .please check your ad on 
                             <a href='http://localhost/sites/newbieaddsdev'>Promoteads.com</a>
                           </p>
                        </div>
                       </body>
                      </html>
                      ";
          
          
          $this->_sendEmail("vsv1414@gmail.com",$subject,$message);
	   	  $this->adsmodel->inactiveupdate($id);
	   	  redirect('transactions');
	   }
	    public function freeactive()
	    {
	   	  $adid = $this->uri->segment(2);
	   	  $ad_data = $this->adsmodel->getdescads($adid);
	   	  $memberid = $ad_data->user_id; 
	   	  $userdata = $this->usermodel->get_userdata($memberid);
          $useremail = $userdata->email;
          $subject = "Promotionsads Updations";
	   	  $message = "<html>
                       <body>
                        <div style='width: 460px;height: 145px;background-color: #d0cfcf;padding: 20px;font-size: 20px;text-align: center;'>
                           <img src='https://i.imgsafe.org/bb8d8a3854.png' width='100' height='70' />
                           <p>
                             Your freead is inactivated by Promoteadstads admin .please renewal of your ad on promotads.com
                             <a href='http://localhost/sites/newbieaddsdev'>Promoteads.com</a>
                           </p>
                        </div>
                       </body>
                      </html>
                      ";
          $this->_sendEmail("vsv1414@gmail.com",$subject,$message);
	   	  $this->adsmodel->activeupdate($adid);
	   	  $data['adresults'] = $this->adsmodel->getfreeads();
	   	  $this->load->view('admin/includes/header.php');
	      $this->load->view('admin/transactions/freeads',$data);		
	      $this->load->view('admin/includes/footer.php');
	    }

	   public function freeinactive()
	   {
	   	  $id = $this->uri->segment(2);
	   	  $ad_data = $this->adsmodel->getdescads($id);
	   	  $memberid = $ad_data->user_id; 
	   	  $userdata = $this->usermodel->get_userdata($memberid);
	   	  $useremail = $userdata->email;
          $subject = "Promotionsads Updations";
	   	  $message = "<html>
                       <body>
                        <div style='width: 460px;height: 145px;background-color: #d0cfcf;padding: 20px;font-size: 20px;text-align: center;'>
                           <img src='https://i.imgsafe.org/bb8d8a3854.png' width='100' height='70' />
                           <p>
                             Your ad is activated by promotads admin .please check your ad on 
                             <a href='http://localhost/sites/newbieaddsdev'>Promoteads.com</a>
                           </p>
                        </div>
                       </body>
                      </html>
                      ";
          
          $this->_sendEmail("vsv1414@gmail.com",$subject,$message);
	   	  $this->adsmodel->inactiveupdate($id);
	   	  $data['adresults'] = $this->adsmodel->getfreeads();
	   	  $this->load->view('admin/includes/header.php');
	      $this->load->view('admin/transactions/freeads',$data);		
	      $this->load->view('admin/includes/footer.php');
	   }
	   public function freeads()
	   {
	   	 $data['adresults'] = $this->adsmodel->getfreeads();
	   	  $this->load->view('admin/includes/header.php');
	      $this->load->view('admin/transactions/freeads',$data);		
	      $this->load->view('admin/includes/footer.php');
	  }

	  private function _sendEmail($email,$subject,$message)
      {
	      $config = array();
	      $config['useragent'] = "CodeIgniter";
	      $config['mailpath']  = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
	      $config['protocol']  = "smtp";
	      $config['smtp_host'] = "ssl://smtp.googlemail.com";
	      $config['smtp_port'] = "465";
	      $config['smtp_user'] = 'promtads1414@gmail.com';
	      $config['smtp_pass'] = 'promtads';
	      $config['mailtype'] = 'html';
	      $config['charset']  = 'utf-8';
	      $config['newline']  = "\r\n";
	      $config['wordwrap'] = TRUE;
	      $this->load->library('email');
	      $this->email->initialize($config);
	      $this->email->from('vsv1414@gmail.com');
	      $this->email->to($email);
	      $this->email->subject($subject);
	      $this->email->message($message);
	      if($this->email->send())
	      {
	         echo 'Email send.';
	       
	      }
	     else
	     {
	       show_error($this->email->print_debugger());
	       
	     }

      }

	   
   }

?>