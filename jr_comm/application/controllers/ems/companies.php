<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends CI_Controller {

    public $layout = 'admin_inner';

    function __construct() {
        parent::__construct();
        $this->layout = 'admin_inner';
        checkAdminSession();
    }

    //main index function for the controller dashboard
    //loding the main view
    public function index() {

        $this->load->view('ems/products/manage');
    }

    public function manage() {
        $res = '';
        $this->load->model('ems/model_companies');
        $data['res'] = $this->model_companies->fetchAll();
        if (sizeof($data) > 0) {
            $this->load->view('ems/companies/manage', $data);
        }
        $this->session->set_userdata('gal_module', '');
    }

    public function add() {

        //Ckeditor's configuration
        //$this->data['language'] = 'ar';
        $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'eng_cmp_desc',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "95%", //Setting a custom width
                'height' => '200px', //Setting a custom height
            )
        );

        $this->data['ckeditor2'] = array(
            //ID of the textarea that will be replaced
            'id' => 'arb_cmp_desc',
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
        $this->load->model('ems/model_companies');
        $data['countries'] = $this->model_companies->fetchAllCountries();
        $data['industries'] = $this->model_companies->fetchAllIndustry();

        $this->load->view('ems/companies/add', $data);
    }

    public function save() {

        $data2 = $this->data;
        $this->load->model('ems/model_companies');
        $id = $this->uri->segment(5);
        $data = array();
        $loggedInUserId = $this->session->userdata('id');

        $data['cmp_photo'] = $this->input->post('hidden_file');

        $data['eng_cmp_title'] = addslashes($this->input->post('eng_cmp_title'));
        $data['eng_cmp_desc'] = $this->input->post('eng_cmp_desc');
        
        $data['arb_cmp_title'] = $this->input->post('arb_cmp_title');
        $data['arb_cmp_desc'] = $this->input->post('arb_cmp_desc');
        

        $data['meta_title_eng'] = addslashes($this->input->post('meta_title_eng'));
        $data['meta_desc_eng'] = addslashes($this->input->post('meta_desc_eng'));
        $data['meta_keywords_eng'] = addslashes($this->input->post('meta_keywords_eng'));

        $data['meta_title_arb'] = addslashes($this->input->post('meta_title_arb'));
        $data['meta_desc_arb'] = addslashes($this->input->post('meta_desc_arb'));
        $data['meta_keywords_arb'] = addslashes($this->input->post('meta_keywords_arb'));


        if ($_POST['pub_val'] == '') {
            $status = 1;
        } else {

            $status = $_POST['pub_val'];
        }
        $data['cmp_pub_status'] = $status;
        $data['cmp_created_at'] = date('Y-m-d H:i:s');
        $data['cmp_created_by'] = $loggedInUserId;

        
        $result = $this->model_companies->save($data);
        
        //saving industries from companies form
        foreach ($this->input->post('cmp_industry_id') as $key => $val) {

            $industdata = array();
            $industdata['comp_id'] = $result;
            $industdata['Indust_id'] = $val;

            $result2 = $this->model_companies->saveIndustries($industdata);
        }
        //End saving industries from companies form
        
        //saving countries from companies form
        foreach ($this->input->post('cmp_country_id') as $key => $val1) {

            $countrydata = array();
            $countrydata['comp_id'] = $result;
            $countrydata['country_id'] = $val1;

            $result2 = $this->model_companies->savecountries($countrydata);
        }
        //End saving countries from companies form

        log_insert($this->uri->segment(2), 'add a record in');

        $data2['id'] = $result;
        if ($result) {

            $this->session->set_flashdata('message', _okMsg('<p>Record added successfully.</p>'));
        }
        redirect($this->config->item('base_url') . 'ems/companies/manage');
        /* } */
    }

    public function deletePhoto() {
        $this->layout = '';
        $this->load->model('ems/model_companies');
        $id = $_POST['id'];
        $result = $this->model_companies->deletePhoto($id);
        log_insert($this->uri->segment(2), 'delete a photo in');
    }

    public function edit() { //Ckeditor's configuration
        //$this->data['language'] = 'ar';
        $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'eng_cmp_desc',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "95%", //Setting a custom width
                'height' => '200px', //Setting a custom height
            )
        );

        $this->data['ckeditor2'] = array(
            //ID of the textarea that will be replaced
            'id' => 'arb_cmp_desc',
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


        $id = $this->uri->segment(5);
        if ($id) {

            $this->load->model('ems/model_companies');
            $data['countries'] = $this->model_companies->fetchAllCountries();
            $data['industries'] = $this->model_companies->fetchAllIndustry();
            $data['resindust']=$this->model_companies->getselectedIndust($id);
            $data['rescountry']=$this->model_companies->getselectedcountry($id);

            $data['res'] = $this->model_companies->fetchRow($id);

            if ($data != false) {
                $this->load->view('ems/companies/edit', $data);
            }
        } else {
            $this->load->view('ems/companies/manage');
        }
    }

    public function update() {



        $id = $this->uri->segment(5);
        $data = array();
        $loggedInUserId = $this->session->userdata('id');

        $data['cmp_photo'] = $this->input->post('hidden_file');
        
        
//        $data['comp_id'] = addslashes($this->input->post('cmp_country_id'));
//        $data['cmp_industry_id'] = addslashes($this->input->post('cmp_industry_id'));
        
        $data['eng_cmp_title'] = addslashes($this->input->post('eng_cmp_title'));
        $data['eng_cmp_desc'] = $this->input->post('eng_cmp_desc');
        
        $data['arb_cmp_title'] = $this->input->post('arb_cmp_title');
        $data['arb_cmp_desc'] = $this->input->post('arb_cmp_desc');

        $data['meta_title_eng'] = addslashes($this->input->post('meta_title_eng'));
        $data['meta_desc_eng'] = addslashes($this->input->post('meta_desc_eng'));
        $data['meta_keywords_eng'] = addslashes($this->input->post('meta_keywords_eng'));

        $data['meta_title_arb'] = addslashes($this->input->post('meta_title_arb'));
        $data['meta_desc_arb'] = addslashes($this->input->post('meta_desc_arb'));
        $data['meta_keywords_arb'] = addslashes($this->input->post('meta_keywords_arb'));

        $data['cmp_pub_status'] = $this->input->post('pub_val');
        $data['cmp_updated_at'] = date('Y-m-d H:i:s');
        $data['cmp_updated_by'] = $loggedInUserId;



        $this->load->model('ems/model_companies');
        $res = $this->model_companies->update($data, $id);
        
        //saving industries from companies form
        $result=$this->model_companies->deleteIndustries($id);
        foreach ($this->input->post('cmp_industry_id') as $key => $val) {

            $industdata = array();
            $industdata['comp_id'] = $id;
            $industdata['Indust_id'] = $val;

            $result2 = $this->model_companies->saveIndustries($industdata);
        }
        //End saving industries from companies form
        
        //saving countries from companies form
        $result=$this->model_companies->deletecountries($id);
        foreach ($this->input->post('cmp_country_id') as $key => $val1) {

            $countrydata = array();
            $countrydata['comp_id'] = $id;
            $countrydata['country_id'] = $val1;

            $result2 = $this->model_companies->savecountries($countrydata);
        }
        //End saving countries from companies form
        
        if ($res) {

            $this->session->set_flashdata('message', _okMsg('<p>Record Updated Successfully.</p>'));
        }
        redirect($this->config->item('base_url') . 'ems/companies/edit/id/' . $id);
    }

    public function publish() {
        $this->layout = '';
        $this->load->model('ems/model_companies');
        $id = $_POST['id'];
        $status = $_POST['pub_status'];
        $result = $this->model_companies->publishStatus($status, $id);
    }

    public function delete() {
        $this->layout = '';
        $this->load->model('ems/model_companies');
        $id = $_POST['id'];
        $result = $this->model_companies->delete($id);
    }

    public function uploadFile() {

        $this->layout = '';
        $error = "";
        $msg = "";
        $fileElementName = 'user_file';

        //echo "<pre>";print_r($_REQUEST);echo "</pre>";exit;
        $config['upload_path'] = './uploads/companies/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('user_file')) {
            $error = $this->upload->display_errors('', '');
            echo "{";
            echo "error: '" . $error . "',\n";
            echo "msg: '" . $msg . "'\n";
            echo "}";
        } else {
            $data2['upload_data'] = $this->upload->data();
            $data = $data2['upload_data']['file_name'];
            $thumbnail = $data2['upload_data']['raw_name'] . '_thumb' . $data2['upload_data']['file_ext']; // Here it is				
            // create thumb1
            $config = array();
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'uploads/companies/' . $data2['upload_data']['file_name'];
            $config['quality'] = "100%";
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = FALSE;
            $config['new_image'] = 'uploads/companies/';
            $config['width'] = 89;
            $config['height'] = 90;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $msg .=$thumbnail;

            echo "{";
            echo "error: '" . $error . "',\n";
            echo "msg: '" . $msg . "'\n";
            echo "}";
        }

        exit;
    }

    public function uploadFile2() {

        $this->layout = '';
        $error = "";
        $msg = "";
        $fileElementName = 'user_file2';

        //echo "<pre>";print_r($_REQUEST);echo "</pre>";exit;
        $config['upload_path'] = './uploads/products/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('user_file2')) {
            $error = $this->upload->display_errors('', '');
            echo "{";
            echo "error: '" . $error . "',\n";
            echo "msg: '" . $msg . "'\n";
            echo "}";
        } else {
            $data2['upload_data'] = $this->upload->data();
            $data = $data2['upload_data']['file_name'];
            $thumbnail = $data2['upload_data']['raw_name'] . '_thumb' . $data2['upload_data']['file_ext']; // Here it is				
            // create thumb1
            $config = array();
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'uploads/products/' . $data2['upload_data']['file_name'];
            $config['quality'] = "100%";
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['new_image'] = 'uploads/products/thumbs';
            $config['width'] = 125;
            $config['height'] = 125;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $msg .=$thumbnail;

            echo "{";
            echo "error: '" . $error . "',\n";
            echo "msg: '" . $msg . "'\n";
            echo "}";
        }

        exit;
    }

    public function sortCol() {
        $this->layout = '';
        $this->layout = '';
        $req = $_GET['example'];
        foreach ($req as $k => $r) {
            $tmp = explode('_', $r);
            $ids[$tmp[1]] = $k;
        }
        $this->load->model('ems/model_companies');
        $this->model_companies->srtColUpdate($ids);
    }
    
    
    public function addcompimage() {
        
        $this->data['ckeditor'] = array(
          //ID of the textarea that will be replaced
          'id' => 'eng_image_title',
          //Optionnal values
          'config' => array(
            'toolbar' => "Full", //Using the Full toolbar
            'width' => "95%", //Setting a custom width
            'height' => '200px', //Setting a custom height
          )
        );
        $this->data['ckeditor2'] = array(
            //ID of the textarea that will be replaced
            'id' 	=> 	'arb_image_title',
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
        $this->load->model('ems/model_companies');
        $data['res'] = $this->model_companies->fetchcomp_images();

        $this->load->view('ems/companies/company_image', $data);
    }

    public function savecompimage() {



        $id = $this->uri->segment(5);
        $data = array();
        $loggedInUserId = $this->session->userdata('id');

        $data['image_name'] = $this->input->post('hidden_file');
        $data['eng_image_title']= addslashes($_POST['eng_image_title']);
        $data['arb_image_title']= addslashes($_POST['arb_image_title']);
        
        
//        $data['comp_id'] = addslashes($this->input->post('cmp_country_id'));
//        $data['cmp_industry_id'] = addslashes($this->input->post('cmp_industry_id'));
        
        $data['image_created_at'] = date('Y-m-d H:i:s');
        $data['image_created_by'] = $loggedInUserId;
        $data['image_pub_status'] = $this->input->post('pub_val');
        
        



        $this->load->model('ems/model_companies');
        $numRows = $this->model_companies->fetchRow_images();
        if ($numRows == false) {
            log_insert($this->uri->segment(2), 'add a record in');
            $result = $this->model_companies->saveimage($data);
            $this->session->set_flashdata('message', _okMsg('<p>Record Added.</p>'));
        } else {
            log_insert($this->uri->segment(2), 'update a record in');
            //					debug($numRows);
            $rowId = $numRows->id;
            $data['image_updated_at'] = date('Y-m-d H:i:s');
            $data['image_updated_by'] = $loggedInUserId;
            $result = $this->model_companies->updateimage($data, $rowId);
            $this->session->set_flashdata('message', _okMsg('<p>Record Updated.</p>'));
        }
        
        if ($res) {

            $this->session->set_flashdata('message', _okMsg('<p>Record Updated Successfully.</p>'));
        }
        redirect($this->config->item('base_url') . 'ems/companies/addcompimage/' . $id);
    }
    
    public function uploadcompimage() {

        $this->layout = '';
        $error = "";
        $msg = "";
        $fileElementName = 'user_file';

        //echo "<pre>";print_r($_REQUEST);echo "</pre>";exit;
        $config['upload_path'] = './uploads/companies/companyimages/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('user_file')) {
            $error = $this->upload->display_errors('', '');
            echo "{";
            echo "error: '" . $error . "',\n";
            echo "msg: '" . $msg . "'\n";
            echo "}";
        } else {
            $data2['upload_data'] = $this->upload->data();
            $data = $data2['upload_data']['file_name'];
            $thumbnail = $data2['upload_data']['raw_name'] . '_thumb' . $data2['upload_data']['file_ext']; // Here it is				
            // create thumb1
            $config = array();
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'uploads/companies/companyimages/' . $data2['upload_data']['file_name'];
            $config['quality'] = "100%";
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = FALSE;
            $config['new_image'] = 'uploads/companies/companyimages/';
            $config['width'] = 89;
            $config['height'] = 90;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $msg .=$thumbnail;

            echo "{";
            echo "error: '" . $error . "',\n";
            echo "msg: '" . $msg . "'\n";
            echo "}";
        }

        exit;
    }
    
    public function deletecompimage() {
        $this->layout = '';
        $this->load->model('ems/model_companies');
        $id = $_POST['id'];
        $result = $this->model_companies->deletecompimage($id);
        log_insert($this->uri->segment(2), 'delete a photo in');
    }

