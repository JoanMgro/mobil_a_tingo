<?php


class Cuenta{

    protected $idCuenta;
    protected $password;
    private $fechaRegistro;
    protected $perfil;
       

    public function __construct($idCuenta, $password, $perfil)
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
    public static function listarCuentas(Conexion $conn, $limite, $filtro )
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
            $filtros = " WHERE id_cuenta LIKE :idCuenta OR fecha_registro LIKE :fecha_registro OR perfil LIKE :perfil ORDER BY id_cuenta LIMIT :limite";
            $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
            $sql = "SELECT * FROM Cuentas" . $filtros;
            $stmt = $dbh->prepare($sql);
           
            $stmt->bindValue(':idCuenta', $filtro);
            $stmt->bindValue(':fecha_registro', $filtro);
            $stmt->bindValue(':perfil', $filtro);
            $stmt->bindValue(':limite', $limite);

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
        
}

?>