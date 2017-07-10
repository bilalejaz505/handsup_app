<div class="content_row">

    <div class="light_shadow_bar"></div>

    <div class="black_bar_main">

        <div class="inner_left_wrap">
            <div class="inner_left_heading"><?php echo getsiteTitle(1); ?></div>

            <div class="inner_left_headingsmalll">Website</div>
        </div>
        <div class="inner_mid_heading">Manage Newsletter</div>

        <div class="get_help"><a  id="pop">Get Help</a><span style="padding-top:20px; padding-left:8px; float:right"><a  id="pop2"><img src="assets/images/hepl_icon.png" width="20" height="20" /></a></span></div>
        <div class="side_bar_wrap" style="border-left:1px solid #fff;"><span><img src="assets/images/sidebar_icon.png" width="15" height="15" /></span>Sidebar</div>
    </div>

    <div class="black_shadow"></div>

</div>  


<!--gray_panel-->
<div class="inner_gray_panel" >


    <!--side_right-->
    <div class="side_right">



        <div class="seprator_horizontal"></div>

        <!--search_bar_panel-->
        <div class="search_bar_panel">

            <div class="search_heading">Search</div>

            <div class="search_detail">Type your search keyword<br />

                to filter the grid</div>


            <div class="search_field_row"  style="height:auto !important">

                <div class="search_inputfiled">
                    <input name="search" id="search" type="text" class="search_field"  placeholder="Keyword"/></div> 

                <div class="search_button"><img src="assets/images/search_button.png" width="36" height="32" /></div>

            </div>
            <div id="SearchContainer" class="Searchcontainer"  style="background: none repeat scroll 0 0 transparent !important;
                 float: left !important;
                 height: auto !important;
                 width: 100% !important;">

            </div>

        </div><!--search_bar_panel-->

        <div class="filter_bar_panel">




            <div class="filter_heading">Filters</div>




            <div class="dropdownRow">



                <div class="dropdownfiled">

                    <select name="published" id="published" class="dropDownList"   > 
                        <option value=""> Select</option>
                        <option value="1"> Published </option>
                        <option value="0"> Un Published </option>  
                    </select>

                </div> 

<!--<div class="search_button"><img src="images/search_button.png" width="36" height="32" /></div>-->

            </div>





        </div>

    </div><!--side_right-->



    <!--middle_content_areainner-->
    <div class="middle_content_areainner" style="padding-top:0px;">



        <!--inner_menu_bar-->
        <div class="inner_menu_bar">

          
              <ul>


           <li><a href="ems/ctct/campaign">Back</a></li>
           <li><a id="submit">Save</a></li>



            </ul>
           

        </div><!--inner_menu_bar-->

        <div class="admin_manage_panel" style="padding-top:90px;">


            <div align="center">
               <?php
                                    if (validation_errors()) {
                                        echo _erMsg(validation_errors());
                                    } if ($this->session->flashdata('message')) {
                                        echo $this->session->flashdata('message');
                                    }
                                    ?> </div>
                
                
            <div class="table_content_row">
            
              <?php echo form_open_multipart('ems/ctct/addCampaign', array('method' => 'post', 'id' => 'site_form')); ?> 
               <input type="hidden" id="cam_id" name="cam_id" value="<?php echo $campaigns->id; ?>">
              
              <?php 
			
			  if(!empty($campaigns->next_run_date)){
				  
				  $date = $campaigns->next_run_date;
				  
			  }else{
				   $date = date('Y-m-d\TH:i:s\.000\Z', strtotime("+1 day"));
			  }
			  
			  ?>   

                <div class="table_content_row">



                    <table width="100%" border="0" class="edit_table">

                        <tbody>

                      
                            <tr class="blue_row">

                                <td width="2%">&nbsp;</td>

                                <td width="98%">Send New Email</td>

                            </tr>

                            <tr class="gray_row">

                                <td>&nbsp;</td>

                                <td>

                                    <!--edit_data_table-->

                                    <div class="edit_data_table">



                                        <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1"> Email Name</div>

                                            <div class="edit_data_table_col2">
             <input type="text" id="name" name="name" class="input_field required" placeholder="Email Name" value="<?php echo $campaigns->name; ?>">
