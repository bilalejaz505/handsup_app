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
 
  
  var dataChart2 = new gapi.analytics.googleCharts.DataChart({
    query: {
	  'ids': 'ga:<?php echo $ga_view_id; ?>',
      'metrics': 'ga:sessions',
      'dimensions': 'ga:country',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'max-results': 6,
      'sort': '-ga:sessions'
    },
    chart: {
      container: 'chart_divbConfig_geo',
      type: 'GEO',
      options: {
        width: '100%',
        pieHole: 4/9
      }
    }
  });
  dataChart2.execute();
  
  var dataChartTrafic = new gapi.analytics.googleCharts.DataChart({
    query: {
       'ids': 'ga:<?php echo $ga_view_id; ?>',
	  'metrics': 'ga:sessions',
      'dimensions': 'ga:date',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'chart-containerTrafic',
      type: 'LINE',
      options: {
        width: '100%'
		
      }
    }
  });
  
 dataChartTrafic.execute();
  
  
    var dataChartBar = new gapi.analytics.googleCharts.DataChart({
  reportType: 'ga',
  query: {
    'ids': 'ga:<?php echo $ga_view_id; ?>',
	'dimensions': 'ga:date',
    'metrics': 'ga:sessions',
    'start-date': '30daysAgo',
    'end-date': 'yesterday',
  },
  chart: {
   container:'chart_divcConfig_bar',
    type: 'COLUMN',
	options: {
        width: '100%'
      }
    
  }
});
dataChartBar.execute();
   
   
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
        width: '92%'
		
      }
    
  }
});
  
   dataChartTraficSourceTable.execute();
  
  
  
  
  
  /**
   * Render the dataChart on the page whenever a new view is selected.
   */
 
  
  
  
  
 
  
});
</script>





<div id="embed-api-auth-container">

</div>


<div class="content_row">
             
              <div class="light_shadow_bar"></div>
              
              <div class="black_bar_main">
              
              <div class="inner_left_wrap">
              <div class="inner_left_heading"><?php $id= $this->session->userdata('site_id'); echo getsiteTitle($id);?></div>

<div class="inner_left_headingsmalll">Website</div>
</div>
              
              
              <div class="inner_mid_heading">Dashboard</div>
              
              
              
              
              
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
                   <!--<div class="search_bar_panel">
                   
                   <div class="search_heading">Search</div>
                  
                  <div class="search_detail">Type your search keyword<br />

to filter the grid</div>


                     <div class="search_field_row">
                           
                       <div class="search_inputfiled">
                       <input name="" type="text" class="search_field"  placeholder="Keyword"/></div> 
                            
                        <div class="search_button"><img src="assets/images/search_button.png" width="36" height="32" /></div>
                            
                     </div>
                   
                   </div>--><!--search_bar_panel-->
              
               
               
               </div><!--side_right-->
               
               
                       
                        <!--middle_content_areainner-->
<div class="middle_content_areainner" style="padding-top:0px; min-height:1100px;">




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



                        <!--edit_data_table-->
                        <div class="edit_data_table">
                            <!--filter_bar_panel-->
                            <div class="trafficMonthSelect">





                                <!--<div class="trafficdropdownRow">
                           
                       <div class="trafficdropdownfiled">
                     <select name="" class="trafficdropDownList"   > <option> Department </option>  </select></div> 
                     <div class="trafficdropdownfiled">
                     <select name="" class="trafficdropDownList"   > <option> Department </option>  </select></div>
                            
                     
                     </div>-->


                                <div class="edit_data_table_row">

                                     <div class="trafficMap" id="chart_divaConfig"> </div>

                                    <div id="chart-containerTrafic">

									</div>
                                   
                                </div>




                            </div>





                        </div>
                        <!--filter_bar_panel-->


      

        </td>
        </tr>
        </table>



    </div>




    <div class="siteUsageWrap" style="margin-top:20px;  margin-bottom: 20px;">
 <table width="100%" border="0" class="edit_table">
            <tr class="blue_row">
                <td width="2%">&nbsp;</td>
                <td width="50%">Bar</td>
            </tr>
            <tr class="gray_row">
                <td>&nbsp;</td>
                <td>
					<div id="view-selector-bar"></div>
                    <div class="mapOverview" id="chart_divcConfig_bar"> </div>

                </td>
            </tr>
        </table>
       



    </div>
    <div class="siteUsageWrap" style="margin-top:20px;">

        <table width="100%" border="0" class="edit_table">
            <tr class="blue_row">
                <td width="2%">&nbsp;</td>
                <td width="50%">Map Overview</td>
            </tr>
            <tr class="gray_row">
                <td>&nbsp;</td>
                <td>
					<div id="view-selector-container"></div>
                    <div class="mapOverview" id="chart_divbConfig_geo"> </div>

                </td>
            </tr>
        </table>



    </div>

    <div class="siteUsageWrap full" style="margin-top:20px;">

        <table width="100%" border="0" class="edit_table">
            <tr class="blue_row">
                <td width="2%">&nbsp;</td>
                <td width="50%">Traffic Sources Overview</td>
            </tr>
            <tr class="gray_row">
                <td>&nbsp;</td>
                <td>
	<div id="view-selector-traficsource"></div>
                    <div class="trafficOverview" id="chart_divdConfig_table">
                    
                    
                        <!--<div id="chart_divcConfig" style="width: 284px; height: 125px;"></div> --></div>

                </td>
            </tr>
        </table>



    </div>


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
                            <strong> <?php echo $val['log_uname']?></strong>
                            <?php echo $val['log_comments']?> <strong><?php echo $val['log_module']?></strong>&nbsp;<span style="color:#0085B2; font-style:italic; font-weight:bold;"><?php echo date('Dd M, Y  H:i:s',strtotime($val['log_date'])) ?>   </span>
                        </div>
                        <!--GrayRow-->




                        <?php $i++;}?>

                </td>
            </tr>
        </table>



    </div>


</div>
                            
                 
                        
                       </div><!--middle_content_areainner-->