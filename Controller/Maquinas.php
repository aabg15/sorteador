<?php


//require_once(base_url().'Models/FondosModel.php');

class Maquinas extends Controllers
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
    public function maquinas()
    {
        $data = $this->model->selectMaquinas();
        
        $this->views->getView($this, "insertar", $data);
    }

    public function listar()
    {
        $data = $this->model->selectMaquinas();
        $this->views->getView($this, "listar", $data);
    }

    public function insertar()
    {
        

        if ((isset($_FILES['imagen']['name']))) {

            $nombreImg = $_FILES['imagen']['name'];
            $ruta      = $_FILES['imagen']['tmp_name'];
            $destino   = "ruleta/img/" . $nombreImg;

            if (move_uploaded_file($ruta, $destino)) {
            }
            $this->model->insertarMaquinas($nombreImg,$destino);
            //$this->views->getView($this, "listar", $nombreImg); 
            header("location: " . base_url() . "maquinas/listar");
            die();
        }else{
            //no se agrego nada al ckEditor,mandar la misma vista
            header("location: " . base_url() . "maquinas");
            die();
        }
    }

    public function eliminar()
    {
        $id = $_POST['id'];
        $destino = $_POST['destino'];

        $this->model->eliminarMaquinas($id,$destino);
        header("location: " . base_url() . "maquinas/listar");
        die();
    }

    public function reingresar()
    {
        $id = $_POST['id'];
        $this->model->reingresarMaquinas($id);
        $this->model->selectMaquinas();
        header('location: ' . base_url() . 'maquinas/listar');
        die();
    }

    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editMaquinas($id);
        if ($data == 0) {
            $this->maquinas();
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
        $destino = "ruleta/img/" . $fecha;
        $imgAntigua = $_POST['imagen'];

        if(!empty($id)){
            //no es vacio

            if ($imgName == null || $imgName == "") {
                $actualizar = $this->model->actualizarMaquinas($imgAntigua, $id,$destino);
            } else {
                $actualizar = $this->model->actualizarMaquinas($fecha, $id,$destino);
                if ($actualizar) {
                    move_uploaded_file($imgTmp, $destino);
                    if ($imgAntigua != "default-avatar.png") {
                        unlink("ruleta/img/" . $imgAntigua);
                    }
                }
            }
            header("location: " . base_url() . "maquinas/listar");
            die();
            

        }else{
            //es vacio, redirecciona a la misma vista
            header("location: " . base_url() . "maquinas/editar?id=".$id);
            die();
        }
    }


}
