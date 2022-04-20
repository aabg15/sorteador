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
    font-size: 70px;
    color: #ff8000;
  }
</style>

<body>

  <!-- <audio src="<?php echo base_url(); ?>Assets/sound/champions.mp3" autoplay loop></audio> -->

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

          <h1 class="animate__animated animate__heartBeat text-center" id="tituloJuego">Ganadores Finales</h1>

          <div id="ganador">
            <br><br>



            <div class="table-responsive-md">

              <table class="table table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ganador</th>
                    <th scope="col">Tienda</th>
                  </tr>
                </thead>
                <tbody>



                  <?php
                  $contador = 0;
                  //var_dump($data);
                  foreach ($data as $key) {
                    $contador = $contador + 1;
                  ?>
                    <tr>
                      <td id="nombreganador" style="text-align: center;" scope="row"><?php echo $contador; ?></td>
                      <td id="nombreganador" style="text-align: center;"><?php echo $key['nombre']; ?></td>
                      <td id="nombreganador" style="text-align: center;"><?php echo $key['sucursal']; ?></td>
                    </tr>
                  <?php
                  }

                  ?>

                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
      <br><br>
      <center>

        <a class="btn btn-primary" href="<?php echo base_url() ?>ganador/listar"><i class="fas fa-file-alt"></i> Reportes de ganadores</a>

      </center>




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