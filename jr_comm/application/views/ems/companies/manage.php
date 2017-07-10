<script type="text/javascript" charset="utf-8">
	
    $(document).ready(function() {
        var vb = 1;
        $('#search').change(function() {
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
            "fnInitComplete": function() {
                CreateJQGridCustomPaging();
            },
                "sPaginationType": "full_numbers",
                "oLanguage": {"sSearch": "Search all columns:"},
            }).rowReordering();
            ;

            $('#search').keyup(function() {
                oTable.fnFilter($(this).val());
            });

            $("tfoot input").focus(function() {

                /* Filter on the column (the index) of this element */
                oTable.fnFilter(this.value, $("tfoot input").index(this));

            });

            $('#published').change(function(event) {

                $('#search_pub').val($('#published').val());
                $('#search_pub').focus();

            });





            $("#example tbody tr").click(function(e) {


                if ($(this).hasClass('row_selected')) {
                    var anSelected = fnGetSelected(oTable);
                    var temp_id = $(anSelected).attr('id');
                    var temp = temp_id.split('_');
                    var id;
                    id = parseInt(temp[1]);
                    $('#bar_' + id).removeClass('black_bar');
                    $('#bar_' + id).addClass('blue_bar');
                    //	$(this).removeClass('row_selected');

                }
                else {
                    oTable.$('tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');

                    $('#bar_' + id).removeClass('blue_bar');
                    $('#bar_' + id).addClass('black_bar');
                }
            });


            $('#delete').click(function() {
                if ($("td.blue_bar").length != 0) {
                    if (confirm('Are you sure to delete this?')) {
                        $("td.blue_bar").each(function() {
                            var temp = $(this).attr('id').split('_');
                            id = parseInt(temp[1]);
                            $('#id_' + id).hide('slow');
                            url = '<?php echo base_url(); ?>ems/companies/delete';
                            $.post(url, {id: id}, function(data) {
                                $("#example").dataTable().fnDraw(true);
                            });

                        });
                    }
                }
                else {
                    alert("Select any one row from table");
                }
            });

            $('#edit').click(function() {
                var anSelected = fnGetSelected(oTable);
                var temp_id = $(anSelected).attr('id');
                if ($("td.blue_bar").length != 0)
                {
                    var temp = $("td.blue_bar").attr('id').split('_');
                    id = parseInt(temp[1]);
                    if ($("td.blue_bar").length == 1)
                    {
                        window.location = '<?php echo base_url(); ?>ems/companies/edit/id/' + id;
                    } else {
                        alert("Select any one row from table");
                    }

                } else {
                    alert("Select any one row from table");
                }
            });



            $('#view_detail').click(function() {
                var anSelected = fnGetSelected(oTable);
                var temp_id = $(anSelected).attr('id');
                if ($("td.blue_bar").length != 0) {
                    var temp = $("td.blue_bar").attr('id').split('_');
                    // var temp = temp_id.split('_');
                    id = parseInt(temp[1]);
                    if ($("td.blue_bar").length == 1) {
                        window.location = '<?php echo base_url() . 'ems/' . $this->uri->segment(2); ?>/view/id/' + id;
                    } else {
                        alert("Select any one row from table");

                    }
                } else {
                    alert("Select any one row from table");

                }
            });

            $('#view_news').click(function() {
                var anSelected = fnGetSelected(oTable);
                var temp_id = $(anSelected).attr('id');
                if ($("td.blue_bar").length != 0) {
                    var temp = $("td.blue_bar").attr('id').split('_');
                    // var temp = temp_id.split('_');
                    id = parseInt(temp[1]);
                    if ($("td.blue_bar").length == 1) {
                        window.location = '<?php echo base_url(); ?>ems/news/manage/' + id + '/';
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


<script type="text/javascript">
 
////////// sorting function - start  ///////////
    $(document).ready(function() {
  
  var startPosition;
  var endPosition;
  $("#example tbody").sortable({
            cursor: "move",
     start:function(event, ui){
       startPosition = ui.item.prevAll().length + 1;
     },
     update: function(event, ui) {

            var trs = $('#example tbody tr');
            var example='';

            for(var i=0;i<trs.length;i++)
            {
               example += "&example[]="+trs[i].id;
            }

 
                    var table_name = "companies";
                    var table="example";
                    var ajxFile ="<?php echo base_url();?>ems/companies/sortCol";
                    var data = "table_name="+table_name+example;
                            $.ajax({
                                    type: "GET",
                                    url: ajxFile,
                                    data: data,
                                    success: function(data){
                                        if (data != "") {
                                            //$("#ajax_content").html(data);                                           
                                        } 
                                    }
                            });        
      }
  });
});

</script>

             <div class="content_row">
             
              <div class="light_shadow_bar"></div>
              
              <div class="black_bar_main">
              
              <div class="inner_left_wrap">
              <div class="inner_left_heading"><?php $id= $this->session->userdata('site_id'); echo getsiteTitle($id);?></div>

<div class="inner_left_headingsmalll">Website</div>
</div>
              
              
              <div class="inner_mid_heading">Companies</div>
              
              
              
              
              
               <div class="get_help"><a  id="pop">Get Help</a><span style="padding-top:20px; padding-left:8px; float:right"><a  id="pop2"><img src="<?php echo base_url();?>assets/images/hepl_icon.png" width="20" height="20" /></a></span></div>
               <div class="side_bar_wrap" style="border-left:1px solid #fff;"><span><img src="<?php echo base_url();?>assets/images/sidebar_icon.png" width="15" height="15" /></span>Sidebar</div>
              </div>
             
              <div class="black_shadow"></div>
             
             </div>  
             
             
             <!--gray_panel-->
             <div class="inner_gray_panel" >
            
             
               <!--side_right-->
               <div class="side_right">
               
             
               
                 <div class="seprator_horizontal"></div>
                 <div class="previewChangespanel"> 
                                     
                     <div class="previewChangesBtn"> 
                         <a target="_blank" href="<?php echo base_url()."companies"?>"><img src="assets/images/previewChanges.png" width="108" height="23" border="0" alt=""/> </a>
                     </div>                                     
                                     
                                     <div class="modifiedDate">Last modified <?php echo fetchLastupdated("products","prd_updated_at");?> </div>
                                     
                                     
                                     </div>
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
                         <li><a id="" href="ems/companies/addcompimage" >Upload Image</a></li>
                         <li><a id="" href="ems/countries/manage" >Countries</a></li>
                         <li><a id="" href="ems/industries/manage" >Industries</a></li>
                            <?php echo top_navigation();?>                          
                         <li><a id="back" href="ems/dashboard/manage" >Back</a></li>  
                     </ul>
                     
                     </div><!--inner_menu_bar-->
                       
                         <div class="admin_manage_panel" style="padding-top:90px;">
                          
                           
                           
                           <div class="table_content_row">
                           

                  <table width="100%"   border="0" class="display table_style_gray2" id="example">
        <thead>
            <tr class="top_row">
            <td width="1%" style="padding-top:0"><p id="enable"><a onclick="javascript:enable(<?php echo $res[0]['id'];?>);">
<span><img src="assets/images/black_bar.png"></span>
</a></p><p id="disable" style="display:none"><a onclick="javascript:disable();">
<span><img src="assets/images/black_bar.png"></span>
</a></p></td>
                <td width="100%" class="text_table_space">Companies</td>
                <td width="20%" class="text_table_space">Publish</td>
            </tr>
        </thead>
         <tfoot>
        <th><input type="hidden"></th>
        <th><input type="hidden"></th>
        <th><input  type="text" value="" name="search_pub" id="search_pub" class="search_init" style="margin-top:-19.5px;opacity:0;
filter:alpha(opacity=0);"></th>
        </tfoot>
        <tbody>
        <?php
     	$count=0;		
        foreach($res as $result=>$val){
        
        	?>
                <tr class="odd" id="id_<?php echo $val['id'] ?>" onclick="javascript:highlight(<?php echo $val['id'];?>);">
                   <td class="black_bar" id="bar_<?php echo $val['id']; ?>"><?php echo $count; ?></td>
                    <td><?php echo $val['eng_cmp_title']?></td>
                     <td  class="table_row"  style="border-right:#000 0px solid">
                     <?php echo get_grid_status($val['id'],$val['cmp_pub_status']);?>
                     </td>                      
                </tr>
                
              <?php $count++;
        		
        		}?>
        </tbody>
    </table>             
                           </div>
                            
                            
                           <!--pagination_row--> 
                           <div class="pagination_row">
                           
                                 <div class="pagination_left">
                                 
                                   <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td class="pagination_text">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

                                 </div>
                                 
                                 
                                 <div class="pagination_right">
                                 
                                 <table width="100%" border="0">
   <!--<tr>
    <td>
    
    <ul class="disply">
    <li>Display:</li>
    <li>|</li>
    
    <li><a  onclick="showlength(10);" >10</a></li>
    <li>|</li>
    
    
    <li ><a  onclick="showlength(25);" >25</a></li>
    <li>|</li>
    
    <li ><a href="#">50</a></li>
    <li>|</li>
    
     <li><a href="#">show all</a></li>
    
    </ul>
    
    
    
    
    </td>

  </tr>-->
</table>

                                 </div>
                            
                            
                           
                           </div><!--pagination_row-->
                       
                            
                            
                         </div> 
                            
                 
                         
                       </div><!--middle_content_areainner-->
             
         
                          