</div>

                                        </div>

                                



                                        <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1"> Subject</div>           

                                            <div class="edit_data_table_col2">

                                                

                                      <input type="text" id="subject" name="subject" class="input_field required" placeholder="Subject" value="<?php echo $campaigns->subject; ?>">




                                            </div>

                                        </div>

<div class="edit_data_table_row">

                                            <div class="edit_data_table_col1"> From Name</div>           

                                            <div class="edit_data_table_col2">

                                                

                                      <input type="text" id="from_name" name="from_name" class="input_field required" placeholder="From Name" value="<?php echo $campaigns->from_name; ?>"> 




                                            </div>

                                        </div>
                                        
             <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1"> From Email</div>           

                                            <div class="edit_data_table_col2">

                                                

                        <input type="email" id="from_addr" name="from_addr" class="input_field required" placeholder="From Email" value="<?php echo $res->ctct_from_email; ?>" readonly="readonly">



                                            </div>

                                        </div>                           
                  
                  
                  
                  <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1"> Text Content</div>           

                                            <div class="edit_data_table_col2">

                                                

<textarea id="text_content" name="text_content" placeholder="Text Content" required="required"><?php echo $campaigns->text_content; ?></textarea>


                                            </div>

                                        </div>   
                                        
                                        
                                        <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1"> Email Content</div>           

                                            <div class="edit_data_table_col2">

                                                

<textarea id="email_content" name="email_content" placeholder="Email Content" required="required"><?php echo $campaigns->email_content; ?></textarea><?php echo display_ckeditor($ckeditor); ?>



                                            </div>

                                        </div>  
                                        
                                        
                                        <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1"> Greeting String</div>           

                                            <div class="edit_data_table_col2">

                                                
                        <input type="text" id="greeting_string" name="greeting_string" class="input_field required" placeholder="Greeting String" value="<?php echo $campaigns->greeting_string; ?>">


                                            </div>

                                        </div> 
                                        
                                        
                                        
                                        <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1"> Reply-To Email</div>           

                                            <div class="edit_data_table_col2">

                                                
                        <input type="email" id="reply_to_addr" name="reply_to_addr" class="input_field required" placeholder="Reply To" value="<?php echo $res->ctct_from_email; ?>" readonly="readonly">


                                            </div>

                                        </div>                
             
             <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Lists to send to:</div>           

                                            <div class="edit_data_table_col2">

                                                
<select name="lists[]" style="width:95%;" required="required">                    
<?php

                        echo '<option value="">Select Contact List</option>';

                    foreach ($lists as $list) {
						
						$selected =	(isset($campaigns->sent_to_contact_lists[0]->id) and !empty($campaigns->sent_to_contact_lists[0]->id) and $list->id == $campaigns->sent_to_contact_lists[0]->id)?'selected':'';
                        echo '<option value="' . $list->id . '" '.$selected.'>' . $list->name . '</option>';
                    }
                    ?>
                </select>



                                            </div>

                                        </div>   
                                        
                                
                                
                                        
                                        
                                        <div class="edit_data_table_row">

                                      <div class="edit_data_table_col1">Send Time</div>           

                                            <div class="edit_data_table_col2">

                                                

 <input type="text" name="schedule_time"  id="datetimepicker" value="<?php echo $date; ?>" class="input_field required" />



                                            </div>

                                        </div>                        

<!--<div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Email Content Format</div>           

                                            <div class="edit_data_table_col2">

                                                
  <input type="radio" id="name" name="format" value="HTML" checked> HTML


                                            </div>

                                        </div>-->

                                    </div><!--edit_data_table-->

                                </td>

                            </tr>

                        </tbody></table>







                </div>

    
                    <?php echo form_close(); ?> 

            </div>


            <!--pagination_row--> 
            <div class="pagination_row">

                <div class="pagination_left">

                    <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                        <tr>
                            <td>&nbsp;</td>
                            <td class="pagination_text">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <div class="pagination_right">
                    <table width="100%" border="0">
                    </table>
                </div>
            </div><!--pagination_row-->
        </div> 
    </div><!--middle_content_areainner-->






<!-- Success Message -->
<?php /*if (isset($returnContact)) {
    echo '<div class="container alert-success"><pre class="success-pre">';
    print_r($returnContact);
    echo '</pre></div>';
} */?>

