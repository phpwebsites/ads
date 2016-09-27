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
          
           $config['upload_path']   = './uploads/category/'; 
	       $config['allowed_types'] = 'gif|jpg|png'; 
	       $config['max_size']      = ''; 
	       $config['max_width']     = ''; 
	       $config['max_height']    = '';  
		   $config['overwrite'] = TRUE;
	       $config['remove_spaces'] = TRUE;
	         $this->load->library('upload', $config);
		   $this->form_validation->set_rules("name", "Name", "trim|required|xss_clean|is_unique[categories.name]");
		   $this->form_validation->set_rules('image', 'Image', 'callback_file_selected_test');

		 if($this->form_validation->run() == FALSE)
		 {
			
			$this->load->view('admin/includes/header');
			$this->load->view('admin/categories/add');
			$this->load->view('admin/includes/footer');		 
		 }
		 else
		 {
		 	if ($this->upload->do_upload('image'))
	             {
					 $image_data= $this->upload->data();
					 $data = array("name" => $this->input->post('name'),"image" => $image_data['file_name']);
					if($this->categoriesmodel->add($data))
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
			    	
			    }
				else
				{
					 $error = array('error' => $this->upload->display_errors());
					 $this->load->view('admin/blog/add', $error);
				}
		   // $getid = $this->categoriesmodel->add($data);

		   
		}
	  }
	  
	  public function delete()
	  {
		  $id = $this->uri->segment(2);
		  $this->categoriesmodel->delete($id);
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

            $config['upload_path']   = './uploads/category/'; 
	        $config['allowed_types'] = 'gif|jpg|png'; 
	        $config['max_size']      = ''; 
	        $config['max_width']     = ''; 
	        $config['max_height']    = '';  
		    $config['overwrite'] = TRUE;
	        $config['remove_spaces'] = TRUE;
	        $this->load->library('upload', $config);
	        $this->form_validation->set_rules("name", "Name", "required");
		    $this->form_validation->set_rules('image', 'Image', 'callback_file_selected_test');
	  		$id = $this->input->post('categoriesid');
	  		if($this->form_validation->run() == FALSE)
		    {
				$data['result'] = $this->categoriesmodel->getrow($id);
				$this->load->view('admin/includes/header');
				$this->load->view('admin/categories/update',$data);
				$this->load->view('admin/includes/footer');		 
		    }
		    else
		    {
		    	if ($this->upload->do_upload('image'))
	            {
	            	$image_data = $this->upload->data();
	            	$data = array('name' => $this->input->post('name') ,'image' => $image_data['file_name']);
			    	$this->categoriesmodel->update($data , $id);
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
			      else
				  {
					 $error = array('error' => $this->upload->display_errors());
					 
					 $this->load->view('admin/blog/add', $error);
				  }
		    }
	  		
	  }

	  // ############## Call Back Start ###################
  public function file_selected_test()
  {
      // echo array_sum($_FILES['image']['name']); exit;
      $errors = $_FILES['image']['name'];
      $this->form_validation->set_message('file_selected_test', 'Please upload image');
      if (!empty($errors)) 
      {
        return true;
      }
      else
      {
        return false;
      }
  }

	 

	  
  }

?>