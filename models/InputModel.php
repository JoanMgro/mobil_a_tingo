<?php 

class InputModel{
    private $inputArray;
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn->get_conexion();
    }

    
    public function getInputArray($col,$table){
        $sql = "SELECT {$col} FROM $table ORDER BY {$col};";
        $stmt = $this->conn->query($sql);
        $this->inputArray = $stmt->fetchAll(PDO::FETCH_COLUMN);   
        return $this->inputArray;       
    }
} 

// $ptp = new Conexion();
// $model = new InputModel($ptp);
// $smt = $model->getInputArray('nom_pais', 'Paises');

// var_dump($smt);
// ?>


 