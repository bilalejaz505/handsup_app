<link href="<?php echo base_url();?>assets/datepicker/css/custom-theme/jquery-ui-1.9.2.custom.css" rel="stylesheet">
	<script>
	$(function() {
		
		$( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });		
	});
	</script>  

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
	
        $(document).on('change', '#user_file', function() {
            $.ajaxFileUpload({
                url: 'ems/companies/uploadFile',
                secureuri: false,
                fileElementId: 'user_file',
                dataType: 'json',
                success: function(data, status) {

                    if (typeof (data.error) != 'undefined') {
                        if (data.error != '') {
                            alert(data.error);
                            $('#user_file').val('');
                        } else {
                            var a = data.msg;
                            var imagename = a.replace("_thumb", "");
                            $('#hidden_file').val(imagename);
                            var text = '<div class="user_pic_wrap"><img src="uploads/companies/' + a + '" width="112px" height="108px"><div class="pic_size">112&times;108</div></div>';
                            $("#user_pic_panel").html(text);
                            $('#pic').show();
                        }
                    }
                },
                error: function(data, status, e) {
                    $('#user_file').val('');
                    alert(e);
                }
            });

        });      
		
	$('#pic').hide();
        $('#remove_pic').click(function() {
            if (confirm('Are you sure to delete this photo?')) {
                $('.user_pic_wrap').hide();
                $('.user_pic_wrap img').attr('src', '');
                $('#user_file').attr('value', '');
                $('#remove_pic').hide();
            }
        });
               
         
        $('#get_file').click(function() 
        {
          $('#user_file').click();				
        });           
							  
        });
        
        
        
        function load_sub_cat(cat_id)
        {
                //alert(cat_id);
                //$("#sub_cat_row").hide();
                var ajxFile ="ems/products/subcategory";
                var data = "id="+cat_id;
            		$.ajax({
				type: "POST",
				url: ajxFile,
				data: data,
				success: function(data){
                                        //alert(data);
                                        $("#sub_cat_row").show();
					$("#sub_cat_column").html(data);				
					//parent.$.fancybox.close();		
				}
			});
                        
        }          
 </script>
 <div class="content_row">
             
              <div class="light_shadow_bar"></div>
              
              <div class="black_bar_main">
              
              <div class="inner_left_wrap">
             <div class="inner_left_heading"><?php $id=$this->session->userdata('site_id'); echo getsiteTitle($id);?></div>

