<?php
class Perfil
{
    private $pefid;
    private $pefnom;
    private $activo;

    public static function listar(Conexion $conn, $limite, $filtro )
    {
        $dbh = $conn->get_conexion();
        $sql = "SELECT COUNT(pefid) FROM Perfil";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $currentRows = $stmt->fetchColumn();
        $totalPag = ceil($currentRows);


        // Si hay limite             
        if(isset($limite))
        {
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $filtros = " WHERE pefid LIKE :idPerfil OR pefnom LIKE :pefnom ORDER BY pefid LIMIT :limite";
            $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
            $sql = "SELECT * FROM Perfil" . $filtros;
            $stmt = $dbh->prepare($sql);
           
            $stmt->bindValue(':idPerfil', $filtro);
            $stmt->bindValue(':pefnom', $filtro);
            
            $stmt->bindValue(':limite', $limite);

            $stmt->execute();
            $perfiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null;
        }

        else
        {
            $filtros = " WHERE pefid LIKE :idPerfil OR pefnom LIKE :pefnom ORDER BY pefid";
            $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
            $sql = "SELECT * FROM Perfil" . $filtros;
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':idPerfil', $filtro);
            $stmt->bindValue(':pefnom', $filtro);
            
            $stmt->execute();
            $perfiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null;
        }

        return $perfiles;

    }
}
?>