<?php
session_start();
$errores = array();

  if (isset($_POST['login_usuario'])) {

    // LOGIN USUA RIO
    include('Database.php');

    $db = new Database();
    $conn = $db->GetConn();

    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($usuario)) {
        array_push($errores, "El campo usuario está vacío");
    }
    if (empty($password)) {
        array_push($errores, "El campo password está vacío");
    }
    if (count($errores) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
        $result = $db->Query($query);
        $row = mysqli_fetch_assoc($result);

        if ($row['id']) {
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['usuario'] = $usuario;
            $db->Close();
            //set_include_path(dirname(__FILE__));
            header('location: css/demo_1/pages/usuarios/');
            exit;
            // switch ($_SESSION['rol']) {
            //   case '1':
            //     header('location: css/demo_1/pages/usuarios/admin.php');
            //     exit;
            //     break;
            //   case '2':
            //     header('location: css/demo_1/pages/usuarios/alumnos.php');
            //     exit;
            //     break;
            //   case '3':
            //     header('location: css/demo_1/pages/usuarios/profesores.php');
            //     exit;
            //     break;
            //   default:
            //     header('location: index.php');
            //     exit;
            //     break;
            // }

        }else {
            array_push($errores, "Error de usuario/password");
        }
    }
}
