<?php

class Model_login extends CI_Model {

    function _construct() {
// Call the Model constructor
        parent::_construct();
    }

	function admin_login($uname, $password) {
        

            $this->db->select('id,usr_uname,usr_pass,usr_level');
            $this->db->from('cms_users');
            $this->db->where("`usr_uname` = '" . $uname . "' AND  `usr_pass` = '" . $password . "' AND `usr_pub_status`='1' ORDER BY `usr_created_at` DESC");           
        
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }

    }

	function user_login($uname) {
        

            $this->db->select('id,usr_uname,usr_pass,usr_level');
            $this->db->from('cms_users');
            $this->db->where("`id` = '" . $uname . "' AND `usr_pub_status`='1' ORDER BY `usr_created_at` DESC");           
        
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }

    }
	
	
	function check_user($uname,$email) {
        $this->db->select('usr_uname');
        $this->db->from('cms_users');
        $this->db->where("usr_uname",$uname);
        $this->db->where("usr_email",$email);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return 1;
        } else {
            return 0;
        }
    }
	
	
	
	function update_user($uname,$email,$passwd){
	
	     $query=$this->db->query("UPDATE cms_users SET usr_pass='".$passwd."' WHERE id = '$email' and usr_uname='$uname'");
		if($query>0)
		{
			return true;
		}
		else{
			return false;
		}
	
	}
	
}//end