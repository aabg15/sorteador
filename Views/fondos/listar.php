<?php encabezado() ?>
<style>
  .form-control {
    border-color: #ff8000;
  }
</style>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h5 class="text-center">Imágenes del Login</h5>
      <div class="row">
        <div class="col-lg-12">

          <div class="table-responsive">
            <table class="table table-light mt-4" id="table">
              <thead class="thead-dark">
                <tr>
                  <th>Id</th>
                  <th>Imagen</th>
                  <th>Destino</th>
                  <th>Estado</th>
                  <th>Acciones</th>
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

                  if ($autor['estado'] == 1) {
                    $estado = '<span class="badge-primary p-1 rounded">Activo</span>';
                  } else {
                    $estado = '<span class="badge-danger p-1 rounded">Inactivo</span>';
                  }
                ?>
                  <tr>
                    <td><?php echo $autor['id']; ?></td>
                    <td><img class="img-thumbnail" src="<?php echo base_url() ?>Assets/images/fondos/<?php echo $autor['img']; ?>" width="100"></td>
                    <td><?php echo $autor['destino']; ?></td>
                    <td><?php echo $estado; ?></td>



                    <td>
                      <a class="btn btn-primary" href="<?php echo base_url() ?>fondos/editar?id=<?php echo $autor['id'] ?>"><i class="fas fa-edit"></i></a>



                      <?php if ($autor['estado'] == 0) { ?>


                        <form method="post" action="<?php echo base_url() ?>fondos/eliminar" class="d-inline eliminar">
                          <input type="hidden" name="id" value="<?php echo $autor['id']; ?>">
                          <input type="hidden" name="destino" value="<?php echo $autor['destino']; ?>">
                          <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>


                        <form action="<?php echo base_url() ?>fondos/reingresar" method="post" class="d-inline reingresar">
                          <input type="hidden" name="id" value="<?php echo $autor['id']; ?>">
                          <button type="submit" class="btn btn-success"><i class="fas fa-audio-description"></i></button>
                        </form>



                      <?php
                      }
                      ?>



                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php pie() ?>