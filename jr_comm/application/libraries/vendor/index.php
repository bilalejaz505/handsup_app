<?php

function getService()
{
  // Creates and returns the Analytics service object.

  // Load the Google API PHP Client Library.
  require_once 'autoload.php';

  // Use the developers console and replace the values with your
  // service account email, and relative location of your key file.
  $service_account_email = 'nesma-632@nesma-1216.iam.gserviceaccount.com';
  $key_file_location =  __DIR__ . '/Nesma-0684e421b44b.p12'; 	

  // Create and configure a new client object.
  $client = new Google_Client();
  $client->setApplicationName("HelloAnalytics");
  $analytics = new Google_Service_Analytics($client);

  // Read the generated client_secrets.p12 key.
  $key = file_get_contents($key_file_location);
  $cred = new Google_Auth_AssertionCredentials(
      $service_account_email,
      array(Google_Service_Analytics::ANALYTICS_READONLY),
      $key
  );
  $client->setAssertionCredentials($cred);
  if($client->getAuth()->isAccessTokenExpired()) {
    $client->getAuth()->refreshTokenWithAssertion($cred);
  }

 
  $res = json_decode($client->getAccessToken());
  return $res->access_token;
//printResults($results);exit();
}

function getFirstprofileId(&$analytics) {
  // Get the user's first view (profile) ID.

  // Get the list of accounts for the authorized user.
  $accounts = $analytics->management_accounts->listManagementAccounts();

  if (count($accounts->getItems()) > 0) {
    $items = $accounts->getItems();
    $firstAccountId = $items[0]->getId();

    // Get the list of properties for the authorized user.
    $properties = $analytics->management_webproperties
        ->listManagementWebproperties($firstAccountId);

    if (count($properties->getItems()) > 0) {
      $items = $properties->getItems();
      $firstPropertyId = $items[0]->getId();

      // Get the list of views (profiles) for the authorized user.
      $profiles = $analytics->management_profiles
          ->listManagementProfiles($firstAccountId, $firstPropertyId);

      if (count($profiles->getItems()) > 0) {
        $items = $profiles->getItems();

        // Return the first view (profile) ID.
        return $items[0]->getId();

      } else {
        throw new Exception('No views (profiles) found for this user.');
      }
    } else {
      throw new Exception('No properties found for this user.');
    }
  } else {
    throw new Exception('No accounts found for this user.');
  }
}

function getResults(&$analytics, $profileId) {
  // Calls the Core Reporting API and queries for the number of sessions
  // for the last seven days.
   return $analytics->data_ga->get(
       'ga:' . $profileId,
       '7daysAgo',
       'today',
       'ga:sessions');
}

function printResults(&$results) {
  // Parses the response from the Core Reporting API and prints
  // the profile name and total sessions.
  if (count($results->getRows()) > 0) {

    // Get the profile name.
    $profileName = $results->getProfileInfo()->getProfileName();

    // Get the entry for the first entry in the first row.
    $rows = $results->getRows();
    $sessions = $rows[0][0];

    // Print the results.
    print "First view (profile) found: $profileName\n";
    print "Total sessions: $sessions\n";
  } else {
    print "No results found.\n";
  }
}

$analytics = getService();
//$profile = getFirstProfileId($analytics);
//$results = getResults($analytics, $profile);


?>

<!DOCTYPE html>
<html>
<head>
  <title>Embed API Demo</title>
  <meta charset="utf-8"/>

</head>

<body>

<div id="result"></div>
<div id="resonse"></div>

<!-- Step 1: Create the containing elements. -->

<div id="embed-api-auth-container">

</div>
<!--<div id="chart-container">

</div>-->
<!--<div id="chart-2-container"></div>
<div id="view-selector-container"></div>
<div id="view-selector-2-container"></div>-->
<div id="timeline"></div>
<!--<div id="view-selector-3-container"></div>
-->

<!--<div id="regions_div" style="width: 900px; height: 500px;"></div>-->
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

	//alert(code);
gapi.analytics.ready(function() {

  /**
   * Authorize the user immediately if the user has already granted access.
   * If no access has been created, render an authorize button inside the
   * element with the ID "embed-api-auth-container".
   */
  
  gapi.analytics.auth.authorize({
    container: 'embed-api-auth-container',
    clientid: '244278957135-7ivoaod0n85u0pn4uaptopepltbj3ue9.apps.googleusercontent.com',
	//scope: 'https://www.googleapis.com/auth/analytics'
	 serverAuth: {
    access_token: '<?php echo $analytics;?>',
	
  }
  
  });
  //.access_token
 //  console.log(gapi.auth.getToken());


  /**
   * Create a new ViewSelector instance to be rendered inside of an
   * element with the id "view-selector-container".
   */
/*  var viewSelector = new gapi.analytics.ViewSelector({
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
});*/
  // Render the view selector to the page.
 /* viewSelector.execute();
  viewSelector2.execute();
  viewSelector3.execute();
  regions_div.execute();*/

//The chart type. Possible options are: LINE, COLUMN, BAR, TABLE, and GEO.
  /**
   * Create a new DataChart instance with the given query parameters
   * and Google chart options. It will be rendered inside an element
   * with the id "chart-container".
   */
/*  var dataChart = new gapi.analytics.googleCharts.DataChart({
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
  });*/
/*  var dataChart2 = new gapi.analytics.googleCharts.DataChart({
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
  });*/
  
  //For countries 
  
/*    var regions_div_data = new gapi.analytics.googleCharts.DataChart({
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
  });*/
  
  var timeline = new gapi.analytics.googleCharts.DataChart({
  reportType: 'ga',
  query: {
	'ids': 'ga:116352250',
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
timeline.execute();
  
  
  /*viewSelector2.on('change', function(ids) {
	 dataChart2.set({query: {ids: ids}}).execute();
  });
*/
/*  viewSelector3.on('change', function(ids) {
	  //alert(ids);
    timeline.set({query: {ids: ids}}).execute();
  });*/
  /**
   * Render the dataChart on the page whenever a new view is selected.
   */
/*  viewSelector.on('change', function(ids) {
    dataChart.set({query: {ids: ids}}).execute();
  });
  regions_div.on('change', function(ids) {
    regions_div_data.set({query: {ids: ids}}).execute();
  });*/
  

});

</script>

</body>
</html>

