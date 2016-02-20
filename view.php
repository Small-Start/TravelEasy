<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['username'])) {
    if (isset($_COOKIE['username'])) {
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
   if((!isset($_SESSION['username'])) && (!isset($_COOKIE['username'])))
  {
	  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header('Location: ' . $home_url);
  }
?>
<html xmlns="http://www.w3.org/1999/xhtml" ng-app="indexapp">
<head>
    <title></title>
</head>
  <style>
    body{
        font-family: 'Roboto', sans-serif;
    }
    .brand{
        font-family:'Roboto', sans-serif;
        padding:2%;
        font-size:1.9em;
        text-decoration:none;

    }
    </style>
<body ng-controller="indexcontroller" >
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
     <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="functionmap.js"></script>
  <SCRIPT TYPE="text/javascript" src="js/sweetalert.min.js"></SCRIPT>
    <div class="top-navigation">
      <nav>
    <div class="indigo nav-wrapper">
      <a href="#" class="brand">TravelEasy</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><?php
  if (isset($_SESSION['username'])) { 
  echo '<a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a>';
  }
  ?>
  </div></a></li>
      </ul>
    </div>
  </nav>
    </div>
    
    <div class="jumbotron"id="dvMap" style="width: 100%; height: 500px">
       
    </div>
   <div ng-></div>

 </div>
 </div>

</body>
</html>