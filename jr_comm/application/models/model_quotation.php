<?php

class Model_quotation extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}

        
        
        //saving the data from reachus form
        function save($data) {
		$this->db->set($data);
		$this->db->insert('quotations');
		$insertId=$this->db->insert_id();
		if($insertId>0)
		{
			return $insertId;
		}
		else{
			return false;
		}
			
	}
        
        
	public function fetchAllQuotations() {

		$this->db->select('*');
		$this->db->from('quotations');
                $this->db->where('quotation_pub_status','1');
		$this->db->order_by('quotation_created_at','DESC');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
			
	}        
	
        
}//end