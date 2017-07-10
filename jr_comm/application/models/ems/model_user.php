<?php

class Model_user extends CI_Model {
    
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
	   public function fetchAllCountries() {

        $this->db->select('*');
        $this->db->from('countries');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function fetchAll($tb) {
		
		
        $query = $this->db->query("select * from ".$tb."");
        $result = $query->result();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }
    public function fetchAllUsers($tb) {
		
		
        $query = $this->db->query("select * from ".$tb);
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
	
	
    public function saveUser($data)
    {
        $this->db->insert('users',$data);
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
	
		public function updateUser($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->affected_rows();
		} else {
			return false;
		}
	}
	
		function FetchUserPassword($id){
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {

			return false;
		}
	}
	
    
    public function publishStatus($status,$id)
    {
        $this->db->query("update contact set pub_status=".$status." where id=".$id);
    }
    
    public function delete($id,$tb)
    {
        $this->db->query("delete from contact where id=".$id);
    }
	public function deleteUser($id)
    {
        $this->db->query("delete from users where id=".$id);
    }
	
}

//end