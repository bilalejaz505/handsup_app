<?php

class Model_menu extends CI_Model {

    function _construct() {
        // Call the Model constructor
        parent::_construct();
    }

    function save($data) {
        $this->db->set($data);
        $this->db->insert('menus');
        $insertId = $this->db->insert_id();
        if ($insertId > 0) {
            return $insertId;
        } else {
            return false;
        }
    }

    function update($data, $id) {
        $this->db->where('id', $id);
        $query = $this->db->update('menus', $data);
        return ($query>0)?true:false;
    }


    public function fetchAll() {

        $this->db->select('*');
        $this->db->from('menus');
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	 
	public function fetchMenuPages($menu_id) {

        $this->db->select('*');
        $this->db->from('clientmenus');
		$this->db->join('contents', 'contents.id = clientmenus.page_id');
		$this->db->where('contents.type','page');
		$this->db->where('contents.version','0');
		$this->db->where('menu_id',$menu_id);
		$this->db->order_by('position',  'ASC');
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    } 
	public function fetchMenuParrentPages($menu_id,$parrent_id) {

        $this->db->select('*');
        $this->db->from('clientmenus');
		$this->db->where('menu_id',$menu_id);
		$this->db->where('parent_id',$parrent_id);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    } 
	    

    public function fetchRow($id) {

        $this->db->select('*');
        $this->db->from('menus');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
 
    public function getParantId($id) {

        $this->db->select('*');
        $this->db->from('clientmenus');
        $this->db->where('page_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
           return $query->row()->parent_id;
			
        } else {
            return false;
        }
    }
   public function pageTitle($id,$lang='eng') {

        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
			if($lang == 'eng'){
               return $query->row()->eng_title;
			}else{
				 return $query->row()->arb_title;
				}
        } else {
            return false;
        }
    }
	public function pageSubTitle($id,$lang='eng') {

        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
			if($lang == 'eng'){
               return $query->row()->eng_sub_title;
			}else{
				 return $query->row()->arb_sub_title;
				}
        } else {
            return false;
        }
    }
	 public function pageTitleArb($id) {

        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
           return $query->row()->arb_title;
			
        } else {
            return false;
        }
    }
	  public function maxPosition() {

        $this->db->select_max('position');
        $this->db->from('clientmenus');
       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           $result = $query->result();
			return $result[0]->position;
        } else {
            return false;
        }
    }


    public function delete($id) {

        $query = $this->db->query("delete from menus WHERE id =" . $id);
		
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

      public function delete_menu($id) {

        $query = $this->db->query("delete from clientmenus WHERE menu_id =" . $id);
		
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
   

    public function publishStatus($val, $id) {
        $loggedInUserId = $this->session->userdata('id');
        $query = $this->db->query("update menus set pub_status='" . $val . "',menu_updated_at='" . date('Y-m-d H:i:s') . "',menu_updated_by='" . $loggedInUserId . "' WHERE id =" . $id);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
 
     function saveMenuPage($data) {
        $this->db->set($data);
        $this->db->insert('clientmenus');
        $insertId = $this->db->insert_id();
        if ($insertId > 0) {
            return $insertId;
        } else {
            return false;
        }
    }
	
	   public function deleteSaveMenu($menu_id) {

        $query = $this->db->query("delete from clientmenus WHERE menu_id =" . $menu_id);
		
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
	  public function deleteSaveMenuSinglePage($menu_id,$page_id) {

        $query = $this->db->query("delete from clientmenus WHERE page_id = ".$page_id." && menu_id =" . $menu_id);
		
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
   public function childMenu($parent_id) {

        $this->db->select('clientmenus.id, clientmenus.parent_id,contents.id,contents.eng_title,contents.arb_title');
		$this->db->from('clientmenus');
        $this->db->join('contents', 'contents.id = clientmenus.page_id');
		$this->db->where('contents.type','page');
		$this->db->where('clientmenus.menu_pub_status', 1);
		$this->db->where('clientmenus.parent_id', $parent_id);
		
		$this->db->order_by("clientmenus.parent_id,clientmenus.position");
          
        //$this->db->limit (1);
        $query = $this->db->get();
		    
        $result = $query->result_array();
			
        if (!empty($result)) {
			
            return $result;
        } else {
            return false;
        }
    }
  public function header_menu($parent_id = NULL, $menu_id = 1) {

        $this->db->select('clientmenus.id, clientmenus.parent_id,contents.id,contents.eng_title,contents.arb_title');
		$this->db->from('clientmenus');
        $this->db->join('contents', 'contents.id = clientmenus.page_id');
		$this->db->where('clientmenus.menu_id', $menu_id);
		$this->db->where('contents.type','page');
		$this->db->where('clientmenus.menu_pub_status', 1);
		if(isset($parent_id) and !empty($parent_id)){
		$this->db->where('clientmenus.parent_id', $parent_id);
		}
		$this->db->order_by("clientmenus.parent_id,clientmenus.position");
          
        //$this->db->limit (1);
        $query = $this->db->get();
		    
        $result = $query->result_array();
			
        if (!empty($result)) {
			
            return $result;
        } else {
            return false;
        }
    }

}

//end