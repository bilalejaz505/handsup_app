<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {

        var vb = 1;



				$('#search').change(function(){

					

                 val=$('#search').val();

				$('#SearchContainer').append("<div class='searchWrapper' id='search_"+vb+"'><div class='SelectedFilter'>"+val+"</div><div class='crossBtn' onclick='RemoveFilter(search_"+vb+");'> </div></div>");

					vb++;



				});		

      oTable = $('#example').dataTable({ 

                "sDom": 'T<"clear">lfrtip',

			"oTableTools": {

			"sRowSelect": "multi",

			"aButtons": [ "select_all", "select_none" ]

			},   

        	"bJQueryUI": true,

			

            "bSort": true,

  			"bFilter": true,

            "bInfo": true,

			"aLengthMenu": [

         [10, 20, 30,50,100,500,5000],

         [10, 20, 30,50,100,500,5000]

     		],

			"fnInitComplete": function(){CreateJQGridCustomPaging();}, 

            "sPaginationType": "full_numbers",

			"oLanguage": {"sSearch": "Search all columns:"},

		

		}).rowReordering();



        $('#search').keyup(function(){

           oTable.fnFilter( $(this).val() );

        });

				

	$("tfoot input").focus( function () {

		

		/* Filter on the column (the index) of this element */

		oTable.fnFilter( this.value, $("tfoot input").index(this) );

		

	} );

	 

	 $('#published').change(function(event){

		

            $('#search_pub').val($('#published').val());

			$('#search_pub').focus();

	         	    

        });

        $("#example tbody tr").click( function( e ) {
			$(this).toggleClass('row_selected');		      	
                 var temp_id = $( this ).attr('id');
				 var temp = temp_id.split('_');
                 id = parseInt(temp[1]);				 			 
			 if ( $(this).hasClass('row_selected') ) {				 			
				 $('#bar_'+id).removeClass('black_bar');
                 $('#bar_'+id).addClass('blue_bar');				
            }
            else {				
				  $('#bar_'+id).removeClass('blue_bar');
				 $('#bar_'+id).addClass('black_bar');               
            }

        });


        $('#delete').click(function(){
            if($("td.blue_bar").length != 0) {
            if (confirm('Are you sure to delete this?')) {
            $("td.blue_bar").each(function() {
            var temp = $(this).attr('id').split('_');
            var id = parseInt(temp[1]);
            
            ///Check if group is created form central site///
            
            var original_id = $(this).attr('id');
            var nxt_td = $('td#'+original_id).next().text(); // getting the name of CMS Group
            var url = '<?php echo base_url(); ?>ems/cmsInnGroups/checkGroups';
                $.post(url, {id: id}, function(data) {
                    if(data.trim() === '3'){
                        alert("You cannot delete the group: "+nxt_td+" because this group is created from Central site.");
                    }else{
                        $('#id_' + id).hide('slow');
                        url = '<?php echo base_url(); ?>ems/cmsInnGroups/delete';
                        $.post(url, {id: id}, function(data) {
                            $("#example").dataTable().fnDraw(true);
                        });
                    }
                });
                
           ///End check if group is created form central site///
            
            });
               }
                    }
                    else {
                        alert("Select any one row from table");

                    }

                });

        $('#edit').click( function() {
			
			
            var anSelected = fnGetSelected( oTable );
            var temp_id = $(anSelected).attr('id');
            if($("td.blue_bar" ).length != 0){
			 var temp = $("td.blue_bar" ).attr('id').split('_');
            var id = parseInt(temp[1]);
            if ( $("td.blue_bar" ).length == 1 ) {
                
                ///Check if group is created form central site///
                
                var url = '<?php echo base_url(); ?>ems/cmsInnGroups/checkGroups';
                $.post(url, {id: id}, function(data) {
                    if(data.trim() === '3'){
                        alert("You cannot edit this group because this group is created from Central site.");
                    }else{
                        window.location = '<?php echo base_url(); ?>ems/cmsInnGroups/edit/id/'+id;
                    }
                });
                
                ///End check if group is created form central site///
        		}
                        else{
				alert("Select any one row from table");	
				
			}
            }else{
				alert("Select any one row from table");	
				
			}       

        });

        $('input[id ^="chk_"]').click(function(){

        	  var id = this.id.replace('chk_','');

				if ($('#chk_'+id).is(":checked"))

				{

					publishStatus=1;

				}

				else

				{

					publishStatus=0;

					}

        	  url ='<?php echo base_url(); ?>ems/cmsInnGroups/publish';

              $.post(url, {id:id,pub_status:publishStatus}, function(data){

                  $("#example").dataTable().fnDraw(true);

              });

        	 

            });

        function fnGetSelected( oTableLocal )

        {

            return oTableLocal.$('tr.row_selected');

        }

		

		

	    var nav=oTable.fnSettings().fnRecordsDisplay();

		if(nav==0){

			

			$('#example_paginate').hide();

		}else{

			

			$('#example_paginate').show();

		}



    } );



