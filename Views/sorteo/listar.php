<?php encabezado() ?>
<style>
  .form-control {
    border-color: #ff8000;
  }
</style>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h5 class="text-center">Sorteos</h5>
      <div class="row">
        <div class="col-lg-12">
          
          <div class="table-responsive">
            <table class="table table-light mt-4" id="table">
              <thead class="thead-dark">
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Premio</th>
                  <th>Cantidad ganadores</th>
                  <th>Reglas</th>
                  <th>Foto premio</th>
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
                ?>
                  <tr>
                    <td><?php echo $autor['id']; ?></td>
                    <td><?php echo $autor['nombre']; ?></td>
                    <td><?php echo $autor['fecha']; ?></td>
                    <td><?php echo $autor['premio']; ?></td>
                    <td><?php echo $autor['cantidad_intento']; ?></td>
                    <td><?php echo $autor['reglas']; ?></td>
                    <td><img class="img-thumbnail" src="<?php echo base_url() ?>Assets/images/sorteo/<?php echo $autor['imagen_premio']; ?>" width="100"></td>

                    <td>
                      <a class="btn btn-primary" href="<?php echo base_url() ?>sorteo/editar?id=<?php echo $autor['id'] ?>"><i class="fas fa-edit"></i></a>

                      <form method="post" action="<?php echo base_url() ?>sorteo/eliminar" class="d-inline eliminar">
                        <input type="hidden" name="id" value="<?php echo $autor['id']; ?>">
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                      </form>

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