<?php

include_once '../../Libraries/Core/Conexion2.php';
$objeto = new Conexion2();
$conexion = $objeto->Conectar();

//recepción de datos enviados mediante POST desde ajax
$sorteos_disp = $_POST['sorteos_disp'];

$consulta = "SELECT ju.nombre,ju.apellidos,g.dni,g.premio,ju.sucursal from ganadores g INNER JOIN jugador ju on(ju.dni=g.dni) where sorteo=" . $sorteos_disp;

$resultado = $conexion->prepare($consulta);
$resultado->execute();
$cantt = $resultado->rowCount();
if ($cantt > 0) {
    $dataJugada = $resultado->fetchAll(PDO::FETCH_ASSOC);


    $json = array();
    // $json['data']

    foreach ($dataJugada as $datp) {

        //var_dump($datp['id_sorteo']);
        $json[] = array(
            'dni' => $datp['dni'],
            'premio' => $datp['premio'],
            'sucursal' => $datp['sucursal'],
            'nombre' => $datp['nombre'] . ' ' . $datp['apellidos'],

        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;


    $conexion = null;
} else {
    echo 'null';
    $conexion = null;
}

//usuarios de pruebaen la base de datos
//usuario:admin pass:12345
//usuario:demo pass:demo
