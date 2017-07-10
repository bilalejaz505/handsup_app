<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class quotation extends CI_Controller {

    public $layout = 'default';

    function __construct() {
        parent::__construct();
        $this->layout = 'default';
    }

    //main index function for the controller admin_login
    //loding the main view



    public function send_quotation() {
        $this->load->model('model_quotation');
        $this->load->model('model_custom');
        //echo "<pre>";print_r($_REQUEST);echo "</pre>";exit;
//            $this->load->view('reachus/reachus',$data);
        if ($_POST) {
            $data = array();
            $data['quotation_name'] = $this->input->post('quotation_name');
            $data['quotation_title'] = $this->input->post('quotation_title');
            $data['quotation_email'] = $this->input->post('quotation_email');
            $data['quotation_phone'] = $this->input->post('quotation_phone');
            $data['quotation_message'] = $this->input->post('quotation_message');
            $subject_id = $this->input->post('quotation_subject_id');
            $data['subject_id'] = $subject_id;
            $subject_data = $this->model_custom->fetchSubTitle($subject_id);
            $eng_sub_title = $subject_data->eng_sub_title;            
            $data['subject_name'] = $eng_sub_title;
            $data['quotation_pub_status'] = '';
            $data['quotation_created_at'] = date('Y-m-d H:i:s');
            $data['mem_id'] = $this->session->userdata('mem_id');
            $save_data = $this->model_quotation->save($data);
            
            
            $config = $this->model_custom->fetchConfig();            
            $to = $config->sendinquiry_email;
            $from = $config->from_email;
            $subject = getSingleLabel(159);
            $message = $this->input->post('inq_message');
            
            $email_message = "".getSingleLabel(121)." : ".$data['quotation_name']."<br>
                              ".getSingleLabel(122)." : ".$data['quotation_title']."<br>
                              ".getSingleLabel(123)." : ".$data['quotation_email']."<br>
                              ".getSingleLabel(124)." : ".$data['quotation_phone']."<br>
                              ".getSingleLabel(126)." : ".$data['subject_name']."<br>
                              ".getSingleLabel(128)." : ".$data['quotation_message']."<br>
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
                
                $message = "<div class='inquiry_wrappe_inner'>
                    <b>".getSingleLabel(160)."</b> <br>
                        <p>".getSingleLabel(161)."</p></div>";
            } else {
                               $message = "<div class='inquiry_wrappe_inner'>
                                   <b>".getSingleLabel(162)."</b> <br>
                         <p>".getSingleLabel(163)."</p></div>";
            }
            echo $message;
        }
        exit;
    }

}

/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */