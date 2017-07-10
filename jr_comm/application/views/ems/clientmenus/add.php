<script type="text/javascript" charset="utf-8">

    BASEPATH = '<?php echo base_url(); ?>';
    function savemenus(id) {
        var en_title = $('#title_en_' + id).val();
        var ar_title = $('#title_ar_' + id).val();
        var ch_title = $('#title_ch_' + id).val();
//                alert(ch_title);
        url = '<?php echo base_url(); ?>ems/clientmenus/save';
        $.post(url, {id: id, Title_en: en_title, Title_ar: ar_title, Title_ch: ch_title}, function (data) {
            if (data == 1)
            {
                $('#result_msg').html("Label " + en_title + " updated successfully.");
            }
            else if (data == 3)
            {
                //// dont have permission ///////////
                alert_user();
            }
            else
            {
                $('#result_msg').html("Label " + en_title + " menu updation failed.");
            }
            //$("#example").dataTable().fnDraw(true);
        });
    }
    $(document).ready(function () {
        $('input[id ^="menu_pub_status_"]').click(function () {
            var id = this.id.replace('menu_pub_status_', '');
            if ($('#menu_pub_status_' + id).is(":checked"))
            {
                publishStatus = 1;
            }
            else
            {
                publishStatus = 0;
            }
            url = '<?php echo base_url(); ?>ems/clientmenus/publish';
            $.post(url, {id: id, pub_status: publishStatus}, function (data) {
                //$("#example").dataTable().fnDraw(true);
            });

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


        <div class="inner_mid_heading">Website Menus</div>





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





    </div><!--side_right-->



    <!--middle_content_areainner-->
    <div class="middle_content_areainner" style="padding-top:0px;">



        <!--inner_menu_bar-->
        <div class="inner_menu_bar" style="width:22%;">

            <ul>
                <!-- <li style="z-index:99; width:53%;"><a id="saveSocial">Save</a></li>
                   <li style="z-index:100; left:45%; width:53%;"><a href="ems/socialLinks/manage">Cancel</a></li>-->

            </ul>

        </div><!--inner_menu_bar-->

        <div style="padding-top:90px;" class="admin_manage_panel">

            <div class="table_content_row">

                <table width="100%" border="0" class="edit_table">
                    <tbody>
                        <tr><td align="center" width="40%" colspan="2"><font color="#009900" id="result_msg"></font></td></tr>
                        <tr class="blue_row">
                            <td width="2%">&nbsp;</td>
                            <td width="98%">Website Navigation</td>
                        </tr>
                        <tr class="gray_row">
                            <td>&nbsp;</td>
                            <td>

                                <!--edit_data_table-->
                                <div class="edit_data_table">


                                    <table width="100%"   border="0" class="display table_style_gray2" style=" border-color: #777777 -moz-use-text-color; border-style: solid; width: 99%; border-width: 1px;">
                                        <thead>

                                            <tr class="top_row">
                                                <!--<td width="0%" style="display:none"></td>-->
                                                <td width="20%" style="padding-top:0">Menu Type</td>
                                                <td width="20%" class="text_table_space">Title(en)</td>
                                                <td width="20%" class="text_table_space">Title(ar)</td>
                                                <!--<td width="20%" class="text_table_space">Title(ch)</td>-->
                                                <td width="10%" class="text_table_space">Publish</td>
                                                <td width="20%" class="text_table_space">Action</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $menuArray = array(2, 3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23);
                                            $menuCount=0;        
                                            foreach ($res as $result => $val) {
                                                if (in_array($val['MenuID'], $menuArray)) {
                                                    $menuCount++;
                                                    $menutype = $menuCount.". Main Menu";
                                                    if ($val['IsParent'] == 0) {
                                                        $menutype = "--> Sub Menu";
                                                    }
                                                    ?>
                                                    <tr class="odd">               
                                                        <td class="table_row" align="center" style="border-right:3px solid #eeeeee;"><?php echo $menutype; ?></td>
                                                        <td  class="table_row" ><input type="text" name="title_en_<?php echo $val['MenuID']; ?>" id="title_en_<?php echo $val['MenuID']; ?>" value="<?php echo $val['Title_en']; ?>" /></td>
                                                        <td  class="table_row"><input type="text" name="title_ar_<?php echo $val['MenuID']; ?>" id="title_ar_<?php echo $val['MenuID']; ?>" value="<?php echo $val['Title_ar']; ?>" /></td>

                                                        <td class="table_row"  style="border-right:3px solid #eeeeee;">
                                                            <div style="float:left; opacity:0;filter:alpha(opacity=0)"><?php echo $val['menu_pub_status']; ?></div><div class="squaredOne"><input type="checkbox" name="menu_pub_status" id="menu_pub_status_<?php echo $val['MenuID']; ?>" <?php
                                                                if ($val['menu_pub_status'] == 1) {
                                                                    echo "checked=checked";
                                                                }
                                                                ?>><label for="menu_pub_status_<?php echo $val['MenuID']; ?>"></label></div></td>
                                                        <td  class="table_row"><input type="button" name="Save" value="Save" id="Save" onclick="savemenus(<?php echo $val['MenuID']; ?>)" /></td>

                                                    </tr>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>


                                </div><!--edit_data_table-->






                            </td>
                        </tr>
                    </tbody></table>



            </div>                 





            <div class="table_content_row" style="margin-top: 20px;">

                <table width="100%" border="0" class="edit_table">

                    <tbody>
                        <tr><td align="center" width="40%" colspan="2"><font color="#009900"></font></td></tr>
                        <tr class="blue_row">
                            <td width="2%">&nbsp;</td>
                            <td width="98%">Website Footer</td>
                        </tr>
                        <tr class="gray_row">
                            <td>&nbsp;</td>
                            <td>



                                <!--edit_data_table-->
                                <div class="edit_data_table">


                                    <table width="100%"   border="0" class="display table_style_gray2" style=" border: 1px solid;width:99%" >
                                        <thead>

                                            <tr class="top_row">
                                                <!--<td width="0%" style="display:none"></td>-->
                                                <td width="20%" style="padding-top:0">Type</td>
                                                <td width="20%" class="text_table_space">Title(en)</td>
                                                <td width="20%" class="text_table_space">Title(ar)</td>
                                                <!--<td width="20%" class="text_table_space">Title(ch)</td>-->
                                                <td width="10%" class="text_table_space">Publish</td>
                                                <td width="20%" class="text_table_space">Action</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $menuArray = array(29,30,31);
                                            $menutype = '';
											$menuCount =0;
                                            foreach ($res as $result => $val) {
                                                if (in_array($val['MenuID'], $menuArray)) {
                                                    $menuCount++;
                                                    $menutype = $menuCount.". Footer Menu";
													if ($val['IsParent'] == 0) {
                                                        $menutype = "--> Sub Menu";
                                                    }
                                                    ?>
                                                    <tr class="odd">               
                                                        <td class="table_row" align="center" style="border-right:3px solid #eeeeee;"><?php echo $menutype; ?></td>
                                                        <td  class="table_row" ><input type="text" name="title_en_<?php echo $val['MenuID']; ?>" id="title_en_<?php echo $val['MenuID']; ?>" value="<?php echo $val['Title_en']; ?>" /></td>
                                                        <td  class="table_row"><input type="text" name="title_ar_<?php echo $val['MenuID']; ?>" id="title_ar_<?php echo $val['MenuID']; ?>" value="<?php echo $val['Title_ar']; ?>" /></td>
                                                        <!--<td  class="table_row"><input type="text" name="title_ch_<?php // echo $val['MenuID'];      ?>" id="title_ch_<?php // echo $val['MenuID'];      ?>" value="<?php // echo $val['Title_ch'];      ?>" /></td>-->

                                                        <td class="table_row"  style="border-right:3px solid #eeeeee;">
                                                            <div style="float:left; opacity:0;filter:alpha(opacity=0)"><?php echo $val['menu_pub_status']; ?></div><div class="squaredOne"><input type="checkbox" name="menu_pub_status" id="menu_pub_status_<?php echo $val['MenuID']; ?>" <?php
                                                                if ($val['menu_pub_status'] == 1) {
                                                                    echo "checked=checked";
                                                                }
                                                                ?>><label for="menu_pub_status_<?php echo $val['MenuID']; ?>"></label></div></td>
                                                        <td  class="table_row"><input type="button" name="Save" value="Save" id="Save" onclick="savemenus(<?php echo $val['MenuID']; ?>)" /></td>

                                                    </tr>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>


                                </div><!--edit_data_table-->






                            </td>
                        </tr>
                    </tbody></table>



            </div>                      



            
            
            
            
            

        </div>



    </div><!--middle_content_areainner-->      

