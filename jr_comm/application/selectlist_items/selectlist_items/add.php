<div class="content_row">
    <div class="light_shadow_bar"></div>
    <div class="black_bar_main">
        <div class="inner_left_wrap">
            <div class="inner_left_heading"><?php $id= $this->session->userdata('site_id'); echo getsiteTitle($id);?></div>
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
                <li style="z-index:99; width:53%;"><a id="saveProject">Save</a></li>
                <li style="z-index:0; left:45%; width:53%;"><a href="ems/selectlists/manage">Cancel</a></li>

            </ul>

        </div><!--inner_menu_bar-->

        <div style="padding-top:90px;" class="admin_manage_panel">

            <?php echo form_open_multipart('ems/selectlist_items/save', array('method' => 'post', 'id' => 'addProject')); ?>
            <input type="hidden" value="" id="pub_val" name="pub_val">        
            <div class="table_content_row">

                <table width="100%" border="0" class="edit_table">
                    <tbody>
                        <tr><td align="center" width="40%" colspan="2"><font color="#009900"><?php echo $msg ?> </font></td></tr>
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
                 
                      <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Title</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo set_value('eng_item_title'); ?>" name="eng_item_title" id="eng_prd_title"></div>
             
             
             </div>
             
        
             
             
             </div>                                    

                                    
                                    
                                </div><!--edit_data_table-->
                            </td>
                        </tr>
                    </tbody></table>
            </div>
			
                   <div class="table_content_row">

                <table width="100%" border="0" class="edit_table">
                    <tbody>
                        <tr><td align="center" width="40%" colspan="2"><font color="#009900"><?php echo $msg ?> </font></td></tr>
                        <tr class="blue_row">
                            <td width="2%">&nbsp;</td>
                            <td width="98%">Arabic</td>
                        </tr>
                        <tr class="gray_row">
                            <td>&nbsp;</td>
                            <td>
                                <!--edit_data_table-->
                                <div class="edit_data_table">
                                    
             <div class="edit_data_table_row">
                 
                      <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Title</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo set_value('arb_item_title'); ?>" name="arb_item_title" id="eng_prd_title"></div>
             
             
             </div>
             
        
             
             
             </div>                                    

                                    
                                    
                                </div><!--edit_data_table-->
                            </td>
                        </tr>
                    </tbody></table>
            </div>
			
			
			<?php echo form_close(); ?> 
        </div>
    </div><!--middle_content_areainner-->
    <script language="javascript">
        $(document).ready(function() {
            $('#saveProject').click(function() {
                //$('#saveProject').unbind('click');
                $('#addProject').submit();
            });
            $("#addProject").validate();

        });
    </script>                          