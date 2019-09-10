<?php
session_start();
$nombre = $_POST['nombre'];
$valor = $_POST['valor'];
$id = $_POST['id'];

  if (isset($_POST['id'])) {
   include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
    $db = new Database();
    $conn = $db->GetConn();
    $sql = "UPDATE recompensas SET nombre = '$nombre', valor = $valor WHERE id=$id";
    $result = $db->Query($sql);
    if($result > 0){
        $db->Close();
        //echo "Records was updated successfully.";
        header('location: http://localhost/classroomcoin/css/demo_1/pages/recompensas/');
        exit;

    } else{
        echo "ERROR: Could not able to execute $sql. ". $db->error;
        $db->Close();
    }
  }
