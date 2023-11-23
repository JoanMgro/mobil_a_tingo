<?php

require_once __DIR__ . '/Cuenta.php';
require_once __DIR__ . '/Ubicacion.php';

class Empresa extends Cuenta{
    private $idEmpresa;
    private $nit;
    private $nombre;
    private $urlLogo;
    private $idUbicacion;
    private  $contacto;
    private  $servicios;
    const PERFIL = 2;
    public string $mensaje;
    
    
    
    // private BoundingBox $boundingBox;


    public function __construct($idEmpresa = NULL, $password = NULL, $nombre = NULL, 
                                $nit = NULL, $urlLogo = 'http//', $contacto = NULL, $servicios = NULL)
    {
        parent::__construct($idEmpresa, $password, self::PERFIL);
        $this->idEmpresa = $idEmpresa;
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->urlLogo = $urlLogo;
        $this->contacto = $contacto;
        $this->servicios = $servicios;
       
    }   


    public function crearEmpresa(Conexion $conn, Ubicacion $ubicacion)
    {
        $this->crearCuenta($conn);
        $this->idUbicacion = $ubicacion->crearUbicacion($conn);

        $dbh = $conn->get_conexion();        
        $sql = "call crear_empresa(:idEmpresa, :nit, :nombre, :urlLogo, :idUbicacion, :contacto, :servicios)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idEmpresa', $this->idEmpresa);
        $stmt->bindValue(':nit', $this->nit);
        $stmt->bindValue(':nombre', $this->nombre);
        $stmt->bindValue(':urlLogo', $this->urlLogo);
        $stmt->bindValue(':idUbicacion', $this->idUbicacion);
        $stmt->bindValue(':contacto', $this->contacto);
        $stmt->bindValue(':servicios', $this->servicios);
        $stmt->execute();
        $stmt = null;
        $dbh = null;

       
        
        $this->mensaje = 'Usuario Creado con exito, ya puede hacer log-in';
       
        
    }

    public function listarDashboard(Conexion $conn)
    {

        $dbh = $conn->get_conexion();
        $sql = "SELECT e.id_empresa, e.nom_empresa, e.nit, e.ubicacion, e.url_logo, e.contacto, e.servicios, ub.pais, ub.departamento, ub.ciudad, ub.barrio, ub.direccion, ub.latitud, ub.longitud FROM Empresas e";
        $sql .= " INNER JOIN UbicacionEmpresas ub ON e.ubicacion = ub.id_ubicacion";
        // $sql .= " INNER JOIN Suscripciones sus ON e.id_empresa = sus.empresa";
        $sql .= " WHERE e.id_empresa = :empresa";      
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':empresa', $this->idEmpresa);
        $stmt->execute();
        $listaRegistros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT estado_suscripcion FROM Suscripciones WHERE empresa = :empresa";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':empresa', $this->idEmpresa);
        $stmt->execute();
        $listaRegistros[0]['estado_suscripcion'] = $stmt->fetchColumn();
        $dbh = NULL;
        $stmt = NULL;  
        
        return $listaRegistros;        
    }

    public static function listarEmpresa(Conexion $conn, $idEmpresa)
    {
        $dbh = $conn->get_conexion();        
        $sql = "SELECT * FROM Empresas WHERE id_admin = :idEmpresa";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idEmpresa', $idEmpresa);
        $stmt->execute();
        $matched = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = NULL;
        $stmt = NULL;
        return $matched;
    }

    public function actualizar(Conexion $conn)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "UPDATE Empresas SET url_logo = :urlLogo, contacto = :contacto, servicios = :servicios ";
        $sql .= "WHERE id_empresa = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', $this->idEmpresa);

        $stmt->bindValue(':urlLogo', $this->urlLogo);

        $stmt->bindValue(':contacto', $this->contacto);
        $stmt->bindValue(':servicios', $this->servicios);
        $stmt->execute();
        $stmt = null;
        $dbh = null;

    
    }

    public function eliminar(Conexion $conn, $idUbicacion)
    {
        $dbh = $conn->get_conexion();
        $sql = "DELETE FROM Cuentas WHERE id_cuenta = :empresa";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':empresa', $this->idEmpresa);
        $stmt->execute();

        $sql = "DELETE FROM UbicacionEmpresas WHERE id_ubicacion = :idUbi";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idUbi', $idUbicacion);
        $stmt->execute();

        $dbh = null;
        $stmt = null;
    }
    

   

}

// require_once __DIR__ . '/Conexion.php';
// $lista = new Empresa('reparamos@gmail.com');
// var_dump($lista->listarDashboard(new Conexion));
?>