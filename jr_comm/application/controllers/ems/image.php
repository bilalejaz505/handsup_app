<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Image extends CI_Controller {

    public $layout = 'admin_inner';

    function __construct() {
        parent::__construct();
        $this->layout = 'admin_inner';
        checkAdminSession();
    }

    //main index function for the controller dashboard
    //loding the main view
    public function index() {
        $this->manageImage();
    }
    public function uploadArbFile($id,$content='',$image_location='') {

        $this->load->library('ali_upload');
        $config['upload_path'] = './uploads/content/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->ali_upload->setConfig($config);
        if ($this->ali_upload->multi_uploadContents($_FILES[$image_location], $image_location.'[]')) {
            $files = $this->ali_upload->files;
            var_dump($files);
            foreach ($files as $file) {
                $this->load->model('ems/model_content_images');
                 if($content=='banner'){
                $images = $this->model_content_images->fetchBannerImages($id);
            }elseif($content=='side'){
                $images = $this->model_content_images->side_arb($id);
            }
             foreach ($images as $image) {
                    if ($image->arb_image != '') {
                        $imagePath = 'uploads/content/' . $image->arb_image;
                        $thumbPath = 'uploads/content/thumbs/' . $image->arb_image_thumb;
                        if (file_exists($imagePath))
                            unlink($imagePath);
                        if (file_exists($thumbPath))
                            unlink($thumbPath);
                        $this->model_content_images->deleteImage($image->id);
                    }
                } 
                $fileData = array();
                if($content == 'banner'){
                $fileData['bannerId'] = $id;
            }elseif($content == 'side'){
                 $fileData['sideBariId'] = $id;
            }
                $fileData['content_id'] = -1;
                $fileData['homeSlider_id'] = -1; 
                $fileData['arb_image'] = $file;
                $fileData['arb_image_thumb'] = explode('.', $file)[0] . '_thumb.' . explode('.', $file)[1];
                $fileData['eng_image'] = '';
                $fileData['eng_image_thumb'] = '';
                $this->model_content_images->saveImage($fileData);
                echo "COMPLETED - " . $this->ali_upload->message;
            }
        } else {
            echo "ERROR - " . $this->ali_upload->error;
        }
    }

    public function uploadEngFile($id,$content='',$image_location='') {
        $this->load->library('ali_upload');
        $config['upload_path'] = './uploads/content/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->ali_upload->setConfig($config);
        if ($this->ali_upload->multi_uploadContents($_FILES[$image_location], $image_location.'[]')) {
            $files = $this->ali_upload->files;
           // var_dump($files);
            foreach ($files as $file) {
                $this->load->model('ems/model_content_images');
                if($content=='banner'){
                $images = $this->model_content_images->fetchBannerImages($id);
            }elseif($content=='side'){
                $images = $this->model_content_images->side_eng($id);
            }
              foreach ($images as $image) {
                    if ($image->eng_image != '') {
                        $imagePath = 'uploads/content/' . $image->eng_image;
                        $thumbPath = 'uploads/content/thumbs/' . $image->eng_image_thumb;
                        if (file_exists($imagePath))
                            unlink($imagePath);
                        if (file_exists($thumbPath))
                            unlink($thumbPath);
                        $this->model_content_images->deleteImage($image->id);
                    }
                } 
                $fileData = array();
                 if($content == 'banner'){
                $fileData['bannerId'] = $id;
            }elseif($content == 'side'){
                 $fileData['sideBariId'] = $id;
            }
                $fileData['content_id'] = -1;
                $fileData['homeSlider_id'] = -1;                
                $fileData['eng_image'] = $file;
                $fileData['eng_image_thumb'] = explode('.', $file)[0] . '_thumb.' . explode('.', $file)[1];
                $fileData['arb_image'] = '';
                $fileData['arb_image_thumb'] = '';
                $this->model_content_images->saveImage($fileData);
                echo "COMPLETED - " . $this->ali_upload->message;
            }
        } else {
            echo "ERROR - " . $this->ali_upload->error;
        }
    }
// Images uploading for sliders ,clients ,projects
     public function slide_type_eng($homeSliderId) {
        $this->load->library('ali_upload');
        $config['upload_path'] = './uploads/content/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->ali_upload->setConfig($config);
        if ($this->ali_upload->multi_uploadContents($_FILES['arb_user_file'], 'arb_user_file[]')) {
            $files = $this->ali_upload->files;
            var_dump($files);
            foreach ($files as $file) {
                $this->load->model('ems/model_content_images');
                $images = $this->model_content_images->fetchSlideImages($homeSliderId);
                foreach ($images as $image) {
                    if ($image->arb_image != '') {
                        $imagePath = 'uploads/content/' . $image->arb_image;
                        $thumbPath = 'uploads/content/thumbs/' . $image->arb_image_thumb;
                        if (file_exists($imagePath))
                            unlink($imagePath);
                        if (file_exists($thumbPath))
                            unlink($thumbPath);
                        $this->model_content_images->deleteImage($image->id);
                    }
                }
                $fileData = array();
                $fileData['content_id'] = -1;
                //$fileData['hotel_id'] = -1;
                $fileData['homeSlider_id'] = $homeSliderId; 
                $fileData['arb_image'] = $file;
                $fileData['arb_image_thumb'] = explode('.', $file)[0] . '_thumb.' . explode('.', $file)[1];
                $fileData['eng_image'] = '';
                $fileData['eng_image_thumb'] = '';
                $this->model_content_images->saveImage($fileData);
                echo "COMPLETED - " . $this->ali_upload->message;
            }
        } else {
            echo "ERROR - " . $this->ali_upload->error;
        }
    }

    public function slide_type_arb($homeSliderId) {
        $this->load->library('ali_upload');
        $config['upload_path'] = './uploads/content/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->ali_upload->setConfig($config);
        if ($this->ali_upload->multi_uploadContents($_FILES['user_file'], 'user_file[]')) {
            $files = $this->ali_upload->files;
            var_dump($files);
            foreach ($files as $file) {
                $this->load->model('ems/model_content_images');
                $images = $this->model_content_images->fetchSlideImages($homeSliderId);
                foreach ($images as $image) {
                    if ($image->eng_image != '') {
                        $imagePath = 'uploads/content/' . $image->eng_image;
                        $thumbPath = 'uploads/content/thumbs/' . $image->eng_image_thumb;
                        if (file_exists($imagePath))
                            unlink($imagePath);
                        if (file_exists($thumbPath))
                            unlink($thumbPath);
                        $this->model_content_images->deleteImage($image->id);
                    }
                }
                $fileData = array();
                $fileData['content_id'] = -1;
                //$fileData['hotel_id'] = -1;
                $fileData['homeSlider_id'] = $homeSliderId;                
                $fileData['eng_image'] = $file;
                $fileData['eng_image_thumb'] = explode('.', $file)[0] . '_thumb.' . explode('.', $file)[1];
                $fileData['arb_image'] = '';
                $fileData['arb_image_thumb'] = '';
                $this->model_content_images->saveImage($fileData);
                echo "COMPLETED - " . $this->ali_upload->message;
            }
        } else {
            echo "ERROR - " . $this->ali_upload->error;
        }
    }

// end functions    
    public function deletePhoto() {
        $this->layout = '';
        $this->load->model('ems/model_content_images');
        $id = $_POST['id'];
        $image = $this->model_content_images->fetchImage($id);        

        $imagePath = '';
        $thumbPath = '';
        if ($image->eng_image != '') {
            $imagePath = 'uploads/content/' . $image->eng_image;
            $thumbPath = 'uploads/content/thumbs/' . $image->eng_image_thumb;
        } else {
            $imagePath =  'uploads/content/' . $image->arb_image;
            $thumbPath = 'uploads/content/thumbs/' . $image->arb_image_thumb;
        }

        if (file_exists($imagePath))
            unlink($imagePath);
        if (file_exists($thumbPath))
            unlink($thumbPath);

        $result = $this->model_content_images->deleteImage($id);
        log_insert($this->uri->segment(2), 'delete a photo in');
        echo $result;
    }

    private function deletePhotos($id) {
        $this->load->model('ems/model_content_images');
        $images = $this->model_content_images->fetchSlideImages($id);
        
        foreach ($images as $image) {
            $imagePath = '';
            $thumbPath = '';
            if ($image->eng_image != '') {
                $imagePath = 'uploads/content/' . $image->eng_image;
                $thumbPath = 'uploads/content/thumbs/' . $image->eng_image_thumb;
            } else {
                $imagePath = 'uploads/content/' . $image->arb_image;
                $thumbPath = 'uploads/content/thumbs/' . $image->arb_image_thumb;
            }

            if (file_exists($imagePath))
                unlink($imagePath);
            if (file_exists($thumbPath))
                unlink($thumbPath);

            $result = $this->model_content_images->deleteImage($image->id);
            log_insert($this->uri->segment(2), 'delete a photo in');
        }
    }

    public function publish() {
        $this->layout = '';
        $this->load->model('ems/model_slider');
        $id = $_POST['id'];
        $status = $_POST['pub_status'];
        $result = $this->model_slider->publishStatus($status, $id);
    }

    public function delete() {
        $this->layout = '';
        $this->load->model('ems/model_slider');
        $id = $_POST['id'];
        log_insert($this->uri->segment(2), 'delete a record in');
        $result = $this->model_slider->delete($id);
        $this->deletePhotos($id);
    }

    

   

}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */