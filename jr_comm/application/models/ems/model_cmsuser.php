<?php

class Model_cmsuser extends CI_Model {

    function _construct() {
// Call the Model constructor
        parent::_construct();
    }

	
		function add_user_rec($data){
			//debug($data);
			$this->db->set($data);
			$this->db->insert('cms_users');
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
	
	
	//This function reterive the list of
		//websites from db and pass them to view  
		function getGroupList() {
		
		$this->db->select("*");
        $this->db->from("cms_groups");
        $this->db->where('isAdmin', '1');
		$this->db->where('grp_pub', '1');
        $query = $this->db->get();
		$result = $query->result_array();
		
		if(!empty($result)){
			return $result;
		}
		else{
			return false;
		}
   		
    }
	
	   
	function getUserList() {
		
		$this->db->select("*");
        $this->db->from("cms_users");
		//$this->db->join('group_rights', 'group_rights.id = cms_groups.id');
        $this->db->where('usr_level', '2');
        $query = $this->db->get();
		$result = $query->result_array();
		
		if(!empty($result)){
			return $result;
		}
		else{
			return '';
		}
   		
    }
	
		function getAllUserList() {
		
		$this->db->select("*");
        $this->db->from("cms_users");
		//$this->db->join('group_rights', 'group_rights.id = cms_groups.id');
        $this->db->where('usr_level', '2,3');
		$query = $this->db->get();
		$result = $query->result_array();
		
		if(!empty($result)){
			return $result;
		}
		else{
			return '';
		}
   		
    }
	
	function getUserpasswd($id){
		
		$this->db->select("*");
        $this->db->from("cms_users");
		//$this->db->join('group_rights', 'group_rights.id = cms_groups.id');
        $this->db->where('id', $id);
        $query = $this->db->get();
		$result = $query->result_array();
	
		if(!empty($result)){
			return $result;
		}
		else{
			return '';
		}
	}
	
	function getUserrolerec($id){
		
		$this->db->select("*");
        $this->db->from("cms_groups");
		$this->db->where('id',$id);
        $query = $this->db->get();
		$result = $query->result_array();
		
		if(!empty($result)){
			return $result;
		}
		else{
			return '';
		}
	}
	
	function changeState($id,$chk) {
		
		$query=$this->db->query("UPDATE cms_users SET usr_pub_status='".$chk."' WHERE id = '$id'");
		if($query>0)
		{
			return true;
		}
		else{
			return false;
		}
   		
    }
	
	function upd_user_rec_db($data,$id){
		
	$query=$this->db->query("UPDATE cms_users SET usr_uname='".$data['usr_uname']."',usr_phone='".$data['usr_phone']."',usr_email='".$data['usr_email']."',usr_pass='".$data['usr_pass']."',usr_grp_id='".$data['usr_grp_id']."',usr_pub_status='".$data['usr_pub_status']."',usr_msg='".$data['usr_msg']."' WHERE id = '$id'");
	}
	
	public function delete($id){
			
		       
		
				$query2=$this->db->query("delete from cms_users WHERE id =".$id);
				
				if ($query2) {
					return true;
				} else {
					return false;
				}
		
	}
	
	//This function reterive the record of
	//websites to populate edit view fields  
		function getRec($id) {
		
		$this->db->select('*');
		$this->db->from('cms_users');
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
		$this->db->where('web_id',$id);
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
        $this->db->where('web_id',$webid);
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
	
	function update_grprights_rec($data,$id) {
		
	$query=$this->db->query("UPDATE cms_groups SET eng_web_title='".$data['eng_web_title']."',grp_pub='".$data['grp_pub']."' WHERE id = '$id'");
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
			return true;
		}
		else{
			return false;
		}
		
	}
	
	function checkgrp_right($id,$gid){
    	
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
		public function publishStatus($val,$id){
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("update cms_users set usr_pub_status='".$val."' WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
	function getsitename($id){
	    $this->db->select('*');
		$this->db->from('sites');
		
		$this->db->where('id',$id);
		$query = $this->db->get();
		$result = $query->result_array();
		 
		 $site_name=$result[0]['site_title'];
		if ($site_name) {
			return $site_name;
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
	
	
}//end