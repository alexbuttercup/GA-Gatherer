<?php
	$start = microtime(true);
	
	date_default_timezone_set(Etc/GMT+2);
	$date = date('d/m/Y h:i:s');

	require_once '../vendor/autoload.php';

	require_once 'domains-array.php';

		// Creates and returns the Analytics Reporting service object.

		// Use the developers console and download your service account
		// credentials in JSON format. Place them in this directory or
		// change the key file location if necessary.
		$KEY_FILE_LOCATION = 'test-analytics-api-233808-c2bfe335352d.json';

		// Create and configure a new client object.
		$client = new Google_Client();
		$client->setApplicationName("SC Reporting");
		$client->setAuthConfig($KEY_FILE_LOCATION);
		$client->addScope('https://www.googleapis.com/auth/webmasters');
		
		$serviceWebmasters = new Google_Service_Webmasters( $client );
		
		$listURLs = $serviceWebmasters->sites->listSites()->siteEntry;

		$postBody = new Google_Service_Webmasters_SearchAnalyticsQueryRequest( [
		'startDate'  => date('Y-m-d', strtotime('-1 months')),
		'endDate'    => date('Y-m-d'),
		'dimensions' => [
			'query',
			'device',
			'page'
		],
		'rowLimit' => 10,
		'startRow' => 0
		] );

		?>

		<input id="myInput" type="text" placeholder="Type the url">

		<script>
		$(document).ready(function(){
		  $("#myInput").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#myTable tr").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });
		});
		  
		$(function() {
		  $(".bigtable").tablesorter();
		});

		</script>

		<table id="data-box1" class="bigtable tablesorter">
		          <thead>
		            <tr class="row-header">
		            <th>URL</th>
		            <th>Key</th>
		            <th>Position</th>
		            <th>Clicks</th>
		            <th>Impressions</th>
		            </tr>
		          </thead>
		          <tbody id="myTable">

		<?php

		$slice1 = array_slice( $domains, 0, 120, true);
		foreach($slice1 as $value) {
			$gotInfo = $serviceWebmasters->searchanalytics->query('https://'.$value, $postBody)['rows'];
			//echo '<pre>',print_r($gotInfo),'</pre>';
			if(! empty($gotInfo)) {
				for($i = 0; $i <= 10; $i++) {
	                if(empty($gotInfo[$i]['keys'][2])) {
	                	break;
	                }
					echo '<tr class="site-row">';
					echo '<td class="cell">' . $gotInfo[$i]['keys'][2] . '</td>';
					echo '<td class="cell">' . $gotInfo[$i]['keys'][0] . '</td>';
					echo '<td class="cell">' . round($gotInfo[$i]['position'], 2) . '</td>';
					echo '<td class="cell">' . $gotInfo[$i]['clicks'] . '</td>';
					echo '<td class="cell">' . $gotInfo[$i]['impressions'] . '</td>';
	                echo '</tr>';
				}
			}
            usleep(50);
		}

echo '<p style="font-size: 12px; color: #fff; float: right;">' . $date . '</p>';
echo '<p style="font-size: 12px; color: #fff; float: left;">Part #1 gathered by: '.round(microtime(true) - $start, 4).' seconds | </p>';

?>
	<!--</tbody>
</table>-->
<?php

/*		$gotInfo = $serviceWebmasters->searchanalytics->query('https://1xbet-bonus.bet', $postBody);
		if(empty($gotInfo)) {
			echo '1<br>';
			echo '<pre>',print_r($gotInfo),'</pre>';
		}
		else {
			echo '2<br>';
			echo '<pre>',print_r($gotInfo),'</pre>';
		}*/
?>