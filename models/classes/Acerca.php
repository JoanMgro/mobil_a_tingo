<?php
class Acerca{

    private $idAcerca;
    private $textoAcerca;

    public function __construct($idAcerca = null, $textoAcerca = null)
    {
        $this->idAcerca = $idAcerca;
        $this->textoAcerca = $textoAcerca;        
    }

    public function setIdAcerca($id)
    {
        $this->idAcerca = $id;
    }
    public function setTextoAcerca($texto)
    {
        $this->textoAcerca = $texto;
    }
    
    public function readTextoAcerca(Conexion $conn)
    {   
        $dbh = $conn->get_conexion();        
        $sql = "SELECT ac.texto_acerca FROM Acerca ac";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $this->textoAcerca = $stmt->fetchColumn();
        $dbh = NULL;
        $stmt = NULL;        

    }

    public function getTextoAcerca()
    {
        return $this->textoAcerca;
    }

    public function listar($conn)
    {
        $dbh = $conn->get_conexion();        
        $sql = "SELECT ac.id_acerca, ac.texto_acerca FROM Acerca ac";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $textoAcerca = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = NULL;
        $stmt = NULL;
        return $textoAcerca;
    }
    public function actualizar($conn)
    {
            
            $dbh = $conn->get_conexion();
            
            $sql = "UPDATE Acerca SET texto_acerca = :texto ";
            $sql .= "WHERE id_acerca = :idAcerca";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':idAcerca', $this->idAcerca);
            $stmt->bindValue(':texto', $this->textoAcerca);
            $stmt->execute();
            $dbh = null;
            $stmt = null;
       
    }

}
?>