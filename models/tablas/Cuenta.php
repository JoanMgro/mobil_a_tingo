<?php

abstract class Cuenta{

    protected $idCuenta;
    protected $password;
    protected $fechaRegistro;
    protected $tipoCuenta;
    protected $isActive;

    public function __construct($idCuenta, $password, $fechaRegistro, $tipoCuenta, $isActive)
    {
        $this->idCuenta = $idCuenta;
        $this->password = $password;
        $this->fechaRegistro = $fechaRegistro;
        $this->tipoCuenta = $tipoCuenta;
        $this->$isActive = $isActive;        
    }

    abstract protected function crearCuenta();
    abstract protected function listarCuenta();
    abstract protected function listarCuentas();
        
}

?>