<?php

class Sorteo extends Controllers
{

    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }

        parent::__construct();
    }


    /* ($_REQUEST['contenido']); */
    public function sorteo()
    {
        $data = $this->model->selectSorteo();
        $this->views->getView($this, "insertar", $data);
    }

    public function listar()
    {
        $data = $this->model->selectSorteo();
        $this->views->getView($this, "listar", $data);
    }

    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $fechainicio = $_POST['fechainicio'];
        $premio5letra = $_POST['premio5letra'];
        //$reglas = $_POST['reglas'];
        //$reglas = $_REQUEST['contenido'];


        $reglas = $_POST['editor'];
        //echo $reglas;
        //exit();


        $cantidad = $_POST['cantidad'];

        if ((isset($_FILES['imagen']['name'])) && (!empty($reglas)) ) {

            $nombreImg = $_FILES['imagen']['name'];
            $ruta      = $_FILES['imagen']['tmp_name'];
            $destino   = "Assets/images/sorteo/" . $nombreImg;

            if (move_uploaded_file($ruta, $destino)) {
            }

            $this->model->insertarSorteo($nombre, $fechainicio, $premio5letra, $nombreImg, $cantidad, $reglas);
            header("location: " . base_url() . "sorteo/listar");
            die();
        }else{
            //no se agrego nada al ckEditor,mandar la misma vista
            header("location: " . base_url() . "sorteo");
            die();
        }
    }


    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editSorteo($id);
        if ($data == 0) {
            $this->sorteo();
        } else {
            $this->views->getView($this, "editar", $data);
        }
    }



    public function modificar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $fechainicio = $_POST['fechainicio'];
        $premio5letra = $_POST['premio5letra'];
        $cantidad = $_POST['cantidad'];
        $reglas = $_POST['editor'];
        $img = $_FILES['imagen'];
        $imgName = $img['name'];
        $imgTmp = $img['tmp_name'];
        $fecha = md5(date("Y-m-d h:i:s")) . "_" . $imgName;
        $destino = "Assets/images/sorteo/" . $fecha;
        $imgAntigua = $_POST['imagen'];

        if(!empty($reglas)){
            //no es vacio

            if ($imgName == null || $imgName == "") {
                $actualizar = $this->model->actualizarSorteo($nombre, $fechainicio, $premio5letra, $cantidad, $imgAntigua, $id,$reglas);
            } else {
                $actualizar = $this->model->actualizarSorteo($nombre, $fechainicio, $premio5letra, $cantidad, $fecha, $id,$reglas);
                if ($actualizar) {
                    move_uploaded_file($imgTmp, $destino);
                    if ($imgAntigua != "default-avatar.png") {
                        unlink("Assets/images/sorteo/" . $imgAntigua);
                    }
                }
            }
            header("location: " . base_url() . "sorteo/listar");
            die();
            

        }else{
            //es vacio, redirecciona a la misma vista
            header("location: " . base_url() . "sorteo/editar?id=".$id);
            die();
        }
    }
    
    public function eliminar()
    {
        $id = $_POST['id'];
        $this->model->eliminarSorteo($id);
        header("location: " . base_url() . "sorteo/listar");
        die();
    }
    
    public function reingresar()
    {
        $id = $_POST['id'];
        $this->model->estadoSorteo(1, $id);
        header("location: " . base_url() . "sorteo");
        die();
    }
}
