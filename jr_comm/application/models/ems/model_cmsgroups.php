<?php

class Model_cmsgroups extends CI_Model {

    function _construct() {
// Call the Model constructor
        parent::_construct();
    }

	
		function insert_rec($data){
			//debug($data);
			$this->db->set($data);
			$this->db->insert('cms_groups');
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
			$this->db->insert('group_rights');
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
		function getSiteList() {
		
		$this->db->select("*");
                $this->db->from("sites");
       // $this->db->where('id', $this->session->userdata('id'));
                $query = $this->db->get();
		$result = $query->result_array();
		
		if(!empty($result)){
			return $result;
		}
		else{
			return '';
		}
   		
    }
	
	   
	function getGroupList() {
		
		$this->db->select("*");
                $this->db->from("cms_groups");
		//$this->db->join('group_rights', 'group_rights.id = cms_groups.id');
                $this->db->where('isAdmin', '1');
                $query = $this->db->get();
		$result = $query->result_array();
		
		if(!empty($result)){
			return $result;
		}
		else{
			return '';
		}
   		
    }
	
	function changeState_db($id,$chk) {
		
		$query=$this->db->query("UPDATE cms_groups SET grp_pub='".$chk."' WHERE id = '$id'");
		if($query>0)
		{
			return true;
		}
		else{
			return false;
		}
   		
    }
	
	public function delete($id){
			
		        $query=$this->db->query("delete from group_rights WHERE grp_id =".$id);
		
				$query2=$this->db->query("delete from cms_groups WHERE id =".$id);
				
				if ($query2) {
					return true;
				} else {
					return false;
				}
		
	}
	
	//This function reterive the record of
	//websites to populate edit view fields  
		function getRec($id) {
		
		$this->db->select('id,eng_web_title,grp_pub');
		$this->db->from('cms_groups');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$result = $query->result_array();
		
		if ($result) {
			return $result;
		} else {
			return false;
		}
   		
    }
	
	function checkdb($id,$gid){
    	
		$this->db->select('*');
		$this->db->from('group_rights');
		$this->db->where('grp_id',$gid);
		$query = $this->db->get();
		$result = $query->result_array();
		
		if ($result) {
			return $result;
		} else {
			return false;
		}
	
	}
	
	function update_grp_rec($data,$id) {
		
	$query=$this->db->query("UPDATE cms_groups SET eng_web_title='".$data['eng_web_title']."',grp_pub='".$data['grp_pub']."' WHERE id = '$id'");
		if($query>0)
		{
			return true;
		}
		else{
			return false;
		}
			
	}
	
	function check_site($webid,$gid){
		
		$this->db->select("*");
                $this->db->from("group_rights");
		$this->db->where('grp_id',$gid);
                $query = $this->db->get();
		$result = $query->result_array();
		
		if(!empty($result)){
			return true;
		}
		else{
			return false;
		}
		
	}
	
	function update_grprights_rec($data,$id,$web) {
		
	 $query=$this->db->query("UPDATE group_rights SET grp_sec_create='".$data['grp_sec_create']."',grp_sec_read='".$data['grp_sec_read']."',grp_sec_update='".$data['grp_sec_update']."',grp_sec_delete='".$data['grp_sec_delete']."',grp_sec_pub='".$data['grp_sec_pub']."' WHERE grp_id = '$id'");
	
	
		if($query>0)
		{
			return true;
		}
		else{
			return false;
		}
			
	}
	
	function calculate_grp_users_db($id){
		
		$this->db->select("*");
                $this->db->from("cms_users");
                $this->db->where('usr_grp_id',$id);
		$query = $this->db->get();
		$result = $query->result_array();
		
		if(!empty($result)){
			return $result;
		}
		else{
			return false;
		}
		
	}
	
	public function group_rights(){
		
		$id=$this->session->userdata('id');
		
		$this->db->select("*");
                $this->db->from("cms_users");
                $this->db->where('id',$id);
		$query1 = $this->db->get();
		$result1 = $query1->result_array();
		
		$grid=$result1[0]['usr_grp_id'];
		$this->db->select("*");
                $this->db->from("group_rights");
		$this->db->where('grp_id',$grid);
		$query = $this->db->get();
		$result = $query->result_array();
		
		$cr=$result[0]['grp_sec_create'];
		$r=$result[0]['grp_sec_read'];
		$u=$result[0]['grp_sec_update'];
		$d=$result[0]['grp_sec_delete'];
		$pu=$result[0]['grp_sec_pub'];
		
		if($cr==1&&$r==1&&$u==1&&$d==1&&$pu==1){
			
		return 1;	
		}else{
			
		return 0;	
		}
		      
	}
	
	
	    public function sec_rights($secid){
		
		$id=$this->session->userdata('id');
		
		$this->db->select("*");
                $this->db->from("cms_users");
                $this->db->where('id',$id);
		$query1 = $this->db->get();
		$result1 = $query1->result_array();
		$grid=$result1[0]['usr_grp_id'];
		$this->db->select("*");
                $this->db->from("group_rights");
		$this->db->where('grp_id',$grid);
		$this->db->where('secn_id',$secid);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		}
	
	
	public function check_userlevel2db(){
		
		$id=$this->session->userdata('id');
		
		$this->db->select("*");
                $this->db->from("cms_users");
                $this->db->where('id',$id);
		$query1 = $this->db->get();
		$result1 = $query1->result_array();		
		$grid=$result1[0]['usr_grp_id'];		
		$this->db->select("*");
                $this->db->from("group_rights");
		$this->db->where('grp_id',$grid);
		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;
	}
	
	
	public function check_userlevel3db($secid){
		
		$id=$this->session->userdata('id');
		
		$this->db->select("*");
                $this->db->from("cms_users");
                $this->db->where('id',$id);
		$query1 = $this->db->get();
		$result1 = $query1->result_array();
		$grid=$result1[0]['usr_grp_id'];
		$this->db->select("*");
                $this->db->from("group_rights");
		$this->db->where('grp_id',$grid);
		$this->db->where('secn_id',$secid);
		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;
	}
	
	public function publishStatus($val,$id){
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("UPDATE cms_groups SET grp_pub='".$val."' WHERE id = '$id'");
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
}//end