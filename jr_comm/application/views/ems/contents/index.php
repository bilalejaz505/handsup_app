<!DOCTYPE html>
<html>
<head>
  <title>Embed API Demo</title>
  <meta charset="utf-8"/>

</head>
<body>

<!-- Step 1: Create the containing elements. -->

<div id="embed-api-auth-container">

</div>
<div id="chart-container">

</div>
<div id="chart-2-container"></div>
<div id="view-selector-container"></div>
<div id="view-selector-2-container"></div>
<div id="timeline"></div>
<div id="view-selector-3-container"></div>


<div id="regions_div" style="width: 900px; height: 500px;"></div>
<!-- Step 2: Load the library. -->

<script>
(function(w,d,s,g,js,fs){
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
    clientid: '244278957135-7ivoaod0n85u0pn4uaptopepltbj3ue9.apps.googleusercontent.com'
  });


  /**
   * Create a new ViewSelector instance to be rendered inside of an
   * element with the id "view-selector-container".
   */
  var viewSelector = new gapi.analytics.ViewSelector({
    container: 'view-selector-container'
  });
 var viewSelector2 = new gapi.analytics.ViewSelector({
    container: 'view-selector-2-container'
  });
 
  var regions_div = new gapi.analytics.ViewSelector({
    container: 'regions_div'
  });
  var viewSelector3 = new gapi.analytics.ViewSelector({
  container: 'view-selector-3-container'
});
  // Render the view selector to the page.
  viewSelector.execute();
  viewSelector2.execute();
  viewSelector3.execute();
  regions_div.execute();

//The chart type. Possible options are: LINE, COLUMN, BAR, TABLE, and GEO.
  /**
   * Create a new DataChart instance with the given query parameters
   * and Google chart options. It will be rendered inside an element
   * with the id "chart-container".
   */
  var dataChart = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:date',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'chart-container',
      type: 'COLUMN',
      options: {
        width: '100%'
      }
    }
  });
  var dataChart2 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:country',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'max-results': 6,
      sort: '-ga:sessions'
    },
    chart: {
      container: 'chart-2-container',
      type: 'GEO',
      options: {
        width: '100%',
        pieHole: 4/9
      }
    }
  });
  
  //For countries 
  
    var regions_div_data = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:sessions',
      dimensions: 'ga:country',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'max-results': 7,
      sort: '-ga:sessions'
    },
    chart: {
      container: 'chart-2-container',
      type: 'PIE',
      options: {
        width: '100%',
        pieHole: 4/9
      }
    }
  });
  
  var timeline = new gapi.analytics.googleCharts.DataChart({
  reportType: 'ga',
  query: {
    'dimensions': 'ga:date',
    'metrics': 'ga:sessions',
    'start-date': '30daysAgo',
    'end-date': 'yesterday',
  },
  chart: {
    type: 'BAR',
    container: 'timeline'
  }
});
  
  
  viewSelector2.on('change', function(ids) {
	 dataChart2.set({query: {ids: ids}}).execute();
  });

  viewSelector3.on('change', function(ids) {
    timeline.set({query: {ids: ids}}).execute();
  });
  /**
   * Render the dataChart on the page whenever a new view is selected.
   */
  viewSelector.on('change', function(ids) {
    dataChart.set({query: {ids: ids}}).execute();
  });
  regions_div.on('change', function(ids) {
    regions_div_data.set({query: {ids: ids}}).execute();
  });
  

});
</script>

</body>
</html>