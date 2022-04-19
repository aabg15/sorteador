<?php
class SorteoModel extends Mysql{
    protected $id, $nombre,$fecha,$premio,$img,$cantidad,$reglas;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectSorteo()
    {
        $sql = "SELECT * FROM sorteo";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function insertarSorteo(string $nombre, string $fechainicio, string $premio5letra, string $nombreImg,int $cantidad,string $reglas)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->fecha = $fechainicio;
        $this->premio = $premio5letra;
        $this->img = $nombreImg;
        $this->cantidad = $cantidad;
        $this->reglas = $reglas;
        
        $query = "INSERT INTO sorteo(nombre, fecha, premio, reglas,cantidad_intento,imagen_premio,estado) VALUES (?,?,?,?,?,?,?)";
        $data = array($this->nombre, $this->fecha, $this->premio, $this->reglas,$this->cantidad,$this->img,'SS');
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    public function editSorteo(int $id)
    {
        $sql = "SELECT * FROM sorteo WHERE id = $id";
        $res = $this->select($sql);
        return $res;
    }
    
    public function actualizarSorteo(String $nombre,String $fechainicio,String $premio5letra,String $cantidad, String $imagen, int $id,string $reglas)
    {
        $this->nombre = $nombre;
        $this->fecha = $fechainicio;
        $this->premio = $premio5letra;
        $this->cantidad = $cantidad;
        $this->img = $imagen;
        $this->id = $id;
        $this->reglas=$reglas;
        //$query = "UPDATE sorteo SET nombre = , imagen = ? WHERE id = ?";
        $query =  "UPDATE sorteo SET nombre='$nombre', fecha='$fechainicio',premio='$premio5letra',cantidad_intento='$cantidad',imagen_premio='$imagen',reglas='$reglas' WHERE id=".$id;
        $data = array($this->nombre,$this->fecha,$this->premio,$this->cantidad, $this->img, $this->id,$this->reglas);
        $this->update($query, $data);
        return true;
    }
    public function estadoSorteo(int $estado, int $id)
    {
        $this->estado = $estado;
        $this->id = $id;
        $query = "UPDATE sorteo SET estado = ? WHERE id = ?";
        $data = array($this->estado, $this->id);
        $this->update($query, $data);
        return true;
    }
    public function eliminarSorteo(int $id)
    {
        //$this->estado = $estado;
        $query = "DELETE FROM jugador WHERE idsorteo =".$id;
        $data = array($this->id);
        $this->delete($query, $data);


        $this->id = $id;
        $query = "DELETE FROM sorteo WHERE id =".$id;
        $data = array($this->id);
        $this->delete($query, $data);
        return true;
    }

}
