<?php

include_once '../../Libraries/Core/Conexion2.php';
$objeto = new Conexion2();
$conexion = $objeto->Conectar();

var_dump($conexion);
$sqlData = "SELECT * from sorteo";
$resultadox = $conexion->prepare($sqlData);
$resultadox->execute();

$data = $resultadox->fetchAll(PDO::FETCH_ASSOC);
$listas = '<option value="0">Elige una opción</option>';
foreach ($data as $datpS) {

  $nombre = $datpS['nombre'];
  $id = $datpS['id'];
  $listas .= "<option value='$id'>$nombre</option>";
} 

print_r($listas); 
//exit();


?>