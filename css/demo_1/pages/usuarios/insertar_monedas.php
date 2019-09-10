<?php
include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
$db = new Database();

$sql = "INSERT INTO usuarios (monedas) VALUES($_POST[monedas])";
$id = $_POST['id'];

#Insert a new Record
$result = $db->Query("UPDATE USUARIOS SET `monedas` = `monedas`+ 1 WHERE id = $id");
var_dump($result);
//$rows = $db->Rows();
// if($result > 0){
//   return '$db->mysqli_fetch_assoc($result)';
// }
?>
