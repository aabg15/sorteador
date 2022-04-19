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

    public function limpiarTabla($id){



        $this->id = $id;
        $query = "DELETE FROM jugador WHERE idsorteo =".$id;
        $data = array($this->id);
        $this->delete($query, $data);
        return true;
        
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

        for ($i = 0; $i < $array_num; $i=$i+4){
            $this->nombre= $array[$i];
            $this->dni= $array[$i+1];
            $this->oportunidades= $array[$i+2];
            $this->sucursal= $array[$i+3];

            $query = "INSERT INTO jugador(nombre,dni,oportunidades,sucursal,idsorteo) VALUES (?,?,?,?,?)";
            $data = array($this->nombre, $this->dni, $this->oportunidades,$this->sucursal,$this->idsorteo);
            $resul = $this->insert($query, $data);
        }


        $return = $resul;
        return $return;
    }

}
