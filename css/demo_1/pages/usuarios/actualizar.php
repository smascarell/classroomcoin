<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');

$errores = array();
$db = new Database();

$objeto = unserialize($_SESSION['objeto']);
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['apellidos'];
$rol = $_POST['rol'];

$sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email', rol = $rol WHERE id = $id";

$result = $db->Query($sql);

if($result > 0){
    $db->Close();
    //echo "Records was updated successfully.";
    header('location: http://localhost/classroomcoin/css/demo_1/pages/usuarios/');
    exit;

} else{
    echo "ERROR: Could not able to execute $sql. ". $db->error;
    $db->Close();
}

//$row = mysqli_fetch_assoc($result);

  //
  // if (isset($_POST['id'])) {
  //  include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
  //
  //   $db = new Database();
  //   $conn = $db->GetConn();
  //     $id = $_POST['id'];
  //       $query = "DELETE FROM usuarios WHERE id='$id'";
  //       $result = $db->Query($query);
  //       if ($result > 0) {
  //         header('location: ' . $_SERVER['HTTP_REFERER']);
  //         exit;
  //       }
//}
