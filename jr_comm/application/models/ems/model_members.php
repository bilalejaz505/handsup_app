<?php



class Model_members extends CI_Model {

    

    public function fetch($id) {

        $query = $this->db->query("select * from members where id=".$id);

        $result = $query->row();

        if(!empty($result))

        {

            return $result;

        }else{

            return false;

        }

    }



    public function fetchAll($id) {

        $query = $this->db->query("select * from members Where system_id =$id");

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

        $this->db->insert('members',$data);

        return $this->db->insert_id();

    }

    

    public function publishStatus($status,$id)

    {

        $this->db->query("update members set pub_status=".$status." where id=".$id);

    }

    

    public function delete($id)

    {

        $this->db->query("delete from members where id=".$id);

    }

    

    public function update($id,$data)

    {

        $this->db->update('members',$data,array('id'=>$id));

    }



}



//end