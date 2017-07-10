<?php

class Model_clientmenus extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}
	public function fetchAll(){
			
		$this->db->select('*');
		$this->db->from('clientmenus_labels');
		$this->db->where('menu_pub_status', 1);  
		//$this->db->limit (1);
	 	$query = $this->db->get();
		$result = $query->result_array();
		
		if(!empty($result)){
			return $result;
		}
		else{
			return false;
		}
	}
        
	public function fetchRow($id){
			
		$this->db->select('*');
		$this->db->from('clientmenus_labels');
		$this->db->where('MenuID',$id);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
	}        


}//end