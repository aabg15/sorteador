<?php

class Excel extends Controllers
{

  public function __construct()
  {
    session_start();
    if (empty($_SESSION['activo'])) {
      header("location: " . base_url());
    }
    parent::__construct();
  }

  public function excel()
  {
    $data = $this->model->selectExcel();
    $this->views->getView($this, "insertar", $data);
  }

  public function listar()
  {
    $data = $this->model->selectExcel();
    $this->views->getView($this, "listar", $data);
  }
  public function limpiar()
  {
    $id = $_GET['id'];
    $data = $this->model->limpiarTabla($id);
    
    if ($data == 0) {
      //$this->excel();
    } else {
      $this->listar();
      //$this->views->getView($this, "listar", $data);
    }
  }

  public function insertar()
  {
    header('Content-Type: text/html; charset=UTF-8');
    $arregloData = array();

    $idsorteo = $_POST['sorteos_disp'];
    $tipo       = $_FILES['dataCliente']['type'];
    $tamanio    = $_FILES['dataCliente']['size'];
    $archivotmp = $_FILES['dataCliente']['tmp_name'];

    if (!empty($archivotmp)) {

      $lineas     = file($archivotmp);
      $i = 0;
      foreach ($lineas as $linea) { //para no leer la primera fila

        $cantidad_registros = count($lineas);

        if ($i != 0) {

          $datos = explode(";", $linea);
          $nombre = utf8_encode(!empty($datos[0])  ? ($datos[0]) : '');
          $dni    = !empty($datos[1])  ? ($datos[1]) : '';
          $oportunidades          = !empty($datos[2])  ? ($datos[2]) : '';
          $sucursal = utf8_encode(!empty($datos[3])  ? ($datos[3]) : '');

          if ($i == 1) {
            array_push($arregloData, $nombre, $dni, $oportunidades, $sucursal);
          } else {
            //si encuentro un mismo dni, tomo la oportunidad de aquel.
            //luego,debo modificar la oportunidad que habia, sumando la que encontre.
            if (in_array($dni, $arregloData)) {
              $posicion = array_search($dni, $arregloData);
              $oportunidadObtenida = intval($oportunidades);
              $oporAcumulada = intval($arregloData[$posicion + 1]);
              $arregloData[$posicion + 1] = $oporAcumulada + $oportunidadObtenida;
            } else { //si no lo encuentro, solo agregame el nuevo dni.
              array_push($arregloData, $nombre, $dni, $oportunidades, $sucursal);
            }
          }
        }

        $i = $i + 1;
      }
    }

    $this->model->insertarJugador($arregloData, $idsorteo);
    header("location: " . base_url() . "excel/listar");
    die();
  }
}
