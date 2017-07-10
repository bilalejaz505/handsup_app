<?php

class Job_model extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}

        public function fetchSubject() {
		$this->db->select('*');
		$this->db->from('email_subjects');
		$this->db->where('sub_pub_status',1);		
		$this->db->order_by('id','ASC');		
		$query = $this->db->get();
		if ($query->num_rows() >0) {
                    return $query->result_array();
		} else {
			return false;
		}
			
	}
 
public function fetchCities($CountryCode) {
        $query = $this->db->query("select * from city where countrycode='".$CountryCode."' ORDER BY  `city`.`name` ASC");
		
        $result = $query->result();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    } 
        
public function save($data)

    {

        $this->db->insert('job_applications',$data);

        return $this->db->insert_id();

    }

	public function fetch_jobs($j_type, $c_level, $c_location)

    {

       $this->db->select('*');
	   $this->db->from('contents');
	   $this->db->where('type', 'page');
	   $this->db->like('job_type', $j_type);
	   $this->db->like('career_level', $c_level);
	   $this->db->like('career_location', $c_location);

       $query = $this->db->get();
	    
				
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }
	
	 public function backgroundImage($page_title){
		$this->db->select('*');
		$this->db->from('background_images');
		$this->db->like('page_title',$page_title);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}	
	}
	
        
}//end