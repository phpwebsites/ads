<?php
  class CategoriesModel extends CI_Model{
	  
	  function __construct()
	  {
			// Call the Model constructor
			parent::__construct();

	  }
		
	  public function add($data)
	  {
		 if ($this->db->insert("categories", $data)) { 
		   return true; 
		 } 
	  }

	   public function getAllcategories()
	   {
			//$this->db->limit(5);
       		$query = $this->db->get('categories');
       		return $query->result();
	   }

        public function getAll($limit, $start)
	    {
			$this->db->limit($limit, $start);
       		$query = $this->db->get('categories');
       		return $query->result();
	    }
		
	    public function update($data , $id)
	    {
	       $this->db->where('id', $id);
		   $result = $this->db->update('categories', $data);
		   return $result; 
			
		}

		public function getrow($id)
		{
		   $this->db->where('id', $id);
           $query = $this->db->get('categories'); //get all data from user_profiles table that belong to the respective user
           return $query->row(); //return the data 
		
		}

		public function getname($id)
		{
		   $this->db->where('id', $id);
           $query = $this->db->get('categories'); //get all data from user_profiles table that belong to the respective user
           $row = $query->row();
           return $row->name;//return the data 
		
		}

		public function delete($id)
		{
			$this -> db -> where('id', $id);
  		    $this -> db -> delete('categories');
		}

		public function record_count()
	    {

	  	   return $this->db->count_all("categories");

	    }
		
		
		
		
  }
?>