<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Netcats Analytics</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/ico" href="../favi.png"/>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" type="text/css" href="sc-add-style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>
  <div class="container" id="home">
    <h1>NetCats Search Console</h1>
    <a href="/">
      <div class="nav-wrap">
        <div class="material-bloom"></div>
        <div class="nav">Analytics</div>
      </div>
    </a>
    <div class="row">
      <div id="data-box1">

        <input id="myInput" type="text" placeholder="Type the url">

        <table id="data-box1" class="bigtable tablesorter">
          <thead>
            <tr class="row-header">
              <th>Website</th>
              <th>Sessions</th>
              <th>Organic</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php 
              require_once ('result-1.php'); 
              require_once ('result-2.php');
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/jalc.min.js"></script>
<script type="text/javascript" src="../js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="../js/jquery.tablesorter-widgets.min.js"></script>

</body>
</html>
