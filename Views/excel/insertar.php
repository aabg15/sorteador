<?php encabezado() ?>

<!-- Optional theme -->

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<style>
  .form-control {
    border-color: #ff8000;
  }
</style>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <br>
      <h4 class="text-center">Importar Data</h4>

      <div class="main-content">

        <div class="row-5">

          <form class="needs-validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>excel/insertar">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationCustom01">Sorteo </label>
                <select class="form-control" name='sorteos_disp' id='sorteos_disp' required>
                </select>
                <div class="invalid-feedback">
                  Selecciona un sorteo.
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="validationCustom05"></label>
                <center>
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>/Assets/images/excel/Cabecera_sorteador.csv" id="botonSorteo" download="Cabecera_sorteador.csv">Descargar Formato</a>
                </center>
              </div>

              <div class="col-md-6 mb-3">
                <label for="validationCustom01">Subir csv</label>
                <div class="input-group">
                  <input type="file" name="dataCliente" class="form-control" id="dataCliente" required>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="validationCustom05"></label>
                <center>
                  <!-- <button class="btn btn-primary" id="" type="submit">Descargar Formato</button> -->
                  <input type="submit" class="btn btn-primary" id="botonSorteo" value="Guardar Datos" />
                </center>

              </div>

            </div>

          </form>

        </div>
      </div>
  </main>

  <script>
    $(document).ready(function() {

      $.ajax({
          type: 'POST',
          url: ' http://localhost/sorteador/Views/excel/sorteo_disp.php',
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

      
    });
  </script>

  <!-- Initialize Quill editor -->



  <?php pie() ?>