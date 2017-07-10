<?php

class Model_log extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}

	function insert_log_db($data){
		
		    $this->db->set($data);
			$this->db->insert('log');
			$insertId=$this->db->insert_id();
			if($insertId>0)
			{
				return $insertId;
			}
			else{
				return false;
			}
	}
	
	
	function getname($id){
		
		$this->db->select('*');
		$this->db->from('cms_users');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$res=$query->result_array();
		return $res;
	}
	
	function getsitename($siteid){
		
		$this->db->select('*');
		$this->db->from('sites');
		$this->db->where('id',$siteid);
		$query = $this->db->get();
		$res=$query->result_array();
		return $res;
	}
	
	function getDatesData(){	 
		 
		     
			$this->db->select('*');
			$this->db->from('log');
			
			$this->db->order_by('log_date','desc');
			
			$this->db->limit(20);
			$query = $this->db->get();
			$sresult = $query->result_array();
			
			return $sresult;
	   }
	   
	   function log_data(){	 
		 
		   
			$this->db->select('*');
			$this->db->from('log');
			
			$this->db->order_by('log_date','desc');
			$this->db->limit(20);
			$query = $this->db->get();
			$sresult = $query->result_array();
			
			return $sresult;
	   }
	
}//end