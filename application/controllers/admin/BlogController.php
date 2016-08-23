<?php
  class BlogController extends CI_Controller 
  {
	   function __construct() 
	   { 
         	parent::__construct(); 
			$this->load->model('blogmodel');
			$this->load->model('statemodel');
			$this->load->library('form_validation');
			$this->load->helper('authenticate_helper');
		 	if(is_logged_in() == "false" && $this->uri->segment(1) == "country")
		 	{
		 	
		 		redirect("home");
		 	}
		 	
			
	   }

	   public function show()
	   {
	   	  $data['blogresult'] = $this->blogmodel->getAll();
  	   	  $this->load->view('admin/includes/header');
		  $this->load->view('admin/blog/show',$data);
		  $this->load->view('admin/includes/footer');
	   }

	   public function add()
	   {
	   	 $this->load->view('admin/includes/header');
		 $this->load->view('admin/blog/add');
		 $this->load->view('admin/includes/footer');
	   }

	   public function insert()
	   {
		   	 $config['upload_path']   = './uploads/blog/'; 
	         $config['allowed_types'] = 'gif|jpg|png'; 
	         $config['max_size']      = ''; 
	         $config['max_width']     = ''; 
	         $config['max_height']    = '';  
			 $config['overwrite'] = TRUE;
	         $config['remove_spaces'] = TRUE;
	         $this->load->library('upload', $config);
	         $this->form_validation->set_rules("title", "Title", "trim|required");
	         $this->form_validation->set_rules("description", "Description", "trim|required");
	         
	         $this->form_validation->set_rules('blogimage', 'Blogimage', 'callback_file_selected_test');
	         //echo $this->form_validation->run(); exit;
	         if($this->form_validation->run() == FALSE)
		     {
		     	 $this->load->view('admin/includes/header');
		     	 $this->load->view('admin/blog/add');
		     	 $this->load->view('admin/includes/footer');
		         
			}
			else
			{
				if ($this->upload->do_upload('blogimage'))
	             {
					 $image_data= $this->upload->data();
					 $data= array('title' => $this->input->post('title'),'description' => $this->input->post('description'),'image' => $image_data['file_name']);
					 if($this->blogmodel->add($data))
					 {
						 $this->session->set_flashdata('msg',"Your data inserted sucessfully");
	     				 redirect('blog/show');
					 }
			    	
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
      $errors = $_FILES['blogimage']['name'];
      $this->form_validation->set_message('file_selected_test', 'Please upload your blog image');
      if (!empty($errors)) 
      {
        return true;
      }
      else
      {
        return false;
      }
  }

  public function edit()
  {

  	 $id = $this->uri->segment(3); 
  	 $editdata['editblogdata'] = $this->blogmodel->getrow($id);
  	 $this->load->view('admin/includes/header');
  	 $this->load->view('admin/blog/update',$editdata);
  	 $this->load->view('admin/includes/footer');
  	
  }

  public function updatecreate()
  {
  	 $config['upload_path']   = './uploads/blog/'; 
	 $config['allowed_types'] = 'gif|jpg|png'; 
	 $config['max_size']      = ''; 
	 $config['max_width']     = ''; 
	 $config['max_height']    = '';  
     $config['overwrite'] = TRUE;
	 $config['remove_spaces'] = TRUE;
	 $this->load->library('upload', $config);
	 $this->form_validation->set_rules("title", "Title", "trim|required");
	 $this->form_validation->set_rules("description", "Description", "trim|required");
	 $this->form_validation->set_rules('blogimage', 'Blogimage', 'callback_file_selected_test');
	 if($this->form_validation->run() == FALSE)
     {
		$this->load->view('admin/includes/header');
		$this->load->view('admin/blog/add');
		$this->load->view('admin/includes/footer');    	
		         
	 }
	 else
	 {
	    if ($this->upload->do_upload('blogimage'))
	    {
					 $image_data= $this->upload->data();
					 $data= array('title' => $this->input->post('title'),'description' => $this->input->post('description'),'image' => $image_data['file_name']);
					 $id = $this->input->post('blogid');
					 if($this->blogmodel->update($data,$id))
					 {
						 $this->session->set_flashdata('msg',"Your data updated sucessfully");
	     				 redirect('blog/show');
					 }
			    	
		}
		else
		{
					 $error = array('error' => $this->upload->display_errors());
					 $this->load->view('admin/blog/add', $error);
		}
				
	  }
  }

  public function delete()
  {
  	$id = $this->uri->segment(3);
  	$this->blogmodel->delete($id);
  	$this->session->set_flashdata('msg',"One record deleted sucessfully");
	redirect('blog/show');
  }


 }

?>