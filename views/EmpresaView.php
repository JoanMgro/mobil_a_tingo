<?php
class EmpresaView{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;        
    }

    public function render()
    {        
        require __DIR__ . '/' . './html/resultadosi.php';
    }
}
?>