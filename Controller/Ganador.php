<?php

class Ganador extends Controllers
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
    public function ganador()
    {
        $data = $this->model->selectGanador();
        $this->views->getView($this, "listar", $data);
    }

    public function listar()
    {
        $data = $this->model->selectGanador();
        $this->views->getView($this, "listar", $data);
    }

    public function listarPorSorteo()
    {
        $id = $_POST['sorteos_disp'];
        echo 'dame id : ->', $id;
        exit();
        $data = $this->model->selectGanadorSorteo($id);
        $this->views->getView($this, "listar", $data);
    }
}
