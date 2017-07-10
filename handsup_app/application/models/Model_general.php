<?php

Class Model_general extends CI_Model

{

	public function __construct()

	{

		parent::__construct();		

	}

	

	public function getRow($id, $table_name, $as_array=false)

	{

		$result = $this->db->get_where($table_name,array('id'=>$id));

		//echo $this->db->last_query(); exit();

		if($result->num_rows() > 0)

		{

			$row = $result->row_array();

			

			if($as_array)

			{

				return $row;

			}

			

			foreach ($row as $col=>$val)

			{

				$this->$col = $val;

			}

			

			return $this;

		}

		

		else

		{

			return false;

		} 

	}

	

	public function getSingleRow($table_name,$field,$as_array=false)

	{

		$result = $this->db->get_where($table_name,$field);

		

		if($result->num_rows() > 0)

		{

			$row = $result->row_array();

			

			if($as_array)

			{

				return $row;

			}

			

			foreach ($row as $col=>$val)

			{

				$this->$col = $val;

			}

			

			return $this;

		}

		

		else

		{

			return false;

		} 

	}

	

	public function getAll($table_name, $as_array=false, $idOrderBy='asc', $orderBy='id')

	{

		

		$this->db->order_by($orderBy, $idOrderBy);

		

		$result = $this->db->get($table_name);

		

		if($as_array)

		{

			return $result->result_array();

		}

		

		return $result->result();

	}

	

	public function getMultipleRows($table_name, $fields,$as_array=false, $idOrderBy='asc', $orderBy='id')

	{

		

		

		$this->db->order_by($orderBy,$idOrderBy);

	

		$result = $this->db->get_where($table_name,$fields);

		

		//echo $this->db->last_query(); exit();

		

		if($result->num_rows() > 0)

		{

			

			

			if($as_array)

		    {

			 return $result->result_array();

		    }

		

		    return $result->result();

		}

		

		else

		{

			return false;

		} 

	}
	
	/* Insert user */ 
	 
	public function save($table, $data) {
		$this->db->set($data);
		$this->db->insert($table);
		$insertId = $this->db->insert_id();
		if ($insertId > 0) {

		return $insertId;
		} else {
			return false;
		}
	}
	
	public function updateRow($table_name, $data, $id) {
       $this->db->where('id', $id);
	   $this->db->update($table_name, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	public function deleteRow($table_name, $id) {
        $this->db->where('id', $id);
	    $this->db->delete($table_name);
        if ($this->db->affected_rows() > 0) {
            return TRUE;

        } else {
            return false;
        }
    } 
	
	public function deleteMultipleRow($table_name, $field, $id) {
        $this->db->where($field, $id);
	    $this->db->delete($table_name);
        if ($this->db->affected_rows() > 0) {
            return TRUE;

        } else {
            return false;
        }
    }
	

	public function validateLogin($username, $password)

	{

		$query = $this->db->query("select * from admin where username = '".$username."' and password = '".md5($password)."'");

		

		if($query->num_rows() > 0)

		{

			return $query->row();

		}

		else

		{

			return false;

		}

	}

	

	

}