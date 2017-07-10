
               
             <div class="content_row">
             
              <div class="light_shadow_bar"></div>
              
              <div class="black_bar_main">
              
              <div class="inner_left_wrap">
              <div class="inner_left_heading"><?php echo site_name('1');?></div>

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
                       <input name="" type="text" class="search_field"  placeholder="Keyword"/></div> 
                            
                        <div class="search_button"><img src="assets/images/search_button.png" width="36" height="32" /></div>
                            
                     </div>
                   
                   </div><!--search_bar_panel-->
              
               
               
               </div><!--side_right-->
               
               
                       
                        <!--middle_content_areainner-->
                       <div class="middle_content_areainner" style="padding-top:0px;">
                       
                         
                
                         <div class="admin_manage_panel" style="padding-top:90px;">
                          
                           
                           
                           <div class="table_content_row">
                           
                           <table width="100%" border="0" class="tableBgColor">
  <tr class="blue_row">
    <td width="2%">&nbsp;</td>
    <td width="98%">Log</td>
  </tr>
  <tr class="gray_row" style="background:none;">
    <td>&nbsp;</td>
    <td>
    
    <?php  $i=0;  foreach($data as $result=>$val) {  ?>
   

      <!--GrayRow-->
       <div class="<?php echo ($i%2==0) ? 'GrayRow' : 'LightGrayRow' ?>" style="margin-top:10px;">
       <strong> <?php echo $val['log_uname']?></strong><?php echo $val['log_comments']?> <strong><?php echo $val['log_module']?></strong>&nbsp;<span style="color:#0085B2; font-style:italic; font-weight:bold;"><?php echo date('Dd M, Y  H:i:A',strtotime($val['log_date'])) ?>   </span>
       </div><!--GrayRow-->
       
       
     
    
       <?php $i++;}?>
    
    </td>
  </tr>
</table>


                           
                           </div>
                            
                            
                           
                            
                            
                         </div> 
                            
                 
                         
                       </div><!--middle_content_areainner-->
             
         
                          