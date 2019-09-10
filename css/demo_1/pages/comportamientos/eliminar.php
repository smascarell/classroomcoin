<?php
session_start();
  if (isset($_GET['id'])) {
   include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
    $db = new Database();
    $conn = $db->GetConn();
      $id = $_GET['id'];
        $sql = "DELETE FROM comportamientos WHERE id='$id'";
        $result = $db->Query($sql);
        $db->Close();
        if ($result > 0) {
          header('location: ' . $_SERVER['HTTP_REFERER']);
          exit;
        }
      }
