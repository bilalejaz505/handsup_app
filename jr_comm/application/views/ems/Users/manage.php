<script type="text/javascript" charset="utf-8">

    $(document).ready(function () {
        var vb = 1;
        $('#search').change(function () {
            val = $('#search').val();
            $('#SearchContainer').append("<div class='searchWrapper' id='search_" + vb + "'><div class='SelectedFilter'>" + val + "</div><div class='crossBtn' onclick='RemoveFilter(search_" + vb + ");'> </div></div>");
            vb++;
        });
        oTable = $('#example').dataTable({
            "sDom": 'T<"clear">lfrtip',
            "oTableTools": {
                "sRowSelect": "multi",
                "aButtons": ["select_all", "select_none"]
            },
            "bJQueryUI": true,
            "bSort": true,
            "bFilter": true,
            "bInfo": true,
            "aLengthMenu": [
                [10, 20, 30, 50, 100, 500, 5000],
                [10, 20, 30, 50, 100, 500, 5000]
            ],
            "fnInitComplete": function () {
                CreateJQGridCustomPaging();
            },
            "sPaginationType": "full_numbers",
            "oLanguage": {"sSearch": "Search all columns:"},
        }).rowReordering();

        $('#search').keyup(function () {
            oTable.fnFilter($(this).val());
        });

        $("tfoot input").focus(function () {
            oTable.fnFilter(this.value, $("tfoot input").index(this));
        });

        $('#published').change(function (event) {
            $('#search_pub').val($('#published').val());
            $('#search_pub').focus();
        });

        $("#example tbody tr").click(function (e) {
            $(this).toggleClass('row_selected');
            var temp_id = $(this).attr('id');
            var temp = temp_id.split('_');
            id = parseInt(temp[1]);
            if ($(this).hasClass('row_selected')) {
                $('#bar_' + id).removeClass('black_bar');
                $('#bar_' + id).addClass('blue_bar');
            }
            else {
                $('#bar_' + id).removeClass('blue_bar');
                $('#bar_' + id).addClass('black_bar');
            }

        });

        $('#delete').click(function () {
            if ($("td.blue_bar").length != 0) {
                if (confirm('Are you sure to delete this?')) {
                    $("td.blue_bar").each(function () {
                        var temp = $(this).attr('id').split('_');
                        var id = parseInt(temp[1]);
						console.log(id);
                        $('#id_' + id).hide('slow');
                        url = '<?php echo base_url(); ?>ems/Users/delete';
                        $.post(url, {id: id}, function (data) {
                            $("#example").dataTable().fnDraw(true);
                        });
                    });
                }
            }
            else {
                alert("Select any one row from table");

            }

        });

        $('#edit').click(function () {
            var anSelected = fnGetSelected(oTable);
            var temp_id = $(anSelected).attr('id');
            if ($("td.blue_bar").length != 0) {
                var temp = $("td.blue_bar").attr('id').split('_');
                var id = parseInt(temp[1]);
                if ($("td.blue_bar").length == 1) {
                    window.location = '<?php echo base_url(); ?>ems/Users/edit/id/' + id;
                } else {
                    alert("Select any one row from table");
                }
            } else {
                alert("Select any one row from table");
            }
        });
        function fnGetSelected(oTableLocal)
        {
            return oTableLocal.$('tr.row_selected');
        }

        var nav = oTable.fnSettings().fnRecordsDisplay();
        if (nav == 0) {

            $('#example_paginate').hide();
        } else {

            $('#example_paginate').show();
        }

    });

</script>

