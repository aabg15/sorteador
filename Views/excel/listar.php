<?php encabezado() ?>
<style>
  .form-control {
    border-color: #ff8000;
  }
</style>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h5 class="text-center">Jugadores</h5>
      <div class="row">
        <div class="col-lg-12">
          
          <div class="table-responsive">
            <table class="table table-light mt-4" id="table">
              <thead class="thead-dark">
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>DNI</th>
                  <th>Oportunidades</th>
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
                  <tr>
                    <td><?php echo $autor['id']; ?></td>
                    <td><?php echo $autor['nombre']; ?></td>
                    <td><?php echo $autor['apellidos']; ?></td>
                    <td><?php echo $autor['dni']; ?></td>
                    <td><?php echo $autor['oportunidades']; ?></td>
                    <td><?php echo $autor['sucursal']; ?></td>
                    
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