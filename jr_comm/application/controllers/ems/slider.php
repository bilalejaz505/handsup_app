<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller {

    public $layout = 'admin_inner';

    function __construct() {
        parent::__construct();
        $this->layout = 'admin_inner';
        checkAdminSession();
    }

    //main index function for the controller dashboard
    //loding the main view
    public function index() {
       $this->manage();
    }

    public function manage() {
        $data = array();
        $this->load->model('ems/model_slider');
        $data['sliderList'] = $this->model_slider->fetchAll();
        $this->load->view('ems/homeSlider/manage', $data);
    }

    public function add() {

        $data = array();
		 $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'eng_slide_head',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "95%", //Setting a custom width
                'height' => '200px' //Setting a custom height
            )
        );

        $this->data['ckeditor2'] = array(
            //ID of the textarea that will be replaced
            'id' => 'eng_slide_desc',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "95%", //Setting a custom width
                'height' => '200px' //Setting a custom height
              
            )
        ); 
		
		 $this->data['ckeditor3'] = array(
            //ID of the textarea that will be replaced
            'id' => 'arb_slide_head',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "95%", //Setting a custom width
                'height' => '200px', //Setting a custom height
				'contentsLangDirection' => 'rtl',
                'language' => 'ar'
            )
			
        );

        $this->data['ckeditor4'] = array(
            //ID of the textarea that will be replaced
            'id' => 'arb_slide_desc',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "95%", //Setting a custom width
                'height' => '200px', //Setting a custom height
                'contentsLangDirection' => 'rtl',
                'language' => 'ar'
            )
        );  
		        $data = $this->data;
             
        $this->load->view('ems/homeSlider/add', $data);
    }

    public function edit() {
          $data = array();
		  
        $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'eng_slide_head',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "95%", //Setting a custom width
                'height' => '200px' //Setting a custom height
            )
        );

        $this->data['ckeditor2'] = array(
            //ID of the textarea that will be replaced
            'id' => 'eng_slide_desc',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "95%", //Setting a custom width
                'height' => '200px' //Setting a custom height
                
            )
        );   
        $this->data['ckeditor3'] = array(
            //ID of the textarea that will be replaced
            'id' => 'arb_slide_head',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "95%", //Setting a custom width
                'height' => '200px', //Setting a custom height
				'contentsLangDirection' => 'rtl',
                'language' => 'ar'
            )
        );

        $this->data['ckeditor4'] = array(
            //ID of the textarea that will be replaced
            'id' => 'arb_slide_desc',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "95%", //Setting a custom width
                'height' => '200px', //Setting a custom height
                'contentsLangDirection' => 'rtl',
                'language' => 'ar'
				
            )
        );             
        $data = $this->data;


        $this->load->model('ems/model_slider');
        $id = $this->uri->segment(5);
        if ($id) {            
            $this->load->model('ems/model_content_images');
            $data['slide'] = $this->model_slider->fetch($id);
            $data['photos'] = $this->model_content_images->fetchSlideImages($id);
            if (!empty($data)) {
                $this->load->view('ems/homeSlider/edit', $data);
            }
        }
    }


    public function addSlide() {

        $this->load->model('ems/model_slider');
        $data = array();
        $loggedInUserId = $this->session->userdata('id');

        $data['eng_slide_title'] = $this->input->post('eng_slide_title');

        $data['eng_slide_desc'] = $this->input->post('eng_slide_desc');
        $data['arb_slide_desc'] = $this->input->post('arb_slide_desc');
        
        $data['eng_slide_head'] = $this->input->post('eng_slide_head');
        $data['arb_slide_head'] = $this->input->post('arb_slide_head');
        $data['bg'] = $this->input->post('bg');
		$image_explode = explode('script/',$this->input->post('bg')); 
		$data['bg'] = $image_explode[1];
		$data['bg'] = str_replace(',','',$data['bg']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $loggedInUserId;

        if ($_POST['pub_val'] == '') {
            $status = 1;
        } else {
            $status = $_POST['pub_val'];
        }
        $data['pub_status'] = $status;

        $insert_id = $this->model_slider->save($data);
        log_insert($this->uri->segment(2), 'add a record in');
        
        /* Saving Slide Images */
       // $this->uploadEngFile($insert_id);
       // $this->uploadArbFile($insert_id);
        /* ------------------- */
        
        $this->session->set_flashdata('message', _okMsg('<p>Slide added successfully.</p>'));
        redirect($this->config->item('base_url') . 'ems/slider/manage');
    }

   

    public function updateSlide() {

        $id = $this->input->post('id');
        $this->load->model('ems/model_slider');
        $data = array();
        $loggedInUserId = $this->session->userdata('id');

        $data['eng_slide_title'] = $this->input->post('eng_slide_title');
        $data['arb_slide_title'] = $this->input->post('arb_slide_title');
        
        $data['eng_slide_desc'] = $this->input->post('eng_slide_desc');
        $data['arb_slide_desc'] = $this->input->post('arb_slide_desc');
		
		$data['bg'] = $this->input->post('bg');
		$image_explode = explode('script/',$this->input->post('bg')); 
		$data['bg'] = $image_explode[1];
		$data['bg'] = str_replace(',','',$data['bg']);
		
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $loggedInUserId;

        if ($_POST['pub_val'] == '') {
            $status = 1;
        } else {
            $status = $_POST['pub_val'];
        }
        $data['pub_status'] = $status;

        $this->model_slider->update($id, $data);
        log_insert($this->uri->segment(2), 'update a record in');
        $this->session->set_flashdata('message', _okMsg('<p>Slide Updated successfully.</p>'));
        redirect($this->config->item('base_url') . 'ems/slider/manage');
    }

    public function uploadArbFile($homeSliderId) {
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

    public function uploadEngFile($homeSliderId) {
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

    private function deletePhotos($hotelId) {
        $this->load->model('ems/model_content_images');
        $images = $this->model_content_images->fetchSlideImages($hotelId);
        
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