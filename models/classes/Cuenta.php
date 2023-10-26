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
    protected function listarCuenta()
    {

    }
    protected function listarCuentas()
    {

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