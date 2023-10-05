<?php
require_once __DIR__ . '/' . '../../models/InputModel.php';

class InputView{
    private $inputModel;

    public function __construct(InputModel $model)
    {
        $this->inputModel = $model;
        
    }
    //funcion me retorna un array para guardar en localstorage y sacarlo para el autocomplete.
    public function setArrayVars($col, $tabla){
        $array = json_encode($this->inputModel->getInputArray($col, $tabla));
        //json_encode me vuelve esto un arreglo ["algo", "otroAlgo"].
        //
        return 
            <<<VARS
            <script>
                localStorage.setItem("{$tabla}", JSON.stringify({$array}));
            </script>
            VARS;

    }


    public function render($input){
        //1era letra Mayuscula
        $uInput = ucfirst($input);
        return 
            <<<INPUT
            <input id= {$input}
            class="form-buscar__input input input_buscar"
            type="text"
            name={$input}
            placeholder= {$uInput}
            autocomplete="off">
            INPUT;
    }
}

?>