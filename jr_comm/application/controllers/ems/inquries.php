<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//session_start();

class inquries extends CI_Controller {



	public $layout = 'admin_inner';







	function __construct() {

		parent::__construct();

		$this->layout = 'admin_inner';

		checkAdminSession();

	}



	//main index function for the controller dashboard

	//loding the main view

	public function index(){





		//$this->load->view('ems/inquries/manage');

$this->manage();



	}



	public function manage(){

		$res='';

		$this->load->model('ems/model_inquries');

		$data['res']=$this->model_inquries->fetchAll();

		if(sizeof($data)>0)

		{

			$this->load->view('ems/inquries/manage',$data);

		}

			

	}
	
	public function manageQuotes(){
  $res='';
  $this->load->model('ems/model_inquries');
  $data['res']=$this->model_inquries->fetchAllQuotes();
  if(sizeof($data)>0)
  {
   $this->load->view('ems/inquries/manageQuotes',$data);
  }

 }
 
 public function viewQuote()

 { //Ckeditor's configuration





  $id = $this->uri->segment(5);

  if($id)

  {

   $this->load->model('ems/model_inquries');

   $data['res']=$this->model_inquries->fetchQuote($id);
   //echo "<pre>";print_r($data);echo "</pre>";exit;

   if($data!=false)

   {

    $this->load->view('ems/inquries/viewQuote',$data);

   }



  }

  else {

   $this->load->view('ems/inquries/viewQuote');

  }







 }
 
  public function deleteQuote()
 {
  $this->layout = '';
  $this->load->model('ems/model_inquries');
  $id = $_POST['id'];
  $result=$this->model_inquries->deleteQuote($id);

 }



	public function view()

	{ //Ckeditor's configuration



		

		$id = $this->uri->segment(5);

		if($id)

		{

			$this->load->model('ems/model_inquries');

			$data['res']=$this->model_inquries->fetchRow($id);
                        //echo "<pre>";print_r($data);echo "</pre>";exit;

			if($data!=false)

			{

				$this->load->view('ems/inquries/view',$data);

			}



		}

		else {

				$this->load->view('ems/inquries/manage');

		}







	}



	public function publish()

	{

                //echo print_r($_POST['id']);

		$this->layout = '';

		$this->load->model('ems/model_inquries');

		$id = $_POST['id'];

		$status= $_POST['pub_status'];

		$result=$this->model_inquries->publishStatus($status,$id);

	}

	public function delete()

	{

		$this->layout = '';

		$this->load->model('ems/model_inquries');

		$id = $_POST['id'];

		$result=$this->model_inquries->delete($id);



	}



}



/* End of file admin_login.php */

/* Location: ./application/controllers/ems/admin_login.php */