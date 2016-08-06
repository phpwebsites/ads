<?php
  class SubCategoryController extends CI_Controller 
  {
	   function __construct() 
	   { 
         	parent::__construct(); 
         	$this->load->model("categoriesmodel");
			$this->load->model('subcategoriesmodel');
			$this->load->library('form_validation');
			$this->load->helper('authenticate_helper');
			$this->load->library("pagination");
		 	if(is_logged_in() == "false" && $this->uri->segment(1) == "subcategories")
		 	{
		 		redirect("home");
		 	}
		 	
			
	   }
	   
	   public function index()
	   {

	   	   $config = array();
           $config["base_url"] = base_url() . "subcategory/index";
           $config["total_rows"] = $this->subcategoriesmodel->record_count();
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
           $data["result"] = $this->subcategoriesmodel->getAll($config["per_page"], $page);
           $data["links"] = $this->pagination->create_links();
		   $this->load->view('admin/includes/header');
		   $this->load->view('admin/subcategories/index',$data);
		   $this->load->view('admin/includes/footer');
	   }
	   
	   public function add()
	   {   
	   	   $data['categories'] = $this->categoriesmodel->getAllcategories();
		   $this->load->view('admin/includes/header');
		   $this->load->view('admin/subcategories/add',$data);
		   $this->load->view('admin/includes/footer');
	   }
	   
	   public function insert()
	   {
           $data = array("categories_id" => $this->input->post('category'),"name" => $this->input->post('subcategory'));
		   $this->form_validation->set_rules("category", "Category", "trim|required|xss_clean|is_unique[subcategories.name]");
		   $this->form_validation->set_rules("subcategory", "SubCategory", "trim|required|xss_clean|is_unique[subcategories.name]");

		 if($this->form_validation->run() == FALSE)
		 {
			$data['categories'] = $this->categoriesmodel->getAll();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/subcategories/add',$data);
			$this->load->view('admin/includes/footer');		 
		 }
		 else
		 {
		   $getid = $this->subcategoriesmodel->add($data);
		   $data['result'] = $this->subcategoriesmodel->getAll(); 
           $this->load->view('admin/includes/header');
		   $this->load->view('admin/subcategories/index',$data);
		   $this->load->view('admin/includes/footer');
		}
	  }
	  
	  public function delete()
	  {
		  $id = $this->uri->segment(3);
		  $this->subcategoriesmodel->delete($id);
		  $data['result'] = $this->subcategoriesmodel->getAll();
		  $this->load->view('admin/includes/header');
		  $this->load->view('admin/subcategories/index',$data);
		  $this->load->view('admin/includes/footer');
	  }

	  public function update()
	  {
	  	$id = $this->uri->segment(3);
	  	$data['categories'] = $this->categoriesmodel->getAll();
	  	$data['result'] = $this->subcategoriesmodel->getrow($id);
	  	$this->load->view('admin/includes/header');
		$this->load->view('admin/subcategories/update',$data);
		$this->load->view('admin/includes/footer');

	  }

	  public function updateinsert()
	  {

	  		$data = array("name" => $this->input->post('name'),"categories_id" => $this->input->post('category'));
	  		$id = $this->input->post('subcatid');
	  		
	  		$this->form_validation->set_rules("name", "Name", "trim|required");
	  		if($this->form_validation->run() == FALSE)
		    {
				
				$this->load->view('admin/includes/header');
				$this->load->view('admin/subcategories/update');
				$this->load->view('admin/includes/footer');		 
		    }
		    else
		    {
		    	
		    	$this->subcategoriesmodel->update($data , $id);
		    	$data['result'] = $this->subcategoriesmodel->getAll(); 
		    	$this->load->view('admin/includes/header');
		   		$this->load->view('admin/subcategories/index',$data);
		        $this->load->view('admin/includes/footer');	
		    }
	  		
	  }

	  public function categoryname($id)
	  {
	  	 $name = $this->categoriesmodel->getname($id);
	  	 return $name;
	  }

	 

	  
  }

?>