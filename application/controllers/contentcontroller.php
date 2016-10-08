<?php
  class ContentController extends CI_Controller
 {
 	
 	function __construct() 
   	{ 
            parent::__construct(); 
            $this->load->model('blogmodel');
            $this->load->model('commentmodel');
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->helper('form'); 
            $this->load->library("pagination");
            $this->load->helper('text');
            $this->load->library('email');
            // $this->load->library('encryption');
            // $this->load->library('bcrypt');

   }

 	public function contactus()
 	{
 		$this->load->view('contactus');
 	}

 	public function blog()
 	{
 		   $config = array();
           $config["base_url"] = base_url() . "blog";
           $config["total_rows"] = $this->blogmodel->record_count();
           $config["per_page"] = 3;
           $config["uri_segment"] = 2;
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
		   $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		   // echo $page; 
           $data["blogresult"] = $this->blogmodel->getAll($config["per_page"], $page);
           //print_r($data);exit;
           $data["links"] = $this->pagination->create_links();
  	   	   $this->load->view('blog',$data);
 	}

 	public function blogdesc()
 	{
 		$id = $this->uri->segment(2);
 		$data['blogdesc'] = $this->blogmodel->getrow($id);
 		$this->load->view('blogdesc',$data);
 	}

 	public function commentcreate()
 	{
 		$data =array('commentdesc' => $this->input->post('desc'),'blog_id' => $this->input->post('blog_id'));
 		$this->commentmodel->commentinsert($data);
 		redirect('blogdesc/'.$this->input->post('blog_id'));
 	}

 	public function getAllComents($id)
 	{
 		   $config = array();
           $config["base_url"] = base_url() . "blogdesc/".$id."/";
           $config["total_rows"] = $this->commentmodel->record_count();
           $config["per_page"] = 3;
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
		   $page = ($this->uri->segment(2)) ? $this->uri->segment(3) : 0;
           //print_r($data);exit;
           $data = $this->pagination->create_links();
           $result = $this->commentmodel->getcomments($config["per_page"], $page,$id);
           // echo $data;
  		   // echo $page; 
		   // $this->load->view("blogdesc/".$id,$data);
		   $commentdata = array(
    		 'pagination' => $data,
   			 'comments' => $result
           );
		   return $commentdata;

 		   //return $this->commentmodel->getcomments($id);
 	}

 	public function commentcount($blogid)
 	{
 		return $this->commentmodel->commentcount($blogid);
 	}

  



   

}

  

?>