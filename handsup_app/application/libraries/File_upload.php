<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

/*
 * @package        Sarfraz library
 * @subpackage    Libraries
 */

class File_upload {

    public $config;
    public $files;
    public $message;
    public $error;

    private function uploadFileConfiguration($data= array())
	{
		$config_file = array();
		$config_file['upload_path']  = './'.(isset($data['path']) ? $data['path'] : 'uploads/' );
		$config_file['allowed_types'] = (isset($data['allowed_types']) ? $data['allowed_types'] : 'jpg|png|gif');
		$config_file['encrypt_name'] = TRUE;
		$config_file['overwrite']    = false;
		return $config_file;
	}
	
	public function uploadFiles($config)
	{
		
		$CI = & get_instance();
        $CI->load->library('upload');
		$files = $_FILES;
		$field = (isset($config['field']) ? $config['field'] : 'userfile');
		$count = count($_FILES[$field]['name']);
		
		for($i=0;$i<$count;$i++)
		{
		
			$_FILES[$field]['name'] = $files[$field]['name'][$i]; 
			$_FILES[$field]['type'] = $files[$field]['type'][$i]; 
			$_FILES[$field]['size'] = $files[$field]['size'][$i];
			$_FILES[$field]['tmp_name'] = $files[$field]['tmp_name'][$i];
			$config_setting = $this->uploadFileConfiguration($config);
			$CI->upload->initialize($config_setting);
			
			if($CI->upload->do_upload($field) == TRUE)
			{
				$data = $CI->upload->data();
				
				$config1 = array();
				$config1['image_library'] = 'gd2';
				$config1['source_image']  = $data['full_path'];
				$config1['new_image']     = $config['thumb_path'];
				$config1['create_thumb']  = false;
				$config1['height']        = (isset($config['height']) ? $config['height'] : '200');
				$config1['width']         = (isset($config['width']) ? $config['width'] : '200');
				$CI->load->library('image_lib',$config1);
				$CI->image_lib->initialize($config1);
				$CI->image_lib->resize();
				
				$image[] = $data['file_name'];
				
			}
					
		}
		
		return $image;
	}
    
    
   

}
