<?php
session_start();
var_dump($_GET);
// $errores = array();
// $comportamiento = $_POST['nombre'];
// $valor = $_POST['valor'];
//
// if (empty($comportamiento)) {
//     array_push($errores, "El campo comportamiento no puede estar vacío");
//     return false;
// }
// if (empty($valor)) {
//     array_push($errores, "El campo valor tiene que tener algún valor");
//     return false;
// }
//
//  if (count($errores) != 0) {
//    return;
//
//  }
//   if (isset($_POST['insertarNuevo'])) {
//     include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
//      $db = new Database();
//      $sql = "INSERT INTO comportamientos(nombre,valor,imagen) VALUES('$comportamiento','$valor','')";
//     $result = $db->Query($sql);
//     if ($result > 0) {
//      header('location: index.php');
//      exit;
//   }
// }
