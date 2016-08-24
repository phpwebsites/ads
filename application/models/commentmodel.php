<?php
  class CommentModel extends CI_Model{
	  
	  function __construct()
	  {
			// Call the Model constructor
			parent::__construct();

	  }

	  public function commentinsert($data)
	  {
	  	 if ($this->db->insert("comments", $data)) 
	  	 { 
		   return true; 
		 } 
	  }

	 public function getcomments($limit, $start,$blogid)
	 {
	 	$this->db->where('blog_id',$blogid);
	 	$this->db->limit($limit, $start);
	 	$this->db->order_by('createdon', 'desc');
	 	$query = $this->db->get('comments');
	 	return $query->result();
	 }

	 //  public function getAll($limit, $start)
	 //  {
		// $this->db->limit($limit, $start);
  //      	$query = $this->db->get('blogs');
  //      	return $query->result();
	 //  }

	 public function record_count()
	 {
			return $this->db->count_all("comments");
	 }

	 public function commentcount($id)
	 {
	 	$result = $this->db->where('blog_id',$id)->count_all("comments");
	 	return $result;
	 }

 }

?>