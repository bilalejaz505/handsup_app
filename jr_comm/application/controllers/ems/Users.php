<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Users extends CI_Controller {



    public $layout = 'admin_inner';



    function __construct() {

        parent::__construct();

        $this->layout = 'admin_inner';

        $this->load->model('ems/model_user');
		$this->load->library('email');

        checkAdminSession();

    }



    

    public function index() {

        $this->manage();

    }



    public function manage() {

        $data = array();		
			  $data['users'] = $this->model_user->fetchAllUsers('users');
			  $this->load->view('ems/Users/manage', $data);

        

    }
	
	
	public function add() {

			  $this->load->view('ems/Users/add');

        

    }
	
	
	public function addUser() {
		$lang = $this->session->userdata('lang');
        $data = array();
		$data['name'] = $email = $this->input->post('name');
        $data['email'] = $email = $this->input->post('email');
        $data['password'] = $password = $this->input->post('password');
		//$data['created_at'] = date('d-m-Y H:i:s');
		$insert_id = $this->model_user->saveUser($data);
		if ($insert_id)
		{
			$this->send_new_email($email, $password);
			$this->session->set_flashdata('message', _okMsg('<p>User added successfully and password is sent to user email.</p>'));
			redirect($this->config->item('base_url') . 'ems/Users/manage');
		}
        

    }
	
	public function updateUser() {
		$lang = $this->session->userdata('lang');
		$id = $_POST['id'];
        $data = array();
		$data['name'] = $email = $this->input->post('name');
        $data['email'] = $email = $this->input->post('email');
        $data['password'] = $password = $this->input->post('password');
		//$data['created_at'] = date('d-m-Y H:i:s');
		$result = $this->model_user->FetchUserPassword($id);
		$current_pass = $result->password;
		$insert_id = $this->model_user->updateUser($id, $data);
		if ($insert_id > 0)
		{
			if ($current_pass != $password){
				$this->send_new_email($email, $password);
				$this->session->set_flashdata('message', _okMsg('<p>User updated successfully and new password is sent to user email.</p>'));
				redirect($this->config->item('base_url') . 'ems/Users/manage');
			} else 
			{
				$this->session->set_flashdata('message', _okMsg('<p>User updated successfully.</p>'));
				redirect($this->config->item('base_url') . 'ems/Users/manage');
			}
			
			
		} else 
		{
			$this->session->set_flashdata('message', _okMsg('<p>User Updation Failed.</p>'));
			redirect($this->config->item('base_url') . 'ems/Users/manage');
		}
        

    }
	
	 public function send_new_email($email,$random_password){
                $message = '';
				$message.="Use below detail to login";
			    $message .= "<br/><br/><b>User Name &nbsp;:</b>&nbsp;".$email ;
			    $message .= "<br/><b>User Password &nbsp;:</b>&nbsp;".$random_password;
		     	$body = $message ;
		    	$subject = "Your New Password and Login Details are: ";
                $headers  = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			    $headers .= 'From:<admin@fas.ed.sa>' . "\r\n";
                mail($email,$subject,$body,$headers);
 
     }




    public function edit() {

          $data = array();

       

        $id = $this->uri->segment(5);
        if ($id) {            

            $data['user_data'] = $this->model_user->fetch($id,'users');
            if (!empty($data)) {
               
                $this->load->view('ems/Users/edit', $data);

            }

        }

    }

  public function delete() {
	  $lang = $this->session->userdata('lang');
        $this->layout = '';
        $id = $_POST['id'];
        log_insert($this->uri->segment(2), 'delete a record in');
        $result = $this->model_user->deleteUser($id);
        echo $result;
       // $this->deletePhotos($id);
    }


     



}



/* End of file admin_login.php */

/* Location: ./application/controllers/ems/admin_login.php */