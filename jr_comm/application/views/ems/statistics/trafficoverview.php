<script>
// JS API Code

(function(w,d,s,g,js,fs)
{
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
}(window,document,'script'));
</script>

<script>

gapi.analytics.ready(function() {

  /**
   * Authorize the user immediately if the user has already granted access.
   * If no access has been created, render an authorize button inside the
   * element with the ID "embed-api-auth-container".
   */
  gapi.analytics.auth.authorize({
    container: 'embed-api-auth-container',
    clientid: '116311478161629329447',
	serverAuth: {
    access_token: '<?php echo $analytics;?>',
	
  }
  });
  
    /**
   * Create a new ViewSelector instance to be rendered inside of an
   * element with the id "view-selector-container".
   */
 
  

  var dataChartTraficSourceTable = new gapi.analytics.googleCharts.DataChart({
  reportType: 'ga',
  query: {
    'ids': 'ga:<?php echo $ga_view_id; ?>',
	'dimensions': 'ga:source',
    'metrics': 'ga:sessions',
    'start-date': '30daysAgo',
    'end-date': 'yesterday',
  },
  chart: {
   container:'chart_divdConfig_table',
    type: 'TABLE',
	options: {
        width: '98%',
		height: '380px'
      }
    
  }
});
  
   dataChartTraficSourceTable.execute();
  
  
  
  
  
  /**
   * Render the dataChart on the page whenever a new view is selected.
   */
 
  
  
  
  
 
  
});
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
                       
                         
                
                     <div class="inner_menu_bar">
                     
                     <ul>
                       <li style="z-index:99;"><a href="ems/statistics/traffic">Traffic</a></li>
                         <li style="z-index:100; left:25%"><a href="ems/statistics/siteusage">Site Usage</a></li>
                         <li style="z-index:200; left:50%"><a href="ems/statistics/mapoverview">Map Overview</a></li>
                         <li style="z-index:200; left:75%"  class="selective"><a href="ems/statistics/trafficoverview">Traffic Sources</a></li> 
                        
                     </ul>
                     
                     </div>
                       
                         <div class="admin_manage_panel" style="padding-top:90px;">
                          
                           
                           
                           <div class="table_content_row">
                           
                           <table width="100%" border="0" class="edit_table">
  <tr class="blue_row">
    <td width="2%">&nbsp;</td>
    <td width="98%">Traffic</td>
  </tr>
  <tr class="gray_row">
    <td>&nbsp;</td>
    <td>
    
    
    
       <div class="mapOverviewDiv" id="chart_divdConfig_table"></div>
    
    
    </td>
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
             
         
                          