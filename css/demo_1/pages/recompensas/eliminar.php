<?php
session_start();
  if (isset($_POST['id'])) {
   include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
    $db = new Database();
    $conn = $db->GetConn();
      $id = $_POST['id'];
        $sql = "DELETE FROM recompensas WHERE id='$id'";
        $result = $db->Query($sql);
        $db->Close();
        if ($result > 0) {
          header('location: ' . $_SERVER['HTTP_REFERER']);
          exit;
        }
      }
