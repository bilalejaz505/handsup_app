<div class="content_row">

    <div class="light_shadow_bar"></div>

    <div class="black_bar_main">

        <div class="inner_left_wrap">
            <div class="inner_left_heading"><?php
                $id = $this->session->userdata('site_id');
                echo getsiteTitle($id);
                ?>
			</div>

            <div class="inner_left_headingsmalll">Website</div>
        </div>

        <div class="inner_mid_heading"><?php echo $result->eng_title; ?> - Edit</div>

        
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
            <?php /*if($template != 'home' && $template != 'offers' && $template != 'branches' && $template != 'downloadcenter' && $template != 'partners' && $template != 'albums-listing' && $template != 'photogallery' && $template != 'finance_require_document'){ */?><!--
            <div class="previewChangesBtn"> 
    <img src="assets/images/previewChanges.png" width="108" height="23" border="0" alt=""  id="preview" style="cursor:pointer;"/> 
            </div>
			--><?php /*} */?>
            <div class="modifiedDate">Last modified <?php echo date("F j, Y, g:i a",strtotime($result->content_updated_at)); ?> </div>


        </div>

        <!-- status bar - start-->   
        <?php //$pub = $result->pub_status; ?>
        <?php //echo get_status_bar($pub); ?>               
        <!-- status bar - end-->



    </div><!--side_right-->



    <!--middle_content_areainner-->
    <div class="middle_content_areainner" style="padding-top:0px;">



        <!--inner_menu_bar-->
        <div class="inner_menu_bar" style="width:100%;">

            <ul>
				<?php if($result->type == 'version'){?>
                <li style="z-index:99; ;"><a id="saveAbout">Restore this Revision</a></li>
                <?php } ?>
				<?php if($result->tpl == 'industory-companies' || $result->tpl == 'projects-listing' || $result->tpl == 'albums-listing' || $result->tpl == 'companies-listing' ){ ?>
                <li style="z-index:99; "><a href="<?php base_url();?>ems/list_content/index/<?php echo $result->id; ?>">
				<?php 
					if($result->tpl == 'industory-companies') 
						echo 'Companies logos';
					if($result->tpl == 'projects-listing') 
						echo 'Projects';
					if($result->tpl == 'albums-listing') 
						echo 'Photos';
					if($result->tpl == 'companies-listing') 
     					 echo 'Companies';
					
				?></a></li>
                <?php } ?>
				<?php if($result->type == 'page'){?>
                <li style="z-index:99;"><a id="saveAbout">Save</a></li>
				<li style="z-index:99;"><a href="<?php echo base_url();?>ems/content/versionsListing/<?php echo $result->id; ?>" id="versions">Versions</a></li>
                <?php } ?>
                
                <li style="z-index:100;"><a href="javascript:void(0);" class="back_btn">Back</a></li>
				
            </ul>

        </div><!--inner_menu_bar-->

        <div style="padding-top:90px;" class="admin_manage_panel">
			<div id="returned_page_image" style="display:none;"></div>	
			<div id="returned_news_image" style="display:none;"></div>
               <input type="hidden" value="<?php echo $result->eng_title; ?>" id="page_title_before_change" name="page_title_before_change">   
                <?php if($result->type== 'page') { ?>
                <p style="margin:0px 0px 5px 15px"><b>Total Versions : </b> <?php echo $total_versions; ?><p><?php } ?>
            <?php echo form_open_multipart('ems/content/update/id/' . $result->id, array('method' => 'post', 'id' => 'updateAbout','onsubmit' => 'return checkUniquePageTitle(1)')); ?>
            <input type="hidden" value="<?php echo $result->pub_status; ?>" id="pub_status" name="pub_status">
            <input type="hidden" value="<?php echo $result->id; ?>" id="gid" name="gid"> 
            <input type="hidden" value="<?php echo $page_id; ?>" id="page_id" name="page_id"> 
			<input type="hidden" value="<?php echo $result->parant_id; ?>" id="tpl_id" name="tpl_id"> 
            <input type="hidden" value="<?php echo $template;?>" id="tpl_name" name="tpl_name">
            <div class="table_content_row">

                <table width="100%" border="0" class="edit_table">
                    <tbody>
                        <tr><td align="center" width="40%" colspan="2"  id="show_error"><font color="#009900"><?php
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
										<div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $result->eng_title; ?>" name="eng_title" id="eng_title"></div>
									</div>
									<div class="edit_data_table_row" style="display: none;">
										<div class="edit_data_table_col1">Sub Title</div>
										<div class="edit_data_table_col2"><input type="text" class="input_field"  value="<?php echo $result->eng_sub_title; ?>" name="eng_sub_title" id="eng_sub_title"></div></div>
									<?php

                                    if($template == 'home'){
                                        create_image('Banner Image', 'home_image', '1920&times;922', 'eng', true, $result->id);
                                        create_textarea('Banner Description', 'home_desc', 'eng', true, $result->id);
                                    }

                                    if($template == 'products'){
                                        create_image('Image', 'product_image', '150&times;150', 'eng', true, $result->id);
                                        create_textarea('Description', 'product_desc', 'eng', true, $result->id);
                                    }

                                    if($template == 'accessories'){
                                        create_image('Image', 'acc_image', '100&times;100', 'eng', true, $result->id);
                                        create_textarea('Description', 'acc_desc', 'eng', true, $result->id);
                                    }

                                    if($template == 'solutions'){
                                        create_image('Icon Image', 'icon', '32&times;29', 'eng', true, $result->id);
                                        create_textarea('Description', 'sol_child_desc', 'eng', true, $result->id);
                                        create_datepicker('Date', 'pro_date', 'eng', true, $result->id);
                                    }
                                    ?>
									
                                    <div class="edit_data_table_row">
                                        <div class="edit_data_table_col1"> Meta Title</div>
                                        <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $result->meta_title_eng; ?>" name="meta_title_eng" id="meta_title_eng"></div>
                                    </div>
									
                                    <div class="edit_data_table_row">
                                        <div class="edit_data_table_col1"> Meta Description</div>
                                        <div class="edit_data_table_col2"><textarea class="required" name="meta_desc_eng" id="meta_desc_eng" style="padding: 5px;" rows="5" cols="64"><?php echo $result->meta_desc_eng; ?></textarea></div>
                                    </div>
									
                                    <div class="edit_data_table_row">
                                        <div class="edit_data_table_col1"> Meta Keywords</div>
                                        <div class="edit_data_table_col2"><textarea class="required" name="meta_keywords_eng" id="meta_keywords_eng" style="padding: 5px;" rows="5" cols="64"><?php echo $result->meta_keywords_eng; ?></textarea></div>
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
			 $("#updateAbout").attr("action", "<?php echo base_url();?>ems/content/update/id/<?php echo $result->id; ?>");
	          $("#updateAbout").attr("target", "");
                $('#updateAbout').submit();
            });
            $("#updateAbout").validate();

        });
		



    </script>                          