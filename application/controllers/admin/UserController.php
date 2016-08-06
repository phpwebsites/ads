<?php
  class UserController extends CI_Controller 
  {
	  function __construct() 
	  { 
         parent::__construct(); 
         $this->load->helper('url');
         $this->load->library('form_validation');
		 $this->load->library('session');
		 $this->load->model('adminusermodel');
         
      }
	  
	  public function index()
	  {
	      $data['result'] = $this->adminusermodel->getAllAdminUsers();
	      $this->load->view('admin/includes/header');
		  $this->load->view('admin/users/index',$data);
		  $this->load->view('admin/includes/footer');
	  }
	  
	  public function add()
	  {

	  	 $this->load->view('admin/includes/header');
		 //$this->load->view('admin/users/index');
		 $this->load->view('admin/users/addadmin');
		 $this->load->view('admin/includes/footer');
	  }

	  public function insert()
	  {
	  	 $data = array('name' => $this->input->post('name'),'email' => $this->input->post('email'),'password' => base64_encode($this->input->post('password')),'role' => $this->input->post('role'),'phoneno' => $this->input->post('phonenumber'));
	  	 $this->form_validation->set_rules("name", "name", "trim|required");
		 $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|xss_clean|is_unique[users.email]");
         $this->form_validation->set_rules("password", "Password", "trim|required|matches[conformpassword]");
		 $this->form_validation->set_rules("conformpassword", "ConformPassword", "trim|required");
		 $this->form_validation->set_rules("phonenumber", "Phonenumber", "trim|required");
		 //$this->form_validation->set_rules("role", "Role", "trim|required");
		 if($this->form_validation->run() == FALSE)
		 {
			 $this->load->view('admin/includes/header');
		 	//$this->load->view('admin/users/index');
			 $this->load->view('admin/users/addadmin');
			 $this->load->view('admin/includes/footer'); 
		 }
		 else
	  	 {	
	  	 	$result = $this->adminusermodel->addadminuserdata($data);
	  	 	$this->session->set_flashdata('msg','Admin added sucessfully'); 
	  	 	redirect('admins');
	  	 }
	  }

	  public function updateform()
	  {
	  	$id = $this->uri->segment(3);
	  	$result['userdata'] = $this->adminusermodel->getSingleRecord($id);
	  	$this->load->view('admin/includes/header');
		$this->load->view('admin/users/updateadmin',$result);
		$this->load->view('admin/includes/footer'); 

	  }

	  public function updateinsert()
	  {
	  	$data = array('name' => $this->input->post('name'),'email' => $this->input->post('email'),'password' => base64_encode($this->input->post('password')),'role' => $this->input->post('role'),'phoneno' => $this->input->post('phonenumber'));
	  	 $this->form_validation->set_rules("name", "name", "trim|required");
		 $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|xss_clean|is_unique[users.email]");
         $this->form_validation->set_rules("password", "Password", "trim|required|matches[conformpassword]");
		 $this->form_validation->set_rules("conformpassword", "ConformPassword", "trim|required");
		 $this->form_validation->set_rules("phonenumber", "Phonenumber", "trim|required");
		 $this->form_validation->set_rules("role", "Role", "trim|required");
		 if($this->form_validation->run() == FALSE)
		 {
			 $this->load->view('admin/includes/header');
		 	//$this->load->view('admin/users/index');
			 $this->load->view('admin/users/updateadmin');
			 $this->load->view('admin/includes/footer'); 
		 }
		 else
	  	 {	
	  	 	$id = $this->input->post('user_id');
	  	 	$result = $this->adminusermodel->updateadminuserdata($data,$id);
	  	 	$this->session->set_flashdata('msg','Admin updated sucessfully'); 
	  	 	redirect('admins');
	  	 }
	  }

	  public function registerdusers()
	  {

	  		 $result['registeruser'] = $this->adminusermodel->getregisteruser();
	  		 $this->load->view('admin/includes/header');
		     $this->load->view('admin/users/registerusers',$result);
		     $this->load->view('admin/includes/footer');
	  }

	  public function deleteuser()
	  {
	  	$id = $this->uri->segment(3);
	  	$this->adminusermodel->deleterecord($id);
	  	$this->session->set_flashdata('msg','Admin deleted sucessfully'); 
	  	redirect('admins');
	  }

	  public function deleteregisteruser()
	  {
	  	$id = $this->uri->segment(3);
	  	$this->adminusermodel->deleterecord($id);
	  	$this->session->set_flashdata('msg','user deleted sucessfully'); 
	  	redirect('admin/registerusers');
	  }

	  
  }
?>