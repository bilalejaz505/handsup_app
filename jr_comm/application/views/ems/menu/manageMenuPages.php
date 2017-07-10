<style type="text/css">
		html {
			background-color: #eee;
		}
		
		/*body {
			-webkit-border-radius: 10px;
			-moz-border-radius: 10px;
			border-radius: 10px;
			color: #444;
			background-color: #fff;
			font-size: 13px;
			font-family: Freesans, sans-serif;
			padding: 2em 4em;
			width: 860px;
			margin: 15px auto;
			box-shadow: 1px 1px 8px #444;
			-mox-box-shadow: 1px 1px 8px #444;
			*/-webkit-box-shadow: 1px -1px 8px #444;
		}
		
		a,a:visited {
			color: #4183C4;
			text-decoration: none;
		}
		
		a:hover {
			text-decoration: underline;
		}
		
		pre,code {
			font-size: 12px;
		}
		
		pre {
			width: 100%;
			overflow: auto;
		}
		
		small {
			font-size: 90%;
		}
		
		small code {
			font-size: 11px;
		}
		
		.placeholder {
			outline: 1px dashed #4183C4;
		}
		
		.mjs-nestedSortable-error {
			background: #fbe3e4;
			border-color: transparent;
		}
		
		#tree {
			width: 550px;
			margin: 0;
		}
		
		ol {
			max-width: 450px;
			padding-left: 25px;
		}
		
		ol.sortable,ol.sortable ol {
			list-style-type: none;
		}
		
		.sortable li div {
			border: 1px solid #d4d4d4;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			cursor: move;
			border-color: #D4D4D4 #D4D4D4 #BCBCBC;
			margin: 0;
			padding: 3px;
		}
		
		li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
			border-color: #999;
		}
		
		.disclose, .expandEditor {
			cursor: pointer;
			width: 20px;
			display: none;
		}
		
		.sortable li.mjs-nestedSortable-collapsed > ol {
			display: none;
		}
		
		.sortable li.mjs-nestedSortable-branch > div > .disclose {
			display: inline-block;
		}
		
		.sortable span.ui-icon {
			display: inline-block;
			margin: 0;
			padding: 0;
		}
		
		.menuDiv {
			background: #EBEBEB;
		}
		
		.menuEdit {
			background: #FFF;
		}
		
		.itemTitle {
			vertical-align: middle;
			cursor: pointer;
		}
		
		.deleteMenu {
			float: right;
			cursor: pointer;
		}
		
		h1 {
			font-size: 2em;
			margin-bottom: 0;
		}
		
		h2 {
			font-size: 1.2em;
			font-weight: 400;
			font-style: italic;
			margin-top: .2em;
			margin-bottom: 1.5em;
		}
		
		h3 {
			font-size: 1em;
			margin: 1em 0 .3em;
		}
		
		p,ol,ul,pre,form {
			margin-top: 0;
			margin-bottom: 1em;
		}
		
		dl {
			margin: 0;
		}
		
		dd {
			margin: 0;
			padding: 0 0 0 1.5em;
		}
		
		code {
			background: #e5e5e5;
		}
		
		input {
			vertical-align: text-bottom;
		}
		
		.notice {
			color: #c33;
		}
.clearED {clear:both;}
section.manageMenuEd {padding:90px 20px 0 30px;}		
.manageMenuEd h2 {
    background: #909090 none repeat scroll 0 0;
    border-bottom: 1px solid #000000;
    color: #ffffff;
    font-size: 14px;
    font-style: normal;
    font-weight: normal;
    line-height: 2.5;
    margin: 0;
    padding: 10px 27px 4px;
}
.manageMenuEd ol {
    background-color: #939393;
	border-bottom: 1px solid #000000;
    float: left;
    max-width: inherit;
    padding: 0%;
    width: 100%;
}
.manageMenuEd ol li {
    background: rgba(0, 0, 0, 0) url("http://blogswizards.com/edesign_wp/assets/images/black_bar.png") no-repeat scroll 0 0;
    border-right: 1px solid #000000;
    padding-left: 8px;
}
.manageMenuEd ol li div {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
	border-radius: 0;
    font-size: 14px;
    line-height: 1.5;
    padding: 0;
}
.manageMenuEd ol li div.menuEdit {background-color: #cccccc; border-left:1px solid #fff; padding: 13px 15px;}
.manageMenuEd ol li:nth-child(2n+2) div.menuEdit {background-color:#eeeeee ;}
.manageMenuEd ol li p {margin:0;}
    </style>
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
                        $('#id_' + id).hide('slow');
                        url = '<?php echo base_url(); ?>ems/menu/delete';
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
                    window.location = '<?php echo base_url(); ?>ems/menu/edit/id/' + id;
                } else {
                    alert("Select any one row from table");
                }
            } else {
                alert("Select any one row from table");
            }
        });
		
		  $('#addPages').click(function () {
            var anSelected = fnGetSelected(oTable);
            var temp_id = $(anSelected).attr('id');
            if ($("td.blue_bar").length != 0) {
                var temp = $("td.blue_bar").attr('id').split('_');
                var id = parseInt(temp[1]);
                if ($("td.blue_bar").length == 1) {
                    window.location = '<?php echo base_url(); ?>ems/menu/addMenuPages/id/' + id;
                } else {
                    alert("Select any one row from table");
                }
            } else {
                alert("Select any one row from table");
            }
        });
		
      /*  function fnGetSelected(oTableLocal)
        {
            return oTableLocal.$('tr.row_selected');
        }

        var nav = oTable.fnSettings().fnRecordsDisplay();
        if (nav == 0) {

            $('#example_paginate').hide();
        } else {

            $('#example_paginate').show();
        }*/

    });