///////// gallery functions start ////////////
    public function uploadGallery1File() {

        $this->layout = '';
        $error = "";
        $msg = "";
        $fileElementName = 'gallery_file';
        $config['upload_path'] = './uploads/' . $this->uri->segment(2) . '/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gallery_file')) {
            $error = $this->upload->display_errors('', '');
            //$error.='File size must be 898px &times; 313px';
            echo "{";
            echo "error: '" . $error . "',\n";
            echo "msg: '" . $msg . "'\n";
            echo "}";
        } else {
            //$this->upload->do_upload('user_file');				
            $data2['upload_data'] = $this->upload->data();
            $data = $data2['upload_data']['file_name'];
            $thumbnail = $data2['upload_data']['raw_name'] . '_thumb' . $data2['upload_data']['file_ext']; // Here it is				
            $libconfig['image_library'] = 'gd2';
            $libconfig['source_image'] = 'uploads/' . $this->uri->segment(2) . '/' . $data2['upload_data']['file_name'];
            $libconfig['quality'] = "100%";
            $libconfig['create_thumb'] = TRUE;
            $libconfig['maintain_ratio'] = FALSE;
            $libconfig['new_image'] = 'uploads/' . $this->uri->segment(2) . '/thumbs';
            $libconfig['width'] = 190;
            $libconfig['height'] = 185;

            $this->load->library('image_lib', $libconfig);

            $this->image_lib->resize();
            $msg .=$thumbnail;

            echo "{";
            echo "error: '" . $error . "',\n";
            echo "msg: '" . $msg . "'\n";
            echo "}";
        }
        exit;
    }

    public function deletePhotoEntry($id) {
        $query = $this->db->query("delete from catagallery_pics WHERE id =" . $id);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCataGallPhoto() {
        $this->layout = '';
        $this->load->model('ems/model_gallery');
        $id = $_POST['id'];
        $result = $this->model_gallery->deleteCataGallPhoto($id);
        log_insert($this->uri->segment(2), 'delete a record in');
    }

    public function publishGalleryPhoto() {
        $this->layout = '';
        $this->load->model('ems/model_gallery');
        $id = $_POST['id'];
        $status = $_POST['pub_status'];
        $result = $this->model_gallery->publishStatusGalleryPhoto($status, $id);
    }

    public function upload() {
        $valid_formats = array("jpg", "png", "gif", "bmp", "JPG", "PNG", "GIF", "BMP");
        $path = "uploads/" . $this->uri->segment(2) . "/"; // Upload directory
        $count = 0;
        $this->load->model('ems/model_gallery');
        $loggedInUserId = $this->session->userdata('id');
        if (isset($_FILES ['user_file'])) {
            foreach ($_FILES['user_file']['name'] as $key => $value) {

                if (is_uploaded_file($_FILES['user_file']['tmp_name'][$key]) && $_FILES['user_file']['error'][$key] == 0) {
                    $RandomNum = time();
                    $ImageName = str_replace(' ', '-', strtolower($_FILES['user_file']['name'][$key]));
                    $ImageType = $_FILES['user_file']['type'][$key]; //"image/png", image/jpeg etc.
                    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                    $ImageExt = str_replace('.', '', $ImageExt);
                    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                    $NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;

                    $filename = $_FILES['user_file']['name'][$key];
                    if (move_uploaded_file($_FILES['user_file']['tmp_name'][$key], $path . $NewImageName)) {
                        $message = "Images uploaded successfully.";
                        ///// storing image in data base /////////               
                        $data['pic_name'] = $NewImageName;
                        $data['pic_pub_status'] = 1;
                        $data['pic_thumb'] = $NewImageName;
                        $data['eng_pic_title'] = $NewImageName;
                        $data['gal_id'] = $this->input->post('id');
                        $data['pic_updated_by'] = $loggedInUserId;
                        $data['pic_updated_at'] = date('Y-m-d');
                        $data['gal_module'] = $this->uri->segment(2);
                        $result = $this->model_gallery->upload($data);
                    } else {

                        $message = "There was a problem uploading the pictures.";
                    }
                } else {
                    $message = "There was a problem uploading the pictures";
                }
            }// foreach
        }
        //echo $message;exit;
        $this->session->set_flashdata('message', _erMsg('<p> ' . $message . ' </p>'));
        redirect($this->config->item('base_url') . 'ems/' . $this->uri->segment(2) . '/gal_thumb/id/' . $this->input->post('id'));
    }

    public function saveGalleryPictures() {
        $this->load->model('ems/model_gallery');
        $gal_id = $_POST['gal_id'];
        $loggedInUserId = $this->session->userdata('id');
        if ($_POST['pub_val'] == '') {
            $status = 1;
        } else {

            $status = $_POST['pub_val'];
        }
        for ($i = 1; $i <= $_POST['total_records']; $i++) {
            if ($this->input->post('record_id_' . $i)) {
                $data2 = array();
                $id = $this->input->post('record_id_' . $i);
                $data2['eng_pic_title'] = $this->input->post('eng_pic_title_' . $i);
                $data2['eng_pic_desc'] = $this->input->post('eng_pic_desc_' . $i);
                $data2['arb_pic_title'] = $this->input->post('arb_pic_title_' . $i);
                $data2['arb_pic_desc'] = $this->input->post('arb_pic_desc_' . $i);
                $data2['pic_name'] = $this->input->post('gphoto_file_' . $i);
                $data2['pic_updated_by'] = $loggedInUserId;
                $data2['pic_pub_status'] = $status;
                $candi_id = $this->model_gallery->updateGalleryPictures($data2, $id, $gal_id);
            }
        }
        redirect($this->config->item('base_url') . 'ems/' . $this->uri->segment(2) . '/gal_detail/id/' . $gal_id);
    }

    public function savePicturesTitle() {
        $this->load->model('ems/model_gallery');
        $gal_id = $_POST['gal_id'];
        $loggedInUserId = $this->session->userdata('id');
        if ($_POST['pub_val'] == '') {
            $status = 1;
        } else {

            $status = $_POST['pub_val'];
        }
        for ($i = 1; $i <= $_POST['total_pic']; $i++) {
            if ($this->input->post('pic_id_' . $i)) {
                $data2 = array();
                $id = $this->input->post('pic_id_' . $i);
                $data2['eng_pic_title'] = $this->input->post('pic_title_' . $i);
                $data2['pic_updated_by'] = $loggedInUserId;
                $data2['pic_pub_status'] = $status;
                $candi_id = $this->model_gallery->updatePicturesTitle($data2, $id, $gal_id);
            }
        }
        redirect($this->config->item('base_url') . 'ems/' . $this->uri->segment(2) . '/gal_thumb/id/' . $gal_id);
    }

    public function gal_thumb() {
        $id = $this->uri->segment(5);
        $this->load->model('ems/model_gallery');
        $data['res'] = $this->model_gallery->fetchThumbsAll($this->uri->segment(2), $this->uri->segment(5));
        $lastupdated = $this->model_gallery->fetchLastupdatedGPics($id);
        $data['lastupdated'] = $lastupdated[0]['max(pic_updated_at)'];
        $this->load->view('ems/' . $this->uri->segment(2) . '/gal_thumb', $data);
    }

    public function gal_detail() {
        $id = $this->uri->segment(5);
        $this->load->model('ems/model_gallery');
        $data['res'] = $this->model_gallery->fetchThumbsAll($this->uri->segment(2), $this->uri->segment(5));
        $lastupdated = $this->model_gallery->fetchLastupdatedGPics($this->uri->segment(2), $id);
        $data['lastupdated'] = $lastupdated[0]['max(pic_updated_at)'];
        $this->load->view('ems/' . $this->uri->segment(2) . '/gal_detail', $data);
    }

    public function view() {
        $id = $this->uri->segment(5);
        if ($id) {
            $this->load->model('ems/model_gallery');
            $data['res'] = $this->model_gallery->getgalpics($this->uri->segment(2), $id);
            $lastupdated = $this->model_gallery->fetchLastupdatedGPics($id);
            $data['lastupdated'] = $lastupdated[0]['max(pic_updated_at)'];
            if ($data != false) {
                $this->load->view('ems/' . $this->uri->segment(2) . '/gal_pics_view', $data);
            }
        } else {
            $this->load->view('ems/' . $this->uri->segment(2) . '/manage');
        }
    }

}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */    