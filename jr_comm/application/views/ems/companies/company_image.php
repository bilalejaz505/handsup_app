<script type="text/javascript" charset="utf-8">
	
    $(document).ready(function() {	
		
	$(document).on('change','#user_file',function(){  
		   
			$.ajaxFileUpload({				   
			url: 'ems/companies/uploadcompimage',
			secureuri: false,
			fileElementId: 'user_file',
			dataType: 'json',
			success: function (data, status) {
			if (typeof (data.error) != 'undefined') 
                        {
                            if (data.error != '') 
                            {
                                alert(data.error);
                                $('#user_file').val('');
                            } 
                            else {									 
                                var a=data.msg;
                                var imagename = a.replace("_thumb", "");
                                $('#hidden_file').val(imagename);
                                var text='<div class="user_pic_wrap"><img src="uploads/companies/companyimages/'+a+'" width="112px" height="108px"><div class="pic_size">274&times;270</div></div>';
                                $("#user_pic_panel").html(text);
                                $('div[id ^="remove_pic_"]').show();														
                            }
			}
			},
			error: function (data, status, e) 
                        {
                            $('#user_file').val('');
                            alert(e);
			}
			});	
			
		});
                              
		
        //$('#pic').hide();
        if($("#hidden_file").val()=='')
        {
            $('div[id ^="remove_pic_"]').hide();
        }
               
       $('div[id ^="remove_pic_"]').click(function(){			
    		var id = this.id.replace('remove_pic_','');
    		 if(confirm('Are you sure to delete this photo?')) {
                 url ='ems/companies/deletecompimage';
                 $.post(url, {id:id}, function(data){
                     $('#hidden_file').val('');
                     $("#user_pic_wrap").hide();
                     $("#remove_pic_"+id).hide();
                 });
             }
    	 });
         
        
    	$('#get_file').click(function() {
            $('#user_file').click();				
	});
               
							  
        });
    
 </script>
 <div class="content_row">
             
              <div class="light_shadow_bar"></div>
              
              <div class="black_bar_main">
              
              <div class="inner_left_wrap">
              <div class="inner_left_heading"><?php $id= $this->session->userdata('site_id'); echo getsiteTitle($id);?></div>

<div class="inner_left_headingsmalll">Website</div>
</div>
              
              
              <div class="inner_mid_heading"><?php echo get_section_name($this->uri->segment(2));?> -  Upload Image</div>
              
              
              
              
              
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
                     <div class="modifiedDate">Last modified <?php echo formatModifiedDate($res[0]['image_updated_at']);?> </div>
                </div>
 <!-- status bar - start-->   
 <?php $pub = $res[0]['image_pub_status'];?>
                 <?php echo get_status_bar($pub);?>               
                 <!-- status bar - end-->
              
               
               
               </div><!--side_right-->
               
               
                       
                        <!--middle_content_areainner-->
                       <div class="middle_content_areainner" style="padding-top:0px;">
                       
                         
                
                     <!--inner_menu_bar-->
                      <div class="inner_menu_bar" style="width:22%;">
                     
                     <ul>
                     <li style="z-index:99; width:53%;"><a id="saveAbout">Save</a></li>
                       <li style="z-index:100; left:45%; width:53%;"><a href="ems/companies/manage">Cancel</a></li>
                      
                     </ul>
                     
                     </div><!--inner_menu_bar-->
                       
               <div style="padding-top:90px;" class="admin_manage_panel">
                          
             <?php echo form_open_multipart('ems/companies/savecompimage',array('method'=>'post','id'=>'updateAbout'));?>
              <input type="hidden" value="<?php echo $res[0]['image_pub_status'];?>" id="pub_val" name="pub_val">
                  <input type="hidden" value="<?php echo $res[0]['image_name'];?>" id="hidden_file" name="hidden_file">
                  
                     <div class="table_content_row">
                           
  <table width="100%" border="0" class="edit_table">
	  <tbody>
	   <tr><td align="center" width="40%" colspan="2"><font color="#009900"><?php if (validation_errors()) {
                       echo _erMsg(validation_errors());
                   } if ($this->session->flashdata('message')) {
                       echo $this->session->flashdata('message');
                   } ?></font></td></tr>
	  <tr class="blue_row">
	    <td width="2%">&nbsp;</td>
	    <td width="98%">English</td>
	  </tr>
	  <tr class="gray_row">
	    <td>&nbsp;</td>
	    <td>
    
    
    
      <!--edit_data_table-->
       <div class="edit_data_table">
           
           
                <div class="edit_data_table_row">
                    <div class="edit_data_table_col1"> Title English</div>
                    <div class="edit_data_table_col2"><textarea name="eng_image_title" id="eng_image_title" rows="10" cols="55"><?php echo $res[0]['eng_image_title']; ?></textarea><?php echo display_ckeditor($ckeditor); ?></div>
                </div>
           
                <div class="edit_data_table_row">
                    <div class="edit_data_table_col1"> Title Arabic</div>
                    <div class="edit_data_table_col2"><textarea name="arb_image_title" id="arb_image_title" rows="10" cols="55"><?php echo $res[0]['arb_image_title']; ?></textarea><?php echo display_ckeditor($ckeditor2); ?></div>
                </div>
       
              <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Company Image</div>           
               <div class="edit_data_table_col2">
             
              <div class="row_data">
              <div class="user_pic_panel" id="user_pic_panel">
                <?php  $photo=$res[0]['image_name'];?>
                  <div class="user_pic_wrap" id="user_pic_wrap">
                     <?php
                     if( $photo !=''){
                     echo '<img src="uploads/companies/companyimages/'.$res[0]['image_name'].'" width="112px" height="108px">';  
                     }else{
                     echo '<img src="assets/images/no_image.gif" width="112px" height="108px">';  
                     }
                     ?>
                     <div class="pic_size">274&times;270</div>
                 </div>
                </div>
                  
                <div class="close_button"  id="remove_pic_<?php echo $res[0]['id'];?>">
                    <img src="assets/images/close.png" width="19" height="17" />
                </div>         
                        
                </div> 
			 
                   <div class="upload_button"><input type="button" class="get_file" id="get_file" value=""><input style="opacity: 0;" type="file" id="user_file" name="user_file"></div>
                <div><font color="#FF0000"><?php  if($error != ''){echo $error;}?></font></div>   
                                                      
               </div>
              </div>
           
       </div><!--edit_data_table-->
    
    
    
    </td>
  </tr>
</tbody></table>


                           
                           </div>
                             <?php echo form_close();?> 
                            
                         </div>
                            
                 
                         
                       </div><!--middle_content_areainner-->
             
         
<script language="javascript">
$().ready(function() {
	$('#saveAbout').click(function(){
		$('#updateAbout').submit();
		});
	$("#updateAbout").validate();

});
</script>                          