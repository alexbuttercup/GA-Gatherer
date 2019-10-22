<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Netcats Analytics</title>
	<link rel="shortcut icon" type="image/ico" href="favi.png"/>
    <link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .prev-month {
      margin: 0 auto;
      display: block;
      text-align: center;
      position: absolute;
      left: 0;
      top: 0;
      box-sizing: border-box;
    }
    .prev-month a {
      display: inline-block;
      margin: 0 auto;
      padding: 10px;
      font-size: 14px;
      color: #fff;
      text-decoration: underline;
      border: 1px dashed #fff;
      box-shadow: 1px 1px 3px rgba(0,0,0,0.8);
    }
  </style>
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
    <div class="prev-month">
      <a href="/prev-month.php">Previous month results</a>
    </div>
      <!--<button class="button clearcache" onclick="localStorage.clear(); location = location" style="">Clear browser cache</button>-->
      <div class="row">
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/jalc.min.js"></script>
        <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
        <script type="text/javascript" src="js/jquery.tablesorter-widgets.min.js"></script>

<p style="color: #fff;" class="total"></p>

<div id="data-box1">
  <?php 
  require_once ('result.php');
  require_once ('new/result-1.php'); 
  require_once ('new/result-2.php'); 
  ?>
<!--  <tr><th style="text-transform: uppercase; border: none;">Gathering the stats...</th></tr>
  <tr><td><img class="ajax-loader" src="ajax-loader.gif" /></td></tr>-->
</div>
        
<!--        <script>
  $(document).ready(function(){
        $.ajax({ 
          type: 'POST', 
          url: 'query-1.php', 
          localCache: true, 
          error: function (jqXHR, textStatus, errorThrown) {
                  alert('Unexpected error. Please, wait for a minute and then refresh the page.');
          },
          cacheTTL: 48,
                }).done(function (response) {
                      $('#data-box1').html(response);
                  });
});
</script>-->
      </div>
  </div>

<script type="text/javascript">
  (function () {
    "use strict";

    var button = document.querySelector('.material-bloom'),
        rippleSize = button.clientWidth * 1.5;
    
    function addRipple(e, i) {
        var delay = 30,
            posX = e.offsetX,
            posY = e.offsetY,
            ripple = document.createElement('div');
        
        ripple.classList.add('ripple');
        ripple.style.left = (posX - (rippleSize / 2)) + 'px';
        ripple.style.top = (posY - (rippleSize / 2)) + 'px';
        ripple.style.height = rippleSize + 'px';
        ripple.style.width = rippleSize + 'px';
        ripple.style.borderRadius = (rippleSize / 2) + 'px';
        
        if (button.hasChildNodes()) {
            button.insertBefore(ripple, button.firstChild);
        } else {
            button.appendChild(ripple);
        }
        
        setTimeout(function () {
            ripple.style['-webkit-transform'] = 'scale(1)';
            ripple.style['-moz-transform'] = 'scale(1)';
            ripple.style.transform = 'scale(1)';
            ripple.style.opacity = 0;
        }, delay);
        
        setTimeout(function () {
            button.removeChild(ripple);
        }, 300);
    }
    
    button.addEventListener('click', addRipple, false);
    
}());
</script>
<script type="text/javascript">
/*$('.sessions').each(function()
{
  var sum = Number(0);
  sum += parseInt($(this).text(), 10);
  $('.total').append(sum);
  console.log(sum);
});*/


</script>
  </body>
</html>