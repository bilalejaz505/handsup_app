 <div class="content_row">

             

              <div class="light_shadow_bar"></div>

              

              <div class="black_bar_main">

              

              <div class="inner_left_wrap">

              <div class="inner_left_heading"><?php $id= $this->session->userdata('site_id'); echo getsiteTitle($id);?></div>



<div class="inner_left_headingsmalll">Website</div>

</div>

              

              

              <div class="inner_mid_heading">Configuration</div>

              

              

              

              

              

               <div class="get_help"><a  id="pop">Get Help</a><span style="padding-top:20px; padding-left:8px; float:right"><a  id="pop2"><img src="<?php echo base_url();?>assets/images/hepl_icon.png" width="20" height="20" /></a></span></div>

               <div class="side_bar_wrap" style="border-left:1px solid #fff;"><span><img src="<?php echo base_url();?>assets/images/sidebar_icon.png" width="15" height="15" /></span>Sidebar</div>

              </div>

             

              <div class="black_shadow"></div>

             

             </div>  

             

             

             <!--gray_panel-->

             <div class="inner_gray_panel" >

            

             

               <!--side_right-->

               <div class="side_right">

               

             

               

                 <div class="seprator_horizontal"></div>                              



   

                 <!-- status bar - start-->  

                 <?php // $pub = $res->pub_status;?>

                 <?php // echo get_status_bar($pub);?>               

                 <!-- status bar - end-->               

               

               </div><!--side_right-->

               

               

                       

                        <!--middle_content_areainner-->

                       <div class="middle_content_areainner" style="padding-top:0px;">

                       

                         

                

                     <!--inner_menu_bar-->

                      <div class="inner_menu_bar" style="width:22%;">

                     

                     <ul>

                     <?php echo get_updated_button("saveSocial","Save","edit");?>

                       <li><a href="ems/dashboard/manage">Cancel</a></li>

                      

                     </ul>

                     

                     </div><!--inner_menu_bar-->

                       

               <div style="padding-top:90px;" class="admin_manage_panel">

                          

             <?php echo form_open_multipart('ems/configuration/save',array('method'=>'post','id'=>'socialLinks'));?>

                     <input type="hidden" value="<?php echo $res->pub_status; ?>" id="pub_val" name="pub_val">      

                           <div class="table_content_row">

  

  <table width="100%" border="0" class="edit_table">

	  <tbody>

	   <tr><td align="center" width="40%" colspan="2"><font color="#009900"><?php if(validation_errors()){ echo _erMsg(validation_errors());} if($this->session->flashdata('message')) {echo $this->session->flashdata('message');} ?></font></td></tr>

	  <tr class="blue_row">

	    <td width="2%">&nbsp;</td>

	    <td width="98%">General Settings</td>

	  </tr>

	  <tr class="gray_row">

	    <td>&nbsp;</td>

	    <td>

    

    

    

      <!--edit_data_table-->

       <div class="edit_data_table">

           

           

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Project Name</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $res->project_name;?>" name="project_name" id="project_name"></div>

             

             

             </div>            

  

<!--             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Homepage Slider transaction time (seconds)</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->slider_transaction;?>" name="slider_transaction" id="slider_transaction"></div>

             

             

             </div>                    -->

       

       

             

          

       

       

       </div><!--edit_data_table-->

    

    

    

    </td>

  </tr>

</tbody></table>                               

                               

  <table width="100%" border="0" class="edit_table">

	  <tbody>

	   <tr><td align="center" width="40%" colspan="2"><font color="#009900">

               </font></td></tr>

	  <tr class="blue_row">

	    <td width="2%">&nbsp;</td>

	    <td width="98%">Email Settings</td>

	  </tr>

	  <tr class="gray_row">

	    <td>&nbsp;</td>

	    <td>

    

    

    

      

       <div class="edit_data_table">

                                 

  

             <div class="edit_data_table_row">             

               <div class="edit_data_table_col1">Email sent from</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->from_email;?>" name="from_email" id="from_email"></div>                          

             </div>                    

       

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Reach Us - Email</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->reachus_email;?>" name="reachus_email" id="reachus_email"></div>

             

             

             </div>

             

             

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Send Inquiry - Email</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"   value="<?php echo $res->sendinquiry_email;?>" name="sendinquiry_email" id="sendinquiry_email"></div>

             

             

             </div>



       </div>

    

    

    

    </td>

  </tr>

</tbody></table>



  <table width="100%" border="0" class="edit_table">

	  <tbody>

              <tr><td align="center" width="40%" colspan="2">&nbsp;  </td></tr>

	  <tr class="blue_row">

	    <td width="2%">&nbsp;</td>

	    <td width="98%">Google Analytics</td>

	  </tr>

	  <tr class="gray_row">

	    <td>&nbsp;</td>

	    <td>

    

    

    

      <!--edit_data_table-->

       <div class="edit_data_table">

  

           

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">User name</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->ga_user;?>" name="ga_user" id="ga_user"></div>

             

             

             </div>           

       

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">User Password</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->ga_password;?>" name="ga_password" id="ga_password"></div>

             

             

             </div>

             

             

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Tracking ID</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"   value="<?php echo $res->ga_tracking_id;?>" name="ga_tracking_id" id="ga_tracking_id">

                   <br><small>Find similar id in your account given as UA-24417190-21</small></div>

             

             

             </div>

           

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">View ID</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"   value="<?php echo $res->ga_view_id;?>" name="ga_view_id" id="ga_view_id">

               <br><small>Find similar id in your account given as 86349077</small></div>

             

             

             </div>           

             

          

       

       

       </div><!--edit_data_table-->

    

    

    

    </td>

  </tr>

