<?php

class Model_slider extends CI_Model {
    
    public function fetch($id) {
        $query = $this->db->query("select * from home_slider where id=".$id);
        $result = $query->row();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }

    public function fetchAll() {
        $query = $this->db->query("select * from home_slider");
        $result = $query->result();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }
     public function fetchYear($year) {
        $query = $this->db->query("select * from home_slider where year=$year");
        $result = $query->row();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }
    public function selectYear($year) {
        $query = $this->db->query("select * from years where year=".$year);
        $result = $query->result();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }

     public function fetchYears() {
        $query = $this->db->query("select * from years");
        $result = $query->result();
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }

    public function homeDisc($projectId) {
        $this->db->select('*');
        $this->db->from('home_slider');
        $this->db->where('id', $projectId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

     public function fetchAllSlides($status) {
	
        $query = $this->db->query("select * from home_slider Where  pub_status=1");
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
        $this->db->insert('home_slider',$data);
        return $this->db->insert_id();
    }
     public function saveYear($data)
    {
        $this->db->insert('years',$data);
        return $this->db->insert_id();
    }
    public function updateYear($id,$data)
    {
        $this->db->update('years',$data,array('id'=>$id));
    }

    public function publishStatus($status,$id)
    {
        $this->db->query("update home_slider set pub_status=".$status." where id=".$id);
    }
    
    public function delete($id)
    {
        $this->db->query("delete from home_slider where id=".$id);
    }
     public function deleteYear($id)
    {
        $this->db->query("delete from years where id=".$id);
    }
    public function update($id,$data)
    {
        $this->db->update('home_slider',$data,array('id'=>$id));
    }

}

//end