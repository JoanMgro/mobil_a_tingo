<?php
class Pagper
{
    private int $pagId;
    private int $pefId;

    private int $matched;

    public function __construct($pagId, $pefId)
    {
        $this->pagId = $pagId;
        $this->pefId = $pefId;
        
    }

    public function listarPagper(Conexion $conn)
    {
        $dbh = $conn->get_conexion();        
        $sql = "SELECT COUNT(*) FROM Pagper WHERE pagid = :pagId AND pefid = :pefId";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':pagId', $this->pagId);
        $stmt->bindValue(':pefId', $this->pefId);
        $stmt->execute();
        $this->matched = $stmt->fetchColumn();
        $dbh = NULL;
        $stmt = NULL;
        return $this->matched;  

    }



}
// require_once './Conexion.php';
// $mod = new Pagper(104, 2);
// var_dump($mod->listarPagper(new Conexion));
?>