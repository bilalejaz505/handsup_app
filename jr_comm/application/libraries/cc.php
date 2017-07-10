<?php
// require the autoloaders

require_once 'ctct/src/Ctct/autoload.php';
require_once 'ctct/vendor/autoload.php';

use Ctct\ConstantContact;
use Ctct\Components\Contacts\Contact;
use Ctct\Components\EmailMarketing\Campaign;
use Ctct\Components\EmailMarketing\Schedule;
use Ctct\Exceptions\CtctException;

if (!class_exists('cc')) {
    
    class cc
    {
        
        public $api_key;
        public $token;
		public $objcc;
		public $schedule;
		public $campaign;
		public $contact;
	    private $CI;
        public function __construct()
        {
            $this->api_key  = get_ctct('ctct_api_key');
            $this->token    = get_ctct('ctct_token');
            $this->cc       = new ConstantContact($this->api_key);
            $this->schedule = new Schedule();
            $this->campaign = new Campaign();
			$this->contact  = new Contact();
			$this->CI       = & get_instance();
			$this->CI->load->library('session');

        }
        
       
        
		  public function view_Lits()
        {
            
			 
			 try {
				
					$lists = $this->cc->listService->getLists($this->token);
				} catch (CtctException $ex) {
					foreach ($ex->getErrors() as $error) {
						print_r($error);
					}
					if (!isset($lists)) {
						$lists = null;
					}
				}
				
				return $lists;
        }
		
		
		
        public function addContacts()
        {
              // check if the form was submitted
            
            if (isset($_POST['email']) && strlen($_POST['email']) > 1) {
                
                $action = "Getting Contact By Email Address";
                
                try {
                    
                    // check to see if a contact with the email address already exists in the account
                    
                    $response = $this->cc->contactService->getContacts($this->token, array(
                        "email" => $_POST['email']
                    ));
                    
                    // create a new contact if one does not exist
                    
                    if (empty($response->results)) {
                        
                        $action = "Creating Contact";
                        
                        
                        
                      
                        
                         $this->contact->addEmail($_POST['email']);
                         $this->contact->addList($_POST['list']);
						
						  if(!empty($_POST['first_name'])){
                         $this->contact->first_name = $_POST['first_name'];
							}
							if(!empty($_POST['last_name'])){
                        $this->contact->last_name = $_POST['last_name'];
							}
                            
						
						
                        
                        
                        
                     
                        
                        $returnContact = $this->cc->contactService->addContact($this->token, $this->contact);
                        
                        
                         $this->CI->session->set_flashdata('message', _okMsg('New contact has been added.') );

                        // update the existing contact if address already existed
                        
                    } else {
                        
                        $action = "Updating Contact";
                        
                        
                        
                        $contact = $response->results[0];
                        
                        if ($contact instanceof Contact) {
                            
                             $contact->addList($_POST['list']);
                            if(!empty($_POST['first_name'])){
                             $contact->first_name = $_POST['first_name'];
							}
							if(!empty($_POST['last_name'])){
                             $contact->last_name = $_POST['last_name'];
							}
                            
                            
                            $returnContact = $this->cc->contactService->updateContact($this->token,  $contact);
                            $this->CI->session->set_flashdata('message', _okMsg('Contact has been updated.' ));

                        } else {
                            
                            $e = new CtctException();
                            
                            $e->setErrors(array(
                                "type",
                                "Contact type not returned"
                            ));
                            
                            throw $e;
                            
                        }
                        
                    }
                    
                    
                    
                    // catch any exceptions thrown during the process and print the errors to screen
                    
                }
                catch (CtctException $ex) {
					
					
				 $this->CI->session->set_flashdata('message', _erMsg($ex->getErrors()));

                  /*  
                    echo '<span class="label label-important">Error ' . $action . '</span>';
                    
                    echo '<div class="container alert-error"><pre class="failure-pre">';
                    
                    print_r();
                    
                    echo '</pre></div>';
                    
                    die();*/
                    
                }
                
            }
        }
		
		
		public function edit_Contacts($id)
        {

             return $this->cc->contactService->getContact($this->token,$id);
			 
        }
		
		  public function view_Contacts()
        {
          
		  
		   try {
				
			   $contact_lists = $this->cc->contactService->getContacts($this->token);
				} catch (CtctException $ex) {
					foreach ($ex->getErrors() as $error) {
						print_r($error);
					}
					if (!isset($contact_lists)) {
						$contact_lists = null;
					}
				}
				
				return $contact_lists;

        }
		
		
		 public function delete_Contacts($id)
        {
				
			   return $this->cc->contactService->unsubscribeContact($this->token,$id);
        }
		
		
		 /**
         * Create an email campaign with the parameters provided
         * @param array $params associative array of parameters to create a campaign from
         * @return Campaign updated by server
         */
        public function createCampaign(array $params = array())
        {
			
			
           if(isset($params['cam_id']) and !empty($params['cam_id'])){
			 $this->campaign->id                   = $params['cam_id'];
		   }
             $this->campaign->name                 = $params['name'];
             $this->campaign->subject              = $params['subject'];
             $this->campaign->from_name            = $params['from_name'];
             $this->campaign->from_email           = $params['from_addr'];
             $this->campaign->greeting_string      = $params['greeting_string'];
             $this->campaign->reply_to_email       = $params['reply_to_addr'];
             $this->campaign->text_content         = $params['text_content'];
             $this->campaign->email_content        = '<html><body>'.$params['email_content'].'</body></html>';
             $this->campaign->email_content_format = 'HTML';
         
			
            // add the selected list or lists to the campaign
            if (isset($params['lists'])) {
                if (count($params['lists']) > 1) {
                    foreach ($params['lists'] as $list) {
                    $this->campaign->addList($list);
                    }
                } else {
                    $this->campaign->addList($params['lists'][0]);
                }
            }
			
			if(isset($params['cam_id']) and !empty($params['cam_id'])){
		$campaign = $this->cc->emailMarketingService->updateCampaign($this->token, $this->campaign);
	
				}else{
           $campaign = $this->cc->emailMarketingService->addCampaign($this->token, $this->campaign);
				}
				
				if($campaign == 409){
			 $this->CI->session->set_flashdata('message', _erMsg('Campaign name already exists in our system.' ));

				}else if($campaign == 400){
			 $this->CI->session->set_flashdata('message', _erMsg('Bad Request.' ));
	
				}else{
				
	          $schedule = $this->createSchedule($campaign->id, $params['schedule_time']);
			  
				}
        }
        
        /**
         * Create a schedule for a campaign - this is time the campaign will be sent out
         * @param $campaignId - Id of the campaign to be scheduled
         * @param $time - ISO 8601 formatted timestamp of when the campaign should be sent
         * @return Schedule updated by server
         */
        public function createSchedule($campaignId, $time)
        {
            
			 try {
            $this->schedule->scheduled_date = $time;
		    $this->CI->session->set_flashdata('message', _okMsg('New Campaign has been added.') );

            return $this->cc->campaignScheduleService->addSchedule($this->token, $campaignId, $this->schedule);
		
			
			  } catch (CtctException $ex) {
           $this->CI->session->set_flashdata('message',  print_r($ex->getErrors()));
         }

        }
		
		
		public function edit_campaign($id)
        {

             return $this->cc->emailMarketingService->getCampaign($this->token,$id);
			 
        }
		
          public function view_campaign()
        {
          
		  
		   try {
				
			 $campaign_lists = $this->cc->emailMarketingService->getCampaigns($this->token);
				} catch (CtctException $ex) {
					foreach ($ex->getErrors() as $error) {
						print_r($error);
					}
					if (!isset($campaign_lists)) {
						$campaign_lists = null;
					}
				}
				
				return $campaign_lists;

        }
		
		
		 public function delete_Campaign($id)
        {
				
			   return $this->cc->emailMarketingService->deleteCampaign($this->token,$id);
        }
    }
}
?>
