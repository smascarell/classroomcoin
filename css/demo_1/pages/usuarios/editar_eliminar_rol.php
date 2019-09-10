<?php
session_start();
$errores = array();

  if (isset($_POST['id'])) {
    include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
    $db = new Database();
    $conn = $db->GetConn();
    $id = $_POST['id'];

    if (isset($_POST['editar'])) {
      $db->Close();
      $_SESSION['objeto'] = $_POST['objeto'];
      //$passed_array = unserialize($_POST['objeto']);
      header('location: editar_rol.php?id='.$id);
      exit;

      //exit;
    } else if (isset($_POST['eliminar'])) {
      $query = "DELETE FROM roles WHERE id=$id";
      var_dump($query);
      $result = $db->Query($query);
      $db->Close();
      if ($result > 0) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;
      }
    }
} else {
  header('location: ' . $_SERVER['HTTP_REFERER']);
}
