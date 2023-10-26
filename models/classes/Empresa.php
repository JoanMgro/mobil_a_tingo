<?php

require_once __DIR__ . '/Cuenta.php';
require_once __DIR__ . '/Ubicacion.php';

class Empresa extends Cuenta{
    private $idEmpresa;
    private $nit;
    private $nombre;
    private $urlLogo;
    private $idUbicacion;
    private  $telefonos;
    const PERFIL = 2;
    
    
    
    // private BoundingBox $boundingBox;


    public function __construct($idEmpresa, $password, $nit, 
                                $nombre, $urlLogo)
    {
        parent::__construct($idEmpresa, $password, self::PERFIL);
        $this->idEmpresa = $idEmpresa;
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->urlLogo = $urlLogo;
       
    }   


    public function crearEmpresa(Conexion $conn, Ubicacion $ubicacion, Telefono $telefonos)
    {
        $this->crearCuenta($conn);
        $this->idUbicacion = $ubicacion->crearUbicacion($conn);

        $dbh = $conn->get_conexion();        
        $sql = "call crear_empresa(:idEmpresa, :nit, :nombre, :urlLogo, :idUbicacion)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idEmpresa', $this->idEmpresa);
        $stmt->bindValue(':nit', $this->nit);
        $stmt->bindValue(':nombre', $this->nombre);
        $stmt->bindValue(':urlLogo', $this->urlLogo);
        $stmt->bindValue(':idUbicacion', $this->idUbicacion);
        $stmt->execute();
        $stmt = null;
        $dbh = null;

        $telefonos->crearTelefono($conn, $this->idEmpresa);

        /* Crear Telefonos*/
        
    }
    public function listarEmpresa()
    {
        /* */
    }
    public function listarEmpresas()
    {
        /* */
    }

   

}
?>