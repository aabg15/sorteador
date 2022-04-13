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
    color: #df040b;
    font-size: 100px;
  }

  #nombreganador {
    font-size: 70px;
    color: #ff8000;
  }
</style>

<body class="sb-nav-fixed">

  <audio src="<?php echo base_url(); ?>Assets/sound/champions.mp3" autoplay loop></audio>

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
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">


      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <?php if ($_SESSION['rol'] == 1) { ?>
              <!--  <a class="nav-link active" href="<?php echo base_url(); ?>admin/listar">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks fa-lg"></i></div>
                                Prestamo
                            </a> -->
            <?php } ?>

            <a class="nav-link active" href="<?php echo base_url(); ?>excel/listar">
              <div class="sb-nav-link-icon"><i class="fas fa-list fa-lg"></i>
              </div>
              Inicio
            </a>

            <a class="nav-link collapsed active" href="<?php echo base_url(); ?>/sorteo" data-toggle="collapse" data-target="#collapseEst" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-book fa-lg"></i></div>
              Mantenimiento
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down fa-lg"></i></div>
            </a>
            <div class="collapse" id="collapseEst" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link active" href="<?php echo base_url(); ?>sorteo">Registrar Sorteo</a>
                <a class="nav-link active" href="<?php echo base_url(); ?>excel">Importar BD.csv</a>
                <a class="nav-link active" href="<?php echo base_url(); ?>juego">Jugar</a>
                <a class="nav-link active" href="<?php echo base_url(); ?>fondos">Fondo de login</a>

              </nav>
            </div>

            <a class="nav-link collapsed active" href="<?php echo base_url(); ?>/sorteo" data-toggle="collapse" data-target="#collapseEst2" aria-expanded="false" aria-controls="collapseLayouts">

              <div class="sb-nav-link-icon"><i class="fas fa-file-pdf fa-lg"></i></div>
              Operaciones
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down fa-lg"></i></div>
            </a>
            <div class="collapse" id="collapseEst2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link active" href="<?php echo base_url(); ?>ganador">Reporte Ganadores</a>
                <a class="nav-link active" href="<?php echo base_url(); ?>sorteo/listar">Ver Sorteos</a>
                <a class="nav-link active" href="<?php echo base_url(); ?>excel/listar">Ver Jugadores</a>
                <a class="nav-link active" href="<?php echo base_url(); ?>fondos/listar">Ver Imagenes del Login</a>

              </nav>
            </div>

            <?php if ($_SESSION['rol'] == 1) { ?>
              <a class="nav-link active" href="<?php echo base_url(); ?>usuarios/listar">
                <div class="sb-nav-link-icon"><i class="fas fa-user fa-lg"></i>
                </div>
                Usuarios
              </a>

            <?php } ?>

          </div>
        </div>

      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <br>
          <div class="main-content">
            <div class="row-5">

              <h1 class="animate__animated animate__heartBeat text-center" id="tituloJuego">Ganadores Finales</h1>

              <div id="ganador">

                <center>

                  <?php

                  $contador = 0;
                  foreach ($data as $key) {
                    $contador = $contador + 1;
                  ?>

                    <p id="nombreganador"><?php echo $contador; ?>- <?php echo $key['nombre'] . ' ' . $key['apellidos'] ?> </p>
                  <?php
                  }

                  ?>

                </center>
              
            </div>
          </div>
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


      <footer class="py-4 bg-light mt-auto" style="text-align: center;">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Ingytal</div>
          </div>
        </div>
      </footer>
    </div>



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