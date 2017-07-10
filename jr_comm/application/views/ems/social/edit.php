 <div class="content_row">
             
              <div class="light_shadow_bar"></div>
              
              <div class="black_bar_main">
              
              <div class="inner_left_wrap">
              <div class="inner_left_heading"><?php $id= $this->session->userdata('site_id'); echo getsiteTitle($id);?></div>

<div class="inner_left_headingsmalll">Website</div>
</div>
              
              
              <div class="inner_mid_heading">Social</div>
              
              
              
              
              
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
                          
             <?php echo form_open_multipart('ems/social/save',array('method'=>'post','id'=>'socialLinks'));?>
                     <input type="hidden" value="<?php echo $res->pub_status; ?>" id="pub_val" name="pub_val">      
                           <div class="table_content_row">
  
  <table width="100%" border="0" class="edit_table">
	  <tbody>
	   <tr><td align="center" width="40%" colspan="2"><font color="#009900"><?php if(validation_errors()){ echo _erMsg(validation_errors());} if($this->session->flashdata('message')) {echo $this->session->flashdata('message');} ?></font></td></tr>
	  <tr class="blue_row">
	    <td width="2%">&nbsp;</td>
	    <td width="98%">Social Links Settings</td>
	  </tr>
	  <tr class="gray_row">
	    <td>&nbsp;</td>
	    <td>
    
    
    
      <!--edit_data_table-->
       <div class="edit_data_table">
	   
	   
			<div class="edit_data_table_row">
             
               <div class="edit_data_table_col1">Twitter</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->soc_tw;?>" name="soc_tw" id="soc_tw"></div>
            
			</div>
	   
			<div class="edit_data_table_row">             
               <div class="edit_data_table_col1">Facebook</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->soc_fb;?>" name="soc_fb" id="soc_fb"></div>                          
            </div>                    
       
            <div class="edit_data_table_row">             
               <div class="edit_data_table_col1">RSS</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->soc_rss;?>" name="soc_rss" id="soc_rss"></div>                          
            </div> 
             
			<div class="edit_data_table_row">             
               <div class="edit_data_table_col1">Printerest</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $res->soc_printerest;?>" name="soc_printerest" id="soc_printerest"></div>                          
            </div> 
             
			
            <div class="edit_data_table_row">            
               <div class="edit_data_table_col1">Google Plus</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field"   value="<?php echo $res->soc_google;?>" name="soc_google" id="soc_google"></div>            
            </div>
			
			<div class="edit_data_table_row">            
               <div class="edit_data_table_col1">Dribbble</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field"   value="<?php echo $res->soc_dribbble;?>" name="soc_dribbble" id="soc_dribbble"></div>            
            </div>
			
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1">LinkedIn</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field"   value="<?php echo $res->soc_lin;?>" name="soc_lin" id="soc_lin"></div>
             
             
             </div> 
           
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1">Youtube</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field"   value="<?php echo $res->soc_you;?>" name="soc_you" id="soc_you"></div>
             
             </div>
             

             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1">Instagram</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field"   value="<?php echo $res->soc_ins;?>" name="soc_ins" id="soc_ins"></div>
             
             
             </div> 
       </div><!--edit_data_table-->
    
    
    
    </td>
  </tr>
</tbody></table>                               
                               
  

  
                               
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