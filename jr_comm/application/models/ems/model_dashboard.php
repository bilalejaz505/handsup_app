<?php

class Model_dashboard extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}

	   //This function reterive the list of
		//websites from db and pass them to view  
		function getWesitesList($id) {
               		
                    $this->db->select("id,usr_grp_id");
					$this->db->from("cms_users");
				    $this->db->where('id',$id);
					$query = $this->db->get();
					$usrresult = $query->result_array();
					$grpid=$usrresult[0]['usr_grp_id'];
 
					$this->db->select("*");
					$this->db->from("group_rights");
				    $this->db->where('grp_id',$grpid);
					$query = $this->db->get();
					$grpresult = $query->result_array();
					
					$sitelist=array();
					foreach($grpresult as $val){
						
						$siteid=$val['web_id'];
						
						$this->db->select("*");
						$this->db->from("sites");
						$this->db->where('id',$siteid);
						$query = $this->db->get();
						$websiteList= $query->result_array();
						array_push($sitelist,$websiteList);
					}
					
					
				
					if(!empty($sitelist)){
						return $sitelist;
					}
					else{
						return '';
					}
					
     }
	 
	 function getWesitesList_2($id) {
               		
                    $this->db->select("id,usr_grp_id,site_id,");
					$this->db->from("cms_users");
				    $this->db->where('id',$id);
					$query = $this->db->get();
					$usrresult = $query->result_array();
					$grpid=$usrresult[0]['usr_grp_id'];
 					$siteid=$usrresult[0]['site_id'];
						
					$this->db->select("*");
					$this->db->from("group_rights");
				    $this->db->where('grp_id',$grpid);
					$query = $this->db->get();
					$grpresult = $query->result_array();
					
					$sitelist=array();
					foreach($grpresult as $val){
						
						$siteid=$val['web_id'];
						
						$this->db->select("*");
						$this->db->from("sites");
						$this->db->where('id',$siteid);
						$query = $this->db->get();
						$websiteList= $query->result_array();
						array_push($sitelist,$websiteList);
					}
					
					
				
					if(!empty($sitelist)){
						return $sitelist;
					}
					else{
						return '';
					}
					
     }
	 
	 
	 function getWesitesList_3($id) {
               		
                  
						
						$siteid=$this->session->userdata('site_id');
						
						$this->db->select("*");
						$this->db->from("sites");
						$this->db->where('id',$siteid);
						$query = $this->db->get();
						$sitelist=array();
						
						$websiteList= $query->result_array();
					
					    foreach($websiteList as $val){ 
					          array_push($sitelist,$websiteList);
							  
						}
				
					if(!empty($sitelist)){
						return $sitelist;
					}
					else{
						return '';
					}
					
     }
         
		 
	   function log_data($siteid){	 
		 
		    $uid=$this->session->userdata('id');
			$this->db->select('*');
			$this->db->from('log');
			$this->db->where('site_id',$siteid);
		/*	$this->db->where('user_id',$uid);*/
			$this->db->order_by('log_date','desc');
			$this->db->limit(10);
			$query = $this->db->get();
			$sresult = $query->result_array();
			
			return $sresult;
	   }
		 
		function getUserData($id){
			
			$this->db->select('*');
			$this->db->from('cms_users');
			$this->db->where('id',$id);
			$query = $this->db->get();
			$sresult = $query->result_array();
			
			return $sresult;	
			
		}
		 
		 //This function reterive the record of
		//websites to populate edit view fields  
		function getRec($id) {
		
		$this->db->select('*');
		$this->db->from('sites');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$sresult = $query->result_array();
		
   		return $sresult;
    }

}//end