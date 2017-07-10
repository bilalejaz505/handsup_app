<div class="content_row">

    <div class="light_shadow_bar"></div>

    <div class="black_bar_main">

        <div class="inner_left_wrap">

            <div class="inner_left_heading"><?php echo getsiteTitle(1); ?></div>

            <div class="inner_left_headingsmalll">Website</div>

        </div>

        <div class="inner_mid_heading">Job Application Details</div>

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

        <?php $pub = $slide->pub_status; ?>

        <?php echo get_status_bar($pub); ?>               

        <!-- status bar - end-->

    </div><!--side_right-->



    <!--middle_content_areainner-->

    <div class="middle_content_areainner" style="padding-top:0px; min-height:1100px;">

        <!--inner_menu_bar-->

        <div class="inner_menu_bar" style="width:22%;">

            <ul>

               <!-- <li style="z-index:99; width:53%;"><a href="" id="submit" name="submit" >Save</a></li>-->

                <li style="z-index:100; left:45%; width:100%;"><a onclick="javascript:history.back();">Cancel</a></li>

            </ul>

        </div><!--inner_menu_bar-->

        <div class="admin_manage_panel" style="padding-top:90px;">

            <div align="center"><?php

                if ($this->session->flashdata('message')) {

                    echo $this->session->flashdata('message');

                }

                ?> </div>

            <div class="table_content_row">

                <?php //echo form_open('ems/home/updateSlide', array('method' => 'post', 'id' => 'site_form')); ?>

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

                                <td width="98%">Details</td>

                            </tr>

                            <tr class="gray_row">

                                <td>&nbsp;</td>

                                <td>

                                    <!--edit_data_table-->

                                    <div class="edit_data_table">


									 <!-- <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Submit Date</div>

                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php //echo $feedback->created_at; ?>" name="date" id="date"></div>

                                        </div> -->




                                        <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">First Name</div>

                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $jobs->first_name;?>" name="name" id="eng_slide_title"></div>

                                        </div>
                                        
                                        <div class="edit_data_table_row">
										
                                            <div class="edit_data_table_col1">Mobile</div>

                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $feedback->mobile; ?>" name="mobile" id="eng_slide_title"></div>

                                        </div>
                                       
                                        
                                        <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Email</div>

                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $feedback->email; ?>" name="email"></div>

                                        </div>
                                        
                                        
                                         <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">CV</div>

                                            <div class="edit_data_table_col2">
                                                        <div class="row_data">
                                                            <div class="user_pic_panel" id="user_pic_panel">
                                                                <!--<div class="user_pic_wrap_<?php echo $image->id; ?>">-->
                                                                    <?php
                                                                    $image_ext = $feedback->cv;
                                                                    $ext_img = explode('.', $image_ext);
                                                                    $ext = $ext_img[1];
                                                                    if ($ext != '') {
                                                                        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif'){
                                                                            echo '<img src="uploads/career/'.$feedback->cv.'" target = "_blank" width="112px" height="108px">';
                                                                        }else{
                                                                            echo 'Click <a href="uploads/career/'.$feedback->cv.'" target = "_blank" >here</a> to download file';
                                                                        }
                                                                    } else {
                                                                        echo '<img src="assets/images/pdf_icon.png" width="112px" height="108px">';
                                                                    }
                                                                    ?>
                                                                <!--</div>-->
                                                            </div>
                                                        </div>
                                            </div>

                                        </div>
                                         
                                        <div class="edit_data_table_row">

                                                <div><font color="#FF0000"><?php

                                                    if ($error != '') {

                                                        echo $error;

                                                    }

                                                    ?></font></div>   

                                            </div>

                                        </div>








                                    </div><!--edit_data_table-->







                                </td>

                            </tr>

                        </tbody></table>







                </div>

                <?php //echo form_close(); ?> 

            </div>











































        </div> 















    </div><!--middle_content_areainner-->



