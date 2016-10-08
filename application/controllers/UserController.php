<?php
   class UserController extends CI_Controller
   {
	  function __construct() 
	  { 
         parent::__construct(); 
         $this->load->helper('url');
         $this->load->library('form_validation');
		 $this->load->model('usermodel');
		 $this->load->library('session');
		 $this->load->model('countrymodel');
		 $this->load->library('bcrypt');
		 $this->load->model('categoriesmodel');
		 $this->load->model('subcategoriesmodel');
		 $this->load->model('adsmodel');
		 $this->load->model('adsimagesmodel');
		 $this->load->helper('timeinfo');
         
      }
	  
	  public function add_user() 
	  { 
	      
         $data = array( 
            'name' => $this->input->post('username'), 
            'email' => $this->input->post('email') ,
			'password' => base64_encode($this->input->post('password')),
			'phoneno' => $this->input->post('phoneno'),
			'country_id' => $this->input->post('country'),
			'state_id' => $this->input->post('state'),
			'city_id' => $this->input->post('city'),
			'pincode' => $this->input->post('pincode'),
			'role' => $this->input->post('role'),
			'hash' => stripcslashes($this->bcrypt->hash_password(random_string('alpha',4))) 
         ); 
        
		 $this->form_validation->set_rules("username", "Username", "trim|required");
		 $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|xss_clean|is_unique[users.email]");
         $this->form_validation->set_rules("password", "Password", "trim|required|matches[conformpassword]");
		 $this->form_validation->set_rules("conformpassword", "ConformPassword", "trim|required");
		 $this->form_validation->set_rules("phoneno", "Phonenumber", "trim|required");
		 $this->form_validation->set_rules("country", "country", "trim|required");
		 $this->form_validation->set_rules("state", "State", "trim|required");
		 $this->form_validation->set_rules("city", "City", "trim|required");
		 $this->form_validation->set_rules("pincode", "Pincode", "trim|required");
		 if($this->form_validation->run() == FALSE)
		 {
		 	
			$this->load->view('home');		 
		 }
		 else
		 {
			$data1 = $this->usermodel->insert($data);
			$id = $this->db->insert_id();
			$userdata = $this->usermodel->get_userdata($id);
			//print_r($userdata);exit;
		    $sessiondata = array('user_id' => $userdata->id ,'email' => $userdata->email,'username' => $userdata->name );
			$this->session->set_userdata($sessiondata);
			$this->session->set_flashdata('signupmsg',"Your Registration is Sucessfull");
			redirect('home');
		 }

		  
		  /*$this->session->set_flashdata('register_message','Your have registerd sucessfully');*/
		  

      }  
	  
	  public function login_user()
	  {
		  $email = $this->input->post("email");
          $password = base64_encode($this->input->post("password"));
		 // $test = md5(123456);
         // echo $test;
		   //set validations
          $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|xss_clean");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
			  
               $this->load->view('home');
          }
          else
          {
               //validation succeeds
					
               if ($this->input->post('login') == "Login")
               {
				   
                    //check if username and password is correct
                    $usr_result = $this->usermodel->get_user($email, $password);
					
                    if ($usr_result > 0) //active user record is present
                    {
                       
						 $usr_id = $this->usermodel->get_userid($email, $password);
						 if($usr_id->role == 3)
						 {
						 	$sessiondata = array('user_id' => $usr_id->id ,'email' => $usr_id->email,'username' => $usr_id->name );
                            $this->session->set_userdata($sessiondata);
						    redirect("home");	
						 }
						 elseif ($usr_id->role == 1 || $usr_id->role == 2 ) 
						 {
						 	$sessiondata = array('user_id' => $usr_id->id ,'email' => $usr_id->email,'username' => $usr_id->name );
                            $this->session->set_userdata($sessiondata);
						    redirect("administrator");		 	 						 	
						 } 	 						 
                         
                    }
                    else
                    {

                         $this->session->set_flashdata('loginerror_msg', '<span class="text-danger">Invalid username and password!</span>');
                         redirect('home/index');
                    }
               }
               else
               {
                    redirect('home/index');
               }
          }
	  }
	  
	  public function updateUser()
	  {
		 $username = $this->input->post("username");
		 $email = $this->input->post("email");
         $password = md5($this->input->post("password"));  
		 $phonenumber = $this->input->post("phoneno");
		 $this->form_validation->set_rules("username", "Username", "trim|required");
		 $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|xss_clean");
         $this->form_validation->set_rules("password", "Password", "trim|required|matches[conformpwd]");
		 $this->form_validation->set_rules("conformpwd", "ConformPassword", "trim|required");
		 $this->form_validation->set_rules("phoneno", "Phonenumber", "trim|required");
		 
		 $data = array(
               'name' => $username,
               'email' =>  $email,
               'password' =>  $password,
			   'phoneno' => $phonenumber
            );
		   if ($this->form_validation->run() == FALSE)
           {
               $id = $this->session->userdata('user_id');
			   $data['user_data'] = $this->usermodel->get_userdata($id);
		       $this->load->view('userprofile',$data);
              
           }
		   else
		   {
			   $update_result = $this->usermodel->update($data);
				 if($update_result > 0)
				 {
					 $id = $this->session->userdata('user_id');
			   		 $data['user_data'] = $this->usermodel->get_userdata($id);
		       		 $this->load->view('userprofile',$data);
				 }
		   }
		 
			
	  }

	//   public function getCountry()
	// {
	// 	$result = $this->countrymodel->getAll();
	// 	return $result;
	// }
	  
	  public function logout()
	  {
		  $this->session->sess_destroy();
		  redirect("home/index");
	  }

	  public function forgotpwd()
	  {
         $email = $this->input->post('email');
         $email_data = $this->usermodel->getdatabyemail($email);
         
         if(count($email_data) > 0)
         {
             $subject = "Forgotpassword";
	   	     $message = "<html>
                       <body>
                        <div style='width: 640px;height: 145px;background-color: #d0cfcf;padding: 20px;font-size: 20px;text-align: center;'>
                           <img src='https://i.imgsafe.org/bb8d8a3854.png' width='100' height='70' />
                           <p>
                             Please click below link and reset your password
                             <a href='http://localhost/sites/newbieaddsdev/user/$email_data->hash'>
                                $email_data->hash
                             </a>
                           </p>
                        </div>
                       </body>
                      </html>
                      ";
            // echo $message;exit;

            $this->_sendEmail("srini.newbiesoftsolutions@gmail.com",$subject,$message);
         }
         else
         {
         	$this->session->set_flashdata('forgotemailerror',"Please enter corect email");
         }
         
     	     
      }

      public function resetpwd()
      {
      	// $data['hash'] = $this->uri->segment(2);
      	//echo $this->uri->segment(2);
      	//exit;
      	$this->session->set_flashdata('hash',$this->uri->segment(2));
      	$this->session->set_flashdata('resetpasswordmsg',"reset password open");
      	// $this->load->view('home',$data);
      	redirect("home");
 	  }

 	  public function passwordcreate()
 	  {
 	  	$newpwd = $this->input->post('newpassword');
 	  	$oldpwd = $this->input->post('conformpassword');
 	  	$hash = $this->input->post('hash');
 	  	$this->form_validation->set_rules("newpassword", "Password", "trim|required");
 	  	$this->form_validation->set_rules("conformpassword", "ConformPassword", "trim|required");
 	  	$this->form_validation->set_rules("newpassword", "Newpassword", "trim|required|matches[conformpassword]");
		$this->form_validation->set_rules("conformpassword", "ConformPassword", "trim|required");
		if($this->form_validation->run() == FALSE)
        {
           $this->session->set_flashdata('passwordcreateerror',"password create error");  
           $this->session->set_flashdata('error',validation_errors());  
           redirect('home'); 
              
        }
        else
        {
           $hash_val = $this->usermodel->updatepassword($hash,$newpwd);
           print_r($hash_val);exit;
           if($hash_val == 1)
           {
           	  $this->session->set_flashdata('passwordcreatsucess','<span class="text-danger">Password updated sucessfully!</span>');
              redirect('home');
           }
           else
           {
              redirect('home'); 
           }
          
        }
 	  }
  //     public function getcategories()
	 //  {
		// $data = $this->categoriesmodel->getAllcategories();
		// return $data;
  //     }
  //    public function subcategories($id)
  //    {
  //   	$subcategoriesdata = $this->subcategoriesmodel->getAllSubcategories($id);
  //   	return $subcategoriesdata;
  //    }
  //    public function adCount($id)
  //    {
  //       return $this->adsmodel->getadscount($id);

  //    }
  //    public function getAllads()
	 // {
		// return $this->adsmodel->getAllRow();
	 // }
	 // public function getAlladsImages($id)
	 // {
		// return $this->adsimagesmodel->getimage($id);
	 // }
	 // public function latestads()
  //    {
  //   	return $this->adsmodel->getlatestads();
  //    }
  //    public function getimage($id)
	 // {
		// return $this->adsimagesmodel->getsingleimage($id);
	 // }
	 // public function userData($id)
	 // {
	 //   return $user_data = $this->usermodel->get_userdata($id);
	 // }
	 // public function mostpopularads()
	 // {
	 //  return $this->adsmodel->getpopularads(); 
	 // }
      public function userProfile()
	  {
		$id = $this->session->userdata('user_id');
		$data['user_data'] = $this->usermodel->get_userdata($id);
		$this->load->view('userprofile',$data);
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