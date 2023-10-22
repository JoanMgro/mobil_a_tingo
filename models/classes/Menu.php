<?php
// require_once './Conexion.php';
// require_once './Pagina.php';
class Menu extends Pagina
{
    public function setPaginas(Conexion $conn, $pagmen, $pefid = 3)
    {
        $dbh = $conn->get_conexion();
        $sql = "SELECT p.pagid, p.pagnom, p.pagord, p.pagmen ";
        $sql .= "FROM Pagina p ";
        $sql .= "INNER JOIN Pagper pp ON p.pagid = pp.pagid ";
        $sql .= "WHERE pp.pefid = :pefid AND p.pagmos = 1 AND p.pagmen = :pagmen ";
        $sql .= "ORDER BY p.pagord";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':pefid', $pefid);
        $stmt->bindValue(':pagmen', $pagmen);
        $stmt->execute();
        $this->paginas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
        $stmt = null; 

    }
    public function getPaginas()
    {
        return $this->paginas;
    }

}


?>