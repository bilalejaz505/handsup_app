<script>
function goBack(){
	var back_page = '<?php echo base_url(); ?>ems/list_content/index/' + currentPageID;
	location.href = back_page;
}
currentPage = 'ems/list_content/index/' + currentPageID;
setBackPage(currentPage);
</script>
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


        <div class="inner_mid_heading">Add Content</div>





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
        <?php $pub = $res->pub_status; ?>
        <?php// echo get_status_bar($pub); ?>               
        <!-- status bar - end-->



    </div><!--side_right-->



    <!--middle_content_areainner-->
    <div class="middle_content_areainner" style="padding-top:0px;">



        <!--inner_menu_bar-->
        <div class="inner_menu_bar" style="width:22%;">

            <ul>
			
                <li style="z-index:99; width:53%;"><a id="saveAbout">Save</a></li>
                
				<li style="z-index:100;"><a id="back" href="javascript:void(0);" onclick="goBack();">Back</a></li>

            </ul>

        </div><!--inner_menu_bar-->
        <div id="returned_page_image" style="display:none;"></div>
		<div id="returned_news_image" style="display:none;"></div>
        <div style="padding-top:90px;" class="admin_manage_panel">

            <?php echo form_open_multipart('ems/content/savePage', array('method' => 'post', 'id' => 'updateAbout','onsubmit' => 'return checkUniquePageTitle(0)')); ?>
            <input type="hidden" value="1" id="pub_status" name="pub_status">
            <input type="hidden" value="<?php echo $tpl_id; ?>" id="tpl_id" name="tpl_id"> 
            <input type="hidden" value="<?php echo $template; ?>" id="tpl_name" name="tpl_name"> 

             <div class="table_content_row">

                <table width="100%" border="0" class="edit_table">
                    <tbody>
                        <tr><td align="center" width="40%" colspan="2" id="show_error"><font color="#009900"><?php
                                if (validation_errors()) {
                                    echo _erMsg(validation_errors());
                                } if ($this->session->flashdata('message')) {
                                    echo $this->session->flashdata('message');
                                }
                                ?></font></td></tr>
                        <tr class="blue_row">
                            <td width="2%">&nbsp;</td>
                            <td width="98%">Content Listing</td>
                        </tr>
                        <tr class="gray_row">
                            <td>&nbsp;</td>
                            <td>



                                <!--edit_data_table-->
                                <div class="edit_data_table">
									<div class="edit_data_table_row">
										<div class="edit_data_table_col1">Title</div>
										<div class="edit_data_table_col2"><input type="text" class="input_field required"  value="" name="eng_title" id="eng_title"></div>
									</div>
                                    <div class="edit_data_table_row" style="display: none;">
										<div class="edit_data_table_col1">Sub Title</div>
										<div class="edit_data_table_col2"><input type="text" class="input_field"  value="" name="eng_sub_title" id="eng_sub_title"></div></div>
									
                                    <?php

                                    if($template == 'home'){
                                        create_image('Banner Image', 'home_image', '1920&times;922', 'eng');
                                        create_textarea('Banner Description', 'home_desc', 'eng');
                                    }

                                    if($template == 'products'){
                                        create_image('Image', 'product_image', '150&times;150', 'eng');
                                        create_textarea('Description', 'product_desc', 'eng');
                                    }

                                    if($template == 'accessories'){
                                        create_image('Image', 'acc_image', '100&times;100', 'eng');
                                        create_textarea('Description', 'acc_desc', 'eng');
                                    }

                                    if($template == 'solutions'){
                                        create_image('Icon Image', 'icon', '32&times;29', 'eng');
                                        create_textarea('Description', 'sol_child_desc', 'eng');
                                        create_datepicker('Date', 'pro_date', 'eng');
                                    }
                                    ?>


									<div class="edit_data_table_row">
										<div class="edit_data_table_col1"> Meta Title</div>
                                        <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="" name="meta_title_eng" id="meta_title_eng"></div>
                                    </div>



                                    <div class="edit_data_table_row">

                                        <div class="edit_data_table_col1"> Meta Description</div>
                                        <div class="edit_data_table_col2"><textarea class="required" name="meta_desc_eng" id="meta_desc_eng" style="padding: 5px;" rows="5" cols="64"></textarea></div>


                                    </div>               


                                    <div class="edit_data_table_row">

                                        <div class="edit_data_table_col1"> Meta Keywords</div>
                                        <div class="edit_data_table_col2"><textarea class="required" name="meta_keywords_eng" id="meta_keywords_eng" style="padding: 5px;" rows="5" cols="64"></textarea></div>
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
        $().ready(function () {
            $('#saveAbout').click(function () {
		      $("#updateAbout").attr("action", "<?php echo base_url();?>ems/content/savePage/");
	          $("#updateAbout").attr("target", "");
                $('#updateAbout').submit();
            });
            $("#updateAbout").validate();

        });
    </script>