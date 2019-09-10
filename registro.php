<?php include('registrar_usuario.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>ClassRoomCoin - Sistema de registro de usuarios</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Registro de usuario ClassRoomCoin</h2>
  </div>

  <form method="post" action="registro.php">
  	<?php include('errores.php'); ?>
    <div class="input-group">
  	  <label>Nombre</label>
  	  <input type="text" name="nombre" value="<?php echo $nombre ?? ''; ?>">
  	</div>
    <div class="input-group">
      <label>Apellidos</label>
      <input type="text" name="apellidos" value="<?php echo $apellidos ?? ''; ?>">
    </div>
    <div class="input-group">
      <label>Usuario</label>
      <input type="text" name="usuario" value="<?php echo $usuario ?? ''; ?>">
    </div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email ?? ''; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirmar password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
      <input type="submit" class="btn" name="reg_usuario" value="Registrar">
  	</div>
  	<p>
  		¿Ya estás dado de alta? <a href="login.php">Login</a>
  	</p>
  </form>
</body>
</html>
