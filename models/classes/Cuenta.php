<?php


class Cuenta{

    protected $idCuenta;
    protected $password;
    private $fechaRegistro;
    protected $perfil;
    public $currentRows;
       

    public function __construct($idCuenta = null, $password = null, $perfil= null)
    {
        $this->idCuenta = $idCuenta;
        $this->password = $password;
        $this->perfil = $perfil;             
    }

    protected function crearCuenta(Conexion $conn)
    {
            //Enrcriptamos pass
            $pp = password_hash($this->password, PASSWORD_DEFAULT);
  
            $dbh = $conn->get_conexion();        
            $sql = "call crear_usuario(:user, :pass, :perfil)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':user', $this->idCuenta);
            $stmt->bindValue(':pass', $pp);
            $stmt->bindValue(':perfil', $this->perfil);
            $stmt->execute();

    }
    public static function listarCuentas(Conexion $conn, $limite = null, $filtro, $offset )
    {
        $dbh = $conn->get_conexion();
        $sql = "SELECT COUNT(id_cuenta) FROM Cuentas";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $currentRows = $stmt->fetchColumn();
        $totalPag = ceil($currentRows);


        // Si hay limite             
        if(isset($limite))
        {
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $filtros = " WHERE id_cuenta LIKE :idCuenta OR fecha_registro LIKE :fecha_registro OR perfil LIKE :perfil ORDER BY id_cuenta LIMIT :offset, :limite";
            $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
            $sql = "SELECT * FROM Cuentas" . $filtros;
            $stmt = $dbh->prepare($sql);
           
            $stmt->bindValue(':idCuenta', $filtro);
            $stmt->bindValue(':fecha_registro', $filtro);
            $stmt->bindValue(':perfil', $filtro);
            $stmt->bindValue(':limite', $limite);
            $stmt->bindValue(':offset', $offset);

            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null;
        }

        else
        {
            $filtros = " WHERE id_cuenta LIKE :idCuenta OR fecha_registro LIKE :fecha_registro OR perfil LIKE :perfil ORDER BY id_cuenta";
            $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
            $sql = "SELECT * FROM Cuentas" . $filtros;
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':idCuenta', $filtro);
            $stmt->bindValue(':fecha_registro', $filtro);
            $stmt->bindValue(':perfil', $filtro);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null;
        }

        return $usuarios;

    }


    static function autenticar(Conexion $conn, $user, $pass)
    {
           
            
            
            $dbh = $conn->get_conexion();        
            // $sql = "call validar_usuario(:user, :pass)";
            $sql = "call validar_hash_usr(:user)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':user', $user);
            // $stmt->bindValue(':pass', $pp);
            $stmt->execute();
            $session =  $stmt->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null; 
            if(password_verify($pass, $session['password']))
            {
                unset($session['password']);
                return $session;

            }

            return null;
                
                  
      
            


    }

    static function cargarSesion(Conexion $conn, $perfil, $user)
    {
            $dbh = $conn->get_conexion(); 
            if($perfil == 2)
            {
                $sql = "call cargar_empresa(:user)";
            }
            if($perfil == 1)
            {
                $sql = "call cargar_admin(:user)";
            }        
            
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':user', $user);
            $stmt->execute();
            $session =  $stmt->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null;           
      
            return $session;


    }

    public function getNumberOfRegisters(Conexion $conn, $filtro)
    {
        $dbh = $conn->get_conexion();
        $filtros = " WHERE id_cuenta LIKE :idCuenta OR fecha_registro LIKE :fecha_registro OR perfil LIKE :perfil";
        $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
        $sql = "SELECT COUNT(id_cuenta) FROM Cuentas" . $filtros;
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idCuenta', $filtro);
        $stmt->bindValue(':fecha_registro', $filtro);
        $stmt->bindValue(':perfil', $filtro);
        $stmt->execute();
        $this->currentRows = $stmt->fetchColumn();
        $dbh = null;
        $stmt = null;
        return $this->currentRows;
    }

    public function activar(Conexion $conn, $idCuenta, $activo)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "UPDATE Cuentas SET activo = :activo WHERE id_cuenta = :idCuenta";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idCuenta', $idCuenta);
        $stmt->bindValue(':activo', $activo);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }




        
}

?>