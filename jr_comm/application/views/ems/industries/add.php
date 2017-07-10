
<form id="overlay_map"  name="overlay_map"  style="display:none" method="post" action="ems/dashboard/contact" >
    <table width="420px"  border="0" class="edit_table">
        <tbody>
            <tr><td align="center" width="40%" colspan="2"><font color="#009900"><?php echo $msg ?> </font></td></tr>
            <tr class="blue_row">
                <td width="2%">&nbsp;</td>
                <td width="98%">Location</td><div class="forgot_button"><a id="closemap"><img src="assets/images/close.png"></a></div>
        </tr>
        <tr class="gray_row">
            <td>&nbsp;</td>
            <td>



                <!--edit_data_table-->
                <div class="edit_data_table">


                    <?php echo $map['html']; ?>


                </div><!--edit_data_table-->



            </td>
        </tr>
        </tbody></table>


</form>
<div class="content_row">

    <div class="light_shadow_bar"></div>

    <div class="black_bar_main">

        <div class="inner_left_wrap">
            <div class="inner_left_heading">Nesma Holdings</div>

            <div class="inner_left_headingsmalll">Website</div>
        </div>


        <div class="inner_mid_heading">Industries - Add Industry</div>





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
        <div class="inner_menu_bar">

            <ul>
                <li><a id="saveAbout">Save</a></li>
                <li><a onClick="window.history.back()">Cancel</a></li>

            </ul>

        </div><!--inner_menu_bar-->

        <div style="padding-top:90px;" class="admin_manage_panel">

            <?php echo form_open_multipart('ems/industries/save', array('method' => 'post', 'id' => 'addAboutUs')); ?>
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

                                        <div class="edit_data_table_col1">Title</div>
                                        <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo set_value('eng_name'); ?>" name="eng_industry_name" id="eng_industry_name"></div>


                                    </div>
                                    
                                        <div class="edit_data_table_row">
            <div class="edit_data_table_col1"> Meta Title</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo set_value('meta_title_eng'); ?>" name="meta_title_eng" id="meta_title_eng"></div>
             </div>
             
             
           
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Meta Description</div>
               <div class="edit_data_table_col2"><textarea class="required" name="meta_desc_eng" id="meta_desc_eng" style="padding: 5px;" rows="5" cols="64"><?php echo set_value('meta_desc_eng'); ?></textarea></div>
             
             
             </div>              
             
             
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Meta Keywords</div>
               <div class="edit_data_table_col2"><textarea class="required" name="meta_keywords_eng" id="meta_keywords_eng" style="padding: 5px;" rows="5" cols="64"><?php echo set_value('meta_keywords_eng'); ?></textarea></div>
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
                                        <div class="edit_data_table_col2"><input type="text" class="input_field required" name="ar_industry_name" id="ar_industry_name"></div>


                                    </div>
                                    
                                    <div class="edit_data_table_row">
            <div class="edit_data_table_col1"> Meta Title</div>
               <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo set_value('meta_title_arb'); ?>" name="meta_title_arb" id="meta_title_arb"></div>
             </div>
             
             
           
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Meta Description</div>
               <div class="edit_data_table_col2"><textarea class="required" name="meta_desc_arb" id="meta_desc_arb" style="padding: 5px;" rows="5" cols="64"><?php echo set_value('meta_desc_arb'); ?></textarea></div>
             
             
             </div>              
             
             
             <div class="edit_data_table_row">
             
               <div class="edit_data_table_col1"> Meta Keywords</div>
               <div class="edit_data_table_col2"><textarea class="required" name="meta_keywords_arb" id="meta_keywords_arb" style="padding: 5px;" rows="5" cols="64"><?php echo set_value('meta_keywords_arb'); ?></textarea></div>
              <p style="margin-left: 150px;margin-top: 113px;">Enter tags separated with comma, Example: dogs, "anygry birds",cats</p>
             
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
         $().ready(function() {
             $('#saveAbout').click(function() {
                 $('#addAboutUs').submit();
             });
             $("#addAboutUs").validate();

         });
    </script>                          