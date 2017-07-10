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


}//end