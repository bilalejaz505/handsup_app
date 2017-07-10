<script language="javascript">
function setUrl(siteid){
	
location.href="<?php echo base_url(); ?>ems/dashboard/manage/" + siteid; 



}
</script> 
<div class="content_row">
             
              <div class="light_shadow_bar"></div>
              
              <div class="black_bar_main">
              
              
              
              
              <div class="inner_mid_heading">Website List</div>
              
               <div class="side_bar_wrap"><span><img src="<?php echo base_url();?>assets/images/sidebar_icon.png" width="15" height="15" /></span>Sidebar</div>
              </div>
             
              <div class="black_shadow"></div>
             
             </div>  
             
             
             <!--gray_panel-->
             <div class="inner_gray_panel2" >
             
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
                       <div class="websiteListContainer">
                       
                         <div class="admin_manage_panel">
                          
                        <!--website_listing_row-->
                        <div class="website_listing_row">
                        
                        
                             <?php foreach($websiteList as $val => $value){ ?>
                             <!--list_box_wrap_inner-->
                            <div class="listboxwrapinner">
                            
                             <div class="list_logo_box"><a href="<?php echo $value[0]['domain_name']."/ems/dashboard/manage/".$value[0]['id']?>"><img src="uploads/<?php echo $value[0]['site_thumbnail']?>" width="119" height="51" /></a></div>
                             
                              <div class="website_list_name"><a href="<?php echo $value[0]['domain_name']."/ems/dashboard/manage/".$value[0]['id']?>"><?php echo $value[0]['site_title']?></a></div>
                            
                            
                            </div><!--list_box_wrap_inner-->
                            
                            
                        <?php }?>    
                        
                            </div><!--website_listing_row-->
                            
                             </div> 
                             
                        </div><!--middle_content_areainner-->    
                        <div style="width:100%; height:60px; background:#444444; float:left;"> </div>