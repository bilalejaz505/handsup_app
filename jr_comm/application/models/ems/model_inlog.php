<?php

class Model_Inlog extends CI_Model {

function log_data($siteid){	 
		 
		    $uid=$this->session->userdata('id');
			$this->db->select('*');
			$this->db->from('log');
			$this->db->where('site_id',$siteid);
			$this->db->where('user_id',$uid);
			$this->db->order_by('log_date','desc');
			$this->db->limit(20);
			$query = $this->db->get();
			$sresult = $query->result_array();
			
			return $sresult;
	   }
	
}//end