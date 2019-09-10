<?php
session_start();
$errores = array();
  if (isset($_POST['nuevo_usuario'])) {
    include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
    $db = new Database();
    //$conn = $db->GetConn();

    // $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    // $password = mysqli_real_escape_string($conn, $_POST['password']);
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];


    if (empty($nombre)) {
        array_push($errores, "El campo nombre está vacío");
    }
    if (empty($usuario)) {
        array_push($errores, "El campo usuario está vacío");
    }
    if (empty($password)) {
        array_push($errores, "El campo usuario está vacío");
    }
    if (empty($apellidos)) {
        array_push($errores, "El campo password está vacío");
    }
    if (empty($email)) {
        array_push($errores, "El campo email está vacío");
    }

    if (count($errores) == 0) {
        $password = md5($password);
        $query = "INSERT INTO usuarios(nombre,apellidos,usuario,password,rol,email) VALUES('$nombre','$apellidos','$usuario','$password',$rol,'$email')";
        $result = $db->Query($query);
        if ($result > 0) {
          header('location: '. '/classroomcoin/css/demo_1/pages/usuarios/');
        }
    }
}
