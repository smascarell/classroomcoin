<?php
session_start();
var_dump($_POST);
$errores = array();
$recompensa = $_POST['recompensa'];
$valor = $_POST['valor'];

if (empty($recompensa)) {
    array_push($errores, "El campo comportamiento no puede estar vacío");
    return false;
}
if (empty($valor)) {
    array_push($errores, "El campo valor tiene que tener algún valor");
    return false;
}

 if (count($errores) != 0) {
   return false;
 }

  if (isset($_POST['insertarNuevo'])) {
    include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
     $db = new Database();
     $sql = "INSERT INTO recompensas(nombre,valor) VALUES('$recompensa','$valor')";
     $result = $db->Query($sql);
     $db->Close();
    if ($result > 0) {
     header('location: ../recompensas/');
  }
}
