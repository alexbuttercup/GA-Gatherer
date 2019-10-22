<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Netcats Analytics</title>
  <link rel="shortcut icon" type="image/ico" href="../favi.png"/>
    <link rel="stylesheet" href="../style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <style>
    .container .row {
      width: 90%;
    }
    table th:first-child, table td.cell:first-child {
      width: 40%;
    }
    table th:nth-child(2), table td.cell:nth-child(2) {
      width: 30%;
    }
    table th:nth-child(3), table th:nth-child(4), table th:nth-child(5),
    table td.cell:nth-child(3), table td.cell:nth-child(4), table td.cell:nth-child(5) {
      width: 10%;
    }
    table td.cell:nth-child(5) {
      text-align: center;
    }
    tr.row-header, tr.site-row {
      justify-content: flex-start;
    }
    .cell {
      height: auto;
    }

  </style>
  
  <div class="container" id="home">
    <h1>NetCats Search Console</h1>
    <a href="/">
      <div class="nav-wrap">
        <div class="material-bloom"></div>
        <div class="nav">Analytics</div>
      </div>
    </a>
      <!--<button class="button clearcache" onclick="localStorage.clear(); location = location" style="">Clear browser cache</button>-->
      <div class="row">
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../js/jalc.min.js"></script>
        <script type="text/javascript" src="../js/jquery.tablesorter.js"></script>
        <script type="text/javascript" src="../js/jquery.tablesorter-widgets.min.js"></script>
        
      <div id="data-box1">
        <?php 
        require_once ('result-1.php'); 
        require_once ('result-2.php');
        ?>
      </div>
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

  </body>
</html>