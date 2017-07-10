<?php

class Model_contents extends CI_Model {

    function _construct() {
        // Call the Model constructor
        parent::_construct();
    }

    function save($data) {
        $this->db->set($data);
        $this->db->insert('contents');
        $insertId = $this->db->insert_id();
        if ($insertId > 0) {
            return $insertId;
        } else {
            return false;
        }
    }
	
	
	function saveUserDataForCars($data) {
        $this->db->set($data);
        $this->db->insert('users');
        $insertId = $this->db->insert_id();
        if ($insertId > 0) {
            return $insertId;
        } else {
            return false;
        }
    }
	
	
	 function save_content_detail($data) {
				 
        $this->db->set($data);
        $this->db->insert('content_detail');
        $insertId = $this->db->insert_id();
        if ($insertId > 0) {
            return $insertId;
        } else {
            return false;
        }
    }
	
	//$
	 public function getPageIdbyTemplate($page_title) {
        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where('type', 'page');
        $this->db->where('tpl', $page_title);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	//$

    function update($data, $id) {
        $this->db->where('id', $id);
        $query = $this->db->update('contents', $data);
        return ($query>0)?true:false;
    }
	
	public function front_end_content_by_template($template,$order_by='DESC') {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('tpl', $template);
		$this->db->where('version', 0);
		$this->db->where('pub_status', 1);
		$this->db->order_by('id',$order_by); 
		//$this->db->limit(1);   
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return  $query->result();
        } else {
            return false;
        }
    }
	function saveContactUs($data) { 
			$this->db->set($data);
			$this->db->insert('inquries');
			$insertId=$this->db->insert_id();
			if($insertId>0)  {   
			return $insertId;
			}  else{  
			return false;
			}    
		}
	
	function update_headings($data, $id) {
        $this->db->where('id', $id);
        $query = $this->db->update('client_slider', $data);
        return ($query>0)?true:false;
    }
	
	public function fetch_products_categories(){
		$this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('move_to_trash', 0);
		$this->db->where('tpl', 'products-page');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}
	public function getAllData($item_name = ''){
		$this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('move_to_trash', 0);
		//$this->db->where('tpl', 'product');
		$this->db->where('pub_status', '1');
		if($item_name != ''){
			if($this->session->userdata('lang') == 'eng'){
				$this->db->like('eng_title',$item_name);
			}else{
				$this->db->like('arb_title',$item_name);
			}
			
			
		
			
		}
        $query = $this->db->get();
		
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}
	
	function SaveQuote($data) {

        $this->db->set($data);
        $this->db->insert('quote_requests');
        $insertId = $this->db->insert_id();
        if ($insertId > 0) {

            return $insertId;

        } else {

            return false;
        }

    }

