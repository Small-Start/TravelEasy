<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Sign up</title>
  <SCRIPT TYPE="text/javascript" src="js/sweetalert.min.js"></SCRIPT>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>

</head>
<body>
<style>
  .jumbotron{
    background-color:rgba(238, 238, 238, 0.56);
    margin-top:10%;
  }

</style>
<?php
  require_once('connectvars.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM user WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO user (username, password) VALUES ('$username', SHA('$password1'))";
        mysqli_query($dbc, $query);

        // Confirm success with the user
        echo '<p>Your new account has been successfully created. You are now ready to log in</a>.</p>';
         $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header('Location: ' . $home_url);
        mysqli_close($dbc);
        exit();
      }
      else {
       ?>
       
        <?php
        $username = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }

  mysqli_close($dbc);
?>

 
  <form  role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <fieldset>
     <div class="col-md-4 jumbotron col-xs-8 col-xs-offset-2 col-md-offset-4 row">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 form-group">
          <label for="username">Username:</label>
      <input type="text" id="username" class="form-control" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
    </div>
     </div>
     <div class="row">
      <div class="col-md-offset-3 col-md-6 form-group">
        <label for="password1">Password:</label>
      <input type="password" id="password1" class="form-control" name="password1" /><br />
        </div>
   </div>
     <div class="row">
      <div class="col-md-offset-3 col-md-6 form-group">
        <label for="password2">Password (retype):</label>
      <input type="password" id="password2" class="form-control" name="password2" /><br />
        <input type="submit" class="btn btn-primary" value="Sign Up" name="submit" />
    </div>
    </div>

  </div>
    </fieldset>
   
  </form>
</body>
<script type="text/javascript">
$.backstretch([
      "t1.jpg",
      "t2.jpg",
      "t3.jpg"    
      ], {
        fade: 2050,
        duration: 1000
    }); </script>
</html>
