<?php
require_once "Conexion.php";


class Publisher extends Conexion
{

    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }

    public function GetPublisher()
    {
        try {
            $consulta = $this->pdo->prepare("CALL spu_Publisher_Listar()");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function GetSuperHeroP($data = [])
    {
        try {

            $consulta = $this->pdo->prepare("CALL spu_Publisher_Busqueda(?)");
            $consulta->execute(
                array($data['publisher_id'])
            );
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function AlineacionPubliser($data = [])
    {

        try {
            $consulta = $this->pdo->prepare("CALL spu_buscar_alineacion_publisher(?)");
            $consulta->execute(
                array($data ['publisher_id'])
            );
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
