<?php
session_start();
var_dump($_POST);
$errores = array();
$nombre = $_POST['nombre_clase'];
$curso = intval($_POST['curso']);
$profesor_id = intval($_POST['profesor_id']);

// if (empty($recompensa)) {
//     array_push($errores, "El campo comportamiento no puede estar vacío");
//     return false;
// }
// if (empty($valor)) {
//     array_push($errores, "El campo valor tiene que tener algún valor");
//     return false;
// }
 //
 // if (count($errores) != 0) {
 //   return false;
 // }

  if (isset($_POST['insertarNuevo'])) {
    include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
    $db = new Database();
    $sql = "INSERT INTO clases(nombre,curso,profesor_id) VALUES('$nombre',$curso,$profesor_id)";
    $result = $db->Query($sql);
    $db->Close();
    if ($result > 0) {
     header('location: .');
  }
}
