<?php

class Model_news extends CI_Model {

    function _construct() {
        // Call the Model constructor
        parent::_construct();
    }

    public function fetchAll($move_to_trash) {

        $this->db->select('*');
        $this->db->from('contents');
		$this->db->where('type', 'page');
		$this->db->where('move_to_trash', $move_to_trash);
		$this->db->where('parant_id', 0);
		$this->db->where('version', 0);
		//$this->db->where_not_in('tpl', '');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	
	public function getAllNews($year = '') {
		
		$query = $this->db->query("SELECT c.* FROM contents c, content_detail d WHERE c.id = d.post_id AND c.type = 'page' AND c.version = '0' AND c.tpl = 'news-detail' AND d.meta_key = 'news_date' ".($year != '' ? 'AND YEAR(d.meta_value) = '.$year :'')." ORDER BY d.meta_value DESC LIMIT 10");
		
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	
	public function getYearsList(){
		
		$query = $this->db->query("SELECT DISTINCT YEAR(d.meta_value) AS 'year' FROM contents c, content_detail d WHERE c.id = d.post_id AND c.type = 'page' AND c.version = '0' AND c.tpl = 'news-detail' AND d.meta_key = 'news_date' ORDER BY year DESC");
		
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
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return  $query->result();
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
		$this->db->where('version', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return  $query->result();
        } else {
            return false;
        }
    }
}

//end