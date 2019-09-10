<?php include('login_usuario.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login ClassRoomCoin</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Login ClassRoomCoin</h2>
  </div>

  <form method="post" action="login.php">
  	<?php include('errores.php'); ?>

  	<div class="input-group">
  		<label>Usuario</label>
  		<input type="text" name="usuario" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
      <input type="submit" class="btn" name="login_usuario" value="Login">
  	</div>
  	<p>
  		¿Todavía no eres miembro? <a href="registro.php">Regístrate</a>
  	</p>
  </form>
</body>
</html>
