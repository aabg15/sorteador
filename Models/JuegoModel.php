<?php

use function PHPSTORM_META\type;

class JuegoModel extends Mysql
{
    protected $id, $nombre, $fecha, $premio, $img, $cantidad, $reglas, $dni;
    public function __construct()
    {

        parent::__construct();
    }
    public function selectJuego()
    {
        $sql = "SELECT * FROM sorteo";
        $res = $this->select_all($sql);
        return $res;
    }

    public function actulizarEstado($id_sorteo)
    {
        $estado = 'SR';
        $query =  "UPDATE sorteo SET estado='$estado' WHERE id=" . $id_sorteo;
        $data = array($estado);
        $this->update($query, $data);
        return true;
    }


    public function listarJugadoresModificado($idsorteo, $dni, $cant_ganadores)
    {


        $consulta = "SELECT count(id) as 'cantidad' FROM ganadores where sorteo=" . $idsorteo;
        $dataCant = $this->select($consulta);

        //veo los dni que ya van ganando
        $consulta = "SELECT * FROM ganadores where sorteo=" . $idsorteo;
        $dataDni = $this->select_all($consulta);
        $pedazo = "";
        foreach ($dataDni as $datpS) {
            $dni = $datpS['dni'];
            $pedazo .= $dni . ',';
        }
        $pedazo = substr($pedazo, 0, -1);

        $sqlCon = "SELECT * FROM jugador WHERE idsorteo =".$idsorteo." AND dni NOT IN (" . $pedazo . ")";

        //echo 'cantidad de ganadores -> :';
        $cantidad = $dataCant[0];


        if ($cantidad < $cant_ganadores) {
            //$sql = "SELECT * FROM jugador WHERE idsorteo = $idsorteo" . " AND dni!=" . $dni;
            $data = $this->select_all($sqlCon);
            //armo la lista con las opotunidades y teniendo en cuenta si ya hay un ganador para quitarlo de la lista final.
            //$listafinal = array();
            $datos = [];

            foreach ($data as $datpS) {
                $oportunidades = $datpS['oportunidades'];
                $dni = $datpS['dni'];
                $nombre = $datpS['nombre'];
                $apellidos = $datpS['apellidos'];
                $jugador = $nombre . ' ' . $apellidos;
                if ($oportunidades == 1) {
                    //$listafinal[] = $jugador;

                    array_push($datos, array($dni, $jugador));
                } else {
                    while ($oportunidades > 0) {
                        array_push($datos, array($dni, $jugador));
                        $oportunidades = $oportunidades - 1;
                    }
                }
            }
            return $datos;
        } else {
            //retorno se acabo

            return '1';
        }
    }

    public function listarJugadores($id, $cant_ganadores)
    {

        $consulta = "SELECT count(id) as 'cantidad' FROM ganadores where sorteo=" . $id;
        $dataCant = $this->select($consulta);
        //echo 'cantidad de ganadores -> :';

        $cantidad = $dataCant[0];
      

        if ($cantidad > 0) {
            //hay mas de uno
            $consulta = "SELECT * FROM ganadores where sorteo=" . $id;
            $dataDni = $this->select_all($consulta);
            $pedazo = "";
            foreach ($dataDni as $datpS) {
                $dni = $datpS['dni'];
                $pedazo .= $dni . ',';
            }
            $pedazo = substr($pedazo, 0, -1);

            $sql = "SELECT * FROM jugador WHERE idsorteo ='$id' AND dni NOT IN (" . $pedazo . ")";
        } else {
            //no modifiques el sql.
            $sql = "SELECT * FROM jugador WHERE idsorteo = $id";
        }

        //si esta en el rango, armo la lista, si no, no se permite mas jugadas.
        if ($cantidad < $cant_ganadores) {

            $data = $this->select_all($sql);
            //armo la lista con las opotunidades y teniendo en cuenta si ya hay un ganador para quitarlo de la lista final.

            $datos = [];

            foreach ($data as $datpS) {

                $oportunidades = $datpS['oportunidades'];
                $dni = $datpS['dni'];
                $nombre = $datpS['nombre'];
                $apellidos = $datpS['apellidos'];
                $jugador = $nombre . ' ' . $apellidos;
                if ($oportunidades == 1) {
                    /* $datos = array(
                        [$numero] => array(
                            $dni => $jugador,
                        )

                    );
                    $numero = $numero + 1; */
                    array_push($datos, array($dni, $jugador));
                } else {
                    while ($oportunidades > 0) {
                        /* $datos = array(
                            [$numero] => array(
                                $dni => $jugador,
                            )

                        );
                        $numero = $numero + 1; */
                        array_push($datos, array($dni, $jugador));
                        $oportunidades = $oportunidades - 1;
                    }
                }
            }
            return $datos;
        } else {
            //retorno se acabo

            return '1';
        }
    }

    public function guardaGanador($dni, $premio, $id_sorteo)
    {
        $query = "INSERT INTO ganadores(dni, sorteo, premio) VALUES (?,?,?)";
        $data = array($dni, $id_sorteo, $premio);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    public function listaGanadoresfinales($idsorteo)
    {

        $consulta = "SELECT ju.nombre,ju.apellidos,g.dni,g.premio,ju.sucursal from ganadores g INNER JOIN jugador ju on(ju.dni=g.dni) where sorteo=" . $idsorteo;
        //$sql = "SELECT * FROM ganadores WHERE sorteo =".$idsorteo;

        $res = $this->select_all($consulta);
        return $res;
    }
}
