<?php
class Ubicacion{

    private $idUbicacion;
    private $pais;
    private $departamento;
    private $ciudad;
    private $barrio;
    private $direccion;
    private $latitud;
    private $longitud;
    

    public function __construct($pais, $departamento,
                                $ciudad, $barrio, $direccion,
                                $latitud, $longitud)
    {
        $this->pais = empty($pais) ? 'Not defined' : $pais;
        $this->departamento = empty($departamento) ? 'Not defined' : $departamento;
        $this->ciudad = empty($ciudad) ? 'Not defined' : $ciudad;
        $this->barrio = empty($barrio) ? 'Not defined' : $barrio;
        $this->direccion =  empty($direccion) ? 'Not defined' : $direccion;
        $this->latitud = empty($latitud) ? 0.0: $latitud;
        $this->longitud = empty($longitud) ? 0.0 : $longitud;
    }

    public function getLatitud(){
        return $this->latitud;
    }

    public function setLatitud($lat){
        $this->latitud = $lat;
    }
    public function getLongitud(){
        return $this->longitud;
    }
    public function setLongitud($long){
        $this->longitud = $long;
    }
    public function getPais(){
        return $this->pais;
    }
    public function setPais($pais){
        $this->pais = $pais;
    }

    public function getDepto(){
        return $this->departamento;
    }
    public function setDepto($departamento){
        $this->departamento = $departamento;
    }

    public function getCiudad(){
        return $this->ciudad;
    }
    public function setCiudad($ciudad){
        $this->ciudad = $ciudad;
    }

    public function getBarrio(){
        return $this->barrio;
    }
    public function setBarrio($barrio){
        $this->barrio = $barrio;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getIdUbicacion(){
        return $this->idUbicacion;
    }

    public function crearUbicacion(Conexion $conn)
    {
        $dbh = $conn->get_conexion();        
        $sql = "INSERT INTO UbicacionEmpresas (pais, departamento, ciudad, barrio, direccion, latitud, longitud) ";
        $sql .= "VALUES (:pais, :departamento, :ciudad, :barrio, :direccion, :latitud, :longitud)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':pais', $this->pais);
        $stmt->bindValue(':departamento', $this->departamento);
        $stmt->bindValue(':ciudad', $this->ciudad);
        $stmt->bindValue(':barrio', $this->barrio);
        $stmt->bindValue(':direccion', $this->direccion);
        $stmt->bindValue(':latitud', $this->latitud);
        $stmt->bindValue(':longitud', $this->longitud);
        $stmt->execute();
        $this->idUbicacion = $dbh->lastInsertId();
        $dbh = null;
        $stmt = null;
        return $this->idUbicacion;

    }


}
?>