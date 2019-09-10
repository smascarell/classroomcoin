<?php
include('Database.php');
session_start();

// variables
$usuario = "";
$email    = "";
$errores = array();

$database = new Database();
$conn = $database->GetConn();

// REGISTRO DE USUARIO
if (isset($_POST['reg_usuario'])) {
    // VARIABLES DEL FORMULARIO
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    // COMPROBACIÓN DE DATOS
    if (empty($nombre)) {
        array_push($errores, "El campo nombre está vacío");
    }
    if (empty($apellidos)) {
        array_push($errores, "El campo apellidos está vacío");
    }
    if (empty($usuario)) {
        array_push($errores, "El campo usuario está vacío");
    }
    if (empty($email)) {
        array_push($errores, "El campo usuario está vacío");
    }
    if (empty($password_1)) {
        array_push($errores, "El campo password está vacío");
    }
    if ($password_1 != $password_2) {
        array_push($errores, "Los passwords no coinciden");
    }

    $comprobar_usuario = "SELECT * FROM usuarios WHERE usuario='$usuario' OR email='$email' LIMIT 1";
    $resultado = $database->Query($comprobar_usuario);
    $usu = $database->Rows();

    // $resultado = mysqli_query($conn, $comprobar_usuario);
    // $usu = mysqli_fetch_assoc($resultado);

    if ($usu) { // if user exists
        if ($usu['usuario'] === $usuario) {
            array_push($errores, "El usuario ya existe");
        }

        if ($usu['email'] === $email) {
            array_push($errores, "El email ya existe");
        }
    }

    // REGISTRAR EL USUARIO
    if (count($errores) == 0) {

    //ENCRIPTAR EL PASSWORD ANTES DE INSERTARLO
        $password = md5($password_1);
        $query = "INSERT INTO usuarios (nombre, apellidos, usuario, email, password)
  			  VALUES('$nombre','$apellidos', '$usuario', '$email', '$password')";
        // mysqli_query($conn, $query);
        $database->Query($query);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['logeado'] = "Estás dado de alta como " + $usuario;
        header('location: index.php');
    }
}
