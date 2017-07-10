<?php

class Model_configuration extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}

	function save($data) {
		$this->db->set($data);
		$this->db->insert('configuration');
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
		$query=$this->db->query("UPDATE configuration SET 
                        reachus_email='".$data['reachus_email']."',
                        sendinquiry_email='".$data['sendinquiry_email']."',
                        jobapp_email='".$data['jobapp_email']."',
                        from_email='".$data['from_email']."',
                        project_name='".$data['project_name']."',
                                                       
                        ga_user='".$data['ga_user']."',
                        ga_password='".$data['ga_password']."',
                        ga_tracking_id='".$data['ga_tracking_id']."',
                        ga_view_id='".$data['ga_view_id']."',
						ctct_api_key='".$data['ctct_api_key']."', 

						ctct_token='".$data['ctct_token']."',											                     
						ctct_from_email='".$data['ctct_from_email']."',												
						ctct_list='".$data['ctct_list']."',
						arb_sms='".$data['arb_sms']."',												
						eng_sms='".$data['eng_sms']."',

                        smtp_host='".$data['smtp_host']."',
                        smtp_email='".$data['smtp_email']."',
						phone='".$data['phone']."',
                        our_email='".$data['our_email']."',
                        smtp_password='".$data['smtp_password']."',
                        smtp_port='".$data['smtp_port']."',

                        config_updated_at='".date('Y-m-d H:i:s')."',
                        config_updated_by='".$loggedInUserId."',
                        pub_status='".$data['pub_status']."' WHERE id = '$id'");
						
		if($query>0)
		{
			return true;
		}
		else{
			return false;
		}
			
	}           

	function updateSocial($data, $id) {
        $this->db->where('id', $id);
        $query = $this->db->update('social_links', $data);
        return ($query>0)?true:false;
    }
        
        
	public function fetchRow(){
			
		$this->db->select('*');
		$this->db->from('configuration');
                $this->db->order_by('id','DESC');
                $this->db->limit (1);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
	}        

	public function fetchRowSocialLink(){
			
		$this->db->select('*');
		$this->db->from('social_links');
                $this->db->order_by('id','DESC');
                $this->db->limit (1);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
	} 

}//end