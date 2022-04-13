<?php encabezado() ?>
<!-- Begin Page Content -->
<style>
  .form-control {
    border-color: #ff8000;
  }
</style>
<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<div id="layoutSidenav_content">

  <center>

    <h4>Actualizar Sorteo</h4>
  </center>
  <main>
    <div class="container-fluid">
      <div class="row-5">
        <!-- <div class="col-md-6 mb-3 m-auto"> -->
        <div class="card" style="border-color: #ff8000;">
          <div class="card-body">
            <form action="<?php echo base_url(); ?>sorteo/modificar" method="post" enctype="multipart/form-data" autocomplete="off">
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="id">Código del sorteo</label>
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <input id="id" class="form-control" type="text" name="id" disabled value="<?php echo $data['id']; ?> ">
                  </div>
                </div>



                <?php if ($data['estado'] == 'SS') {
                ?>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="nombre">Nombre del sorteo</label>
                      <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                  </div>
                <?php
                } else {
                ?>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="nombre">Nombre del sorteo</label>
                      <input id="nombre" class="form-control" type="text" disabled name="nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                  </div>

                <?php
                }
                ?>





















                <?php if ($data['estado'] == 'SS') {
                ?>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="fechainicio">Fecha del sorteo</label>
                      <input id="fechainicio" class="form-control" type="date" name="fechainicio" value="<?php echo $data['fecha']; ?>">
                    </div>
                  </div>
                <?php
                } else {
                ?>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="fechainicio">Fecha del sorteo</label>
                      <input id="fechainicio" disabled class="form-control" type="date" name="fechainicio" value="<?php echo $data['fecha']; ?>">
                    </div>
                  </div>

                <?php
                }
                ?>











                <?php if ($data['estado'] == 'SS') {
                ?>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="premio5letra">Premio</label>
                      <input id="premio5letra" class="form-control" type="text" name="premio5letra" value="<?php echo $data['premio']; ?>">
                    </div>
                  </div>
                <?php
                } else {
                ?>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="premio5letra">Premio</label>
                      <input id="premio5letra" disabled class="form-control" type="text" name="premio5letra" value="<?php echo $data['premio']; ?>">
                    </div>
                  </div>

                <?php
                }
                ?>










                <?php if ($data['estado'] == 'SS') {
                ?>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Regla(Descripcion del sorteo)</label>

                    <textarea name="editor" id="editor" rows="10" cols="80">
                  <?php echo $data['reglas']; ?>
                    </textarea>
                  </div>
                <?php
                } else {
                ?>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Regla(Descripcion del sorteo)</label>

                    <textarea name="editor" id="editor" rows="10" cols="80" disabled>
                  <?php echo $data['reglas']; ?>
                    </textarea>
                  </div>

                <?php
                }
                ?>










                <?php if ($data['estado'] == 'SS') {
                ?>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="cantidad">Cantidad de ganadores</label>
                      <input id="cantidad" class="form-control" type="number" name="cantidad" value="<?php echo $data['cantidad_intento']; ?>">
                    </div>
                  </div>
                <?php
                } else {
                ?>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="cantidad">Cantidad de ganadores</label>
                      <input id="cantidad" class="form-control" type="number" disabled name="cantidad" value="<?php echo $data['cantidad_intento']; ?>">
                    </div>
                  </div>

                <?php
                }
                ?>


                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="direccion">Estado del sorteo</label>

                    <input id="direccion" class="form-control" type="text" name="direccion" value="<?php if ($data['estado'] == 'SS') {
                                                                                                      echo 'SIN SORTEAR';
                                                                                                    } else {
                                                                                                      echo 'SORTEADO';
                                                                                                    } ?>" disabled>
                  </div>
                </div>

                <?php if ($data['estado'] == 'SS') {
                ?>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="foto">Premio</label>
                      <input id="imagen" class="form-control" type="file" name="imagen">
                      <input type="hidden" name="imagen" value="<?php echo $data['imagen_premio']; ?>">
                      <img class="img-thumbnail" src="<?php echo base_url() . "Assets/images/sorteo/" . $data['imagen_premio']; ?>" width="250">
                    </div>
                  </div>
                <?php
                } else {
                ?>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="foto">Premio</label>
                      <input id="imagen" class="form-control" type="file" name="imagen" disabled>
                      <input type="hidden" name="imagen" value="<?php echo $data['imagen_premio']; ?>">
                      <img class="img-thumbnail" src="<?php echo base_url() . "Assets/images/sorteo/" . $data['imagen_premio']; ?>" width="250">
                    </div>
                  </div>

                <?php
                }


                ?>


              </div>
              <div style="text-align: center;">
                <a class="btn btn-danger" href="<?php echo base_url(); ?>sorteo/listar">Atras</a>

                <?php if ($data['estado'] == 'SS') {
                ?>
                  <button class="btn btn-primary" type="submit">Modificar</button>


                <?php
                } else {
                ?>

                  <button class="btn btn-primary" disabled type="submit">Modificar</button>

                <?php
                }
                ?>


              </div>
            </form>
          </div>
        </div>
        <!-- </div> -->
      </div>
    </div>
  </main>

  <script>
    CKEDITOR.replace('editor');
  </script>

  <?php pie() ?>