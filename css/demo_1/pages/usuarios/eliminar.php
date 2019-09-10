<?php
session_start();
$errores = array();
  if (isset($_POST['id'])) {

   include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');

    $db = new Database();
    $conn = $db->GetConn();
      $id = $_POST['id'];
        $query = "DELETE FROM usuarios WHERE id='$id'";
        $result = $db->Query($query);
        if ($result > 0) {
          header('location: ' . $_SERVER['HTTP_REFERER']);
          exit;
        }
}
