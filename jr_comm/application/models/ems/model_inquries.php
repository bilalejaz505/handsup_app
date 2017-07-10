<?php

class Model_inquries extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}

	function save($data) {
		$this->db->set($data);
		$this->db->insert('inquries');
		$insertId=$this->db->insert_id();
		if($insertId>0)
		{
			return $insertId;
		}
		else{
			return false;
		}
			
	}


	public function fetchAll() {

		$this->db->select('*');
		$this->db->from('inquries');
                $this->db->order_by('id','DESC');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
			
	}
	public function fetchAllQuotes() {

	  $this->db->select('*');
	  $this->db->from('quote_requests');
	  $this->db->order_by('id','DESC');
	  $query = $this->db->get();
	  if ($query->num_rows() >0) {
	   return $query->result_array();
	  } else {
	   return false;
	  }

 }
 
	
	 public function fetchQuote($id){

  $this->db->select('*');
  $this->db->from('quote_requests');
  $this->db->where('id',$id);
  $query = $this->db->get();
  if ($query->num_rows()==1) {
   $result = $query->row();
  } else {
   $result = false;
  }

  return $result;
 }
 
 public function deleteQuote($id){

  $query=$this->db->query("delete from quote_requests WHERE id =".$id);
  if ($query) {
   return true;
  } else {
   return false;
  }

 }

	public function fetchRow($id){
			
		$this->db->select('*');
		$this->db->from('inquries');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			$result = $query->row();
		} else {
			$result = false;
		}
                
                return $result;
	}


	public function delete($id){
			
		$query=$this->db->query("delete from inquries WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
	

	

	public function publishStatus($val,$id){
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("update inquries set inq_pub_status='".$val."',inq_updated_at='".date('Y-m-d H:i:s')."',inq_updated_by='".$loggedInUserId."' WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
}//end