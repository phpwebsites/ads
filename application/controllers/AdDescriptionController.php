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
	   		$this->load->model('adsimagesmodel');
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

	   	public function getimage($adimageid)
	   	{
	   		$singleimage = $this->adsimagesmodel->getimage($adimageid);
	   		return $singleimage;
	   	}

	   	public function getAllAdimages($adimageid)
	   	{
	   		$data = $this->adsimagesmodel->getallimages($adimageid);
	   		return $data;
	   	}

	   	public function recentads($adsubid)
	   	{
	   		$recentaddata = $this->adsmodel->getrecentads($adsubid);
	   		return $recentaddata;
	   	}

	   	public function getsubimage()
	   	{
	   		$id = $this->uri->segment(2);
	   		$data['image_result'] = $this->adsimagesmodel->getsingleimage($id);
	   		$this->load->view('subimage',$data);
	   	}


   }
?>