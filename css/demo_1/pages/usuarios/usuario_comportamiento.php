<?php

include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
$db = new Database();

$comportamiento_id = $_GET['comportamiento_id'];
$usuario_id = $_GET['usuario_id'];

$sql = "INSERT INTO usuario_comportamiento(comportamiento_id,usuario_id) VALUES($comportamiento_id,$usuario_id)";
//
// #Insert a new Record
$result = $db->Query($sql);

if ($result > 0) {
  insertar_blockchain_comportamientos($comportamiento_id,$usuario_id);
  //header('location: '. '/classroomcoin/css/demo_1/pages/usuarios?rol=2');
}

function insertar_blockchain_comportamientos($comportamiento_id, $usuario_id){

  $comportamientosJSON = 'comportamientos.json';
  $comportamientos = array();

  if(!file_exists($comportamientosJSON)) {
    $nuevoArray = array();

    $bloque_genesis = array(
       'index' => 0,
       'usuario' => 0,
       'hash' => hash('md5',time()), //se utiliza el timestamp como hash inicial
       'hashAnterior' => 0,
       'comportamiento' => 0,
       'timestamp' => time()
    );
    array_push($comportamientos,$bloque_genesis);
    $fp = fopen($comportamientosJSON, 'w');
    fwrite($fp, json_encode($comportamientos));
    fclose($fp);
  }

  $data = file_get_contents($comportamientosJSON);
  $comportamientos = json_decode($data, true);

  $indexNuevoBloque = $comportamientos[0]['index']+1;
  $bloqueAnterior = end($comportamientos);

  $nuevoBloque = array(
    'index' => $bloqueAnterior['index']+1,
    'usuario' => $usuario_id,
    'comportamiento' => $comportamiento_id,
    'hash' => hash('md5', $usuario_id . $comportamiento_id),
    'hashAnterior' => $bloqueAnterior['hash'],
    'timestamp' => time()
  );

  array_push($comportamientos, $nuevoBloque);
  $jsonData = json_encode($comportamientos);
  file_put_contents('comportamientos.json', $jsonData);

  header("Location: .");
  die();
}
