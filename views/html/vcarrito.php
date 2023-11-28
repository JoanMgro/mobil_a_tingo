<?php
require_once __DIR__ . '/' . '../../controllers/cadminsuscripciones.php';
?>
<section class="main__section_cuenta section">
<p class="text text_dashboard_title">Mi Carrito de Compras</p>
<?php
// var_dump($_SESSION['carrito']);
?>
</section>

<section class="main__paginas_body section section_paginas_body section_info_update">


    <?php if(!isset($_SESSION['carrito'])):?>
        <p>Carrito esta vacio, debes ir al shop</p>
    <?php else:?>
        <table class="tabla_busqueda">
            <thead class="text text_header_tabla">
                <tr>
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody class="text_resultado_tabla">
               
                    <tr>
                        <?php foreach($_SESSION['carrito'] as $value):?>
                            <td><?= $value ?></td>                            
                        <?php endforeach;?>
                        
                    </tr>
                    
          
                

            </tbody>   
            
        </table>
        <?php endif;?>
    <div class="section_precio">
    <h2>Total</h2>
    
    <h2><?php echo isset($_SESSION['carrito'])? $_SESSION['carrito']['valor_plan'] : '0.00'; ?></h2>
    

    </div>
    
    <?php if(isset($_SESSION['carrito'])):?>
    <div class="section_precio">
        <button id="borrar">Borrar Carrito</button>
        <button id="comprar" data-empresa="<?=$_SESSION['id_empresa']?>" data-plan="<?=$_SESSION['carrito']['id_plan']?>" data-vigencia="<?=$_SESSION['carrito']['dias_vigencia']?>" >Comprar</button>
    </div>
    <?php endif;?>
    
  
</section>
<script type="text/javascript" src="../../src/js/crude/crudesuscribir.js"></script>


   
