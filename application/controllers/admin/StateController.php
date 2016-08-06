<?php
  class StateController extends CI_Controller 
  {
	   function __construct() 
	   { 
         	parent::__construct(); 
			$this->load->model('statemodel');
			$this->load->model('countrymodel');
			$this->load->model('citymodel');
			$this->load->library('form_validation');
			$this->load->helper('authenticate_helper');
		 	if(is_logged_in() == "false" && $this->uri->segment(1) == "state")
		 	{
		 	
		 		redirect("home");
		 	}
			
	   }
	   
	   public function index()
	   {
		   $data['result'] = $this->statemodel->getAll();
		   $this->load->view('admin/includes/header');
		   $this->load->view('admin/state/index', $data);
		   $this->load->view('admin/includes/footer');
	   }
	   
	   public function add()
	   {
		   $this->load->view('admin/includes/header');
		   $this->load->view('admin/state/add');
		   $this->load->view('admin/includes/footer');
	   }
	   
	   public function insert()
	   {
           $data = array("name" => $this->input->post('name'),"country_id" => $this->input->post('country_id'));
		   $this->form_validation->set_rules("name", "Name", "trim|required|xss_clean|is_unique[state.name]");
		   $this->form_validation->set_rules("country_id", "Country", "trim|required");
		 if($this->form_validation->run() == FALSE)
		 {
			
			$this->load->view('admin/includes/header');
			$this->load->view('admin/state/add');
			$this->load->view('admin/includes/footer');		 
		 }
		 else
		 {
		   $getid = $this->statemodel->add($data);

		   $data['result'] = $this->statemodel->getAll(); 
           $this->load->view('admin/includes/header');
		   $this->load->view('admin/state/index',$data);
		   $this->load->view('admin/includes/footer');
		}
	  }
	  
	  public function delete()
	  {
		  $id = $this->uri->segment(3);
		  $this->statemodel->delete($id);
		  $data['result'] = $this->statemodel->getAll();
		  $this->load->view('admin/includes/header');
		  $this->load->view('admin/state/index',$data);
		  $this->load->view('admin/includes/footer');
	  }

	  public function update()
	  {
	  	$id = $this->uri->segment(3);
	  	$data['result'] = $this->statemodel->getrow($id);
	  	$this->load->view('admin/includes/header');
		$this->load->view('admin/state/update',$data);
		$this->load->view('admin/includes/footer');

	  }

	  public function updateinsert()
	  {

	  		$data = array("name" => $this->input->post('name'),"country_id" => $this->input->post('country_id'));
	  		$id = $this->input->post('countryid');
	  		
	  		$this->form_validation->set_rules("name", "Name", "trim|required");
	  		if($this->form_validation->run() == FALSE)
		    {
				
				$this->load->view('admin/includes/header');
				$this->load->view('admin/state/update');
				$this->load->view('admin/includes/footer');		 
		    }
		    else
		    {
		    	
		    	$this->statemodel->update($data , $id);
		    	$data['result'] = $this->statemodel->getAll(); 
		    	
	  			$this->load->view('admin/includes/header');
		   		$this->load->view('admin/state/index',$data);
		        $this->load->view('admin/includes/footer');	
		    }
	  		
	  }

	  public function getallcountries()
	  {
	  	 $countrydata = $this->countrymodel->getAll();
	  	 return $countrydata;
	  }

	  public function getcities()
	  {
	  	 $id = $this->uri->segment(3);
		 $data['cites'] =$this->citymodel->getAllCites($id);
	  	 $this->load->view('admin/state/getcities',$data);
	  }

	  
	  
  }

?>