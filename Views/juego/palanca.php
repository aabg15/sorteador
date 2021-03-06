<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if ($_POST['id_sorteo'] != '') {
    //echo 'Hola ' . $_POST['id_sorteo'];
    $id_sorteo = $_POST['id_sorteo'];
    $premio = $_POST['premio'];
    $cant_ganadores = $_POST['cant_ganadores'];
    //echo $premio;
  } else {
    //echo 'Has olvidado poner tu nombre';
  }
} else {
  // echo 'Ha ocurrido un error';
}
if ($data == 'seacabo') {

  header("location: " . base_url() . "juego/ganadoresfinales?id=" . $id_sorteo);
  exit();
} else {
  //var_dump($data);
  $i = 0;
  $y = 0;
  shuffle($data);
  //print_r($data);

  $lista1 = "<div id='casino1' class='slotMachine' style='margin-left: -106px; margin-top:4px'>";
  foreach ($data as $value) {

    $dni = $data[$i][$y];
    $y = $y + 1;
    $jugador = $data[$i][$y];
    $i = $i + 1;
    $y = 0;
    $lista1 .= "<div class='slot' premio='$dni' id='tituloJugadores' style='color:#ff8000;'>$jugador</div>";
    /*   echo $dni;
    echo '<br>';
    echo $jugador;
    echo '<br>'; */
  }
  $lista1 .= '</div>';
  //print_r($lista1);
}


$objeto = new Conexion3();
$conexion = $objeto->Conectar();

$sqlData = "SELECT * from maquinas where estado =1";
$resultadox = $conexion->prepare($sqlData);
$resultadox->execute();

if ($resultadox->rowCount() > 0) {
  $dataid = $resultadox->fetchAll(PDO::FETCH_ASSOC);


  foreach ($dataid as $datid) {
    $img = $datid['img'];
    $destino = $datid['destino'];
  }
}

$ruta = base_url() . $destino;
//creo el css
$css = "background: url('$ruta') no-repeat 50% 80px;";


?>

<!DOCTYPE html>
<html lang="es">

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
  <script src="<?php echo base_url(); ?>ruleta/dist/slotmachine.js"></script>
  <script src="<?php echo base_url(); ?>ruleta/dist/jquery.slotmachine.js"></script>


</head>

<style>
  @charset "utf-8";

  #casino {
    margin: -21px;
  }

  #casino h1 {
    margin: 0px;
  }

  #casino .content:nth-child(1) {
    text-align: center;
    <?php echo $css; ?>background-position-x: calc(42% + 63px);
    background-position-y: calc(-16% + 23px);
    min-height: 586px;
    height: 580px;


  }

  .machineContainer {
    padding: 5px 1px 5px 1px;
    height: 135px;
  }

  #casino .content>div {
    padding-top: 203px;
    width: 310px;
    margin: 0 auto;
    transform: translateX(30px);
  }

  .slotMachine .slot {
    height: 93px;
    background-position-x: 55%;
    background-repeat: no-repeat;
  }


  .slotMachine {
    width: 89.333333%;

    height: 94px;
    padding: 0px;
    overflow: hidden;
    display: inline-block;
    text-align: center;
    background-color: #ffffff;
    color: orange;


  }

  #casino .btn-group {
    margin-top: 150px;
    transform: translateX(-25px);
  }

  #casino .btn-group .btn {
    border: none;
    background-color: #ff8000;
  }

  #casino .btn-group .btn:hover,
  .btn-group .btn:focus {
    background-color: rgb(228, 18, 18);
  }


  .btn-group-casino {
    margin-top: 150px;
    margin-left: -50px;
  }

  .btn-group-casino .btn {
    border: none;
    background-color: rgb(209, 79, 119);
  }

  .btn-group-casino .btn:hover,
  .btn-group-casino .btn:focus {
    background-color: rgb(180, 75, 119);
  }

  #tituloJuego {
    color: #eeba1b;
    font-size: 100px;
  }

  #tituloJugadores {
    font-size: 33px;
  }
