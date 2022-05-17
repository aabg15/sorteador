<?php
$fecha = date('Y-m-d');
$objeto = new Conexion3();
$conexion = $objeto->Conectar();

$sqlData = "SELECT * from sorteo where estado like 'SS' AND fecha like '" . $fecha . "'";
$resultadox = $conexion->prepare($sqlData);
$resultadox->execute();
//var_dump($resultadox);
if ($resultadox->rowCount() > 0) {

  $consultaIdSorteo = "SELECT MIN(`id`) as total from `sorteo` where estado like 'SS' AND fecha like '" . $fecha . "'";
  $resultadoid = $conexion->prepare($consultaIdSorteo);
  $resultadoid->execute();
  $dataid = $resultadoid->fetchAll(PDO::FETCH_ASSOC);

  if ($dataid[0]['total'] != NULL) {
    foreach ($dataid as $datid) {
      $id_sorteo = $datid['total'];
    }
  }
  //echo 'id del sorteo a jugarse',$id_sorteo;
  //exit();


  //Saber si el sorteo tiene jugadores

  $sqljugador = "SELECT COUNT(`id`) as total from jugador where idsorteo=".$id_sorteo;
  $resul = $conexion->prepare($sqljugador);
  $resul->execute();
  $dataJ = $resul->fetchAll(PDO::FETCH_ASSOC);
  $d= $dataJ[0]['total'] ;
  if($d=='0'){
    //no tiene registros
    //echo 'si';
    header("location: " . base_url() . "excel");
  }else{
    //echo 'no';
  }



  //trabajar en base a ese sorteo
  $aprueba = array();
  $consulta = "SELECT * FROM sorteo where id=" . $id_sorteo;
  $resultado = $conexion->prepare($consulta);
  $resultado->execute();
  $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
  foreach ($data as $datx) {
    $nombresorteo = $datx['nombre'];
    $reglas = $datx['reglas'];
    $premio = $datx['premio'];
    $imagen = $datx['imagen_premio'];
    $cant_ganadores = $datx['cantidad_intento'];
  }

?>

  <style>
    #tituloJuego {
      color: #df040b;
    }
  </style>

  <?php encabezado() ?>

  <input type="hidden" name="nombresorteo" id="nombresorteo" value="<?php echo $nombresorteo; ?>">
  <input type="hidden" name="reglas" id="reglas" value="<?php echo $reglas; ?>">
  <input type="hidden" name="premio" id="premio" value="<?php echo $premio; ?>">
  <input type="hidden" name="imagen" id="imagen" value="<?php echo $imagen; ?>">
  <input type="hidden" name="cant_ganadores" id="cant_ganadores" value="<?php echo $cant_ganadores; ?>">

  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <br>
        <h1 class="text-center" id="tituloJuego">Sorteo '<?php echo $nombresorteo; ?>'</h1>

        <div class="main-content">

          <div class="row-5">
            <div class="card" style="border-color: #ff8000;">
              <div class="card-body">
                <form class="needs-validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>juego/palanca" autocomplete="off">
                  <div class="form-row">
                    <input type="hidden" name="id_sorteo" id="id_sorteo" value="<?php echo $id_sorteo; ?>">
                    <input type="hidden" name="premio" id="premio" value="<?php echo $premio; ?>">
                    <input type="hidden" name="cant_ganadores" id="cant_ganadores" value="<?php echo $cant_ganadores; ?>">


                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="validationCustom05">Fecha: </label>
                        <input type="date" id="fechainicio" name="fechainicio" class="form-control" disabled value="<?php echo $fecha; ?>">
                      </div>
                    </div>

                    <div class="col-md-6 mb-3">
                      <center>
                        <div class="form-group">
                          <label for="reglas">Reglas: </label>
                          <?php echo $reglas; ?>
                        </div>
                      </center>
                    </div>

                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="validationCustom01">Premio: </label>
                        <input type="text" class="form-control" id="premio5letra" name="premio5letra" disabled value="<?php echo $premio; ?>">
                      </div>

                    </div>

                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="validationCustom01">Cantidad de ganadores</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" disabled value="<?php echo $cant_ganadores; ?>">
                      </div>

                    </div>

                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="foto">Imagen del Premio: </label>
                        <img class="img-thumbnail" src="<?php echo base_url() . "Assets/images/sorteo/" . $imagen; ?>" width="250">
                      </div>
                    </div>

                    <!-- <div id="divbotonjugar">
                      <button type="submit" style="position: absolute;top: 32%; margin: 15%; border-color: white; background-color: transparent"><img src="<?php echo base_url() . "Assets/img/jugarbtn.PNG" ?>" height="120" width="120" /></button>
                    </div> -->


                    <div style="text-align: center;">
        <button type="submit" class="btn animate__animated animate__rotateIn" style="position: static;top:37%;margin:19%">
          <img src="<?php echo base_url(); ?>Assets/img/jugarbtn.png" height="150" width="150">
        </button>
      </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </main>
    <?php pie() ?>
  <?php
} else {
  //echo 'NO HAY SORTEOS PARA HOY';
  ?>
    <?php encabezado() ?>
    <input type="hidden" name="id_sorteo" id="id_sorteo" value="<?php echo $id_sorteo; ?>">
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <!--  <h5 class="text-center">Ganadores</h5> -->

          <div class="row">
            <div class="col-lg-12">
              <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                  <main>
                    <div class="container">
                      <div class="row justify-content-center">
                        <div class="col-lg-5">
                          <div class="card border-0 rounded-lg mt-5 sb-sidenav-dark">
                            <div class="card-header text-center"style="background-color: white;">
                              <h1 class="">NO HAY SORTEOS PARA HOY</h1>
                              <img class="img-thumbnail" src="<?php echo base_url(); ?>Assets/img/xno.png" width="150">

                            </div>
                            <div class="card-body">
                              <center>

                                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                                  <img src="<?php echo base_url(); ?>Assets/img/sullana.png" width="200" style="filter: brightness(1.1); mix-blend-mode: multiply;" id="img_nav">
                                </a>
                              </center>


                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>

              </div>
            </div>
          </div>
        </div>
      </main>
      <?php pie() ?>

    <?php
    //fin del else no hay sorteo'
  }
    ?>