</tbody></table>



 <table width="100%" border="0" class="edit_table" style="display: none;">

	  <tbody>

	   <tr><td align="center" width="40%" colspan="2"><font color="#009900">

               </font></td></tr>

	  <tr class="blue_row">

	    <td width="2%">&nbsp;</td>

	    <td width="98%">SmS Settings</td>

	  </tr>

	  <tr class="gray_row">

	    <td>&nbsp;</td>

	    <td>

    

    

    

      

       <div class="edit_data_table">

                                 

  

             
       

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Sms Arabic</div>

               <div class="edit_data_table_col2"><textarea  name="arb_sms" id="arb_sms" style="direction:rtl;"><?php echo $res->arb_sms; ?></textarea></div>

             

             

             </div>

             

             

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Sms Eng</div>

               <div class="edit_data_table_col2"><textarea  name="eng_sms" id="eng_sms"><?php echo $res->eng_sms; ?></textarea></div>

             

             

             </div>

           

                     

             

          

             
       

       

       </div>

    

    

    

    </td>

  </tr>

</tbody></table>


      <!--<table width="100%" border="0" class="edit_table">

	  <tbody>

	   <tr><td align="center" width="40%" colspan="2"><font color="#009900">

               </font></td></tr>

	  <tr class="blue_row">

	    <td width="2%">&nbsp;</td>

	    <td width="98%">Newsletter Setting</td>

	  </tr>
       <tr class="gray_row">
      <td colspan="2">&nbsp;</td>
      </tr>
      <tr class="gray_row">
      <td colspan="2" style="padding-left:10px;"><strong>From email address should be same as the live<br /> constant contact account login email.</strong>
</td>
      </tr>

	  <tr class="gray_row">

	    <td>&nbsp;</td>

	    <td>

    

    

    

      

       <div class="edit_data_table">

                                 

  

             <div class="edit_data_table_row">             

               <div class="edit_data_table_col1">Secert Key</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->ctct_api_key;?>" name="ctct_api_key" id="ctct_api_key"></div>                          

             </div>                    

       

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Access Token</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->ctct_token;?>" name="ctct_token" id="ctct_token"></div>

             

             

             </div>

             
 
             <div class="edit_data_table_row">

             
               <div class="edit_data_table_col1">From Email</div>

               <div class="edit_data_table_col2">
               
               <input type="text" class="input_field"  value="<?php echo $res->ctct_from_email;?>" name="ctct_from_email" id="ctct_from_email"></div>

            
             </div>

             
            <?php if(!empty($res->ctct_api_key)){ ?>
           
			<div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Select List for Frontend Members </div>

               <div class="edit_data_table_col2">
               
                <select name="ctct_list" id="ctct_list" style="width:95%;">
             <option value="">Select List</option>
                    <?php
                    foreach ($lists as $list) {
						
						$selected =	(isset($res->ctct_list) and !empty($res->ctct_list) and $list->id == $res->ctct_list)?'selected':'';
                        echo '<option value="' . $list->id . '" '.$selected.'>' . $list->name . '</option>';
                    }
                    ?>
                </select>
               
             </div>

            
             </div>
                        
			<?php } ?>

             

          

       

       

       </div>

    

    

    

    </td>

  </tr>

</tbody></table>     -->                    

<!--  <table width="100%" border="0" class="edit_table">

	  <tbody>

              <tr><td align="center" width="40%" colspan="2"> &nbsp; </td></tr>

	  <tr class="blue_row">

	    <td width="2%">&nbsp;</td>

	    <td width="98%">SMTP Settings</td>

	  </tr>

	  <tr class="gray_row">

	    <td>&nbsp;</td>

	    <td>

    

    

    

      edit_data_table

       <div class="edit_data_table">

  

           

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">SMTP Sever/Host name</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->smtp_host;?>" name="smtp_host" id="smtp_host"></div>

             

             

             </div>           

       

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Email</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field email"  value="<?php echo $res->smtp_email;?>" name="smtp_email" id="smtp_email"></div>

             

             

             </div> 

             

             

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Password</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->smtp_password;?>" name="smtp_password" id="smtp_password">

               </div>

             

             

             </div>

           

             <div class="edit_data_table_row">

             

               <div class="edit_data_table_col1">Port</div>

               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->smtp_port;?>" name="smtp_port" id="smtp_port">

               </div>

             

             

             </div>           

             

          

       

       

       </div>edit_data_table

    

    

    

    </td>

  </tr>

</tbody></table>                               -->



                           

                           </div>

                           

                           

                           

                           

                          

                       

                       

                             <?php echo form_close();?> 

                            

                         </div>

                            

                 

                         

                       </div><!--middle_content_areainner-->

             

         

<script language="javascript">

$().ready(function() {

	$('#saveSocial').click(function(){

		$('#socialLinks').submit();

		});

	$("#socialLinks").validate();



});

</script>                          