    public function fetchAll($move_to_trash) {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('move_to_trash', $move_to_trash);
		$this->db->where('parant_id', 0);
		$this->db->where('version', 0);
		$this->db->order_by('sort_order','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	public function homeService() {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('move_to_trash', 0);
		$this->db->where('tpl', 'services');
		$this->db->where('display_to_home',1);
		$this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
		public function homeProject() {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('move_to_trash', 0);
		$this->db->where('tpl', 'projects');
		$this->db->limit(1);
	    $query = $this->db->get();
        if ($query->num_rows() > 0) {
			$res = $query->result();
			return $this->getChlidProject($res[0]->id);
           
        } else {
            return false;
        }
    }
	public function getChlidProject($id) {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('move_to_trash', 0);
		$this->db->where('display_to_home',1);
		$this->db->where('tpl', '');
		$this->db->where('parant_id',$id);
		$this->db->limit(1);
	    $query = $this->db->get();
        if ($query->num_rows() > 0) {
			return $query->result();
			
           
        } else {
            return false;
        }
    }
	   
	public function getLocations() {

        $query = $this->db->query("select DISTINCT arb_location,eng_location from contents where type='page'");

        $result = $query->result();

        if(!empty($result))

        {

            return $result;

        }else{

            return false;

        }

    } 
	
       public function fetchSorted($city,$date) {
             

        $query = "select * from contents where 1=1 and type = 'page'";
        if($date!="")
          $query=$query." and pro_date like '%$date%'"; 
        if($city!="")
           $query=$query." and eng_location like '%$city%'";
         $query = $this->db->query($query);
    
	 $result = $query->result();
    
        if(!empty($result))

        {

            return $result;

        }else{

            return false;

        }

    }	
   
     public function getDates() {

        $query = $this->db->query("select DISTINCT pro_date from contents where type ='page' ORDER BY pro_date ");
		 $result = $query->result();
        if(!empty($result))

        { 
		return $result;

        }else{

            return false;

        }

    }
	
	 public function page_content($page_id) {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('id', $page_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	
	
    public function checkUniquePageTitle($page_title) {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('eng_title', $page_title);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          return 1;
        } else {
           return 0;
        }
    }
	
	
	public function getPageTitle($page_id) {

     

		
		$this->db->select('*');
        $this->db->from('contents');
		
		$this->db->where('id', $page_id);
      
		$query = $this->db->get();
		
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	
	
	
	public function getPageId($page_title) {

     

		//echo $page_title;
        // $query = $this->db->query("SELECT * FROM `contents` WHERE `type` = 'page' AND `eng_title` = '".$page_title."'");
		//$this->db->cache_off();
		$this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('eng_title', html_entity_decode($page_title));
       //$query = $this->db->_compile_select();
		$query = $this->db->get();
		 // echo 'dfgdsg';
		/*  echo $this->db->last_query();
		  $res = $query->result();
		  echo '<pre>';
		  print_r($res);
		  exit();*/
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	
	    public function fetchAllVersion($id) {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'version');
		$this->db->where('parant_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

	 public function countPageVersions($id) {

        $this->db->select('version');
        $this->db->from('contents');
        $this->db->where('parant_id', $id);
		$this->db->order_by('version','desc');
        $query = $this->db->get();
		if ($query->num_rows() > 0) {
            $result = $query->result();
			return $result[0]->version;
        } else {
            return false;
        }
    }
    public function fetchRow($id) {

        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
	
	 public function fetchHeadings($id) {

        $this->db->select('*');
        $this->db->from('client_slider');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function fetch_list_content($id) {

        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where('type', 'page');
		$this->db->where('parant_id', $id);
	   // $this->db->where('tpl', '');
		$this->db->where('version', '0');
		$this->db->order_by('sort_order','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return  $query->result();
        } else {
            return false;
        }
    }
	
	public function getParentId($id) {

        $this->db->select('parant_id');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('id', $id);
		$this->db->where('version', '0');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
			$result = $query->result();
          return $result[0]->parant_id;
        } else {
            return false;
        }
    }
	
	
	 public function list_content_dropdown() {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('tpl', 'projects');
		$this->db->where('parant_id', '0');
		$this->db->where('version', '0');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
			
          return $query->result();
        } else {
            return false;
        }
    }
	
	public function front_end_content($id) {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('parant_id', $id);
		$this->db->where('pub_status', 1);
		$this->db->where('version', 0);
		$this->db->order_by('sort_order','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return  $query->result();
        } else {
            return false;
        }
    }
	
	public function getBranches($city) {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('career_location', $city);
		$this->db->where('pub_status', 1);
		$this->db->where('version', 0);
		$this->db->order_by('sort_order','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return  $query->result();
        } else {
            return false;
        }
    }
	
	public function getEvents($date,$id) {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('parant_id', $id);
		$this->db->where('pub_status', 1);
		$this->db->where('version', 0);
		$this->db->like('pro_date', $date);
		$this->db->order_by('sort_order','asc');
        $query = $this->db->get();
		
        if ($query->num_rows() > 0) {
            return  $query->result();
        } else {
            return false;
        }
    }
	
	public function fetchAllCategoriesData($ids) {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where_in('parant_id', $ids);
		$this->db->where('pub_status', 1);
		$this->db->where('version', 0);
		$this->db->order_by('sort_order','asc');
        $query = $this->db->get();
		
        if ($query->num_rows() > 0) {
            return  $query->result();
        } else {
            return false;
        }
    }
	
	
	public function front_end_contentNews($id,$order_by) {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('parant_id', $id);
		$this->db->where('pub_status', 1);
		$this->db->where('version', 0);
		$this->db->order_by('pro_date', $order_by);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return  $query->result();
        } else {
            return false;
        }
    }

  public function delete($id) {

        $query = $this->db->query("delete from contents WHERE id =" . $id);
		$query = $this->db->query("delete from contents WHERE parant_id =" . $id);
		$query = $this->db->query("delete from clientmenus WHERE page_id =" . $id);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteImage($photo,$imageType,$id) {

      
	   	
	  
	   $query = $this->db->query("update content_detail  set meta_value ='".$photo."' WHERE meta_key = '".$imageType."' && post_id = " . $id);
		 
		  if ($query) {
            return true;
        } else {
            return false;
        }	
	   /* $query = $this->db->query("delete from contents WHERE id =" . $id);
		$query = $this->db->query("delete from contents WHERE parant_id =" . $id);
		$query = $this->db->query("delete from clientmenus WHERE page_id =" . $id);
        if ($query) {
            return true;
        } else {
            return false;
        } */
    }

 public function delete_content_detail($id) {

        $query = $this->db->query("delete from content_detail WHERE post_id =" . $id);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePhoto($id) {
        $loggedInUserId = $this->session->userdata('id');
        $query = $this->db->query("update contents  set content_photo ='',content_updated_at='" . date('Y-m-d H:i:s') . "',content_updated_by='" . $loggedInUserId . "' WHERE id =" . $id);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function publishStatus($val, $id) {
        $loggedInUserId = $this->session->userdata('id');
        $query = $this->db->query("update contents set pub_status='" . $val . "',content_updated_at='" . date('Y-m-d H:i:s') . "',content_updated_by='" . $loggedInUserId . "' WHERE id =" . $id);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
 

}

//end