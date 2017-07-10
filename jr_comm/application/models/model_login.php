<?php

class Model_login extends CI_Model {

    function _construct() {
// Call the Model constructor
        parent::_construct();
    }

	function login($email, $password) {
        
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where("`email` = '" . $email . "' AND  `password` = '" . $password . "'");
          	$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}

    }
	
	public function new_password($data, $email)
 {
	 
				$this->db->where('email', $email);
				$this->db->update('users', $data);
				if ($this->db->affected_rows() > 0) {
				return $this->db->affected_rows();
				} else {
				return false;
				}
        
 }
 
     function check_password($email){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {

            return false;
        }
    }

	
}//end