</style>

<body>

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
    <input type="hidden" name="id_sorteo" id="id_sorteo" value="<?php echo $id_sorteo; ?>">
    <input type="hidden" name="premio" id="premio" value="<?php echo $premio; ?>">
    <input type="hidden" name="cant_ganadores" id="cant_ganadores" value="<?php echo $cant_ganadores; ?>">

    <div class="container-fluid">
      <br>
      <div class="main-content">
        <center>
          <h1 class="animate__animated animate__heartBeat text-center" id="tituloJuego">SORTEADOR</h1>
        </center>


      </div>

      <!-- <div class="container"> -->

      <div id="casino">

        <div class="content">
          <!-- <h1>Ruleta LOTICAJA</h1> -->

          <div>
            <?php
            echo $lista1;

            ?>

        
          </div>
        </div>

      </div>




      <div style="text-align: center;">
        <button class="btn animate__animated animate__rotateIn" id="casinoShuffle" style="position: absolute;top:16%;margin:19%">
          <img src="http://localhost/sorteador/Assets/img/jugarbtn.png" alt="" height="150" width="150">
        </button>
      </div>

      <!--     <button class="btn_jugaremos">
            <img src="https://icons.iconarchive.com/icons/custom-icon-design/flatastic-1/256/add-1-icon.png" width="50px">
          </button> -->

      <script id="codeScript5">
        const btn = document.querySelector('#casinoShuffle');

        const casino1 = document.querySelector('#casino1');
        /*         const casino2 = document.querySelector('#casino2');
                const casino3 = document.querySelector('#casino3'); */


        const mCasino1 = new SlotMachine(casino1, {
          active: 0,
          delay: 500
        });
        /*        const mCasino2 = new SlotMachine(casino2, {
                 active: 1,
                 delay: 500
               });
               const mCasino3 = new SlotMachine(casino3, {
                 active: 2,
                 delay: 500
               }); */
      </script>

      <script id="codeScript6">
        var premio1, premio2, premio3;
        var count = 0;
        const cadenaPremios = [];
        const cadenaSalidas = [];

        function onComplete(active) {

          //results[this.element.id].innerText = `Index: ${this.active}`;
          count = count + 1;
          let tex = `Index: ${this.active}`;
          //let index = `${this.active}`
          //console.log(active,tex,active,index);
          cadenaSalidas.push(active + 1);

          //cadenaPremios.push('-');
          //alert(cadenaPremios);
          if (count == 1) {
            ganadafinal();
            console.log(cadenaSalidas);
          }
        }


        btn.addEventListener('click', () => {
          btn.disabled = true;
          mCasino1.shuffle(2, onComplete);
        });


        function ganadafinal() {

          idpremio1 = cadenaSalidas[0];
          premio1 = casino1.children[0].children[idpremio1];
          premioa = premio1.getAttribute('premio');
          console.log('DNI  :  :: ->' + premioa);

          //muestrame la tabla de abajo

          //guarda el ganador y luego direccioname a la otra vista
          guardarGanadorSorteador(premioa);
        }

        function guardarGanadorSorteador(dni) {

          var url = "<?php echo base_url(); ?>juego/guardameGanador";
          var premio = document.getElementById('premio').value;
          var id_sorteo = document.getElementById('id_sorteo').value;

          $.ajax({
            type: "POST",
            url: url,
            data: {
              dni: dni,
              premio: premio,
              id_sorteo: id_sorteo,

            },
            success: function(data) {
              //$('#resp').html(data);
              //window.location.href = "jugada_enviada.php";
            }
          });
          const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          Toast.fire({
            icon: 'success',
            title: 'FELICIDADES!!!!'
          }).then(function() {
        /*     
            $("#celebracionConfeti").on("", function() {
              confetti();
            }) */

            //document.getElementById('celebracionConfeti').confetti();


            location.href = "<?php echo base_url(); ?>juego/ganador?dni=" + dni + "&id=" + id_sorteo;
          });
        }
      </script>

    </div>


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