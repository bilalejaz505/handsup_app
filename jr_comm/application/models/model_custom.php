<?php

class Model_custom extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}
	public function getid() {

		$this->db->select('*');
		$this->db->from('products_category');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			$data=$query->result_array();
			return $id=$data[0]['id'];
		} else {
			return 0;
		}

	}

    public function getCountryName($id) {

        $this->db->select('eng_country_name');
        $this->db->from('countries');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $data = $query->row();
            return $data;
        } else {
            return false;
        }
    }

    public function getCatName($id) {

        $this->db->select('*');
        $this->db->from('products_category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $data = $query->row();
            return $data;
        } else {
            return false;
        }
    }
	
	
    public function getCatalogCatName($id) {

        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $data = $query->row();
            return $data;
        } else {
            return false;
        }
    }	


    public function getSubCatName($id) {

        $this->db->select('subcateg_title,arb_name,chn_name');
        $this->db->from('sub_category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $data = $query->result_array();
        } else {
            return false;
        }
    }
	
    public function getSubCatalogName($id) {

        $this->db->select('subcateg_title,arb_name,chn_name');
        $this->db->from('sub_categories');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $data = $query->result_array();
        } else {
            return false;
        }
    }	



	public function fetchAllCategories() {

		$this->db->select('*');
		$this->db->from('products_category');
        $this->db->where('pub_status','1');
        $this->db->order_by('sort_col','ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}

	}
	
	
	public function fetch_CatalogCats() {

		$this->db->select('*');
		$this->db->from('categories');
        $this->db->where('pub_status','1');
        $this->db->order_by('sort_col','ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}

	}	

	public function fetchsubCategories($id){

		$this->db->select('*');
		$this->db->from('sub_category');
		$this->db->where('categ_id',$id);
		$this->db->where('pub_status','1');
        $this->db->order_by('sort_col','ASC');		
		$query = $this->db->get();

		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}

	}
	
	public function fetchCatalogSubCats($id){

		$this->db->select('*');
		$this->db->from('sub_categories');
		$this->db->where('categ_id',$id);
		$this->db->where('pub_status','1');
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
		$this->db->from('products_category');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
	}

        public function fetchRowSub($id){
		$this->db->select('*');
		$this->db->from('sub_category');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
	}


        public function fetchProducts(){

		$this->db->select('*');
		$this->db->from('products');
                $this->db->order_by('sort_col','ASC');
		$query = $this->db->get();
                //echo $query;exit;
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}

	}

        public function fetchProductsName($pro_ID){

		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id',$pro_ID);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
	}




	public function getSocailLinks($id){

		$this->db->select('*');
		$this->db->from('social_links');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
	}

        public function fetchContactSubject() {
		$this->db->select('*');
		$this->db->from('email_subjects');
		$this->db->where('sub_pub_status',1);
		$this->db->order_by('id','ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
                    return $query->result_array();
		} else {
			return false;
		}

	}

	public function fetchSubTitle($id){

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

    public function fetchLastupdated($table,$col) {
        $this->db->select("$col");
        $this->db->from($table);
        $this->db->order_by("$col","DESC");
        $this->db->limit("1");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }


	public function fetchConfig(){

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


}//end