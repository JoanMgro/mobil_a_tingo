<?php
class PlanesView{
    private $model;
    
    public function __construct(PlanesMobilatingo $model)
    {
        $this->model = $model;
    }

    public function render()
    {   

        foreach ($this->model->getPlanes() as $item)
        {
            $HTMLitem = null;
            $plan = null;
            $valor = 0;
            $desc = null;
            $idPlan =0;
            $prefixIdBtn = null;
            $prefixIdDiv = null;

            $HTMLitem .= "<section class='main__section section section_planes'>";
            foreach ($item as $key => $value)
            {
                if($key == 'id_plan') $idPlan = $value;
                if($key == 'nom_plan') $plan = $value; 
                if($key == 'valor_plan') $valor = $value;
                if($key == 'desc_plan') $desc = $value;
             
            }
            $prefixIdBtn = 'btn' . $idPlan;
            $prefixIdDiv = 'div' . $idPlan;

            
            
            $HTMLitem .= "<h3>{$plan}</h3>";
            $HTMLitem .= "<div>Valor: {$valor}</div>";
            $HTMLitem .= "<button id='{$prefixIdBtn}' class='btn_secondary btn_planes'>Ver Detalle</button>";
            $HTMLitem .= "<div id='{$prefixIdDiv}' class='block_hidden scrollbox scrollbox_planes'>{$desc}</div>";
            $HTMLitem .= '</section>'; 
            echo $HTMLitem . PHP_EOL;
            echo <<<SCRIPT
            <script type="application/javascript" defer>
            const {$prefixIdBtn} = document.getElementById('{$prefixIdBtn}');
            const {$prefixIdDiv} = document.getElementById('{$prefixIdDiv}');
            {$prefixIdBtn}.addEventListener('click', ()=>{
                {$prefixIdBtn}.textContent = {$prefixIdBtn}.textContent === 'Ver Detalle' ? 'Ocultar Detalle' : 'Ver Detalle';
                {$prefixIdDiv}.classList.toggle('block_hidden');
            });
            </script>          
            SCRIPT . PHP_EOL;
        }
        
    }


}
?>