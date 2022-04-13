<?php

class Ganadorfinal extends Controllers
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
    public function ganadorfinal()
    {
        $data = $this->model->selectGanador();
        $this->views->getView($this, "inicio", $data);
    }

    public function listar()
    {
        $data = $this->model->selectGanador();
        $this->views->getView($this, "listar", $data);
    }

}
