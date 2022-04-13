<?php

class Juego extends Controllers
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
    public function juego()
    {
        $data = $this->model->selectJuego();
        $this->views->getView($this, "inicio", $data);
    }

    public function controljuego() //metodo para tener en cuenta al numero de ganadores
    {
        $data = $this->model->selectJuego();
        $this->views->getView($this, "palanca", $data);
    }


    public function palanca()
    {

        $cant_ganadores = (isset($_POST['cant_ganadores'])) ? $_POST['cant_ganadores'] : '';
        $id_sorteo = (isset($_POST['id_sorteo'])) ? $_POST['id_sorteo'] : '';

        if (empty($id_sorteo) && empty($cant_ganadores)) {

            header("location: " . base_url() . "juego");
        }


        $data = $this->model->listarJugadores($id_sorteo, $cant_ganadores);

        if ($data == '1') {

            //actualizame el estado del juego 
            $this->model->actulizarEstado($id_sorteo);


            //se acabo el juego,manda 'se acabo'
            $data = 'seacabo';
            $this->views->getView($this, "palanca", $data);
        } else {
            $this->views->getView($this, "palanca", $data);
        }
    }

    public function volverPalanca()
    {
        $premio = (isset($_POST['premio'])) ? $_POST['premio'] : '';
        $id_sorteo = (isset($_POST['id_sorteo'])) ? $_POST['id_sorteo'] : '';
        $dni = (isset($_POST['dni'])) ? $_POST['dni'] : '';
        $cant_ganadores = (isset($_POST['cant_ganadores'])) ? $_POST['cant_ganadores'] : '';
  

        if (empty($premio) && empty($id_sorteo) && empty($dni) && empty($cant_ganadores)) {

            header("location: " . base_url() . "juego");
        }
        //exit();




        $data = $this->model->listarJugadoresModificado($id_sorteo, $dni, $cant_ganadores);

        if ($data == '1') {

            //actualizame el estado del juego 
            $this->model->actulizarEstado($id_sorteo);

            $data = 'seacabo';
            $this->views->getView($this, "palanca", $data);
        } else {
            $this->views->getView($this, "palanca", $data);
        }
    }


    public function ganador()
    {
        

        $data = $this->model->selectJuego();
        $this->views->getView($this, "ganador", $data);
    }

    public function ganadoresfinales()
    {

        $id_sorteo = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : '';
        /*  echo 'SORTEO-.>',$id_sorteo;
        exit(); */

        if (empty($id_sorteo)) {
            header("location: " . base_url() . "juego");
        }

        $data = $this->model->listaGanadoresfinales($id_sorteo);
        $this->views->getView($this, "ganadoresfinal", $data);
    }

    public function guardameGanador()
    {
        $id_sorteo = $_POST['id_sorteo'];
        $premio = $_POST['premio'];
        $dni = $_POST['dni'];


        $data = $this->model->guardaGanador($dni, $premio, $id_sorteo);
        //$this->views->getView($this, "ganador", $data);
    }


    public function listar()
    {
        $data = $this->model->selectSorteo();
        $this->views->getView($this, "listar", $data);
    }
}
