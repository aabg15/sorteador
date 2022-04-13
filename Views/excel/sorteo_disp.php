<?php


/* function getSorteoDisponible()
{
    echo "<?php echo base_url(); ?>";
    require('config.php');
    $fecha_validar = $_POST['fecha_validar'];
    $sqlData = "SELECT * from sorteo";
    $sql = mysqli_query($con, $sqlData);
    $listas = '<option value="0">Elige una opción</option>';
    while ($row = mysqli_fetch_assoc($sql)) {
        //$fechas_validas = $row['fecha_fin'];
        //$nombre_sorteo = $row['nombre'];
        $listas .= "<option value='$row[id_sorteo]'>$row[nombre]</option>";

    }
    
    return $listas;
} */

//include_once 'http://localhost/sorteador/Libraries/Core/Conexion.php';
include_once '../../Libraries/Core/Conexion2.php';
$objeto = new Conexion2();
$conexion = $objeto->Conectar();

var_dump($conexion);
$sqlData = "SELECT * from sorteo where estado like 'SS'";
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

function getSorteoDisponible()
{

    /*  $sqlData = "SELECT * from sorteo";
    $x=$conexi;
    $resultadox = $conexion->prepare($sqlData);
    $resultadox->execute();
    echo $resultadox;
    exit();

    //$sql = mysqli_query($conexion, $sqlData);
    $listas = '<option value="0">Elige una opción</option>';
    while ($row = mysqli_fetch_assoc($sql)) {
        //$fechas_validas = $row['fecha_fin'];
        //$nombre_sorteo = $row['nombre'];
        $listas .= "<option value='$row[id_sorteo]'>$row[nombre]</option>";
    }
    return $listas; */
}

//var_dump($listas);
//exit();
//return $listas;
//var_dump(getSorteoDisponible());
//exit();

?>