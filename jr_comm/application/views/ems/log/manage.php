<script type="text/javascript" charset="utf-8">


	var asInitVals = new Array();
    $(document).ready(function() {
       
	    
        oTable = $('#example').dataTable({ 
              
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
	 
	 $('#web').change(function(event){
		
            $('#website').val($('#web').val());
			$('#website').focus();
	         	    
        });
		
		$('#usr').change(function(event){
		
            $('#log').val($('#usr').val());
			$('#log').focus();
	         	    
        });
		
	$('#dt').change(function(event){
		
            $('#date').val($('#dt').val());
			$('#date').focus();
	         	    
        });	
	
	/*
	 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
	 * the footer
	 */
	$("tfoot input").each( function (i) {
		asInitVals[i] = this.value;
	} );
	
	$("tfoot input").focus( function () {
		if ( this.className == "search_init" )
		{
			this.className = "";
			this.value = "";
		}
	} );
	
	$("tfoot input").blur( function (i) {
		if ( this.value == "" )
		{
			this.className = "search_init";
			this.value = asInitVals[$("tfoot input").index(this)];
		}
	} );
		 
      
	  
	    $("#example tbody tr").click( function( e ) {
			 
			
            if ( $(this).hasClass('row_selected') ) {
				 var anSelected = fnGetSelected( oTable );
                 var temp_id = $(anSelected).attr('id');
				 var temp = temp_id.split('_');
                 id = parseInt(temp[1]);
				 $('#bar_'+id).removeClass('black_bar');
                 $('#bar_'+id).addClass('blue_bar');
			//	$(this).removeClass('row_selected');
				
            }
            else {
                oTable.$('tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
				
				 $('#bar_'+id).removeClass('blue_bar');
                 $('#bar_'+id).addClass('black_bar');
            }
        });
		

        $('#delete').click(function(){
			
            var anSelected = fnGetSelected( oTable );
            var temp_id = $(anSelected).attr('id');
			
             if(typeof temp_id!='undefined'){
            var temp = temp_id.split('_');
            id = parseInt(temp[1]);
			
           	 if ( anSelected.length != 0 ) {
                if(confirm('Are you sure to delete this?')) {
                      url ='<?php echo base_url(); ?>ems/boardOfDirectors/delete';
					$.post(url, {id:id}, function(data){
					
                        $('#id_'+id).hide('slow');
                        $("#example").dataTable().fnDraw(true);
                    });
                }
             }
            }else{
				
			alert("Select any row from table");	
			}
        }) ;

        $('#edit').click( function() {
            var anSelected = fnGetSelected( oTable );
            var temp_id = $(anSelected).attr('id');
		
          if(typeof temp_id!='undefined'){
            var temp = temp_id.split('_');
            id = parseInt(temp[1]);
            if ( anSelected.length != 0 ) {
                window.location = '<?php echo base_url(); ?>ems/log/edit/id/'+id;
        		}
            }else{
				alert("Select any row from table");	
				
			}
        } );
		
		
        $('input[id ^="bod_pub_status_"]').click(function(){
        	  var id = this.id.replace('bod_pub_status_','');
				if ($('#bod_pub_status_'+id).is(":checked"))
				{
					publishStatus=1;
				}
				else
				{
					publishStatus=0;
					}
        	  url ='<?php echo base_url(); ?>ems/log/publish';
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
              <div class="inner_left_heading">Nesma Panel</div>

<div class="inner_left_headingsmalll">Website</div>
</div>
              
              
              <div class="inner_mid_heading">Log</div>
              
              
              
              
              
               <!--<div class="get_help"><a  id="pop">Get Help</a><span style="padding-top:20px; padding-left:8px; float:right"><a  id="pop2"><img src="<?php echo base_url();?>assets/images/hepl_icon.png" width="20" height="20" /></a></span></div>-->
               <div class="side_bar_wrap" style="border-left:1px solid #fff;"><span><img src="<?php echo base_url();?>assets/images/sidebar_icon.png" width="15" height="15" /></span>Sidebar</div>
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


                     <div class="search_field_row">
                           
                       <div class="search_inputfiled">
                          <input name="search" id="search" type="text" class="search_field"  placeholder="Keyword"/></div> 
                            
                        <div class="search_button"><img src="assets/images/search_button.png" width="36" height="32" /></div>
                            
                     </div>
                   
                   </div><!--search_bar_panel-->
              
               <div class="filter_bar_panel">
                   
             
               
               
                   <div class="filter_heading">Filters</div>
                  



                     <div class="dropdownRow">
                       <?php $filter=websiteFilter();?>    
                      <div class="dropdownfiled">
                      <div class="selected">
                     <select name="web" id="web" class="dropDownList"> 
                     <option value=""> Select Website</option>
                     <?php foreach($filter as $val=>$value){?>
                     <option value="<?php echo $value['site_title']?>"><?php echo $value['site_title']?></option>  
                     <?php }?>
                     </select>
                     </div>
                     </div> 
                            
                        <!--<div class="search_button"><img src="images/search_button.png" width="36" height="32" /></div>-->
                            
                     </div>
                     
                     <div class="dropdownRow">
                       <?php $filter=userFilter();?>    
                      <div class="dropdownfiled">
                      <div class="selected">
                     <select name="usr" id="usr" class="dropDownList" > 
                     <option value=""> Select User</option>
                     <?php foreach($filter as $val=>$value){?>
                     <option value="<?php echo $value['usr_uname']?>"><?php echo $value['usr_uname']?></option>  
                     <?php }?>
                     </select>
                     </div>
                     </div> 
                            
                        <!--<div class="search_button"><img src="images/search_button.png" width="36" height="32" /></div>-->
                            
                     </div>
                     
                     <div class="dropdownRow">
                       <?php $filter=dateFilter();?>    
                      <div class="dropdownfiled">
                      <div class="selected">
                     <select name="dt" id="dt" class="dropDownList" > 
                     <option value=""> Select Date</option>
                     <?php foreach($filter as $val=>$value){?>
                     <option value="<?php echo date('Dd M,Y H:i:s',strtotime($value['log_date']))?>"><?php echo date('Dd M,Y H:i:s',strtotime($value['log_date']))?></option>  
                     <?php }?>
                     </select>
                     </div>
                     </div> 
                            
                        <!--<div class="search_button"><img src="images/search_button.png" width="36" height="32" /></div>-->
                            
                     </div>
                   
                   </div>
               
               </div><!--side_right-->
               
               
                       
                        <!--middle_content_areainner-->
                       <div class="middle_content_areainner" style="padding-top:0px;">
                       
                         
                
                         <div class="admin_manage_panel" style="padding-top:90px;">
                          
                           
                           
                           <div class="table_content_row">
                         <table width="100%"   border="0" class="display table_style_gray2" id="example">
        <thead>
            <tr class="top_row">
            	<td width="1%"></td>
                <td width="60%" class="text_table_space">Log</td>
                <td>Date</td>
                <td width="10%" class="text_table_space">Website</td>
            </tr>
        </thead>
         <tfoot>
        <th><input  type="hidden" value="" name="dsf" class="search_init"></th>
        <th><input  type="text" value="" name="log" id="log" class="search_init" style="margin-top:-19.5px;opacity:0;
filter:alpha(opacity=0);"></th>
        <th><input  type="text" value="" name="date" id="date" class="search_init" style="margin-top:-19.5px;opacity:0;
filter:alpha(opacity=0);"></th>
        <th><input  type="text" value="" name="website" id="website" class="search_init" style="margin-top:-19.5px;opacity:0;
filter:alpha(opacity=0);"></th>
        </tfoot>
        <tbody>
       <?php 
	   $i=0;
	   foreach($data as $result=>$val) {  ?>  
   
  <tr class="odd">
      <td class="black_bar" id="bar_<?php echo $i; ?>"></td>
    <td width="309" class="text_table_space"> <strong> <?php echo $val['log_uname']?></strong><br />
       <?php echo $val['log_comments']?><strong> <?php echo $val['log_module']?></strong></td>
    
       <td width="211"  class="text_table_space "> <?php echo date('D d M, Y H:i:A',strtotime($val['log_date']))?>
       </td>
      
       <td width="141"  class="text_table_space " style="border:none;"> <?php echo $val['log_sitename']?></td>
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
             
         
                          