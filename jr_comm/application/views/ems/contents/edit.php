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


        <div class="inner_mid_heading"><?php if($result->parant_id == 0 ) { ?><?php echo $result->eng_title; ?> - Edit<?php }else{ echo 'Version';} ?></div>





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
              <?php /*if($result->tpl != 'aboutus' && $result->tpl != 'about_leasing' && $result->tpl != 'mission_vision' && $result->tpl != 'about_financial_statement' && $result->tpl != 'sama' && $result->tpl != 'service' && $result->tpl != 'career'){ */?><!--
			   <div class="previewChangesBtn"> 
    <img src="assets/images/previewChanges.png" width="108" height="23" border="0" alt=""  id="preview" style="cursor:pointer;"/> 
            </div>
			  --><?php /*} */?>
           

            <div class="modifiedDate">Last modified <?php echo date("F j, Y, g:i a",strtotime($result->content_updated_at)); ?> </div>


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
                <?php if($result->type == 'version'){?>
                <li style="z-index:99; ;"><a id="saveAbout">Restore this Revision</a></li>
                <?php } ?>
                <?php if($result->tpl == 'home' || $result->tpl == 'products' || $result->tpl == 'accessories' || $result->tpl == 'solutions'){ ?>
                <li style="z-index:99; "><a href="<?php base_url();?>ems/list_content/index/<?php echo $result->id; ?>">
				<?php 
					if($result->tpl == 'home')
						echo 'Slider Listing';
					if($result->tpl == 'products')
						echo 'Products Listing';
                if($result->tpl == 'accessories')
                    echo 'Accessories Listing';
                if($result->tpl == 'solutions')
                    echo 'Solutions Listing';
				?></a></li>
                <?php } ?>
                
                
                <li style="z-index:99;"><a href="<?php echo base_url();?>ems/content/manage" id="allPages">All Pages</a></li>
                <?php if($result->type == 'page' ) { ?>
                <li style="z-index:99;"><a href="<?php echo base_url();?>ems/content/versions/<?php echo $result->id; ?>" id="versions">Versions</a></li>
				<li style="z-index:99;"><a id="saveAbout">Save</a></li>
				
				<?php } ?>
                
                
                <?php if($this->session->flashdata('historygobackmain')){ ?>
					<li style="z-index:100;"><a href="javascript:document.location.href='<?php $this->config->item('base_url') ?>ems/content';">Back</a></li>
				<?php }else{ ?>
					<li style="z-index:100;  "><a href="<?php echo base_url(); ?>ems/content">Back</a></li>
				<?php } ?>
				
            </ul>

        </div><!--inner_menu_bar-->
		<div id="returned_page_image" style="display:none;"></div>
        <div style="padding-top:90px;" class="admin_manage_panel">
				<?php if($result->parant_id == 0 ) { ?>
                <p style="margin:0px 0px 5px 15px"><b>Total Versions : </b> <?php echo $total_versions; ?><p><?php } ?>
            <input type="hidden" value="<?php echo $result->eng_title; ?>" id="page_title_before_change" name="page_title_before_change">  
			<?php echo form_open_multipart('ems/content/update/id/' . $result->id, array('method' => 'post', 'id' => 'updateAbout','onsubmit' => 'return checkUniquePageTitle(1)')); ?>
            <input type="hidden" value="<?php echo $result->pub_status; ?>" id="pub_status" name="pub_status">
            <input type="hidden" value="<?php echo $result->id; ?>" id="gid" name="gid"> 
            <input type="hidden" value="<?php echo $page_id; ?>" id="page_id" name="page_id">  
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
                            <td width="98%">Content</td>
                        </tr>
                        <tr class="gray_row">
                            <td>&nbsp;</td>
                            <td>



                                <!--edit_data_table-->
                                <div class="edit_data_table">

                                     <div class="edit_data_table_row">
                                            <div class="edit_data_table_col1"> Page Title(For Url)</div>
                                            <div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $result->eng_title; ?>" name="eng_title" id="eng_title"></div>
                                     </div>
                                     
                                     <div class="edit_data_table_row" style="display: none;">
										<div class="edit_data_table_col1"> Page Sub Title</div>
										<div class="edit_data_table_col2"><input type="text" class="input_field required"  value="<?php echo $result->eng_sub_title; ?>" name="eng_sub_title" id="eng_sub_title"></div></div>

									<div class="edit_data_table_row">
                                            <div class="edit_data_table_col1"> Template</div>
                                            <div class="edit_data_table_col2">
                                            <select class="form-control" name="tpl" id="tpl" style="height:25px; width:95.5%;" onchange="show_div(this.value);">
                                                <option value="<?php echo $result->tpl;?>"><?php echo ucwords(str_replace('-',' ', $result->tpl));?></option>
                                          </select>   
                                            </div>
                                     </div>

                                    <div class="about_page hide" style="display: none;">
                                        <?php
                                        create_textfield_not_required('Title / Heading', 'about_title', 'eng', true, $result->id);
                                        create_textarea('Description', 'about_desc', 'eng', true, $result->id);
                                        create_image('Side Image', 'about_image', '445&times;229', 'eng', true, $result->id);
                                        ?>
                                    </div>

                                    <div class="partner_page hide" style="display: none;">
                                        <?php
                                        create_textfield_not_required('Title / Heading', 'partner_title', 'eng', true, $result->id);
                                        create_textarea('Description', 'partner_desc', 'eng', true, $result->id);
                                        create_image('Side Image', 'partner_image', '445&times;229', 'eng', true, $result->id);
                                        ?>
                                    </div>

                                    <div class="product_page hide" style="display: none;">
                                        <?php
                                        create_textfield_not_required('Title / Heading', 'product_title', 'eng', true, $result->id);
                                        ?>
                                    </div>

                                    <div class="acc_page hide" style="display: none;">
                                        <?php
                                        create_textfield_not_required('Title / Heading', 'acc_title', 'eng', true, $result->id);
                                        ?>
                                    </div>

                                    <div class="solution_page hide" style="display: none;">
                                        <?php
                                        create_textfield_not_required('Title / Heading', 'solution_title', 'eng', true, $result->id);
                                        create_textarea('Description', 'solution_desc', 'eng', true, $result->id);
                                        ?>
                                    </div>

                                    <div class="where_page hide" style="display: none;">
                                        <?php
                                        create_textfield_not_required('Title / Heading', 'where_title', 'eng', true, $result->id);
                                        create_textarea('Description', 'where_desc', 'eng', true, $result->id);
                                        create_image('Side Image', 'where_image', '645&times;390', 'eng', true, $result->id);
                                        ?>
                                    </div>

                                    <div class="contact_page hide" style="display: none;">
                                        <?php
                                        create_textarea('Contact Detail', 'contact_desc', 'eng', true, $result->id);
                                        create_image('Footer Image', 'card_image', '445&times;52', 'eng', true, $result->id);
                                        ?>
                                    </div>
                                  	
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
                    </tbody>
				</table>
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
    
                                       