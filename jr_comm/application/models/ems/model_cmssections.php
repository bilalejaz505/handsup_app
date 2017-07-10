<?php

class Model_cmssections extends CI_Model {

    function _construct() {
// Call the Model constructor
        parent::_construct();
    }

	
		function add_user_rec($data){
			//debug($data);
			$this->db->set($data);
			$this->db->insert('sections');
			$insertId=$this->db->insert_id();
			if($insertId>0)
			{
				return $insertId;
			}
			else{
				return false;
			}
		}


        
		
		function insert_grp_rights($data){
			//debug($data);
			$this->db->set($data);
			$this->db->insert('sections');
			$insertId=$this->db->insert_id();
			if($insertId>0)
			{
				return true;
			}
			else{
				return false;
			}
		}
		
	    //This function reterive the list of
		//websites from db and pass them to view  
		function getContollerList($controller) {
		$this->db->select('*');
        $this->db->from('sections');
        $this->db->where('controller_name', $controller);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }	
    }
	
}//end