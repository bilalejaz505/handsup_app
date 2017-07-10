<?php

class Model_catalogs extends CI_Model {

	function _construct() {
		// Call the Model constructor
		parent::_construct();
	}

	function save($data) {
		$this->db->set($data);
		$this->db->insert('catalogs');
		$insertId=$this->db->insert_id();
		if($insertId>0)
		{
			return $insertId;
		}
		else{
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
		$query=$this->db->query("UPDATE catalogs SET   
                        prd_cat_id='".$data['prd_cat_id']."',
                        prd_sub_cat='".$data['prd_sub_cat']."',
                        prd_pub_status='".$data['prd_pub_status']."',
                        prd_view_type='".$data['prd_view_type']."',
                        prd_updated_at='".date('Y-m-d H:i:s')."',                           
                        prd_photo='".$data['prd_photo']."',
                        prd_thumb='".$data['prd_thumb']."',
                            
                        eng_prd_title='".$data['eng_prd_title']."',
                        eng_prd_file='".$data['eng_prd_file']."',
                        arb_prd_title='".$data['arb_prd_title']."',
                        arb_prd_file='".$data['arb_prd_file']."',
                        chn_prd_title='".$data['chn_prd_title']."',
                        chn_prd_file='".$data['chn_prd_file']."',
                            
                            
                        prd_updated_by='".$loggedInUserId."'
                        WHERE id = '$id'");
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
		$this->db->from('catalogs');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
			
	}
        
        
	public function fetchAllCategories() {

		$this->db->select('*');
		$this->db->from('products_category');
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			return $query->result_array();
		} else {
			return false;
		}
			
	}
        
	public function getid() {

		$this->db->select('*');
		$this->db->from('catalogs');
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
		$this->db->from('catalogs');
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
			
		$query=$this->db->query("delete from catalogs WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
        

	public function deleteFile($id,$file){
		$loggedInUserId=$this->session->userdata('id');                
                if($file=='eng_prd_file'){
                    $column_name = 'eng_prd_file';
                }
                elseif($file=='arb_prd_file'){
                   $column_name = 'arb_prd_file';
                }
                elseif($file=='chn_prd_file'){
                    $column_name = 'chn_prd_file';
                }
                else{
                    $column_name = 'eng_prd_file';
                }                
		$query=$this->db->query("update catalogs  set ".$column_name." ='',prd_updated_at='".date('Y-m-d H:i:s')."',prd_updated_by='".$loggedInUserId."' WHERE id =".$id);

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
		$query=$this->db->query("update catalogs  set prd_photo ='',prd_thumb ='',prd_updated_at='".date('Y-m-d H:i:s')."',prd_updated_by='".$loggedInUserId."' WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}

	public function publishStatus($val,$id){
		$loggedInUserId=$this->session->userdata('id');	
		$query=$this->db->query("update catalogs set prd_pub_status='".$val."',prd_updated_at='".date('Y-m-d H:i:s')."',prd_updated_by='".$loggedInUserId."' WHERE id =".$id);
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
        
public function publishTable($val,$id){
		
		$query=$this->db->query("update product_table set pub_status='".$val."' WHERE id =".$id);
		if ($query) {
			return true;
		} else {
			return false;
		}

	}
        
        public function search($q) {
        $this->db->select('*');
        $this->db->from('catalogs');
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
	function getgalpics($id) {
        $this->db->select('*');
        $this->db->from('catagallery_pics');
        $this->db->where('catalog_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    } 
	public function fetchLastupdatedGPics($id) {
        $this->db->select('max(pic_updated_at)');
        $this->db->from('catagallery_pics');
		$this->db->where('catalog_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
	public function publishStatusGalleryPhoto($val, $id) {
         $loggedInUserId = $this->session->userdata('id');
        $query = $this->db->query("update catagallery_pics set pic_pub_status='" . $val . "',pic_updated_at='" . date('Y-m-d H:i:s') . "',pic_updated_by='" . $loggedInUserId . "' WHERE id =" . $id);
        if ($query) {
            return true;
        } else {
            return false;
        }
    } 
	public function fetchThumbsAll($id) {
        $this->db->select('*');
        $this->db->from('catagallery_pics');
        $this->db->where('catalog_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    } 
	function gettotalAlbumpics($gal_id) {
        $this->db->select('*');
        $this->db->from('catagallery_pics');
        $this->db->where('catalog_id', $gal_id);
        $query = $this->db->get();
        return $query->num_rows();
    }
	function upload($data) {
        $this->db->set($data);
        $this->db->insert('catagallery_pics');
        $insertId = $this->db->insert_id();
        if ($insertId > 0) {
            return $insertId;
        } else {
            return false;
        }
    }  
	public function updatePicturesTitle($data, $id, $catalog_id) {
        $loggedInUserId = $this->session->userdata('id');
        $query = $this->db->query("UPDATE catagallery_pics SET pic_pub_status='" . $data['pic_pub_status'] . "',eng_pic_title='" . $data['eng_pic_title'] . "',pic_updated_at='" . date('Y-m-d H:i:s') . "',pic_updated_by='" . $loggedInUserId . "' WHERE id = '$id' AND catalog_id='$catalog_id'");
        if ($query > 0) {
            return true;
        } else {
            return false;
        }
    }
		public function updateGalleryPictures($data, $id, $catalog_id) {
        $loggedInUserId = $this->session->userdata('id');
        $query = $this->db->query("UPDATE catagallery_pics SET pic_pub_status='" . $data['pic_pub_status'] . "', eng_pic_title='" . $data['eng_pic_title'] . "',arb_pic_title='" . $data['arb_pic_title'] . "',chn_pic_title='" . $data['chn_pic_title'] . "',eng_pic_desc='" . $data['eng_pic_desc'] . "',arb_pic_desc='" . $data['arb_pic_desc'] . "',chn_pic_desc='" . $data['chn_pic_desc'] . "',pic_name='" . $data['pic_name'] . "',pic_updated_at='" . date('Y-m-d H:i:s') . "',pic_updated_by='" . $loggedInUserId . "' WHERE id = '$id' AND catalog_id='$catalog_id'");
        if ($query > 0) {
            return true;
        } else {
            return false;
        }
    }
	public function deleteCataGallPhoto($id) {
			$loggedInUserId = $this->session->userdata('id');
        $query = $this->db->query("update catagallery_pics  set pic_name ='',pic_thumb ='',pic_updated_at='" . date('Y-m-d H:i:s') . "',pic_updated_by='" . $loggedInUserId . "' WHERE id =" . $id);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }   
}//end