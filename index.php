<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Netcats Analytics</title>
	<link rel="shortcut icon" type="image/ico" href="favi.png"/>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container" id="home">
		<h1>NetCats Analytics</h1>
		<a href="/search-console/">
			<div class="nav-wrap">
				<div class="material-bloom"></div>
				<div class="nav">Search Console</div>
			</div>
		</a>
		<div class="row">
			<div id="data-box1">
				<?php 
				require_once ('result.php');
				require_once ('new/result-1.php'); 
				require_once ('new/result-2.php'); 
				?>
			</div>
		</div>
	</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/jalc.min.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter-widgets.min.js"></script>

</body>
</html>
