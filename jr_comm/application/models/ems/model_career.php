<?php

class Model_career extends CI_Model {
    
    public function fetch($id,$tb) {
        $query = $this->db->query("select * from ".$tb." where id=".$id);
        $result = $query->row();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }

    public function fetchAll($tb) {
		
		
        $query = $this->db->query("select * from ".$tb." ORDER BY id DESC");
        $result = $query->result();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }
    public function fetchAlljobs($tb, $id) {
		
		
        $query = $this->db->query("select * from ".$tb." where new_id=".$id. " ORDER BY id DESC");
        $result = $query->result();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }

    public function fetchAdress($id,$tb) {
        $query = $this->db->query("select * from ".$tb." where loc_id=".$id);
        $result = $query->result();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }
	
	
	  public function fetch_dep_detail($id,$tb) {
        $query = $this->db->query("select * from ".$tb." where dep_id=".$id);
        $result = $query->result();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }

     public function fetch_number($id,$tb) {
        $query = $this->db->query("select * from ".$tb." where id=".$id);
        $result = $query->result();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }
	
	
	
	
	
    public function saveCareer($data)
    {
        $this->db->insert('career_forms',$data);
        return $this->db->insert_id();
    }
	
    
    public function save($tb,$data,$where = NULL)
    {
        if(empty($where)){
		$this->db->insert($tb,$data);
        return $this->db->insert_id();
		}else{
		$this->db->update($tb,$data,array('id'=>$where));
        return $where;
		}
    }
    
    public function publishStatus($status,$id)
    {
        $this->db->query("update contact set pub_status=".$status." where id=".$id);
    }
    
//    public function delete($id,$tb)
//    {
//        $this->db->query("delete from contact where id=".$id);
//    }
	public function deleteJob($id)
    {
        $this->db->query("delete from job_applications where id=".$id);
    }
	
}

//end