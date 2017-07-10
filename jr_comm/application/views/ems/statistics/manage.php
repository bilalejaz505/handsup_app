
   <script language="javascript">
   function change_class(id){
   $("#"+id).attr('class', 'blue_bar');
   }
   function black_class(id){
   $("#"+id).attr('class', 'black_bar');
   }
   </script>            
             <div class="content_row">
             
              <div class="light_shadow_bar"></div>
              
              <div class="black_bar_main">
              
              <div class="inner_left_wrap">
              <div class="inner_left_heading"><?php $id= $this->session->userdata('site_id'); echo getsiteTitle($id);?></div>

<div class="inner_left_headingsmalll">Website</div>
</div>
              
              
              <div class="inner_mid_heading">Statistics</div>
              
              
              
              
              
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
                 
                   <!--search_bar_panel-->
                   <div class="search_bar_panel">
                   
                   <div class="search_heading">Search</div>
                  
                  <div class="search_detail">Type your search keyword<br />

to filter the grid</div>


                     <div class="search_field_row">
                           
                       <div class="search_inputfiled">
                       <input name="" type="text" class="search_field"  placeholder="Keyword"/></div> 
                            
                        <div class="search_button"><img src="assets/images/search_button.png" width="36" height="32" /></div>
                            
                     </div>
                   
                   </div><!--search_bar_panel-->
              
               
               
               </div><!--side_right-->
               
               
                       
                        <!--middle_content_areainner-->
                       <div class="middle_content_areainner" style="padding-top:0px;">
                       
                         
                
                     <!--inner_menu_bar-->
                     <div class="inner_menu_bar">
                     
                     <ul>
                    
                       <!--   <li style="z-index:300; left:75%"><a id="back" href="ems/dashboard/manage" >Back</a></li>  -->
                     
                     </ul>
                     
                     </div><!--inner_menu_bar-->
                       
                         <div class="admin_manage_panel" style="padding-top:90px;">
                          
                           
                           
                           <div class="table_content_row">
                           
                           <table width="100%" border="0" class="table_style_gray">
  <tr class="top_row">
  
    <td colspan="2" class="text_table_space" >Statistics</td>
    </tr>
  <tr class="odd">
    <td  class="black_bar" id="1"></td>
    <td class="text_table_space" onmouseover="change_class(1)" onmouseout="black_class(1)"><a href="ems/statistics/traffic">Traffic</a></td>
  </tr>
  <tr class="even">
    <td class="black_bar" id="2"></td>
    <td class="text_table_space" onmouseover="change_class(2)" onmouseout="black_class(2)"><a href="ems/statistics/siteusage">Site Usage</a></td>
  </tr>
  <tr class="odd">
    <td  class="black_bar" id="3"></td>
    <td class="text_table_space" onmouseover="change_class(3)" onmouseout="black_class(3)"><a href="ems/statistics/mapoverview">Map Overview</a></td>
  </tr>
  <tr class="even">
    <td class="black_bar" id="4"></td>
    <td class="text_table_space" onmouseover="change_class(4)" onmouseout="black_class(4)"><a href="ems/statistics/trafficoverview">Traffic Sources Overview</a></td>
  </tr>
 
</table>

                           
                           </div>
                            
                            
                           <!--pagination_row--> 
                           <!--<div class="pagination_row">
                           
                                 <div class="pagination_left">
                                 
                                 <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="assets/images/pre_icon.png" width="15" height="14" /></td>
    <td class="pagination_text">Page 1 of 500</td>
    <td><img src="assets/images/next_icon.png" width="15" height="14" /></td>
  </tr>
</table>

                                 </div>
                                 
                                 
                                 <div class="pagination_right">
                                 
                                 <table width="100%" border="0">
  <tr>
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

  </tr>
</table>

                                 </div>
                            
                            
                           
                           </div>--><!--pagination_row-->
                       
                            
                            
                         </div> 
                            
                 
                         
                       </div><!--middle_content_areainner-->
             
         
                          