</script>

     

             <div class="content_row">

             

              <div class="light_shadow_bar"></div>

              

              <div class="black_bar_main">

              

              <div class="inner_left_wrap">

              <div class="inner_left_heading"><?php echo getsiteTitle(1);?></div>



<div class="inner_left_headingsmalll">Website</div>

</div>

              <div class="inner_mid_heading">CMS Groups</div>

              

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

              

                  <!--filter_bar_panel-->

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

                     

                     

                     

                     

                   

                   </div><!--filter_bar_panel-->

               

               </div><!--side_right-->

               

               

                       

                        <!--middle_content_areainner-->

                       <div class="middle_content_areainner" style="padding-top:0px;">

                       

                         

                

                     <!--inner_menu_bar-->

                     <div class="inner_menu_bar">

                     

                     <ul>

                      <?php echo top_navigation();?>

                           <li style="z-index:300; left:75%"><a  id="back" onclick="javascript:history.back();">Back</a></li>

                     

                     </ul>

                     

                     </div><!--inner_menu_bar-->

                       

                         <div class="admin_manage_panel" style="padding-top:90px;">

                          

                           

                         <div align="center">

						 <?php if($this->session->flashdata('message')) {echo $this->session->flashdata('message'); } echo '<span id="msg">'.$message.'</span>' ?> </div>

                           <div class="table_content_row">

                           <table width="100%"   border="0" class="display table_style_gray2" id="example">

        <thead>

            <tr class="top_row">

            	<!-- <td width="0%" style="display:none"></td>-->

                <td width="1%" style="padding-top:0"><p id="enable"><a onclick="javascript:enable(<?php echo $res[0]['id'];?>);">

<span><img src="assets/images/black_bar.png"></span>

</a></p><p id="disable" style="display:none"><a onclick="javascript:disable();">

<span><img src="assets/images/black_bar.png"></span>

</a></p></td>

                 

                <td width="70%" class="text_table_space">Group Title</td>

                <td width="20%" class="text_table_space">No. of Users</td>

                <td width="10%" class="text_table_space">Published</td>

            </tr>

        </thead>

        <tfoot>

       <!-- <th><input type="hidden"></th>-->

         <th style="display:none"><input type="hidden"></th>

        <th><input type="hidden"></th>

        <th><input type="hidden"></th>

        <th><input  type="text" value="" name="search_pub" id="search_pub" class="search_init" style="margin-top:-19.5px;opacity:0;

filter:alpha(opacity=0);"></th>

        </tfoot>

        <tbody>

        <?php

     		$i=0;

       foreach($groupList as $result=>$val){

        

		

        	?>

                <tr class="odd" id="id_<?php echo $val['id'] ?>" onclick="javascript:highlight(<?php echo $val['id'];?>);">

                <!--   <td style="display:none"><?php echo $i; ?></td>-->

                   <td class="black_bar" id="bar_<?php echo $val['id'] ?>"><?php echo $i; ?></td>

                    <td><?php echo $val['eng_grp_title']?></td>

                    <td id="nou" class="table_row"><?php echo calculate_grp_users($val['id']); ?></td>

                     <td class="table_row" style="border-right:#000 0px solid">
                         <?php echo get_grid_status($val['id'],$val['grp_pub']);?>
                     </td>                    

                   

                </tr>

                

              <?php

        		$i++;

        		}?>

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

  <!--<tr>

    <td>

    

    <ul class="disply">

    <li>Display:</li>

    <li>|</li>

    

    <li><a href="#">50</a></li>

    <li>|</li>

    

    

    <li class="current"><a href="#">100</a></li>

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

             

         

                          