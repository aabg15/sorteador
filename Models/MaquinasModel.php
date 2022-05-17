<?php
//require_once('../Libraries/Core/Mysql.php');

class MaquinasModel extends Mysql
{
    protected $id, $nombre, $fecha, $premio, $img, $cantidad, $reglas;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectMaquinas()
    {
        $sql = "SELECT * FROM maquinas";
        $res = $this->select_all($sql);
        return $res;
    }

    public function insertarMaquinas(string $nombreImg, string $destino)
    {


        $consulta = "SELECT count(id) as 'cantidad' FROM maquinas";
        $dataCant = $this->select($consulta);
        //echo 'cantidad de ganadores -> :';

        $cantidad = $dataCant[0];
        if ($cantidad > 0) {
            //hay mas de 1 imagen agregada

            //actualizo las img a estado 0, para luego agregar el nuevo
            $estado =0;
            $update = "UPDATE maquinas SET estado=0";
            $data = array($estado);
            $this->update($update, $data);

            $query = "INSERT INTO maquinas(img, destino,estado) VALUES (?,?,?)";
            $data = array($nombreImg, $destino, 1);
            $resul = $this->insert($query, $data);
            $return = $resul;
           


        } else {
            //es la primera img ingresada
            $query = "INSERT INTO maquinas(img, destino,estado) VALUES (?,?,?)";
            $data = array($nombreImg, $destino, 1);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }


        $return = "";



        return $return;
    }

    public function reingresarMaquinas($id)
    {

        $estado =0;
        $update = "UPDATE maquinas SET estado=0";
        $data = array($estado);
        $this->update($update, $data);



        $return = "";
        $this->id = $id;
        $query = "UPDATE maquinas SET estado =1 WHERE id=".$id;
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function editMaquinas($id)
    {
        $sql = "SELECT * FROM maquinas WHERE id = $id";
        $res = $this->select($sql);
        return $res;
    }

    public function actualizarMaquinas($imagen,$id,$destino)
    {
    
        $this->img = $imagen;
        $this->id = $id;
        
        //$query = "UPDATE sorteo SET nombre = , imagen = ? WHERE id = ?";
        $query =  "UPDATE maquinas SET img='$imagen',destino='$destino' WHERE id=".$id;
        $data = array($this->img, $this->id);
        $this->update($query, $data);
        return true;
    }

    public function eliminarMaquinas($id,$destino)
    {
        unlink($destino);

        $this->id = $id;
        $query = "DELETE FROM maquinas WHERE id =".$id;
        $data = array($this->id);
        $this->delete($query, $data);
        return true;
    }

}