</script>


<div class="content_row">

    <div class="light_shadow_bar"></div>

    <div class="black_bar_main">

        <div class="inner_left_wrap">
            <div class="inner_left_heading"><?php echo getsiteTitle(1); ?></div>

            <div class="inner_left_headingsmalll">Website</div>
        </div>
        <div class="inner_mid_heading">Manage Menus </div>

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
              <!-- <li><a id="addPages" href="javascript:void(0);">Add Menu Pages</a></li>
               <li><a href="<?php // echo base_url();?>ems/menu/addMenu">Add</a></li>
               <li ><a id="edit">Edit</a></li>
               <li><a id="delete">Delete</a></li>-->
               <li style="z-index:300; left:75%"><a  id="back" onclick="javascript:history.back();">Back</a></li>

            </ul>

        </div><!--inner_menu_bar-->
<section id="demo" class="manageMenuEd">
<h2>Pages Tilte</h2>
		<ol class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">
		   <?php
                        $i = 0;
                        foreach ($menu_pages as $result => $val) {
							$page_title = pageTitle($val->page_id,'eng');
                            ?>
           <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_<?php echo $val->page_id;?>" data-foo="bar">
		   <div class="menuDiv">
			  <!-- <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
			   <span></span>
			   </span>
			   <span title="Click to show/hide item editor" data-id="<?php echo $val->page_id;?>" class="expandEditor ui-icon ui-icon-triangle-1-n">
			   <span></span>
			   </span>
			   <span>
			   <span data-id="2" class="itemTitle">a</span>
			   <span title="Click to delete item." data-id="<?php echo $val->page_id;?>" class="deleteMenu ui-icon ui-icon-closethick">
			   <span></span>
			   </span>
			   </span>-->
			   <div id="menuEdit<?php echo $val->page_id;?>" class="menuEdit hidden">
				   <p>
					   <?php echo $page_title.' '.$val->page_id;?>
				   </p>
			   </div>
		   </div>
           <?php $child_pages = fetchMenuParrentPages($menu_id,$val->page_id);
		   
		   if(!empty($child_pages)){ ?>
		   
           <ol>
           <?php foreach($child_pages as $child_page){
			   $child_page_title = pageTitle($child_page->page_id);
			   ?>
			   <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_<?php echo $child_page->page_id;?>" data-foo="baz">
			   <div class="menuDiv">
				  <!-- <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
				   <span></span>
				   </span>
				   <span title="Click to show/hide item editor" data-id="<?php echo $child_page->page_id;?>" class="expandEditor ui-icon ui-icon-triangle-1-n">
				   <span></span>
				   </span>-->
				   <!--<span>
				   <span data-id="4" class="itemTitle">c</span>
				   <span title="Click to delete item." data-id="<?php echo $child_page->page_id;?>" class="deleteMenu ui-icon ui-icon-closethick">
				   <span></span>
				   </span>
				   </span>-->
				   <div id="menuEdit4" class="menuEdit hidden">
					   <p>
						   <?php echo $child_page_title; ?>
					   </p>
				   </div>
			   </div>
			   </li>
				   
			  
			  
			 
               <?php } ?>
		   </ol>
		  <?php } ?> 
		   </li>
		   <ol>
		   </ol>
		   
		   
	  
       <?php } ?>
        </ol>


    </section>
         
    </div><!--middle_content_areainner-->


