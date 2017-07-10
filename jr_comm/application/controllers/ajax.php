<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ajax extends CI_Controller {

    

    function __construct() {
        parent::__construct();
		$this->load->library('email');
      
    }

    //main index function for the controller admin_login
    //loding the main view



   public function searchProducts()
	{
		$lang = $this->session->userdata('lang');
        $product_name = $this->input->post('product_name');
		$products = getAllProducts($product_name);
		
		
		$option = '';
		$result = array();
		if($products){
				foreach($products as $product){
					$get_product_main_cat_id = getProductMainCategoryId($product->parant_id); 
					$option .='<li class="mix class'.$get_product_main_cat_id.'">';
					$option .='<a href="#"><img src="'.base_url().'assets/script/'.content_detail('eng_product_image_mkey_hdn',$product->id).'" alt="image description">';
					$option .='<div class="overlay"><div class="mask"><div class="frame">';
					$option .='<h3>'.pageTitle($product->id,$lang).'</h3>';	
					$option .='</div></div></div></div></a></li><li class="gap"></li><li class="gap"></li><li class="gap"></li>';			
												
													
				}
				$result['products'] = $option;
		}else{
			if($lang == 'eng'){
				$result['products'] = 'No result found';
			}else{
				$result['products'] = 'لم يتم العثور على نتائج';
			}
			
		}
		
		
		$result['error'] = false;
		echo json_encode($result);
		  		
	}
	
	public function getEvent()

    {

		$data = array();

		$lang = $this->session->userdata('lang');  

		(intval($_REQUEST["month"])>0) ? $cMonth = $_REQUEST["month"] : $cMonth = date("n");
		(intval($_REQUEST["year"])>0) ? $cYear = $_REQUEST["year"] : $cYear = date("Y");
        if ($cMonth<10) $cMonth = '0'.$cMonth;
		$event_date = $cYear."-".$cMonth."-";
		(intval($_REQUEST["page_id"])>0) ? $page_id = $_REQUEST["page_id"] : $page_id = '250';//just dummy value of event page 250
		$events = getEvents($event_date,$page_id);
		
		//$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE `date` LIKE '".$cYear."-".$cMonth."-%'";
		//$sql_result = mysqli_query ($connection, $sql) or die ('request "Could not execute SQL query" '.$sql);
		foreach($events as $event) {
			$unavailable[] = $event->pro_date;
			//$desc[] = get_x_words(content_detail($lang.'_page_desc',$event->id),'20');
		}
	//	print_r($desc);exit();
		$prev_year = $cYear;
		$next_year = $cYear;
		$prev_month = intval($cMonth)-1;
		$next_month = intval($cMonth)+1;
		if ($cMonth == 12 ) {
	      	 $next_month = 1;
			 $next_year = $cYear + 1;
		} elseif ($cMonth == 1 ) {
			$prev_month = 12;
			$prev_year = $cYear - 1;
		}
		?>
        <div class="calender-holder">
  <table width="100%">
  <tr>
      <td class="mNav" style="padding:10px 5px "><a href="javascript:LoadMonth('<?php echo $prev_month; ?>', '<?php echo $prev_year; ?>','<?php echo $page_id;?>')"><img src="<?php echo base_url();?>assets/frontend/alesayi/images/back-arrow.png" /></a></td>
      <td colspan="5" class="cMonth" style="padding:10px 5px "><?php echo date("F, Y",strtotime($cYear."-".$cMonth."-01")); ?></td>
      <td class="mNav" style="padding:10px 5px "><a href="javascript:LoadMonth('<?php echo $next_month; ?>', '<?php echo $next_year; ?>',<?php echo $page_id;?>)"><img src="<?php echo base_url();?>assets/frontend/alesayi/images/forward-arrow.png" /></a></td>
  </tr>
  <tr>
      <td class="wDays">Mon</td>
      <td class="wDays">Tue</td>
      <td class="wDays">Wed</td>
      <td class="wDays">Thu</td>
      <td class="wDays">Fri</td>
      <td class="wDays">Sat</td>
      <td class="wDays">Sun</td>
  </tr>
<?php 
$first_day_timestamp = mktime(0,0,0,$cMonth,1,$cYear); // time stamp for first day of the month used to calculate 
$maxday = date("t",$first_day_timestamp); // number of days in current month
$thismonth = getdate($first_day_timestamp); // find out which day of the week the first date of the month is
$startday = $thismonth['wday'] ; // 0 is for Sunday and as we want week to start on Mon we subtract 1
if (!$thismonth['wday']) $startday = 7;
$desc_cont = 0;
for ($i=1; $i<($maxday+$startday); $i++) {
	
	if (($i % 7) == 1 ) echo "<tr>";
	
	if ($i < $startday) { echo "<td>&nbsp;</td>"; continue; };
	
	$current_day = $i - $startday + 1;
	
	(in_array($cYear."-".$cMonth."-".$current_day,$unavailable)) ? $css='booked' : $css='available'; // set css class name based on date availability
	
	echo "<td class='".$css."'>". $current_day."<div class='small-box-container'> ";

	
	if (in_array($cYear."-".$cMonth."-".$current_day,$unavailable))
	{
		$css='booked';
		$event_date_specific = $cYear."-".$cMonth."-".$current_day;
		$event_by_date = array();
		$event_by_date = getEvents($event_date_specific,$page_id);
		$replace = array('<p>','</p>');
		$replace_by = array('','');
		echo '<div class="popup"><p>'.get_x_words(str_replace($replace,$replace_by,content_detail($lang.'_event_desc',$event_by_date[0]->id)),'20').'</p></div>';
	}else
	{
		$css=''; 
	}   
	
	echo "</td>";
	
	if (($i % 7) == 0 ) echo "</tr>";
	
	$desc_cont++;
}
?> 


</table>
</div>
  <?php              

    }
	
	function getBranches()
	{
		$city = $this->input->post('city_name');
		$branches = getBranches($city);
		$lang = $this->session->userdata('lang');  
		$option = '<option value="">'.($Lang == 'eng' ? 'Please Select Branch' : 'يرجى اختيار الفرع').'</option>';
		$data = array();
		if($branches)
		{
			foreach($branches as $branch)
			{
				$option .= '<option value="'.$branch->id.'">'.($lang == 'eng' ? $branch->eng_sub_title : $branch->arb_sub_title).'</option>';
			}
			
		}
		
		$data['html'] = $option;
		echo json_encode($data);
		
		
	}
	
	function getBranchInfo()
	{
		$branch_id = $this->input->post('id');
	//	$branch_detail = fetchContent($branch_id);
		$lang = $this->session->userdata('lang');  
		$desc = content_detail($lang.'_page_desc',$branch_id);
		
		$data['html'] = $desc;
		echo json_encode($data);
		
		
	}
	
	function save()
	{
		
		$this->load->model('ems/model_contents');
		$this->load->model('ems/model_configuration');
		
		$data = array();
		$data = $this->input->post();
		$lang = $this->session->userdata('lang');
		$data['created_at']  = date('Y-m-d H:i:s');
		
		$user_id = $this->model_contents->saveUserDataForCars($data);
		$config =$this->model_configuration->fetchRow();
		if($user_id > 0)
		{
				$this->sentMail($data);
				$result['mobile'] = $data['mobile'];
				$sms = ($lang == 'eng' ? $config->eng_sms : $config->arb_sms);
				$result['sms'] = str_replace('[name]',$data['name'],$sms); 
				$result['success'] =  true;
				$result['sent_sms'] = true;
				$result['reset'] = 1;
				$result['calculator'] = 1;
			    echo json_encode($result);exit();
		}else
		{		
				$result['msg'] = ($lang == 'eng' ? 'Message can not be sent please try again' : 'لا يمكن إرسال رسالة يرجى المحاولة مرة أخرى');
				$result['success'] =  false;
				$result['calculator'] = 0;
			    echo json_encode($result);exit();
		}
	}
	
	private function sentMail($data)
	{
		
		$car_calculation = '';
		
		if(isset($data['is_calculator_form']) && $data['is_calculator_form'] == '1')
		{
			
			$car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Car Price:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['car_price']."</span></td>

   </tr>";
  		   $car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Downpayment:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['downpayment']." %</span></td>

   </tr>";
   		 $car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Ballonpayment:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['ballonpayment']." %</span></td>

   </tr>";
         $car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Monthly Income:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['monthly_income']." </span></td>

   </tr>";
   		 $car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Duration:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['duration']." </span>   </td>

   </tr>";
   
        $car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Insurance Value:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['insurance']." </span>   </td>

   </tr>";
   
   $car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Murabaha Value:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['marabaha']." </span>   </td>

   </tr>";
   
    $car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Installment:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['installment']." </span>   </td>

   </tr>";
   
   $car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Total Payable:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['total']." </span>   </td>

   </tr>";
   
    $car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Type of transaction:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['type_of_transaction']." </span>   </td>

   </tr>";
   
   $car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Status:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['status']." </span>   </td>

   </tr>";
    $car_calculation .= "<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Type for car:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['type']." </span>   </td>

   </tr>";
   
   
		}
		
		
		    $ip = '';

            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

                $ip = $_SERVER['HTTP_CLIENT_IP'];

            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

            } else {

                $ip = $_SERVER['REMOTE_ADDR'];

            }

                 $bodytext="

<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">

<html xmlns=\"http://www.w3.org/1999/xhtml\">

<head>

<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />

<title>Untitled Document</title>

<style type=\"text/css\">

<!--

.gray_12{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:12px; color:#666666; font-weight:normal; }

.gray_12_bold{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:12px; color:#666666; font-weight:bold; }

.gray_15_bold{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:15px; color:#666666; font-weight:bold; }

.gray_10{font-family:\"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif; font-size:10px; color:#666666; font-weight:normal; }

-->

</style>

</head>



<body>

<table width=\"707\" cellpadding=\"8\" border=\"2\">

	<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">ID Number:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['id_number']."</span></td>

   </tr>
	<tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Name:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['name']."</span></td>

   </tr>
   <tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Nationality:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['nationality']."</span></td>

   </tr>

    <tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Email:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['email']."</span></td>

   </tr>

    <tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">Mobile:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['mobile']."</span></td>

   </tr>
    
	 <tr>    

       <td width=\"230\"><span class=\"gray_12_bold\">Date of Birth:</span></td><td><span class=\"gray_12\">&nbsp; ".$data['dob']."</span></td>

    </tr>
   
    <tr>    

    <td width=\"230\"><span class=\"gray_12_bold\">City:</span></td><td><span class=\"gray_12\">&nbsp;".$data['city']."</span></td>

   </tr>

  <tr>     

    <td width=\"230\"><span class=\"gray_12_bold\">Company Name:</span></td><td><span class=\"gray_12\">&nbsp;".$data['company_name']."</span></td>

  </tr>
  <tr>     

    <td width=\"230\"><span class=\"gray_12_bold\">Job Title:</span></td><td><span class=\"gray_12\">&nbsp;".$data['job_title']."</span></td>

  </tr>
  ".$car_calculation."

</table>

<p>&nbsp;</p>













</body>

</html>



";

          $bodytext .= '<p style="font-size: 90%; margin:0; background:#aaaaaa; padding:1em 2em 1em 0.6em; color:#555555; text-shadow:0 1px 0 #c5c5c5; border-bottom:1px solid #9d9d9d;">A form has been submitted on ' . date("l jS \of F Y h:i:s A") . ', for car first info</p>';
		  
		   $this->email->set_newline("\r\n");
		   $this->email->set_mailtype("html");
		   $this->email->from($email);
		   $this->email->to($config->reachus_email); /* depart email Email */
           $this->email->subject('A request from ' . $name);
		   $this->email->message($bodytext);
		   $this->email->send();
	}
	
	

}
/* End of file admin_login.php */
/* Location: ./application/controllers/ems/admin_login.php */