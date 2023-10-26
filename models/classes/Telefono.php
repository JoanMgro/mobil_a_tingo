<?php
class Telefono
{
    private $idTelefono;
    private $numTelefono;
    private $tipoTelefono;
    private $empresa;
    private Array $listaTelefonos;

    public function __construct(Array $telefonosJson)
    {
      $this->listaTelefonos = $telefonosJson;       
    }

    public function crearTelefono(Conexion $conn, string $idEmpresa)
    {
        $dbh = $conn->get_conexion();
        foreach($this->listaTelefonos as $telefono)
        {
            foreach($telefono as $key => $value)
            {
               
                $sql = "call crear_telefono(:numtel, :tipotel, :empresa)";
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(':numtel', $value);
                $stmt->bindValue(':tipotel', $key);
                $stmt->bindValue(':empresa', $idEmpresa);
                $stmt->execute();
         
                var_dump($key);
                var_dump($value);

            }

        }
        $stmt = null;
        $dbh = null;
      
        
    }

    
}
?>