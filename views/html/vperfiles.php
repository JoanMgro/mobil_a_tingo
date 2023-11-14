<?php
require __DIR__ . '/' . '../../controllers/cadminperfiles.php';


?>
<section class="main__paginas_title section section_paginas_title">
    <h1>Administracion de Perfiles</h1>
  
</section>

<section class="main__paginas_body section section_paginas_body">
    <?php foreach($listadoRegistros as $registro):?>
    <div class="pagina">
        <div class="pagina__data">
            <p class="registro__perfil"><b>Id:</b> <?=$registro['pefid']?></p>
            <p class="registro__perfil"><b>Nombre:</b> <?=$registro['pefnom']?></p>
        </div>
        
        <form class="pagina__data_btn" action="#" method="POST">
            <input type="hidden" name="controller" value="mostrar">
            <input type="hidden" name="pefid" value="<?=$registro['pefid']?>">
            <?php if($registro['pefid']!= 3):?>
            <input type="hidden" name="pagmen" value="home">
            <?php else:?>
            <input type="hidden" name="pagmen" value="index">            
            <?php endif;?>
            <button id="<?= 'btn-' . $registro['pefid']?>" data-controller="mostrar">Ver Paginas</button>
        </form>
        

    </div>
    <?php endforeach;?>
    <?php
    if(isset($listadoPagPer))
    require __DIR__ . '/' . '../../views/html/vmodalpagper.php'

    ?>
    <script type="text/javascript" src="../../src/js/pagper/pagper.js"></script>  
</section>
