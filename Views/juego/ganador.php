<?php

$dni = $_REQUEST['dni'];
$id_sorteo = $_REQUEST['id'];


//exit();
$objeto = new Conexion3();
$conexion = $objeto->Conectar();
$consulta = "SELECT * FROM jugador where dni=" . $dni;
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $datx) {
  $nombre = $datx['nombre'];
  $tienda = $datx['sucursal'];
}





//mandar por el post, el total de ganadores del tal sorteo:

$consulta = "SELECT * FROM sorteo where id=" . $id_sorteo;

$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $datx) {
  $cant_ganadores = $datx['cantidad_intento'];
  $premio = $datx['premio'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Sorteador</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>Assets/img/logo-icon.ico" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/styles.css" id="theme-stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<style>
  #tituloJuego {
    color: #eeba1b;
    font-size: 100px;
  }

  #nombreganador {
    font-size: 100px;
    color: #ff8000;
  }

  /*   #divbotonjugar {
    border-color: white;
  } */
</style>

<body>

  <!--  <audio src="<?php echo base_url(); ?>Assets/sound/aplausos-trompeta.mp3" autoplay loop></audio> -->


  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
    <!-- <a class="navbar-brand" href="<?php echo base_url(); ?>excel/listar">Sorteador</a> -->
    <a class="navbar-brand" href="<?php echo base_url(); ?>excel/listar">
      <img src="<?php echo base_url(); ?>Assets/img/logo-oculto.png" width="200" id="img_nav">
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-capitalize" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre']; ?> <i class="fas fa-user fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>usuarios/perfil">Perfil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url(); ?>usuarios/salir">Salir</a>
        </div>
      </li>
    </ul>
  </nav>

  <main>
    <div class="container-fluid">
      <br>
      <div class="main-content">
        <div class="row-5">

          <h1 class="animate__animated animate__heartBeat text-center" id="tituloJuego">Ganador(a)</h1>

          <div id="ganador">

            <div align="center">
              <p id="nombreganador">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre; ?></p>
              <p id="nombreganador">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;De la Tienda <?php echo $tienda; ?></p>
            </div>

          </div>
        </div>

        <form method="POST" action="<?php echo base_url(); ?>juego/volverPalanca">
          <input type="hidden" name="id_sorteo" id="id_sorteo" value="<?php echo $id_sorteo; ?>">
          <input type="hidden" name="dni" id="dni" value="<?php echo $dni; ?>">
          <input type="hidden" name="cant_ganadores" id="cant_ganadores" value="<?php echo $cant_ganadores; ?>">
          <input type="hidden" name="premio" id="premio" value="<?php echo $premio; ?>">

          <div id="divbotonjugar">
            <center>
              <button type="submit" style="border-color: white; border-radius:5px 10px 15px 20px; background-color: transparent;"><img style="opacity: 2;" src="<?php echo base_url() . "Assets/img/jugarbtn.PNG" ?>" height="120" width="120" /></button>
            </center>

          </div>


        </form>



      </div>
      <script src="<?php echo base_url(); ?>confetti/confetti.js"></script>
      <!-- Confetti  JS-->
      <script>
        // start

        const start = () => {
          setTimeout(function() {
            confetti.start()
          }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };

        //  Stop

        const stop = () => {
          setTimeout(function() {
            confetti.stop()
          }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };

        start();
        //stop();
      </script>
  </main>


    <!-- JavaScript files-->
    <script src="<?php echo base_url(); ?>Assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/Funciones.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/all.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/sweetalert2@9.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>