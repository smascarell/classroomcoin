<?php
session_start();
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$grupo = $_POST['grupo'];
$profesor_id = $_POST['profesor_id'];

  if (isset($_POST['id'])) {
   include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
    $db = new Database();
    //$conn = $db->GetConn();
    $sql = "UPDATE clases SET nombre = '$nombre', grupo = ('$grupo'), profesor_id = ('$profesor_id') WHERE id=$id";
    $result = $db->Query($sql);
    $db->Close();
    if($result > 0){
        //echo "Records was updated successfully.";
        header('location: http://localhost/classroomcoin/css/demo_1/pages/clases/');
        exit;

    } else{
        echo "ERROR: Could not able to execute $sql. ". $db->error;
        header('location: http://localhost/classroomcoin/css/demo_1/pages/clases/');
    }
  }
  else {
    header("Refresh:0");
  }
