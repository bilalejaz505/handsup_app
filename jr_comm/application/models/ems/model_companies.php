<?php

class Model_companies extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}

	function save($data) {
		$this->db->set($data);
		$this->db->insert('companies');
		$insertId=$this->db->insert_id();
		if($insertId>0)
		{
			return $insertId;
		}
		else{
			return false;
		}
			
	}
        
        public function saveIndustries($industdata) {
            $this->db->set($industdata);
            $this->db->insert('company_industry');
            $insertId = $this->db->insert_id();
            if ($insertId > 0) {
                return $insertId;
            } else {
                return false;
            }
        }
        
        public function savecountries($countrydata) {
            $this->db->set($countrydata);
            $this->db->insert('company_country');
            $insertId = $this->db->insert_id();
            if ($insertId > 0) {
                return $insertId;
            } else {
                return false;
            }
        }
        
        public function getselectedIndust($id){
            $this->db->select('*');
            $this->db->from('company_industry');
            $this->db->where('comp_id', "$id");
            $query = $this->db->get();
            $result = $query->result_array();

                    if(!empty($result)){
                            return $result;
                    }
                    else{
                            return false;
                    }
        }
        
        public function getselectedcountry($id){
            $this->db->select('*');
            $this->db->from('company_country');
            $this->db->where('comp_id', "$id");
            $query = $this->db->get();
            $result = $query->result_array();

                    if(!empty($result)){
                            return $result;
                    }
                    else{
                            return false;
                    }
        }
        
        public function deleteIndustries($id){
		
		$query=$this->db->query("delete from company_industry WHERE comp_id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
        
        public function deletecountries($id){
		
		$query=$this->db->query("delete from company_country WHERE comp_id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
        
        
        public function fetchcomp_images(){
            $this->db->select('*');
            $this->db->from('company_image');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }
        
        public function fetchRow_images(){
			
		$this->db->select('*');
		$this->db->from('company_image');
                $this->db->order_by('id','DESC');
                $this->db->limit (1);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
        }
        
        function saveimage($data) {
            $this->db->set($data);
            $this->db->insert('company_image');
            $insertId = $this->db->insert_id();
            if ($insertId > 0) {
                return $insertId;
            } else {
                return false;
            }
        }
        
        function updateimage($data,$id) {
            $loggedInUserId = $this->session->userdata('id');
            $query = $this->db->query("UPDATE company_image SET
                            image_name='" . $data['image_name'] . "',
                            eng_image_title='" . $data['eng_image_title'] . "',
                            arb_image_title='" . $data['arb_image_title'] . "',

                            image_updated_at='" . date('Y-m-d H:i:s') . "',
                            image_updated_by='" . $loggedInUserId . "',
                            image_pub_status='" . $data['image_pub_status'] . "' WHERE id = '$id'");

            if ($query > 0) {
                return true;
            } else {
                return false;
            }
        }
        
        public function deletecompimage($id){
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("update company_image  set image_name ='',image_updated_at='".date('Y-m-d H:i:s')."',image_updated_by='".$loggedInUserId."' WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
        
    
    
        
	function deletesubCategoriesthumbs($prdcateg_id,$user_id){
		
		$this->db->select('*');
		$this->db->from('product_photos');
		$this->db->where('prdcateg_id',$prdcateg_id);
		
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			
				$query=$this->db->query("delete from product_photos WHERE flag='1' and user_id='$user_id' and prdcateg_id =".$prdcateg_id);
				if ($query) {
					return true;
				} else {
					return false;
				}
			} else {
			return false;
		}
		
		
	}
	function fetchsubCategoriesthumbs($prdcateg_id){
		
		$this->db->select('*');
		$this->db->from('product_photos');
		$this->db->where('prdcateg_id',$prdcateg_id);
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
		
	}
	function uploadPhotos($data){
	
	  $this->db->set($data);
		$this->db->insert('product_photos');
		$insertId=$this->db->insert_id();
		if($insertId>0)
		{
			return $insertId;
		}
		else{
			return false;
		}
		
	}
	
	function fetchtableproducts($id){
		
		$this->db->select('*');
		$this->db->from('product_table');
		$this->db->where('prdcateg_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
		
	}
	function fetchsubCategories($id){
		
		$this->db->select('*');
		$this->db->from('sub_category');
		$this->db->where('categ_id',$id);
                $this->db->order_by('sort_col','ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
		
	}
	
	function saveCategory($data) {
		$this->db->set($data);
		$this->db->insert('products_category');
		$insertId=$this->db->insert_id();
		if($insertId>0)
		{
			return $insertId;
		}
		else{
			return false;
		}
			
	}
	
	function savesubCategory($data) {
		$this->db->set($data);
		$this->db->insert('sub_category');
		$insertId=$this->db->insert_id();
		if($insertId>0)
		{
			return $insertId;
		}
		else{
			return false;
		}
			
	}
	
	function savesubtable($data) {
		
		$this->db->set($data);
		$this->db->insert('product_table');
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
		//echo "Inside update <br>";exit;
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("UPDATE companies SET   
                        cmp_country_id='".$data['cmp_country_id']."',
                            
                        eng_cmp_title='".$data['eng_cmp_title']."',
                        eng_cmp_desc='".$data['eng_cmp_desc']."',   
                            
                        arb_cmp_title='".$data['arb_cmp_title']."',
                        arb_cmp_desc='".$data['arb_cmp_desc']."',
                            
                        cmp_photo='".$data['cmp_photo']."',
                            
                        meta_title_eng='".$data['meta_title_eng']."',
                        meta_title_arb='".$data['meta_title_arb']."',
                        meta_desc_eng='".$data['meta_desc_eng']."',
                        meta_desc_arb='".$data['meta_desc_arb']."',
                        meta_keywords_eng='".$data['meta_keywords_eng']."',
                        meta_keywords_arb='".$data['meta_keywords_arb']."',                        
                        cmp_updated_by='".$loggedInUserId."',
                        cmp_updated_at='".date('Y-m-d H:i:s')."' WHERE id = '$id'");
		if($query>0)
		{
			return true;
		}
		else{
			return false;
		}
			
	}
        
    function updateTable($data,$id){
		
		$query=$this->db->query("UPDATE product_table SET    eng_prd_title='".$data['eng_prd_title']."',eng_prd_type='".$data['eng_prd_type']."', eng_prd_dim='".$data['eng_prd_dim']."',eng_prd_length='".$data['eng_prd_length']."', arb_prd_title='".$data['arb_prd_title']."',pub_status='".$data['pub_status']."',updated_at='".date('Y-m-d H:i:s')."' WHERE id = '$id'");
		if($query>0)
		{
			return true;
		}
		else{
			return false;
		}
		
	}        

	public function fetchAll() {

		$this->db->select('*');
		$this->db->from('companies');
		$this->db->order_by('sort_col','ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
			
	}
        
        
	public function fetchAllCountries() {

		$this->db->select('*');
		$this->db->from('countries');
                $this->db->where('pub_status',1);
                $this->db->order_by('sort_col','ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
			
	}
        
        public function fetchAllIndustry() {

		$this->db->select('*');
		$this->db->from('industries');
                $this->db->where('pub_status',1);
                $this->db->order_by('sort_col','ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
			
	}
        
	public function getid() {

		$this->db->select('*');
		$this->db->from('products');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			$data=$query->result_array();
			return $id=$data[0]['id'];
		} else {
			return 0;
		}
			
	}        

    public function listBrands(){
		
		$this->db->select('*');
		$this->db->from('brands');
		$this->db->where('brand_pub_status',1);
		$query = $this->db->get();
		
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
			
		
	}

	public function fetchRow($id){
			
		$this->db->select('*');
		$this->db->from('companies');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
	}
        
	public function getTableData($id){
			
		$this->db->select('*');
		$this->db->from('product_table');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return false;
		}
	}        


	public function delete($id){
			
		$query=$this->db->query("delete from companies WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
        
        
	public function deleteTable($id){
			
		$query=$this->db->query("delete from product_table WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}        
	

	public function deletePhoto($id){
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("update products  set prd_photo ='',prd_updated_at='".date('Y-m-d H:i:s')."',prd_updated_by='".$loggedInUserId."' WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
        
        
        
        
	public function deletePhoto2($id){
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("update products  set prd_background ='',prd_updated_at='".date('Y-m-d H:i:s')."',prd_updated_by='".$loggedInUserId."' WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}        

	public function publishStatus($val,$id){
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("update companies set cmp_pub_status='".$val."',cmp_updated_at='".date('Y-m-d H:i:s')."',cmp_updated_by='".$loggedInUserId."' WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
        
	
	public function publishsubStatus($val,$id){
		
		$query=$this->db->query("update sub_category set pub_status='".$val."' WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
        
        
        public function search($q) {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->like('eng_prd_desc', $q);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function searchCat($q) {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->like('subcateg_desc', $q);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }   

     public function srtColUpdate($ids) {

        foreach ($ids as $id=>$val) {
            $data['sort_col'] = $val;
            $this->db->where("id", $id);
            $this->db->update("companies", $data);
        }
    }
}//end