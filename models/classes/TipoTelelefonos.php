<?php
class TipoTelefonos
{
    private $idTipoTelefono;
    private $descTipoTelefono;
    private Array $tiposTelefonos;

    public function __construct($idTipoTelefono = null, $descTipoTelefono = null)
    {
        $this->idTipoTelefono = $idTipoTelefono;
        $this->descTipoTelefono = $descTipoTelefono;        
    }

    public function setTipoTelefonos(Conexion $conn)
    {
        $dbh = $conn->get_conexion();        
        $sql = "SELECT t.desc_tipo_telefono FROM TipoTelefonos t";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $this->tiposTelefonos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = NULL;
        $stmt = NULL;        

    }

    public function getTipoTelefonos()
    {
        return $this->tiposTelefonos;
    }
}
?>