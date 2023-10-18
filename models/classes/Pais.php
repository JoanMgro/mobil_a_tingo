<?php
require_once __DIR__ . '/Conexion.php';

class Pais{

    private $conn;
    private $idPais;
    private $nomPais;
    private $paises;
    

    public function __construct(Conexion $conn)
    {
        $this->conn = $conn->get_conexion();
    }

    public function getPais()
    {
        return Array('idPais' => $this->idPais, 'nomPais' => $this->nomPais);
    }
    //Obtener todos los paises de la tabla Pais
    public function setPaises()
    {
        $sql = "SELECT nom_pais FROM Paises ORDER BY nom_pais;";
        $stmt = $this->conn->query($sql);
        $this->paises = $stmt->fetchAll(PDO::FETCH_COLUMN); 
               
    }

    public function getPaises(){
        return $this->paises;
    }

}
?>