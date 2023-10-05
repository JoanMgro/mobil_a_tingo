<?php
class SearchModel{
    private $results;
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn->get_conexion();
        
    }

    public function setResults($pais = '', $depto = '', $city = '', $barrio = '', $radio = 0.2, $boundingbox){



    }
}
?>