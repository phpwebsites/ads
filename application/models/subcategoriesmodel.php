<?php
  class SubCategoriesModel extends CI_Model{
	  
	  function __construct()
	  {
			// Call the Model constructor
			parent::__construct();

	  }
		
	  public function add($data)
	  {
		 if ($this->db->insert("subcategories", $data)) { 
		     return true; 
		 } 
	  }
		
	 //  public function getAll()
	 //  {
		// //$query = $this->db->get('subcategories');
		// //return $query->result();
		// $this->db->from('subcategories');
  //       $this->db->order_by("categories_id", "asc");
  //       $query = $this->db->get(); 
  //       return $query->result();
	 //  }

	    public function getAll($limit, $start)
	    {
			$this->db->limit($limit, $start);
       		$query = $this->db->get("subcategories");
       		return $query->result();
	        
	    }
		
	    public function update($data , $id)
	    {
	       $this->db->where('id', $id);
		   $result = $this->db->update('subcategories', $data);
		   return $result; 
			
		}

		public function getrow($id)
		{
		   $this->db->where('id', $id);
           $query = $this->db->get('subcategories'); //get all data from user_profiles table that belong to the respective user
           return $query->row(); //return the data 
		
		}
		
		public function delete($id)
		{
			$this -> db -> where('id', $id);
  		    $this -> db -> delete('subcategories');
		}

		public function getAllSubcategories($id)
		{
            $this->db-> where('categories_id',$id);
            $this->db->limit(5);
            $query = $this->db->get('subcategories');
			return $query->result(); 
		}

		public function getSubcategories($id)
		{
            $this->db-> where('categories_id',$id);
            $query = $this->db->get('subcategories');
			return $query->result(); 
		}

		public function record_count()
		{
			return $this->db->count_all("subcategories");
		}

		
		
		
		
		
  }
?>