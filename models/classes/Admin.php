<?php
require_once __DIR__ . '/' . '/Conexion.php';
require_once __DIR__ . '/' . '/Cuenta.php';
class Admin extends Cuenta
{
    private string $idAdmin;
    private string $nombre;

    public function __construct(string $idAdmin = null, string $password = null, string $nombre = null)
    {
        parent::__construct($idAdmin, $password, 1);
        $this->idAdmin = $idAdmin;
        $this->nombre = $nombre;
        
    }

    public function crearAdmin(Conexion $conn)
    {
        $this->crearCuenta($conn);
        $dbh = $conn->get_conexion();        
        $sql = "call crear_admin(:idAdmin, :nombre)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idAdmin', $this->idAdmin);
        $stmt->bindValue(':nombre', $this->nombre);
        $stmt->execute();
        $stmt = null;
        $dbh = null;
    }

    public static function listarAdmin(Conexion $conn, $idAdmin)
    {
        $dbh = $conn->get_conexion();        
        $sql = "SELECT * FROM Admins WHERE id_admin = :idAdmin";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idAdmin', $idAdmin);
        $stmt->execute();
        $matched = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = NULL;
        $stmt = NULL;
        return $matched;
    }


}

// $admin = new Admin('admin@mobilatingo.com', 'admin', 'Alan Brito');
// $admin->crearAdmin(new Conexion);


?>