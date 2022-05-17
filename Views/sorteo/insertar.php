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
      <h4 class="text-center">Registrar Sorteo</h4>

      <div class="main-content">

        <div class="row-5">
          <div class="card" style="border-color: #ff8000;">
            <div class="card-body">
              <form class="needs-validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>sorteo/insertar" autocomplete="off">
                <div class="form-row">


                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Nombre del sorteo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="* Nombre de Sorteo *" required>
                    <div class="invalid-feedback">
                      Ingresa el nombre del sorteo!
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="validationCustom05">Fecha de realización</label>

                    <input type="date" id="fechainicio" name="fechainicio" class="form-control" required>

                    <div class="invalid-feedback">
                      Coloca un Fecha.
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Premio</label>
                    <input type="text" class="form-control" id="premio5letra" name="premio5letra" placeholder="* Premio *" required>
                    <div class="invalid-feedback">
                      Ingresa el premio!
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Seleccione archivo:</label>

                    <input type="file" id="imagen" name="imagen" class="form-control" required>

                    <div class="invalid-feedback">
                      Coloca una imagen.
                    </div>
                    <label for="tamanofoto">Ingresa una imagen de 300x300</label>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Cantidad de ganadores</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="* Cantidad de ganadores *" required>
                    <div class="invalid-feedback">
                      Ingresa la cantidad!
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom01">Regla(Descripcion del sorteo)</label>

                    <textarea name="editor" id="editor" rows="10" cols="80">
                      Este es un TextArea.
                    </textarea>

                  </div>

                </div>


                <center>
                  <button class="btn btn-primary" id="botonSorteo" type="submit">Registar Sorteo</button>
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