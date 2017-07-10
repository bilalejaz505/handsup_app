<?php

class Model_clientmenus extends CI_Model {

    function _construct() {
        // Call the Model constructor
        parent::_construct();
    }

    function update($data, $id) {
        $loggedInUserId = $this->session->userdata('id');
        $query = $this->db->query("UPDATE clientmenus SET Title_en='" . $data['Title_en'] . "',Title_ar='" . $data['Title_ar'] . "',menu_updated_at='" . date('Y-m-d H:i:s') . "',menu_updated_by='" . $loggedInUserId . "' WHERE MenuID = '$id'");
        if ($query > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function publishStatus($val, $id) {
        $loggedInUserId = $this->session->userdata('id');
        $query = $this->db->query("update clientmenus set menu_pub_status='" . $val . "',menu_updated_at='" . date('Y-m-d H:i:s') . "',menu_updated_by='" . $loggedInUserId . "' WHERE MenuID =" . $id);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchAll() {

        $this->db->select('*');
        $this->db->from('clientmenus');

        //$this->db->limit (1);
        $query = $this->db->get();
        $result = $query->result_array();

        if (!empty($result)) {
            return $result;
        } else {
            return false;
        }
    }

    public function fetchChildmenu($id) {
        $query = $this->db->get_where("clientmenus", array("ParentID" => $id));
        
        if ($query->num_rows() > 0) {
        	
        	$menus = array();
        	foreach($query->result_array() as $row)
        	{
				$menus[$row['MenuID']] = $row;
			}
            return $menus;
        } else {
            return false;
        }
    }
    
    public function fetchChildmenuofParent($childID) {
    	
    	$query = $this->db->get_where("clientmenus", array("MenuID" => $childID));
    	$row = $query->row_array();
    	$id = $row['ParentID'];
        $query = $this->db->get_where("clientmenus", array("ParentID" => $id));
        
        if ($query->num_rows() > 0) {
        	
        	$menus = array();
        	foreach($query->result_array() as $row)
        	{
				$menus[$row['MenuID']] = $row;
			}
            return $menus;
        } else {
            return false;
        }
    }
	
	
	

}

//end