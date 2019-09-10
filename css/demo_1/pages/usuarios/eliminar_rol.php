<?php
session_start();
$errores = array();
  if (isset($_GET['r'])) {

   include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');

    $db = new Database();
    $conn = $db->GetConn();
      $rol = $_GET['r'];
        $query = "DELETE FROM rol WHERE id=$_GET['r']";
        $result = $db->Query($query);
        if ($result > 0) {
          header('location: ' . $_SERVER['HTTP_REFERER']);
          exit;
        }
}
