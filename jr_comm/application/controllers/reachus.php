<?php
ob_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reachus extends CI_Controller {

    public $layout = 'default';

    function __construct() {
        parent::__construct();
        $this->layout = 'default';
    }

    //main index function for the controller admin_login
    //loding the main view
    

    public function reachusSave() {
        $this->load->model('model_reachus');
        
//            $this->load->view('reachus/reachus',$data);
        if ($_POST) {
            $data = array();
            $data['inq_user'] = $this->input->post('reachus_name');
            $data['inq_title'] = $this->input->post('reachus_title');
            $data['inq_email'] = $this->input->post('reachus_email');
            $data['inq_phone'] = $this->input->post('reachus_phone');
            //$data['inq_file'] = $this->input->post('reachus_file');
            $data['inq_desc'] = $this->input->post('reachus_message');
            $data['subject_name'] = $this->input->post('reachus_subject');
            $data['subject_id'] = $this->input->post('subjct_id');
            $data['inq_pub_status'] = '';
            $data['inq_created_at'] = date('Y-m-d H:i:s');
            $save_data = $this->model_reachus->save($data);

            $reachusid = $this->input->post('reachus_subject');


            $this->load->model('model_custom');
            $config = $this->model_custom->fetchConfig();            

            $to = $config->reachus_email;
            $from = $config->from_email;
            $subject = getSingleLabel(131);
            $message = $this->input->post('reachus_message');
            $email_message = "".getSingleLabel(121)." : ".$data['inq_user']."<br>
                              ".getSingleLabel(122)." : ".$data['inq_title']."<br>
                              ".getSingleLabel(123)." : ".$data['inq_email']."<br>
                              ".getSingleLabel(124)." : ".$data['inq_phone']."<br>
                              ".getSingleLabel(126)." : ".$data['subject_name']."<br>
                              ".getSingleLabel(128)." : ".$data['inq_desc']."<br>
                              ";

            $this->load->library('email');
            $email_setting = array('mailtype' => 'html');
            $this->email->initialize($email_setting);
            $this->email->clear(TRUE);
            $this->email->from($from); // change it to yours
            $this->email->to($to); // change it to yours
            $this->email->subject($subject);
            $this->email->message($email_message);
            if ($this->email->send()) {
               $result = getSingleLabel(164);
            } else {
                $result = getSingleLabel(165);
                //show_error($this->email->print_debugger());
            }
                
                redirect($this->config->item('base_url') . 'page/Reach_Us');      
        }else {
            redirect($this->config->item('base_url') . 'page/Reach_Us'); 
        }
        //exit;
    }

    public function saveinquries() {
        $this->load->model('model_reachus');
        
//            $this->load->view('reachus/reachus',$data);
        if ($_POST) {
            $data = array();
            $data['inq_user'] = $this->input->post('inq_name');
            $data['inq_title'] = $this->input->post('inq_title');
            $data['inq_email'] = $this->input->post('inq_email');
            $data['inq_phone'] = $this->input->post('inq_phone');
            //$data['inq_file'] = $this->input->post('reachus_file');
            $data['inq_desc'] = $this->input->post('inq_message');
            $data['subject_id'] = $this->input->post('inq_sub_id');
            $data['subject_name'] = $this->input->post('inquries-subjct');
            $data['inq_pub_status'] = '';
            $data['inq_created_at'] = date('Y-m-d H:i:s');
            $data['mem_id'] = $this->session->userdata('mem_id');
            $save_data = $this->model_reachus->save($data);
            
            $this->load->model('model_custom');
            $config = $this->model_custom->fetchConfig();            

            $to = $config->sendinquiry_email;
            $from = $config->from_email;
            $subject = getSingleLabel(132);
            $message = $this->input->post('inq_message');
            
            $email_message = "".getSingleLabel(121)." : ".$data['inq_user']."<br>
                              ".getSingleLabel(122)." : ".$data['inq_title']."<br>
                              ".getSingleLabel(123)." : ".$data['inq_email']."<br>
                              ".getSingleLabel(124)." : ".$data['inq_phone']."<br>
                              ".getSingleLabel(126)." : ".$data['subject_name']."<br>
                              ".getSingleLabel(128)." : ".$data['inq_desc']."<br>
                              ";            

            $this->load->library('email');
            $email_setting = array('mailtype' => 'html');
            $this->email->initialize($email_setting);
            $this->email->clear(TRUE);
            $this->email->from($from); // change it to yours
            $this->email->to($to); // change it to yours
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send()) {
                
                $message = getSingleLabel(133)."<br>".getSingleLabel(134);
            } else {
                               $message = "<b>".getSingleLabel(135)."</b> <br>".getSingleLabel(136);
            }
        }
    }

}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */