<?php
   class AdDescriptionController extends CI_Controller
   {
	   	function __construct() 
	   	{ 
	   		parent::__construct(); 
	   		$this->load->model('adsmodel');
	   		$this->load->model('usermodel');
	   		$this->load->model('countrymodel');
	   		$this->load->model('statemodel');
	   		$this->load->model('citymodel');
	   	}

	   	public function index()
	   	{
	   	   $id = $this->uri->segment(2);
	   	   $data['adresult'] = $this->adsmodel->getdescads($id);	
	   	   $this->load->view('addescription.php',$data);
	   	}

	   	public function getuser($id)
	   	{
	   		$data = $this->usermodel->get_userdata($id);
	   		return $data;
	   	}

	   	public function getcountry($cid)
	   	{
	   		$data = $this->countrymodel->getrow($cid);
	   		return $data;
	   	}

	   	public function getstate($sid)
	   	{	
	   		$data = $this->statemodel->getrow($sid);
	   		return $data;

	   	}

	   	public function getcity($ciid)
	   	{
	   		$data = $this->citymodel->getrow($ciid);
	   		return $data;
	   		
	   	}


   }
?>