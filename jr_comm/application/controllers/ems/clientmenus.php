<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientmenus extends CI_Controller {

	public $layout = 'admin_inner';
	
	
	 
	function __construct() {
		parent::__construct();
		$this->layout = 'admin_inner'; 	
        checkAdminSession();
    }
	
	//main index function for the controller dashboard
	//loding the main view
	public function index(){
		$this->manage();
	}
	
	public function manage(){
		
	$this->load->model('ems/model_clientmenus');
	$data['res']=$this->model_clientmenus->fetchAll();
	$this->load->view('ems/clientmenus/add',$data);	
		 
	}
	public function publish() {
        $this->layout = '';
        $this->load->model('ems/model_clientmenus');
        $id = $_POST['id'];
        $status = $_POST['pub_status'];
        $result = $this->model_clientmenus->publishStatus($status, $id);
    }
	public function add(){		
	$this->load->model('ems/model_clientmenus');
	$data['res']=$this->model_clientmenus->fetchAll();
	$this->load->view('ems/clientmenus/add',$data);
		
				
	}
	
	public function save(){
            	$this->layout = ''; 
		$this->load->model('ems/model_clientmenus');		
		$id = $_POST['id'];
		$data=array();
		$loggedInUserId=$this->session->userdata('id');
				$data['Title_en']=$_POST['Title_en'];
				$data['Title_ar']=$_POST['Title_ar'];
                                $data['link']=$_POST['Title_ch'];
					log_insert($this->uri->segment(2),'update a record in');
//					debug($numRows);
	
					$data['menu_updated_at']=date('Y-m-d H:i:s');
					$data['menu_updated_by']=$loggedInUserId;
                                        
                                        //////// checking menu permission ////////////
                                        $uid_level=$this->session->userdata('usr_level');						  
					if($uid_level=='2'){                                                  
                                        $u=1;
                                        }else{
                                        $module = $this->uri->segment(2);
                                        $secid = get_section_id();
                                        $chresult = check_userlevel3($secid);
                                        $u=$chresult[0]['grp_sec_update'];
                                        }
                                         if($u =='1')
                                         {
                                            $result=$this->model_clientmenus->update($data,$id);
                                            echo $result;
                                         }
                                         else
                                         {
                                            echo '3';

                                         }
                                        exit;
			}

//		}

			

	
    
		
}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */