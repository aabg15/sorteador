<?php
class GanadorModel extends Mysql{
    protected $id, $nombre,$fecha,$premio,$img,$cantidad,$reglas,$sucursal;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectGanador()
    {
        $sql = "SELECT * FROM ganadores";
        $res = $this->select_all($sql);
        return $res;
    }

    public function selectGanadorSorteo(int $id)
    {
        $sql = "SELECT * FROM ganadores WHERE id=".$id;
        $res = $this->select_all($sql);
        return $res;
    }

}
