<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

/*
 * @package        CodeIgniter
 * @subpackage    Libraries
 */

class Ali_upload {

    public $config;
    public $files;
    public $message;
    public $error;

    public function setConfig($config) {
        $this->config = $config;
    }
    
    // $files = $_FILES['pdf_file']
    // $field = 'pdf_file[]'
    public function multi_uploadContents($files, $field) {
        $this->files = array();
        $CI = & get_instance();
        $CI->load->library('upload');
        $CI->load->library('image_lib');
        foreach ($files['name'] as $key => $image) {
            $_FILES[$field]['name'] = $files['name'][$key];
            $_FILES[$field]['type'] = $files['type'][$key];
            $_FILES[$field]['tmp_name'] = $files['tmp_name'][$key];
            $_FILES[$field]['error'] = $files['error'][$key];
            $_FILES[$field]['size'] = $files['size'][$key];

            $random_num1 = rand(1111, 9999); /* Generating Random Filenames */
            $random_num2 = rand(1111, 9999);
            $ext = substr($files['name'][$key], -3);
            $image_file = $random_num1 . "_" . $random_num2 . "." . $ext;
            array_push($this->files, $image_file);
            $this->config['file_name'] = $image_file;
            $CI->upload->initialize($this->config);
            if ($CI->upload->do_upload($field)) {
                $CI->upload->data();
                $libconfig['image_library'] = 'gd2';
                $libconfig['source_image'] = 'uploads/content/' . $image_file;
                $libconfig['quality'] = "100%";
                $libconfig['create_thumb'] = TRUE;
                $libconfig['maintain_ratio'] = FALSE;
                $libconfig['new_image'] = 'uploads/content/thumbs/';
                $libconfig['width'] = 381;
                $libconfig['height'] = 221;
                $CI->image_lib->initialize($libconfig);
                $CI->image_lib->resize();
            } else {
                $this->error = $CI->upload->display_errors('', '');
                return false;
            }
        }
        return true;
    }

      public function multi_uploadContentsCrop($files, $field) {
        $this->files = array();
        $CI = & get_instance();
        $CI->load->library('upload');
        $CI->load->library('image_lib');
        foreach ($files['name'] as $key => $image) {
            $_FILES[$field]['name'] = $files['name'][$key];
            $_FILES[$field]['type'] = $files['type'][$key];
            $_FILES[$field]['tmp_name'] = $files['tmp_name'][$key];
            $_FILES[$field]['error'] = $files['error'][$key];
            $_FILES[$field]['size'] = $files['size'][$key];

            $random_num1 = rand(1111, 9999); /* Generating Random Filenames */
            $random_num2 = rand(1111, 9999);
            $ext = substr($files['name'][$key], -3);
            $image_file = $random_num1 . "_" . $random_num2 . "." . $ext;
            array_push($this->files, $image_file);
            $this->config['file_name'] = $image_file;
            $CI->upload->initialize($this->config);
            if ($CI->upload->do_upload($field)) {
                $CI->upload->data();
                $libconfig['image_library'] = 'gd2';
                $libconfig['source_image'] = 'uploads/content/' . $image_file;
                $libconfig['quality'] = "100%";
                $libconfig['create_thumb'] = TRUE;
                $libconfig['maintain_ratio'] = FALSE;
                $libconfig['new_image'] = 'uploads/content/thumbs/';
                $libconfig['width'] = 366;
                $libconfig['height'] = 314;
                $CI->image_lib->initialize($libconfig);
                $CI->image_lib->resize();
            } else {
                $this->error = $CI->upload->display_errors('', '');
                return false;
            }
        }
        return true;
    }

    public function single_uploadContents($files,$field) {
        $this->files = array();
        $CI = & get_instance();
        $CI->load->library('upload');
        $CI->load->library('image_lib');

        $random_num1 = rand(1111, 9999); /* Generating Random Filenames */
        $random_num2 = rand(1111, 9999);
        $ext = substr($files['name'], -3);
        $image_file = $random_num1 . "_" . $random_num2 . "." . $ext;
        array_push($this->files, $image_file);
        $this->config['file_name'] = $image_file;
        $CI->upload->initialize($this->config);
        if ($CI->upload->do_upload($field)) {
            $CI->upload->data();
            $libconfig['image_library'] = 'gd2';
            $libconfig['source_image'] = 'uploads/content/' . $image_file;
            $libconfig['quality'] = "100%";
            $libconfig['create_thumb'] = TRUE;
            $libconfig['maintain_ratio'] = FALSE;
            $libconfig['new_image'] = 'uploads/content/thumbs/';
            $libconfig['width'] = 381;
            $libconfig['height'] = 221;
            $CI->image_lib->initialize($libconfig);
            $CI->image_lib->resize();
            return true;
        } else {
            $this->error = $CI->upload->display_errors('', '');
            return false;
        }        
    }

}
