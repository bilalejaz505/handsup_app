<?php

class Model_emailSub extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();

	}

	function save($data) {
		$this->db->set($data);
		$this->db->insert('email_subjects');
		$insertId=$this->db->insert_id();
		if($insertId>0)
		{
			return $insertId;
		}
		else{
			return false;
		}
			
	}

	function update($data,$id) {
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("UPDATE email_subjects SET eng_sub_title='".$data['eng_sub_title']."',arb_sub_title='".$data['arb_sub_title']."',chn_sub_title='".$data['chn_sub_title']."',meta_title_eng='".$data['meta_title_eng']."',meta_title_arb='".$data['meta_title_arb']."',meta_title_chn='".$data['meta_title_chn']."',meta_desc_eng='".$data['meta_desc_eng']."',meta_desc_arb='".$data['meta_desc_arb']."',meta_desc_chn='".$data['meta_desc_chn']."',meta_keywords_eng='".$data['meta_keywords_eng']."',meta_keywords_arb='".$data['meta_keywords_arb']."',meta_keywords_chn='".$data['meta_keywords_chn']."',sub_pub_status='".$data['sub_pub_status']."',sub_updated_at='".date('Y-m-d H:i:s')."',sub_updated_by='".$loggedInUserId."' WHERE id = '$id'");
		if($query>0)
		{
			return true;
		}
		else{
			return false;
		}
			
	}

	public function fetchAll() {

		$this->db->select('*');
		$this->db->from('email_subjects');
                $this->db->order_by('sort_col','ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
			
	}

	public function fetchRow($id){
			
		$this->db->select('*');
		$this->db->from('email_subjects');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
	}


	public function delete($id){
			
		$query=$this->db->query("delete from email_subjects WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
	

	public function deletePhoto($id){
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("update email_subjects  set about_photo ='',about_updated_at='".date('Y-m-d H:i:s')."',about_updated_by='".$loggedInUserId."' WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}

	public function publishStatus($val,$id){
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("update email_subjects set sub_pub_status='".$val."',sub_updated_at='".date('Y-m-d H:i:s')."',sub_updated_by='".$loggedInUserId."' WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
        
    public function srtColUpdate($ids) {

        foreach ($ids as $id=>$val) {
            $data['sort_col'] = $val;
            $this->db->where("id", $id);
            $this->db->update("email_subjects", $data);
        }
    }         
}//end