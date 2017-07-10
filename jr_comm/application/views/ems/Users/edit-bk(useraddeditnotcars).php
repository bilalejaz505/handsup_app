<div class="content_row">

    <div class="light_shadow_bar"></div>

    <div class="black_bar_main">

        <div class="inner_left_wrap">

            <div class="inner_left_heading"><?php echo getsiteTitle(1); ?></div>

            <div class="inner_left_headingsmalll">Website</div>

        </div>

        <div class="inner_mid_heading">User Details</div>

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

               <li><a id="editUser" name="submit" >Save</a></li>

                <li><a onclick="javascript:history.back();">Back</a></li>

            </ul>

        </div><!--inner_menu_bar-->

        <div class="admin_manage_panel" style="padding-top:90px;">

            <div align="center"><?php

                if ($this->session->flashdata('message')) {

                    echo $this->session->flashdata('message');

                }

                ?> </div>

            <div class="table_content_row">

                <?php echo form_open('ems/Users/updateUser', array('method' => 'post', 'id' => 'updateUser')); ?>

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


									<div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Name</div>

                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $user_data->name;?>" name="name" id="name"></div>

                                        </div>
									

                                        <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Email</div>

                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $user_data->email;?>" name="email" id="eng_slide_title"></div>

                                        </div>
										
										<input type="hidden" class="input_field required"  value="<?php echo $user_data->id;?>" name="id" id="eng_slide_title">
<!--                                        <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Division </div>

                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php //echo $user_data->division; ?>" name="division" id="eng_slide_title"></div>

                                        </div>-->
                                        <!--<div class="edit_data_table_row">
										
                                            <div class="edit_data_table_col1">Job Title</div>

                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php /*echo $user_data->job_title; */?>" name="job_title" id="eng_slide_title"></div>

                                        </div>-->
                                       
                                        
                                       <!-- <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Company</div>

                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php /*echo $user_data->company; */?>" name="company" id="eng_slide_title"></div>

                                        </div>-->
                                        
                                        
                                        <!-- <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Country</div>

                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php /*echo $user_data->country; */?>" name="country" id="eng_slide_title"></div>

                                        </div>-->

                                         <!--<div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Mobile</div>

                                            <div class="edit_data_table_col2"><input type="text" disabled class="input_field required"  value="<?php //echo $user_data->mobile; ?>" name="mobile" id="eng_slide_title"></div>

                                        </div>
                                         <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Email</div>

                                            <div class="edit_data_table_col2"><input type="text" disabled class="input_field required"  value="<?php //echo $user_data->email; ?>" name="email" id="eng_slide_title"></div>

                                        </div>-->
                                        <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Password</div>

                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $user_data->password;?>" name="password" id="eng_slide_title"></div>

                                        </div>

                                        <div class="edit_data_table_row">

                                            <div class="edit_data_table_col1">Submit Date</div>

                                            <div class="edit_data_table_col2"><input type="text" disabled class="input_field required" value="<?php echo $user_data->created_at; ?>" name="date" id="date"></div>

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



  <?php echo form_close(); ?> 


                </div>

              

            </div>











































        </div> 















    </div><!--middle_content_areainner-->
<script language="javascript">
        $().ready(function () {
            $('#editUser').click(function () {
			  $("#updateUser").attr("action", "<?php echo base_url();?>ems/Users/updateUser/");
	          $("#updateUser").attr("target", "");
              $('#updateUser').submit();
            });
            $("#updateUser").validate();
          
        });
    </script>      


