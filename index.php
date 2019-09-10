<?php
  session_start();

  if (!isset($_SESSION['usuario'])) {
      $_SESSION['msg'] = "Debes acceder al sistema para poder seguir";
      // header('location: login.php');
      // exit;
  }
  if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['usuario']);
      header("location: login2.php");
      exit;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
  <div id="menubar">
  <center>
  <ul>
  		<li><a href="index.php">Home</a></li>
  		<li><a href="registro.php">Register</a></li>
  		<li><a href="login.php">Login</a>
  		<ul>
  				<li id="buttonadmin"><a href="#adminlogin">Admin</a></li>
  				<li id="buttonteacher"><a href="#teacherlogin">Teacher</a></li>
  			</ul>
  		</li>
  		<li><a href="aboutus.php">About-Us</a></li>
  		<li><a href="ourcontact.php">Our-Contacts</a></li>
  </ul>
  </center>

  </div>
</div>

<div id="body" class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['exito'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
              echo $_SESSION['logeado'];
              unset($_SESSION['logeado']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['usuario'])) : ?>
    	<p>Bienvenido/a a ClassRoomCoin
        <strong>
          <?php echo $_SESSION['usuario']; ?>
        </strong>
      </p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>
