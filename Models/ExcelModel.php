<?php
class ExcelModel extends Mysql{
    protected $nombre,$apellidos,$dni,$oportunidades,$sucursal,$idsorteo;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectExcel()
    {
        $sql = "SELECT * FROM jugador";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function insertarJugador($array,int $idsorteo)
    {
        $return = "";
    /*         $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->oportunidades = $oportunidades;
        $this->sucursal = $sucursal; */

       
        $this->idsorteo = $idsorteo;
        $array_num = count($array);
        //var_dump($array);

        for ($i = 0; $i < $array_num; $i=$i+5){
            $this->nombre= $array[$i];
            $this->apellidos= $array[$i+1];
            $this->dni= $array[$i+2];
            $this->oportunidades= $array[$i+3];
            $this->sucursal= $array[$i+4];


            $query = "INSERT INTO jugador(nombre, apellidos, dni,oportunidades,sucursal,idsorteo) VALUES (?,?,?,?,?,?)";
            $data = array($this->nombre, $this->apellidos, $this->dni, $this->oportunidades,$this->sucursal,$this->idsorteo);
            $resul = $this->insert($query, $data);
        }


        $return = $resul;
        return $return;
    }

}
