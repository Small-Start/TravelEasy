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
$lat= $_GET['lat'];
echo $lat;
$lng= $_GET['lng'];
echo $lng;
$shelter = $_GET['shelter'];
echo $shelter;
$atmnote = $_GET['atmnote'];
echo $atmnote;
$user= $_SESSION['username'];
$dbc = mysqli_connect('localhost', 'root', '', 'travel')
    or die('Error connecting to MySQL server.');

  $query = "INSERT INTO notes (username,lat,lng,shelter,atmnote)".
    "VALUES ('$user','$lat','$lng','$shelter','$atmnote')";

  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');
echo $result;
  mysqli_close($dbc);
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/view.php';
  header('Location: ' . $home_url);

 
?>