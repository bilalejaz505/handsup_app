<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Project extends CI_Controller {



	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */



	public function __construct()

    {

        parent::__construct();

       

	   	$this->load->model('Model_general');
		$this->load->model('Api_model');

		checkAdminSession();
		
		
		$user_role = $this->session->userdata('user_role');
		
		if($user_role != 1 && $user_role != 5)
		{
			redirect($this->config->item('base_url') . 'admin/error');
		}

		//$res = checkLevels(2);

		//checkAuth($res);

    }

	

	

	public function index()

	{

		$data = array();

		$data['projects']	 = 	$this->Model_general->getAll('projects');

		$data['content'] = 'projects/manage';

		$data['class'] = 'projects'; 

		$this->load->view('default',$data);	

		

	}

	

	public function edit($id)

	{

		$data = array();

		$data['project']	 = 	$this->Model_general->getRow($id, 'projects');
		$data['user']	 = 	$this->Model_general->getRow($data['project']->user_id, 'users');
		$data['category']	 = 	$this->Model_general->getRow($data['project']->category_id, 'categories');
		$data['project']	 = 	$this->Model_general->getRow($id, 'projects');
		$project_languages = $this->Api_model->getProjectLanguages($data['project']->id);
		foreach($project_languages as $lngid)
		{
			$langarr[]=$lngid['id'];
		}
		$project_skills = $this->Api_model->getProjectSkills($data['project']->id);
		foreach($project_skills as $sklid)
		{
			$sklarr[]=$sklid['id'];
		}
		$data['images'] = $this->Api_model->getMutipleRows('project_images','project_id',$data['project']->id);
		$data['videos'] = $this->Api_model->getMutipleRows('project_videos','project_id',$data['project']->id);
		$data['activities'] = $this->Api_model->getProjectActivities($data['project']->id);
		$data['volunteers'] = $this->Api_model->getAllProjectUser($data['project']->id);
		$data['country'] = $this->Api_model->getAll('countries');
		$data['city'] = $this->Api_model->getAll('city');
		$data['languages'] = $this->Api_model->getAll('languages');
		$data['skills'] = $this->Api_model->getAll('skills');
		$data['project_languages'] = $langarr;
		$data['project_skills'] = $sklarr;

		$data['content'] 	 =  'projects/edit';

		$data['class'] = 'projects';

		$this->load->view('default',$data);

	}
	

	public function update($id)

	{

		$data = array();

		$update_by = array();

		$post_data = $this->input->post();

		$keys[] = 'form_type';
		
		$keys[] = 'date_range';
		
		$keys[] = 'language_ids';

		$keys[] = 'skill_ids';
		

		foreach($post_data as $key => $value)
		{

			if(!in_array($key, $keys))

			{

				$data[$key] = $value;	

			}

		}
		
		$date_arr = explode(' - ', $post_data['date_range']);
		
		$data['from_date'] = date('Y-m-d', strtotime($date_arr[0]));
		
		$data['to_date'] = date('Y-m-d', strtotime($date_arr[1]));
		
		$update = $this->Model_general->updateRow('projects', $data,$id);
		
		$dataImg['project_id'] = $id;
		
		$error=array();
    	$extension=array("jpeg","jpg","png","gif");
	    foreach($_FILES["images"]["tmp_name"] as $key=>$tmp_name)
		{
			$file_name=$_FILES["images"]["name"][$key];
			$file_tmp=$_FILES["images"]["tmp_name"][$key];
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			if(in_array($ext,$extension))
			{
				if(!file_exists("uploads/project/".$file_name))
				{
					move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$key],"uploads/project/".$file_name);
					$dataImg['image_url'] = base_url().'uploads/project/'.$file_name;
				}
				else
				{
					$filename=basename($file_name,$ext);
					$newFileName=$filename.time().".".$ext;
					move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$key],"uploads/project/".$newFileName);
					$dataImg['image_url'] = base_url().'uploads/project/'.$newFileName;
				}
			}
			else
			{
				array_push($error,"$file_name, ");
			}			
			$this->Model_general->save('project_images', $dataImg);
		}
		
		$this->Model_general->deleteMultipleRow('project_languages', 'project_id',$id);
		$this->Model_general->deleteMultipleRow('project_skills', 'project_id',$id);
		
		foreach($post_data['language_ids'] as $lang_id)
		{
			$datalng['language_id'] = $lang_id;
			$datalng['project_id'] = $id;
			$this->Model_general->save('project_languages', $datalng);
		}
		
		foreach($post_data['skill_ids'] as $lang_id)
		{
			$dataskill['skill_id'] = $lang_id;
			$dataskill['project_id'] = $id;
			$this->Model_general->save('project_skills', $dataskill);
		}
		
		$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been updated successfully.</p>');			

		redirect($this->config->item('base_url') . 'admin/project/edit/'.$id);

		
	}

	public function deleteData($id)

	{

		

		$delete = $this->Model_general->deleteRow('groups',$id);

		$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been deleted successfully.</p>');			

		redirect($this->config->item('base_url') . 'admin/project');

		

	}
	
	public function deleteImage($project_id, $image_id)
	{

		$delete = $this->Model_general->deleteRow('project_images',$image_id);

		$this->session->set_flashdata('message', '<p style="color:green; text-align:center;">Data has been deleted successfully.</p>');			

		redirect($this->config->item('base_url') . 'admin/project/edit/'.$project_id);

		

	}

	

	

}

