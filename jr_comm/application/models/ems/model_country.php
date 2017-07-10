<?php

class Model_country extends CI_Model {
    
    public function fetch($id = NULL) {
		if(!empty($id)){
		$where = 'WHERE id='.$id;	
		}else{
		$where = '';
		}
		
        $query = $this->db->query("select * from countries ".$where." ORDER BY country_name ASC");
        if(!empty($id)){
		$result =  $query->row();
		}else{
		$result = $query->result();	
		}
		
        if(!empty($result))
        {
            return $result;
        }else{
            return false;
        }
    }

    public function fetchName($id) {
        $this->db->select('*');
        $this->db->from('countries');

        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->row();
        } else {

            return false;
        }

    }

    

  
  
    public function save($data)

    {

        $this->db->insert('countries',$data);

        return $this->db->insert_id();

    }
    
    public function delete($id)
    {
        $this->db->query("delete from countries where id=".$id);
    }
   
    public function update($id,$data)
    {
        $this->db->update('countries',$data,array('id'=>$id));
    }
   

}

