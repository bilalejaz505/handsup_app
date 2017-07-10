<?php

class My_model extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}


	//saving the data from reachus form
	public function save($data) {
		$this->db->set($data);
		$this->db->insert('users');
		$insertId = $this->db->insert_id();
		if($insertId > 0)
		{
			return $insertId;
		}
		else{
			return false;
		}

	}

	public function fetch_data()
	{
		$this->db->select('*');
		$this->db->from('users');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function fetchAllrows() {
		$this->db->select('*');
		$this->db->from('contact_us');
		$this->db->where('cont_pub_status',1);		
		$this->db->order_by('sort_col','ASC');		
		$query = $this->db->get();
		if ($query->num_rows() >0) {
                    return $query->result_array();
		} else {
			return false;
		}
			
	}
        public function fetchSubject() {
		$this->db->select('*');
		$this->db->from('email_subjects');
		$this->db->where('sub_pub_status',1);		
		$this->db->order_by('id','ASC');		
		$query = $this->db->get();
		if ($query->num_rows() >0) {
                    return $query->result_array();
		} else {
			return false;
		}
			
	}

	 public function backgroundImage($page_title){
		$this->db->select('*');
		$this->db->from('background_images');
		$this->db->like('page_title',$page_title);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}	
	}
	
        
}//end