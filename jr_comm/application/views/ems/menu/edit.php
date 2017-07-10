<div class="content_row">

    <div class="light_shadow_bar"></div>

    <div class="black_bar_main">

        <div class="inner_left_wrap">
            <div class="inner_left_heading"><?php
                $id = $this->session->userdata('site_id');
                echo getsiteTitle($id);
                ?></div>

            <div class="inner_left_headingsmalll">Website</div>
        </div>


        <div class="inner_mid_heading"><?php echo $result->title; ?> - Edit</div>





        <div class="get_help"><a  id="pop">Get Help</a><span style="padding-top:20px; padding-left:8px; float:right"><a  id="pop2"><img src="<?php echo base_url(); ?>assets/images/hepl_icon.png" width="20" height="20" /></a></span></div>
        <div class="side_bar_wrap" style="border-left:1px solid #fff;"><span><img src="<?php echo base_url(); ?>assets/images/sidebar_icon.png" width="15" height="15" /></span>Sidebar</div>
    </div>

    <div class="black_shadow"></div>

</div>  


<!--gray_panel-->
<div class="inner_gray_panel" >


    <!--side_right-->
    <div class="side_right">



        <div class="seprator_horizontal"></div>
        <div class="previewChangespanel"> 

            


        </div>

        <!-- status bar - start-->   
        <?php $pub = $result->pub_status; ?>
        <?php //echo get_status_bar($pub); ?>               
        <!-- status bar - end-->



    </div><!--side_right-->



    <!--middle_content_areainner-->
    <div class="middle_content_areainner" style="padding-top:0px;">



        <!--inner_menu_bar-->
        <div class="inner_menu_bar" style="width:100%;">

            <ul>
            
                <li style="z-index:99;"><a id="saveAbout">Save</a></li>
               <li style="z-index:100;"><a href="javascript:history.back();">Cancel</a></li>
				
            </ul>

        </div><!--inner_menu_bar-->

        <div style="padding-top:90px;" class="admin_manage_panel">
				
            <?php echo form_open_multipart('ems/menu/update/id/' . $result->id, array('method' => 'post', 'id' => 'updateAbout')); ?>
            <input type="hidden" value="<?php echo $result->pub_status; ?>" id="pub_status" name="pub_status">
            <input type="hidden" value="<?php echo $result->id; ?>" id="gid" name="gid"> 
            
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
                                            <div class="edit_data_table_col1"> Menu Name</div>
                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $result->title; ?>" name="title" id="title"></div>
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
        $().ready(function () {
            $('#saveAbout').click(function () {
                $('#updateAbout').submit();
            });
            $("#updateAbout").validate();

        });
    </script>                          