<div class="content_row">

    <div class="light_shadow_bar"></div>

    <div class="black_bar_main">

        <div class="inner_left_wrap">
            <div class="inner_left_heading"><?php echo getsiteTitle(1); ?></div>

            <div class="inner_left_headingsmalll">Website</div>
        </div>
        <div class="inner_mid_heading">Manage Users</div>

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

        <!--search_bar_panel-->
        <div class="search_bar_panel">

            <div class="search_heading">Search</div>

            <div class="search_detail">Type your search keyword<br />

                to filter the grid</div>


            <div class="search_field_row"  style="height:auto !important">

                <div class="search_inputfiled">
                    <input name="search" id="search" type="text" class="search_field"  placeholder="Keyword"/></div> 

                <div class="search_button"><img src="assets/images/search_button.png" width="36" height="32" /></div>

            </div>
            <div id="SearchContainer" class="Searchcontainer"  style="background: none repeat scroll 0 0 transparent !important;
                 float: left !important;
                 height: auto !important;
                 width: 100% !important;">

            </div>

        </div><!--search_bar_panel-->

        <div class="filter_bar_panel">




            <div class="filter_heading">Filters</div>




            <div class="dropdownRow">



                <div class="dropdownfiled">

                    <select name="published" id="published" class="dropDownList"   > 
                        <option value=""> Select</option>
                        <option value="1"> Published </option>
                        <option value="0"> Un Published </option>  
                    </select>

                </div> 

<!--<div class="search_button"><img src="images/search_button.png" width="36" height="32" /></div>-->

            </div>





        </div>

    </div><!--side_right-->



    <!--middle_content_areainner-->
    <div class="middle_content_areainner" style="padding-top:0px;">



        <!--inner_menu_bar-->
        <div class="inner_menu_bar">

            <ul>
			<!--<li ><a href="ems/Users/Add">Add</a></li> -->
               <!-- <li ><a id="edit">Edit</a></li> -->
               <li ><a id="edit">view</a></li>
                <li><a id="delete">Delete</a></li>
                <li style="z-index:300; left:75%"><a  id="back" onclick="javascript:history.back();">Back</a></li>

            </ul>

        </div><!--inner_menu_bar-->

        <div class="admin_manage_panel" style="padding-top:90px;">


            <div align="center">
                <?php
                if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                } echo '<span id="msg">' . $message . '</span>'
                ?> </div>
            <div class="table_content_row">
                <table width="100%"   border="0" class="display table_style_gray2" id="example">
                    <thead>
                        <tr class="top_row">
                             <!-- <td width="0%" style="display:none"></td>-->
                            <td width="1%" style="padding-top:0"><p id="enable"><a onclick="javascript:enable(<?php echo $sliderList[0]->id; ?>);">
                                        <span><img src="assets/images/black_bar.png"></span>
                                    </a></p><p id="disable" style="display:none"><a onclick="javascript:disable();">
                                        <span><img src="assets/images/black_bar.png"></span>
                                    </a></p></td>

                            <td width="30%" class="text_table_space">Name</td>
                            <td width="30%" class="text_table_space">Email</td>
                            <td width="20%" class="text_table_space">Mobile</td>
                            <td width="20%" class="text_table_space">Submission Date</td>
                        </tr>
                    </thead>
                    <tfoot>
                  <!--  <th><input type="hidden"></th>-->
                    <th style="display:none"><input type="hidden"></th>
                    <th><input type="hidden"></th>
                    <th><input type="hidden"></th>
                    <th><input  type="text" value="" name="search_pub" id="search_pub" class="search_init" style="margin-top:-19.5px;opacity:0;
                                filter:alpha(opacity=0);"></th>
                    </tfoot>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($users as $result => $val) {
                            ?>
                            <tr class="odd" id="id_<?php echo $val->id; ?>" onclick="javascript:highlight(<?php echo $val->id; ?>);">
                            <!--  <td style="display:none"><?php echo $i; ?></td>-->
                                <td  class="black_bar" id="bar_<?php echo $val->id; ?>"><?php echo $i; ?></td>
                                <td class="table_row"><?php echo $val->name;?></td>
                                <td class="table_row" style="border-right:#000 0px solid">
                                    <?php echo $val->email;?>
                                </td> 
                                <td class="table_row" style="border-right:#000 0px solid">
                                    <?php echo $val->mobile;?>
                                </td> 
                                <td class="table_row" style="border-right:#000 0px solid">
                                    <?php echo $val->created_at;?>
                                </td>                    
                            </tr>

                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>


            <!--pagination_row--> 
            <div class="pagination_row">

                <div class="pagination_left">

                    <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                        <tr>
                            <td>&nbsp;</td>
                            <td class="pagination_text">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <div class="pagination_right">
                    <table width="100%" border="0">
                    </table>
                </div>
            </div><!--pagination_row-->
        </div> 
    </div><!--middle_content_areainner-->


