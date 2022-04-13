<?php


//require_once(base_url().'Models/FondosModel.php');

class Fondos extends Controllers
{

    public function __construct()
    {   
        //$FondoModel = new FondosModel();
        
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        //var_dump('HOLA');

        //$data = $FondoModel->selectFondos();
        parent::__construct();
    }


    /* ($_REQUEST['contenido']); */
    public function fondos()
    {
        $data = $this->model->selectFondos();
        
        $this->views->getView($this, "insertar", $data);
    }

    public function listar()
    {
        $data = $this->model->selectFondos();
        $this->views->getView($this, "listar", $data);
    }

    public function insertar()
    {
        

        if ((isset($_FILES['imagen']['name']))) {

            $nombreImg = $_FILES['imagen']['name'];
            $ruta      = $_FILES['imagen']['tmp_name'];
            $destino   = "Assets/images/fondos/" . $nombreImg;

            if (move_uploaded_file($ruta, $destino)) {
            }
            $this->model->insertarFondo($nombreImg,$destino);
            //$this->views->getView($this, "listar", $nombreImg); 
            header("location: " . base_url() . "fondos/listar");
            die();
        }else{
            //no se agrego nada al ckEditor,mandar la misma vista
            header("location: " . base_url() . "fondos");
            die();
        }
    }

    public function eliminar()
    {
        $id = $_POST['id'];
        $this->model->eliminarFondo($id);
        header("location: " . base_url() . "fondos/listar");
        die();
    }

    public function reingresar()
    {
        $id = $_POST['id'];
        $this->model->reingresarFondo($id);
        $this->model->selectFondos();
        header('location: ' . base_url() . 'fondos/listar');
        die();
    }

    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editFondo($id);
        if ($data == 0) {
            $this->fondos();
        } else {
            $this->views->getView($this, "editar", $data);
        }
    }



    public function modificar()
    {
        $id = $_POST['id'];
       
        $img = $_FILES['imagen'];
        $imgName = $img['name'];
        $imgTmp = $img['tmp_name'];
        $fecha = md5(date("Y-m-d h:i:s")) . "_" . $imgName;
        $destino = "Assets/images/fondos/" . $fecha;
        $imgAntigua = $_POST['imagen'];

        if(!empty($id)){
            //no es vacio

            if ($imgName == null || $imgName == "") {
                $actualizar = $this->model->actualizarFondo($imgAntigua, $id,$destino);
            } else {
                $actualizar = $this->model->actualizarFondo($fecha, $id,$destino);
                if ($actualizar) {
                    move_uploaded_file($imgTmp, $destino);
                    if ($imgAntigua != "default-avatar.png") {
                        unlink("Assets/images/fondos/" . $imgAntigua);
                    }
                }
            }
            header("location: " . base_url() . "fondos/listar");
            die();
            

        }else{
            //es vacio, redirecciona a la misma vista
            header("location: " . base_url() . "fondos/editar?id=".$id);
            die();
        }
    }


}
