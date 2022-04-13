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

  public function insertar()
  {
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
        $cantidad_regist_agregados =  ($cantidad_registros - 1);

        if ($i != 0) {
          
          $datos = explode(";", $linea);
          $nombre = !empty($datos[0])  ? ($datos[0]) : '';
          $apellidos    = !empty($datos[1])  ? ($datos[1]) : '';
          $dni          = !empty($datos[2])  ? ($datos[2]) : '';
          $oportunidades = !empty($datos[3])  ? ($datos[3]) : '';
          $sucursal         = !empty($datos[4])  ? ($datos[4]) : '';

          array_push($arregloData, $nombre,$apellidos,$dni,$oportunidades,$sucursal);

        }

        $i=$i+1;
      }
      
    }

    $this->model->insertarJugador($arregloData,$idsorteo);
    header("location: " . base_url() . "excel/listar");
    die();
  }
}
