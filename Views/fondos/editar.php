<?php encabezado() ?>
<!-- Begin Page Content -->
<style>
    .form-control {
        border-color: #ff8000;
    }
</style>
<div id="layoutSidenav_content">

    <center>

        <h4>Actualizar Fondo</h4>
    </center>
    <main>
        <div class="container-fluid">
            <div class="row-5">
                <!-- <div class="col-md-6 mb-3 m-auto"> -->
                <div class="card" style="border-color: #ff8000;">
                    <div class="card-body">
                        <form action="<?php echo base_url(); ?>fondos/modificar" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="id">Código de imagen</label>
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                        <input id="id" class="form-control" type="text" name="id" disabled value="<?php echo $data['id']; ?> ">
                                    </div>
                                </div>




                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="foto">Premio</label>
                                        <input id="imagen" class="form-control" type="file" name="imagen">
                                        <!--  <input type="hidden" name="imagen" value="<?php echo $data['img']; ?>"> -->
                                        <img class="img-thumbnail" src="<?php echo base_url() . "Assets/images/fondos/" . $data['img']; ?>" width="250">
                                    </div>
                                </div>


                            </div>
                            <div style="text-align: center;">
                                <a class="btn btn-danger" href="<?php echo base_url(); ?>fondos/listar">Atras</a>

                                <button class="btn btn-primary" type="submit">Modificar</button>

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