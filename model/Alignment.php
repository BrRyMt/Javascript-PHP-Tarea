<?php
require "Conexion.php";

class Alineacion extends Conexion
{
    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }

    public function GrupoHeroe()
    {
        try {
            $consulta = $this->pdo->prepare("CALL spu_grupos_heroes()");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
