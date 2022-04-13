<?php
  
?>

<?php encabezado() ?>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
  .form-control {
    border-color: #ff8000;
  }
</style>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script> -->

<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <br>
      <h4 class="text-center">Agregar Fondo Login</h4>

      <div class="main-content">

        <div class="row-5">
          <div class="card" style="border-color: #ff8000;">
            <div class="card-body">
              <form class="needs-validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>fondos/insertar" autocomplete="off">
                <div class="form-row">


                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Seleccione imagen:</label>

                    <input type="file" id="imagen" name="imagen" class="form-control" required>

                    <div class="invalid-feedback">
                      Coloca una imagen.
                    </div>
                    <label for="tamanofoto">Ingresa una fonde de 7960 x 4460</label>
                  </div>




                </div>

            
                <center>
                  <button class="btn btn-primary" id="botonSorteo" type="submit">Guardar</button>
                </center>

              </form>
            </div>
          </div>
        </div>
      </div>
  </main>
  <!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->
  <!-- Initialize Quill editor -->
  <!--   <script>
      var quill = new Quill('#editor', {
        theme: 'snow'
      });


    </script> -->

  <!--   <script>
    ClassicEditor
      .create(document.querySelector('#editor'))
      .then(editor => {
        console.log(editor);
      })
      .catch(error => {
        console.error(error);
      });
  </script> -->
  <script>
    CKEDITOR.replace('editor');
  </script>

  <?php pie() ?>