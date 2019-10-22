<?php

$start = microtime(true);

// Load the Google API PHP Client Library.
require_once 'vendor/autoload.php';

//Load the array of domain names and View ID's
require_once 'array.php';

function initializeAnalytics() {
	// Creates and returns the Analytics Reporting service object.

	// Use the developers console and download your service account
	// credentials in JSON format. Place them in this directory or
	// change the key file location if necessary.
	$KEY_FILE_LOCATION = 'service-account-credentials.json';

	// Create and configure a new client object.
	$client = new Google_Client();
	$client->setApplicationName("Hello Analytics Reporting");
	$client->setAuthConfig($KEY_FILE_LOCATION);
	$client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
	$analytics = new Google_Service_AnalyticsReporting($client);

	return $analytics;
}

function getReport($analytics, $firstDay, $today, $VIEW_ID) {
	// Replace with your view ID, for example XXXX.

	$firstDay = date('Y-m-01');
	$today = date('Y-m-d');

	// Create the DateRange object.
	$dateRange = new Google_Service_AnalyticsReporting_DateRange();
	$dateRange->setStartDate($firstDay);
	$dateRange->setEndDate($today);

	// Create the Metrics object.
	$sessions = new Google_Service_AnalyticsReporting_Metric();
	$sessions->setExpression("ga:sessions");
	$sessions->setAlias("sessions");

	// Create the Metrics object.
	/*$users = new Google_Service_AnalyticsReporting_Metric();
	$users->setExpression("ga:users");
	$users->setAlias("users");*/

	// Create the Metrics object.
	$organicSearches = new Google_Service_AnalyticsReporting_Metric();
	$organicSearches->setExpression("ga:organicSearches");
	$organicSearches->setAlias("organicSearches");

	// Create the Metrics object.
	/*$avgPageLoadTime = new Google_Service_AnalyticsReporting_Metric();
	$avgPageLoadTime->setExpression("ga:avgPageLoadTime");
	$avgPageLoadTime->setAlias("avgPageLoadTime");*/


	// Create the ReportRequest object.
	$request = new Google_Service_AnalyticsReporting_ReportRequest();
	$request->setViewId($VIEW_ID);
	$request->setDateRanges($dateRange);
	$request->setMetrics(array($sessions, /*$users, */$organicSearches/*, $avgPageLoadTime*/));

	$body = new Google_Service_AnalyticsReporting_GetReportsRequest();
	$body->setReportRequests( array( $request) );
	return $analytics->reports->batchGet( $body );
}

$analytics = initializeAnalytics();

foreach($netPull as $key => $value) {
	$result = getReport($analytics, $firstDay, $today, $VIEW_ID = $value);
	$sessionsThisMonth = $result['reports'][0]['data']['rows'][0]['metrics'][0]['values'][0];
	$organicSearches = $result['reports'][0]['data']['rows'][0]['metrics'][0]['values'][1];
	echo '<tr class="site-row"><td class="cell">' . $key . '</td><td colspan="2" class="cell result sessions">' . $sessionsThisMonth . '</td><td class="cell result organic">' . $organicSearches . '</td></tr>';
	usleep(70); //decreasing delays between next query
}

echo '<p>Analytics gathered by: '.round(microtime(true) - $start, 4).' seconds</p>';

?>
