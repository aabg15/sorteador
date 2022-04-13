<?php encabezado() ?>

<style>
  .form-control {
    border-color: #ff8000;
  }
</style>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <!--  <h5 class="text-center">Ganadores</h5> -->
      <center>
        <h4>Ganadores <img src="<?php echo base_url(); ?>Assets/img/sullana.png" style="width: 20%; filter: brightness(1.1); mix-blend-mode: multiply;"></h4>
      </center>

      <center>



        <form class="needs-validation" id="formRealizarSorteo">
          <div class="col-md-6 mb-3">
            <label for="validationCustom01">Sorteo </label>
            <select class="form-control" name='sorteos_disp' id='sorteos_disp' required>
            </select>
            <div class="invalid-feedback">
              Selecciona un sorteo.
            </div>
          </div>
          <br>

          <!--  -->
          <button class="btn btn-primary" type="button" onclick="fn_capturarid();" id="botonSorteo">Ver ganadores</button>

        </form>

      </center>

      <div class="row">
        <div class="col-lg-12">

          <div class="table-responsive">

            <table class="table table-light mt-4" id="tablaPremiosRuleta">


              <thead class="thead-dark">
                <tr>

                  <th>Nombre y Apellidos</th>
                  <th>DNI</th>
                  <th>Premio</th>
                  <th>Sucursal</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $autor) {
                  /* if ($autor['estado'] == 1) {
                                        $estado = '<span class="badge-success p-1 rounded">Activo</span>';
                                    } else {
                                        $estado = '<span class="badge-danger p-1 rounded">Inactivo</span>';
                                    } */
                  //echo 'autor :  :',$autor;
                  // exit();
                ?>
                  <!-- <tr>
                    <td><?php echo $autor['id']; ?></td>
                    <td><?php echo $autor['nombre']; ?></td>
                    <td><?php echo $autor['apellidos']; ?></td>
                    <td><?php echo $autor['dni']; ?></td>
                    <td><?php echo $autor['dni']; ?></td>
                    <td><?php echo $autor['sucursal']; ?></td>

                  </tr> -->
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    $(document).ready(function() {

      $.ajax({
          type: 'POST',
          url: ' http://localhost/sorteador/Views/ganador/sorteo_disp.php',
          data: {
            fecha_validar: '11/11/2020',
          }
        })
        .done(function(listas_rep) {
          $('#sorteos_disp').html(listas_rep);
          /*  let button1 = document.querySelector("#btn_enviar");
           button1.disabled = true; */
        })

        .fail(function() {
          alert('Hubo un errror al cargar los sorteos')
        })

      //
      let button1 = document.querySelector("#botonSorteo");
      button1.disabled = true;
      button1.style = "cursor: no-drop;"

    });

    //para cuando el usuario elige un sorteo,control del boton y cursor.
    $('#sorteos_disp').on('change', function() {
      var id = $('#sorteos_disp').val()
      //alert('el id es: ' + id);
      if (id != 0) {
        let button1 = document.querySelector("#botonSorteo");
        button1.disabled = false;
        //alert('entro');
        button1.style = '';


      } else {
        let button1 = document.querySelector("#botonSorteo");
        button1.style = 'cursor:no-drop;';
        button1.disabled = true;

      }
    })

    //id del sorteo capturado
    function fn_capturarid() {

      var sorteos_disp = $('#sorteos_disp').val();

      var template = '';
      $.ajax({
        url: "http://localhost/sorteador/Views/ganador/ganadores.php",
        method: 'post',
        data: {
          'sorteos_disp': sorteos_disp
        },

        success: function(response) {
          //return
          var myObj = JSON.parse(response); //A  la variable le asigno el json decodificado
          //console.log('myObj:::->',myObj);
          //return

          if (myObj == null) {
            Swal.fire({
              type: 'error',
              title: 'No hay ganadores',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ok'
            }).then((result) => {
              if (result.value) {
                //peticion
                //window.location.href = "cliente_psorteo.php";

              }
            })


          } else {

            datatable_sorteo = $('#tablaPremiosRuleta').DataTable({
              resposive: true,

              data: myObj,
              columns: [


                {
                  data: "nombre"
                },
                {
                  data: "dni"
                },
                {
                  data: "premio"
                },
                {
                  data: "sucursal"
                },



              ],
              destroy: true,
              language: espanol,

            });
          }
        }
      });

    }

    let espanol = {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending: ": Activar para ordenar la columna de manera ascendente",
        sSortDescending: ": Activar para ordenar la columna de manera descendente",
      },
      buttons: {
        copy: "Copiar",
        colvis: "Visibilidad",
      },
    };
  </script>
  <?php pie() ?>