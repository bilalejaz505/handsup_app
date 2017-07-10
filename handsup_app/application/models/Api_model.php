<?php

class Api_model extends CI_Model{

	function __construct(){


		parent::__construct();
	
    }
	//Login
	function login($data) {
        
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where("`email` = '" . $data['email'] . "' AND  `password` = '" . $data['password'] . "'");         
			$query = $this->db->get();	
			if ($query->num_rows() == 1) {
				return $query->row_array();
			} else {
				return false;
			}
    }
	
	//get
	function get($table_name, $id, $isArr = false) {
        
            $this->db->select('*');
            $this->db->from($table_name);
            $this->db->where('id', $id);         
			$query = $this->db->get();	
			if ($query->num_rows() == 1) {
				if($isArr)
				{
					return $query->row_array();
				}
				else
				{
					return $query->row();
				}
			} else {
				return false;
			}
    }
	
	
	//getAll
	function getAll($table_name) {
        
            $this->db->select('*');
            $this->db->from($table_name);         
			$query = $this->db->get();	
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return array();
			}
    }
	
	//getMutiple
	function getMutipleRows($table_name, $field, $val) {
        
            $this->db->select('*');
            $this->db->from($table_name);
			$this->db->where($field, $val);            
			$query = $this->db->get();	
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return array();
			}
    }
	
	//countRows
	function getRowsCount($table_name, $search) {
        
            $this->db->select('*');
            $this->db->from($table_name);
			$this->db->where($search);            
			$query = $this->db->get();	
			return $query->num_rows();
    }
	
	/* Insert user */ 
	 
	function insert($table, $data) {
		$this->db->set($data);
		$this->db->insert($table);
		$insertId = $this->db->insert_id();
		if ($insertId > 0) {

		return $insertId;
		} else {
			return false;
		}
	}
	
	/* update */
	
	public function update($table_name, $data,$search)
	{
		$this->db->update($table_name,$data,$search);
		if ($this->db->affected_rows() == '1') {
			return true;
		} else {
		// any trans error?
		if ($this->db->trans_status() === FALSE) {
			return false;
		}
		return true;
		}
	}
	
	public function updateRow($table_name, $data, $updateBy, $val) {
       $this->db->where($updateBy, $val);
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
	
	//get
	function getSingleRow($table_name, $search, $isArr = false) {
        
            $this->db->select('*');
            $this->db->from($table_name);
            $this->db->where($search);         
			$query = $this->db->get();	
			if ($query->num_rows() == 1) {
				if($isArr)
				{
					return $query->row_array();
				}
				else
				{
					return $query->row();
				}
			} else {
				return false;
			}
    }
	
	//getInterestByUserId
	function getInterestByUserId($user_id)
	{
		$query = $this->db->query("SELECT i.* FROM interests i LEFT OUTER JOIN user_interests ui ON i.id=ui.interest_id WHERE ui.user_id=".$user_id);	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
	}
	//getLanguageByProjectId
	function getProjectLanguages($project_id)
	{
		$query = $this->db->query("SELECT l.* FROM languages l LEFT OUTER JOIN project_languages pl ON l.id=pl.language_id WHERE pl.project_id=".$project_id);	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
	}
	//getSkillsByProjectId
	function getProjectSkills($project_id)
	{
		$query = $this->db->query("SELECT s.* FROM skills s LEFT OUTER JOIN project_skills ps ON s.id=ps.skill_id WHERE ps.project_id=".$project_id);	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
	}
	//getActivitiesByProjectId
	function getProjectActivities($project_id)
	{
		$query = $this->db->query("SELECT pa.user_id as user_id, u.full_name as name, a.activity_type as activity, pa.created_at as date_time  FROM project_activities pa LEFT OUTER JOIN activity_type a ON a.id = pa.activity_type_id LEFT OUTER JOIN users u ON u.id = pa.user_id WHERE pa.project_id = ".$project_id." ORDER BY pa.created_at asc");	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
	}
	//getProjectUser
	function getProjectUser($project_id, $user_id)
	{
		$query = $this->db->query("SELECT u.* FROM users u LEFT OUTER JOIN project_users pu ON u.id=pu.user_id WHERE pu.project_id=".$project_id." AND pu.user_id = ".$user_id);	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
	}
	//getAllProjectUser
	function getAllProjectUser($project_id)
	{
		$query = $this->db->query("SELECT u.* FROM users u LEFT OUTER JOIN project_users pu ON u.id=pu.user_id WHERE pu.project_id=".$project_id);	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
	}
	
	//project list based on filter
	function getProjectList($search)
	{
		$where = "WHERE";
		if($search['interest_id'] && $search['interest_id'] != '')
		{
			$where .= " ui.interest_id = ".$search['interest_id'];
		}
		if($search['city_id'] && $search['city_id'] != '')
		{
			if($where != 'WHERE')
			{
				$where .= ' AND';
			}
			$where .= " p.city_id = ".$search['city_id'];
		}
		if($search['my_interest_id'] && $search['my_interest_id'] != '')
		{
			if($where != 'WHERE')
			{
				$where .= ' AND';
			}
			$where .= " ui.interest_id = ".$search['my_interest_id'];
		}
		if($search['skill_id'] && $search['skill_id'] != '')
		{
			if($where != 'WHERE')
			{
				$where .= ' AND';
			}
			$where .= " ps.skill_id = ".$search['skill_id'];
		}
		if($search['language_id'] && $search['language_id'] != '')
		{
			if($where != 'WHERE')
			{
				$where .= ' AND';
			}
			$where .= " pl.language_id = ".$search['language_id'];
		}
		if($search['status'] && $search['status'] != '')
		{
			if($where != 'WHERE')
			{
				$where .= ' AND';
			}
			$where .= " p.active_status = ".$search['status'];
		}
		/*if($search['user_id'] && $search['user_id'] != '')
		{
			if($where != 'WHERE')
			{
				$where .= ' AND';
			}
			$where .= " pu.user_id = ".$search['user_id'];
		}*/
		
		if($where == 'WHERE')
		{
			$where = "";
		}
		
		/*echo "SELECT p.*, COUNT(plk.id) as like_count, u.full_name as user_name, c.eng_name as city_name, co.eng_country_name as country_name FROM projects p LEFT OUTER JOIN project_users pu ON p.id = pu.project_id LEFT OUTER JOIN project_languages pl ON p.id = pl.project_id LEFT OUTER JOIN project_skills ps ON p.id = ps.project_id LEFT OUTER JOIN user_interests ui ON pu.user_id = ui.user_id LEFT OUTER JOIN project_likes plk ON plk.project_id = p.id LEFT OUTER JOIN city c ON p.city_id=c.id LEFT OUTER JOIN users u ON u.id = p.user_id LEFT OUTER JOIN countries co ON co.id = p.country_id ".$where." GROUP BY p.id";
		exit;*/
		
		$query = $this->db->query("SELECT p.*, COUNT(plk.id) as like_count, u.full_name as user_name, u.image_url as user_image, c.eng_name as city_name, co.eng_country_name as country_name FROM projects p LEFT OUTER JOIN project_users pu ON p.id = pu.project_id LEFT OUTER JOIN project_languages pl ON p.id = pl.project_id LEFT OUTER JOIN project_skills ps ON p.id = ps.project_id LEFT OUTER JOIN user_interests ui ON pu.user_id = ui.user_id LEFT OUTER JOIN project_likes plk ON plk.project_id = p.id LEFT OUTER JOIN city c ON p.city_id=c.id LEFT OUTER JOIN users u ON u.id = p.user_id LEFT OUTER JOIN countries co ON co.id = p.country_id ".$where." GROUP BY p.id");	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
	}
	 
	//project list based on filter
	function getSearchProject($search)
	{
		$where = "WHERE";
		if($search['interest_id'] && $search['interest_id'] != '')
		{
			$where .= " ui.interest_id = ".$search['interest_id'];
		}
		if($search['city_id'] && $search['city_id'] != '')
		{
			if($where != 'WHERE')
			{
				$where .= ' AND';
			}
			$where .= " p.city_id = ".$search['city_id'];
		}
		if($search['skill_id'] && $search['skill_id'] != '')
		{
			if($where != 'WHERE')
			{
				$where .= ' AND';
			}
			$where .= " ps.skill_id = ".$search['skill_id'];
		}
		if($search['age'] && $search['age'] != '')
		{
			if($where != 'WHERE')
			{
				$where .= ' AND';
			}
			$where .= " p.age = ".$search['age'];
		}
		if($search['gender'] && $search['gender'] != '')
		{
			if($where != 'WHERE')
			{
				$where .= ' AND';
			}
			$where .= " p.gender = ".$search['gender'];
		}
		if($search['query'] && $search['query'] != '')
		{
			if($where != 'WHERE')
			{
				$where .= ' AND';
			}
			$where .= " (p.title LIKE '%".$search['query']."%' OR p.project_description LIKE '%".$search['query']."%')";
		}
		if($where == 'WHERE')
		{
			$where = "";
		}
		
		/*echo "SELECT p.*, u.full_name as user_name, c.eng_name as city_name, co.eng_country_name as country_name FROM projects p LEFT OUTER JOIN project_users pu ON p.id = pu.project_id LEFT OUTER JOIN project_languages pl ON p.id = pl.project_id LEFT OUTER JOIN project_skills ps ON p.id = ps.project_id LEFT OUTER JOIN user_interests ui ON pu.user_id = ui.user_id LEFT OUTER JOIN project_likes plk ON plk.project_id = p.id LEFT OUTER JOIN city c ON p.city_id=c.id LEFT OUTER JOIN users u ON u.id = p.user_id LEFT OUTER JOIN countries co ON co.id = p.country_id ".$where." GROUP BY p.id";
		exit;*/
		
		$query = $this->db->query("SELECT p.*, u.full_name as user_name, c.eng_name as city_name, co.eng_country_name as country_name FROM projects p LEFT OUTER JOIN project_users pu ON p.id = pu.project_id LEFT OUTER JOIN project_languages pl ON p.id = pl.project_id LEFT OUTER JOIN project_skills ps ON p.id = ps.project_id LEFT OUTER JOIN user_interests ui ON pu.user_id = ui.user_id LEFT OUTER JOIN project_likes plk ON plk.project_id = p.id LEFT OUTER JOIN city c ON p.city_id=c.id LEFT OUTER JOIN users u ON u.id = p.user_id LEFT OUTER JOIN countries co ON co.id = p.country_id ".$where." GROUP BY p.id");	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return array();
		}	
	}
	//SELECT p.*, u.full_name as user_name, c.eng_name as city_name, co.eng_country_name as country_name FROM projects p LEFT OUTER JOIN project_users pu ON p.id = pu.project_id LEFT OUTER JOIN project_languages pl ON p.id = pl.project_id LEFT OUTER JOIN project_skills ps ON p.id = ps.project_id LEFT OUTER JOIN user_interests ui ON pu.user_id = ui.user_id LEFT OUTER JOIN project_likes plk ON plk.project_id = p.id LEFT OUTER JOIN city c ON p.city_id=c.id LEFT OUTER JOIN users u ON u.id = p.user_id LEFT OUTER JOIN countries co ON co.id = p.country_id WHERE ui.interest_id = 2 AND p.city_id = 1 AND ui.interest_id = 2 AND ps.skill_id = 2 AND p.active_status = 1 AND u.age = 28 AND u.gender = 1 GROUP BY p.id
	
	//user list based on filter
	function getUsersList($search)
	{
		$where = "";
		if($search['query'] && $search['query'] != '')
		{
			$where .= " WHERE u.full_name LIKE '%".$search['query']."%'";
		}
		if($search['city_id'] && $search['city_id'] != '')
		{
			$where .= " AND u.city = ".$search['city_id'];
		}
		if($search['interest_id'] && $search['interest_id'] != '')
		{
			$where .= " AND ui.interest_id = ".$search['interest_id'];
		}
		if($search['skill_id'] && $search['skill_id'] != '')
		{
			$where .= " AND us.skill_id = ".$search['skill_id'];
		}
		if($search['gender'] && $search['gender'] != '')
		{
			$where .= " AND u.gender = ".$search['gender'];
		}
		if($search['project_id'] && $search['project_id'] != '')
		{
			$where .= " AND (p.id=".$search['project_id']." OR pu.project_id=".$search['project_id'].")";
		}
		
		$query = $this->db->query("SELECT u.* FROM users u LEFT OUTER JOIN user_interests ui ON u.id = ui.user_id Left OUTER JOIN user_skills us ON u.id = us.user_id LEFT OUTER JOIN project_users pu ON u.id = pu.user_id LEFT OUTER JOIN projects p ON u.id = p.user_id ".$where." GROUP BY u.id");	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
	}
	
	//getLanguageByUserId
	function getUserLanguages($user_id)
	{
		$query = $this->db->query("SELECT l.* FROM languages l LEFT OUTER JOIN user_languages ul ON l.id=ul.language_id WHERE ul.user_id=".$user_id);	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
	}
	
	//getInterestByUserId
	function getUserInterests($user_id)
	{
		$query = $this->db->query("SELECT i.* FROM interests i LEFT OUTER JOIN user_interests ui ON i.id=ui.interest_id WHERE ui.user_id=".$user_id);	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
	}
	
	//getSkillByUserId
	function getUserSkills($user_id)
	{
		$query = $this->db->query("SELECT s.* FROM skills s LEFT OUTER JOIN user_skills us ON s.id=us.skill_id WHERE us.user_id=".$user_id);	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
	}
	
	//getDraftedProjectDetail
	function getDraftedProjectDetail()
	{
		$query = $this->db->query("SELECT p.*, c.eng_name as city_name FROM projects p LEFT OUTER JOIN city c ON p.city_id=c.id WHERE p.active_status=0");	
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}	
	}
	
	//getProjectDetail
	function getProjectDetail($project_id)
	{
		$query = $this->db->query("SELECT p.*, u.full_name as user_name, u.image_url as user_image, c.eng_name as city_name, co.eng_country_name as country_name FROM projects p LEFT OUTER JOIN city c ON p.city_id=c.id LEFT OUTER JOIN users u ON u.id = p.user_id LEFT OUTER JOIN countries co ON co.id = p.country_id WHERE p.id=".$project_id);	
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}	
	}
	
	//getProjectDetail
	function getProjectDetailImage($project_id, $user_id)
	{
		$query = $this->db->query("SELECT * FROM project_images WHERE project_id=".$project_id." AND user_id=".$user_id);	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return array();
		}	
	}
	
	//getProjectUserImages
	function getProjectUserImages($project_id)
	{
		$query = $this->db->query("SELECT u.image_url FROM users u LEFT OUTER JOIN project_users pu ON u.id = pu.user_id WHERE pu.project_id=".$project_id);	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return array();
		}	
	}

	//getCurrentUserProfile
	function getCurrentUserProfile($user_id)
	{
		echo $query = "SELECT u.full_name, CONCAT(city.eng_name,', ', countries.eng_country_name) as address, u.age, u.image_url as profile_pic, p.project_description, p.title as project_joined, proj.title as project_created FROM users u LEFT OUTER JOIN city ON u.city=city.id LEFT OUTER JOIN countries ON u.country=countries.id LEFT OUTER JOIN project_users pu ON u.id = pu.user_id LEFT OUTER JOIN projects p ON pu.project_id = p.id LEFT OUTER JOIN projects proj ON u.id = proj.user_id WHERE u.id=".$user_id;
		exit();
		$query = $this->db->query($query);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	//
	
}