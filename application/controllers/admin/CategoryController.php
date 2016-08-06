<?php
  class CategoryController extends CI_Controller 
  {
	   function __construct() 
	   { 
         	parent::__construct(); 
			$this->load->model('categoriesmodel');
			$this->load->model('statemodel');
			$this->load->library('form_validation');
			$this->load->helper('authenticate_helper');
			$this->load->library("pagination");
		 	if(is_logged_in() == "false" && $this->uri->segment(1) == "categories")
		 	{
		 		redirect("home");
		 	}
		 	
			
	   }
	   
	   public function index()
	   {
		   
	   	   $config = array();
           $config["base_url"] = base_url() . "category/index";
           $config["total_rows"] = $this->categoriesmodel->record_count();
           $config["per_page"] = 10;
           $config["uri_segment"] = 3;
           $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
		   $config['full_tag_close'] = '</ul>';
		   $config['prev_link'] = '&lt;';
		   $config['prev_tag_open'] = '<li>';
		   $config['prev_tag_close'] = '</li>';
		   $config['next_link'] = '&gt;';
		   $config['next_tag_open'] = '<li>';
		   $config['next_tag_close'] = '</li>';
		   $config['cur_tag_open'] = '<li class="current"><a href="#">';
		   $config['cur_tag_close'] = '</a></li>';
		   $config['num_tag_open'] = '<li>';
		   $config['num_tag_close'] = '</li>';
		   $config['first_tag_open'] = '<li>';
		   $config['first_tag_close'] = '</li>';
		   $config['last_tag_open'] = '<li>';
		   $config['last_tag_close'] = '</li>';
		   $config['first_link'] = '&lt;&lt;';
		   $config['last_link'] = '&gt;&gt;';
           $this->pagination->initialize($config);
		   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		   $data["result"] = $this->categoriesmodel->getAll($config["per_page"], $page);
           $data["links"] = $this->pagination->create_links();
		   $this->load->view('admin/includes/header');
		   $this->load->view('admin/categories/index',$data);
		   $this->load->view('admin/includes/footer');
	   }
	   
	   public function add()
	   {
		   $this->load->view('admin/includes/header');
		   $this->load->view('admin/categories/add');
		   $this->load->view('admin/includes/footer');
	   }
	   
	   public function insert()
	   {
           $data = array("name" => $this->input->post('name'));
		   $this->form_validation->set_rules("name", "Name", "trim|required|xss_clean|is_unique[categories.name]");

		 if($this->form_validation->run() == FALSE)
		 {
			
			$this->load->view('admin/includes/header');
			$this->load->view('admin/categories/add');
			$this->load->view('admin/includes/footer');		 
		 }
		 else
		 {
		   $getid = $this->categoriesmodel->add($data);

		   $data['result'] = $this->categoriesmodel->getAll(); 
           $this->load->view('admin/includes/header');
		   $this->load->view('admin/categories/index',$data);
		   $this->load->view('admin/includes/footer');
		}
	  }
	  
	  public function delete()
	  {
		  $id = $this->uri->segment(3);
		  $this->categoriesmodel->delete($id);
		  $data['result'] = $this->categoriesmodel->getAll();
		  $this->load->view('admin/includes/header');
		  $this->load->view('admin/categories/index',$data);
		  $this->load->view('admin/includes/footer');
	  }

	  public function update()
	  {
	  	$id = $this->uri->segment(3);
	  	$data['result'] = $this->categoriesmodel->getrow($id);
	  	$this->load->view('admin/includes/header');
		$this->load->view('admin/categories/update',$data);
		$this->load->view('admin/includes/footer');

	  }

	  public function updateinsert()
	  {

	  		$data = array("name" => $this->input->post('name'));
	  		$id = $this->input->post('categoriesid');
	  		
	  		$this->form_validation->set_rules("name", "Name", "trim|required");
	  		if($this->form_validation->run() == FALSE)
		    {
				
				$this->load->view('admin/includes/header');
				$this->load->view('admin/categories/update');
				$this->load->view('admin/includes/footer');		 
		    }
		    else
		    {
		    	
		    	$this->categoriesmodel->update($data , $id);
		    	$data['result'] = $this->categoriesmodel->getAll(); 
		    	$this->load->view('admin/includes/header');
		   		$this->load->view('admin/categories/index',$data);
		        $this->load->view('admin/includes/footer');	
		    }
	  		
	  }

	 

	  
  }

?>