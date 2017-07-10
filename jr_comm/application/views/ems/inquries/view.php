<div class="content_row">
             
              <div class="light_shadow_bar"></div>
              
              <div class="black_bar_main">
              
              <div class="inner_left_wrap">
              <div class="inner_left_heading"><?php $id= $this->session->userdata('site_id'); echo getsiteTitle($id);?></div>

<div class="inner_left_headingsmalll">Website</div>
</div>
              
              
              <div class="inner_mid_heading">Inquiry - View</div>
              
              
              
              
              
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
                 <div class="previewChangespanel"> 
                                     

                                     
                                     <div class="modifiedDate">Last modified <?php echo formatModifiedDate($res->inq_updated_at);?> </div>
                                     
                                     
                                     </div>
                   <!--search_bar_panel-->
                   <div class="publishedStatuspanel">
                   
                   <div class="publishedStatusheading">Status</div>
                  
                  <div class="publishedStatusRow"> 
                <?php $pub = $res->inq_updated_at;?> 
               
               <div class="publishedDiv">
                  
                <?php if($pub ==1){?>
                    Read
                <?php }else
                {
                ?>
                Un-Read
               <?php
                }?>
              
              
              </div>
                     
                  </div>


                     
                   
                   </div><!--search_bar_panel-->
              
               
               
               </div><!--side_right-->
               
               
                       
                        <!--middle_content_areainner-->
                       <div class="middle_content_areainner" style="padding-top:0px;">
                       
                         
                
                     <!--inner_menu_bar-->
                      <div class="inner_menu_bar" style="width:22%;">
                     
                     <ul>
                       <li style="z-index:100;"><a href="ems/inquries/manage">Back</a></li>
                      
                     </ul>
                     
                     </div><!--inner_menu_bar-->
                       
               <div style="padding-top:90px;" class="admin_manage_panel">
                                      
                           <div class="table_content_row">
                           
  <table width="100%" border="0" class="edit_table">
	  <tbody>
	   <tr><td align="center" width="40%" colspan="2"><font color="#009900"><?php if(validation_errors()){ echo _erMsg(validation_errors());} if($this->session->flashdata('message')) {echo $this->session->flashdata('message');} ?></font></td></tr>
	  <tr class="blue_row">
	    <td width="2%">&nbsp;</td>
	    <td width="98%"><?php echo $res->inq_user; ?> - Inquiry</td>
	  </tr>
	  <tr class="gray_row">
	    <td>&nbsp;</td>
	    <td>
    
    
    
      <!--edit_data_table-->
       <div class="edit_data_table">
       
       
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Name</div>
               <div class="edit_data_table_col2"><?php echo $res->inq_user; ?></div>             
             
             </div>

           <div class="edit_data_table_row">

               <div class="edit_data_table_col1"> Email</div>
               <div class="edit_data_table_col2"><?php echo $res->inq_email; ?></div>

           </div>

           <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Company</div>
               <div class="edit_data_table_col2"><?php echo $res->company; ?></div>
             
             </div>          
           
       
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Phone No.</div>
               <div class="edit_data_table_col2"><?php echo $res->inq_phone; ?></div>
             
             </div>
             

           
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Mobile No.</div>
               <div class="edit_data_table_col2"><?php echo $res->mobile; ?></div>
             
             </div>

           <div class="edit_data_table_row">

               <div class="edit_data_table_col1"> Address</div>
               <div class="edit_data_table_col2"><?php echo $res->city; ?></div>

           </div>
           
              <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Message</div>
               <div class="edit_data_table_col2"><?php echo $res->inq_desc; ?></div>             
             
             </div>            
             
             
              
       
       
       
       </div><!--edit_data_table-->
    
    
    
    </td>
  </tr>
</tbody></table>


                           
                           </div>                        
                            
                         </div>
                            
                 
                         
                       </div><!--middle_content_areainner-->
                        