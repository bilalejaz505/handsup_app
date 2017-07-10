<script>

    $(document).ready(function () {
        $('#get_file').click(function () {
            $('#user_file').click();
        });

        $('#arb_get_file').click(function () {
            $('#arb_user_file').click();
        });
    });

</script>

<div class="content_row">
    <div class="light_shadow_bar"></div>
    <div class="black_bar_main">
        <div class="inner_left_wrap">
            <div class="inner_left_heading"><?php echo getsiteTitle(1); ?></div>
            <div class="inner_left_headingsmalll">Website</div>
        </div>
        <div class="inner_mid_heading">Add Home Slide</div>
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


        <!-- status bar - start-->  
        <?php echo get_status_bar(); ?>               
        <!-- status bar - end-->
    </div><!--side_right-->

    <!--middle_content_areainner-->

    <div class="middle_content_areainner" style="padding-top:0px; min-height:1100px;">

        <!--inner_menu_bar-->

        <div class="inner_menu_bar" style="width:22%;">

            <ul>

                <li style="z-index:99; width:53%;"><a href="" id="submit" name="submit" >Save</a></li>

                <li style="z-index:100; left:45%; width:53%;"><a onclick="javascript:history.back();">Cancel</a></li>

            </ul>

        </div><!--inner_menu_bar-->

        <div class="admin_manage_panel" style="padding-top:90px;">

            <div align="center"><?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                }
                ?> </div>
<div id="returned_gallery_imgs_bg" style="display:none;"></div>
            <div class="table_content_row">

                <?php echo form_open_multipart('ems/slider/addSlide', array('method' => 'post', 'id' => 'site_form')); ?>

                <input type="hidden" value="" id="pub_val" name="pub_val">


                <div class="table_content_row">

                    <table width="100%" border="0" class="edit_table">
                        <tbody>
                            <tr><td align="center" width="40%" colspan="2"><font color="#009900"><?php
                                    if (validation_errors()) {
                                        echo _erMsg(validation_errors());
                                    } if ($this->session->flashdata('message')) {
                                        echo $this->session->flashdata('message');
                                    }
                                    ?></font></td></tr>
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
                                            <div class="edit_data_table_col1"> Slide CMS Title</div>
                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $res->eng_slide_title; ?>" name="eng_slide_title" id="eng_slide_title"></div>
                                        </div>
                                        
                                          <div class="edit_data_table_row">
                                                <div class="edit_data_table_col1"> Description </div>
                                                <div class="edit_data_table_col2"><textarea class="required" name="eng_slide_desc" id="eng_slide_desc" rows="10" cols="55"><?php echo $res->eng_slide_desc; ?></textarea><?php echo display_ckeditor($ckeditor2); ?></div>
                                            </div>
                                    
                                        <!--<div class="edit_data_table_row">
                                            <div class="edit_data_table_col1"> Slide Description</div>
                                            <div class="edit_data_table_col2"><textarea class="required" name="eng_slide_desc" id="eng_slide_desc" style="padding: 5px;" rows="5" cols="64"><?php echo $res->eng_slide_desc; ?></textarea></div>
                                        </div> --> 

                                        <div class="edit_data_table_row desc projects slide">
                                            <div class="edit_data_table_col1"> Slide Image</div>           
                                            <div class="edit_data_table_col2">
                                               <button class="bg back_color" type="button" style="position: relative;left: 0px; float:left;" id="user_file">Upload Image</button> <input type="hidden" value="" id="bg" name="bg">
                                             
                                              <div class="pic_size" style="position:inherit; float:left; width:100%; margin-left:3px; margin-top:2px;">600&times;200</div>

                                            </div>
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
                                         <div class="edit_data_table_col1"> Description </div>
                                         <div class="edit_data_table_col2"><textarea name="arb_slide_desc" class="required" id="arb_slide_desc" rows="10" cols="55"><?php echo $res->arb_slide_desc ?></textarea><?php echo display_ckeditor($ckeditor4); ?></div>
                                    </div>
                                     </div><!--edit_data_table-->

                                </td>
                            </tr>
                        </tbody></table>

                </div>

                <?php echo form_close(); ?> 

            </div>





















        </div> 







    </div><!--middle_content_areainner-->

