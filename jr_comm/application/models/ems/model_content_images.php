<?php

class Model_content_images extends CI_Model {

    function _construct() {
        parent::_construct(); /* Call the Model constructor */
    }

    public function fetchImages($contentId) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('content_id', $contentId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
       public function fetchProductImages($id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
   
      public function fetchNewsImages($id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('news_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
      public function fetchCelenderImages($id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('celender_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function fetchNewsImagesEng($id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('news_id',$id);
        $this->db->where('eng_image !=""');
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $image = $query->result();
            return $image[0]->eng_image;
        } else {
            return false;
        }
    }
    public function fetchNewsImagesArb($id) {

        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('news_id',$id);
        $this->db->where('arb_image != ""');
        $this->db->limit(1);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $image = $query->result();
            return $image[0]->arb_image;
        } else {
            return false;
        }
    }
    public function fetchCatagoryImages($id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('catagory_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function fetchProjectImages($projectId) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('project_id', $projectId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function fetchServiceImages($id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('service_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

     public function fetchHomeImages($projectId) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('homeSlider_id', $projectId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function fetchAllSlides() {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('homeSlider_id !=', -1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	public function side_eng($id){
	
		$this->db->select('*');
		$this->db->from('content_images');
		$this->db->where('sideBariId =',$id);
		$this->db->where('eng_image !=', "");
		$this->db->order_by("id", "desc");
		$this->db->limit(4);
		 $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
		
	}
	public function side_arb($id){
	
		$this->db->select('*');
		$this->db->from('content_images');
		$this->db->where('sideBariId =',$id);
		$this->db->where('arb_image !=', "");
		$this->db->order_by("id", "desc");
		$this->db->limit(4);
		 $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
		
	}

    public function fetchCustomImages($contentId, $custom_id) {
        $query = $this->db->query("select * from content_images where content_id=" . $contentId . " and custom_id=" . $custom_id);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function fetchHotelImages($hotelId) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('hotel_id', $hotelId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function fetchSlideImages($slideId) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('homeSlider_id', $slideId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
     public function fetchMagzineImages($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('magzine_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
      public function fetchELibraryImages($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('e_library_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
       public function fetchDownCenterImages($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('down_center_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
     public function fetchDownCenterPdf($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('down_center_file_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


     public function fetchDocumentShareImages($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('document_share_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function fetchGalleryImages($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('gallery_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
     public function fetchAlbumImages($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('album_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
     public function fetchDocumentSharePdf($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('document_share_file_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

     public function fetchMemberImages($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('member_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
     public function fetchBlogImages($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('blog_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

     public function fetchMagzinePdf($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('pdf_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
      public function fetchELibraryPdf($Id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('e_library_pdf_id', $Id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
     public function fetchPartnerImagess($slideId) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('partner_id', $slideId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function fetchClientImages($slideId) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('project_id', $slideId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

	public function fetchSideImages($projectId) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('sideBariId', $projectId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function fetchBannerImages($projectId) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('bannerId', $projectId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function fetchAllProjects() {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('project_id !=', -1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

   
    public function fetchAllPartnerImages() {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('partner_id !=', -1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function fetchAllClientImages() {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('client_id !=', -1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function fetchImage($id) {
        $this->db->select('*');
        $this->db->from('content_images');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function saveImage($data) {
        $this->db->insert('content_images', $data);
        return $this->db->insert_id();
    }

    public function deleteImage($id) {
        $this->db->delete('content_images', array('id' => $id));
    }
 

    public function deleteImages($contentId) {
        $this->db->delete('content_images', array('content_id' => $contentId));
    }

}