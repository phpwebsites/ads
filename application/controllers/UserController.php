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

	  public function getCountry()
	{
		$result = $this->countrymodel->getAll();
		return $result;
	}
	  
	  public function logout()
	  {
		  $this->session->sess_destroy();
		  redirect("home/index");
	  }
	     
   }
?>