<div class="inner_left_headingsmalll">Website</div>
</div>
              
              
              <div class="inner_mid_heading"><?php echo get_section_name($this->uri->segment(2));?> - Add</div>
              
              
              
              
              
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
                 <?php echo get_status_bar();?>               
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
                          
             <?php echo form_open_multipart('ems/companies/save',array('method'=>'post','id'=>'addAboutUs'));?>
                     <input type="hidden" value="" id="pub_val" name="pub_val">
                     <input type="hidden" value="" id="hidden_file" name="hidden_file">
                     <input type="hidden" value="" id="hidden_file2" name="hidden_file2">
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
               <div class="edit_data_table_col1"> Country</div>
               <div class="edit_data_table_col2">
                   <table><tr>
                           <?php
                           $i = '0';
                           foreach ($countries as $result => $val) {
                               $i++;
                               ?>
                               <td width="5%">
                                   <input  id="cmp_industry_id"  class="required" name="cmp_country_id[]"  type="checkbox" value="<?php echo $val['id']; ?>" style="visibility: visible;" >&nbsp;&nbsp;</td> 
                               <td style="color:white"><?php echo $val['eng_country_name']; ?> </td>

                               <?php
                               if ($i % 3 == '0') {
                                   ?>
                               </tr>

                               <?php
                           }
                       }
                       ?>
                   </table>
               </div>
           </div>
           
           <div class="edit_data_table_row">

               <div class="edit_data_table_col1"> Industry</div>
               <div class="edit_data_table_col2">
                   <table><tr>
                           <?php
                           $i = '0';
                           foreach ($industries as $result => $val) {
                               $i++;
                               ?>
                               <td width="5%"><input  id="cmp_industry_id"  class="required" name="cmp_industry_id[]"  type="checkbox" value="<?php echo $val['id'];?>" style="visibility: visible;" >&nbsp;&nbsp;</td> 
                               <td style="color:white"><?php echo $val['eng_industry_name']; ?> </td>

                               <?php
                               if ($i % 3 == '0') {
                                   ?>
                               </tr>

                               <?php
                           }
                       }
                       ?>
                   </table>
               </div>


           </div>
       
           <div class="edit_data_table_row">
               <div class="edit_data_table_col1"> Title</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo set_value('eng_cmp_title'); ?>" name="eng_cmp_title" id="eng_cmp_title"></div>
           </div>
           
           <div class="edit_data_table_row">

               <div class="edit_data_table_col1"> Description</div>
               <div class="edit_data_table_col2"><textarea name="eng_cmp_desc" id="eng_cmp_desc" rows="10" cols="55"></textarea><?php echo display_ckeditor($ckeditor); ?></div>


           </div>
           
           <div class="edit_data_table_row">

               <div class="edit_data_table_col1"> Company Logo</div>
               <div class="edit_data_table_col2">
                   <div class="row_data"  id="pic">
                       <div class="user_pic_panel" id="user_pic_panel">
                           <div class="user_pic_wrap">
                           </div>
                       </div>
                       <div class="close_button" id="remove_pic"><img src="assets/images/close.png" width="19" height="17" /></div>
                       <div><font color="#FF0000"><?php if ($error != '') {
               echo $error;
           } ?></font></div> 
                   </div> 
                   <div class="upload_button"><input class="get_file" type="button" id="get_file" value="">
                       <input style="opacity: 0;" type="file" id="user_file" name="user_file"><?php echo $error ?></div>
               </div>


           </div>
           
           
               
           <div class="edit_data_table_row">
            <div class="edit_data_table_col1"> Meta Title</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo set_value('meta_title_eng'); ?>" name="meta_title_eng" id="meta_title_eng"></div>
             </div>
             
             
           
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Meta Description</div>
               <div class="edit_data_table_col2"><textarea class="required" name="meta_desc_eng" id="meta_desc_eng" style="padding: 5px;" rows="5" cols="56"><?php echo set_value('meta_desc_eng'); ?></textarea></div>
             
             
             </div>              
             
             
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Meta Keywords</div>
               <div class="edit_data_table_col2"><textarea class="required" name="meta_keywords_eng" id="meta_keywords_eng" style="padding: 5px;" rows="5" cols="56"><?php echo set_value('meta_keywords_eng'); ?></textarea></div>
               <p style="margin-left: 150px;margin-top: 113px;">Enter tags separated with comma, Example: dogs, "anygry birds",cats</p>
             
             </div>
       
       </div><!--edit_data_table-->
    
    
    
    </td>
  </tr>
</tbody></table>


                           
                           </div>
                           
      
                           <div style="margin-top:20px;" class="table_content_row">
                           
                           <table width="100%" border="0" class="edit_table">
                           
  <tbody><tr class="blue_row">
    <td width="2%">&nbsp;</td>
    <td width="98%">Arabic</td>
  </tr>
  <tr class="gray_row">
    <td>&nbsp;</td>
    <td>
    
    
    
      <!--edit_data_table-->
       <div class="edit_data_table">
       
       
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Title</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field required" name="arb_cmp_title" id="arb_cmp_title"></div>
             
             
             </div>
             
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Description</div>
               <div class="edit_data_table_col2"><textarea name="arb_cmp_desc" id="arb_cmp_desc" rows="10" cols="55"></textarea><?php echo display_ckeditor($ckeditor2); ?></div>
             
             
             </div>
               <div class="edit_data_table_row">
            <div class="edit_data_table_col1"> Meta Title</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo set_value('meta_title_arb'); ?>" name="meta_title_arb" id="meta_title_arb"></div>
             </div>
             
             
           
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Meta Description</div>
               <div class="edit_data_table_col2"><textarea class="required" name="meta_desc_arb" id="meta_desc_arb" style="padding: 5px;" rows="5" cols="56"><?php echo set_value('meta_desc_arb'); ?></textarea></div>
             
             
             </div>              
             
             
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Meta Keywords</div>
               <div class="edit_data_table_col2"><textarea class="required" name="meta_keywords_arb" id="meta_keywords_arb" style="padding: 5px;" rows="5" cols="56"><?php echo set_value('meta_keywords_arb'); ?></textarea></div>
              <p style="margin-left: 150px;margin-top: 113px;">Enter tags separated with comma, Example: dogs, "anygry birds",cats</p>
             
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
		$('#addAboutUs').submit();
		});
	$("#addAboutUs").validate();

});
</script>                          