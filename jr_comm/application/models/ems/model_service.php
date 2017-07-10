<?php



class Model_service extends CI_Model {

    

    public function fetch($id) {

        $query = $this->db->query("select * from services where id=".$id);

        $result = $query->row();

        if(!empty($result))

        {

            return $result;

        }else{

            return false;

        }

    }



    public function fetchAll() {

        $query = $this->db->query("select * from services Where status =1");

        $result = $query->result();

        if(!empty($result))

        {

            return $result;

        }else{

            return false;

        }

    }



     public function fetchAllServices() {

        $query = $this->db->query("select * from services");

        $result = $query->result();

        if(!empty($result))

        {

            return $result;

        }else{

            return false;

        }

    }



    public function fetchAllSlidesPublish($status, $projects ="", $date="") {

        $q = "select * from services Where status = $status && pub_status = 1";
        if($projects != "")
        $q=$q." && eng_title LIKE '%$projects%'"; 

        if($date != "")
        $q=$q." && eng_date LIKE '%$date'";
   
        

        $query = $this->db->query($q);

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

        $this->db->insert('services',$data);

        return $this->db->insert_id();

    }

    

    public function publishStatus($status,$id)

    {

        $this->db->query("update services set pub_status=".$status." where id=".$id);

    }

    

    public function delete($id)

    {

        $this->db->query("delete from services where id=".$id);

    }

    

    public function update($id,$data)

    {

        $this->db->update('services',$data,array('id'=>$id));

    }



}



//end