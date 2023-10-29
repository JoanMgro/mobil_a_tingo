<?php
require __DIR__ . '/' . '../../controllers/cadminperfiles.php';

?>
<section class="main__paginas_title section section_paginas_title">
    <h1>Administracion de Perfiles</h1>
  
</section>
<section class="main__paginas_body section section_paginas_body">
    <form id="pagBuscar" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="buscar">Buscar</label>
        <input name="filtro" id="buscar" type="text" autocomplete="off" onchange="this.form.submit()" value="<?php echo isset($_GET['filtro']) ? $_GET['filtro'] : '';?>">
        <label for="registros">Registros</label>
        <input name="limite" id="registros" type="text" autocomplete="off" onchange="this.form.submit()" value="<?php echo isset($_GET['limite']) ? $_GET['limite'] : '';?>">
        <input type="hidden" name="pg" value="105">
    </form>
   
</section>
<section class="main__paginas_body section section_paginas_body">

    <div class="pagina">
            <h4 class="pagina__info">-- Info Pagina --</h4>
            <h4 class="pagina__activa">-- Activa --</h4>
        </div>
    
    <?php foreach($listado as $paginas):?>
    <div class="pagina">

        <div class="pagina__registro registro">
            
            <p class="registro__col col col_pagid"><b>Id:</b><?=$paginas['pefid']?></p>
            <p class="registro__col col col_pagnom"><b>Perfil:</b><?=$paginas['pefnom']?></p>

        </div>
        
        <form id="<?php echo 'form' . $paginas['pefid'];?>" action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET" class="pagina__checkbox">
            <?php if($paginas['activo'] == 1):?>            
                <input type="checkbox" name="" id=<?php echo 'id'. $paginas['pefid']; ?> value=<?=$paginas['activo']?> checked onchange="<?php echo "document.querySelector('#form{$paginas['pefid']}').submit()"?>">  
                <input type="hidden" name="pagmos" value="0"> 
            <?php else:?> 
                <input type="checkbox" name="" id=<?php echo 'id'. $paginas['pefid']; ?> value=<?=$paginas['activo']?> onchange="this.form.submit()">
                <input type="hidden" name="pagmos" value="1"> 
            <?php endif;?> 
            <input type="hidden" name="id_cuenta" value=<?=$paginas['pefid']?>> 
            <input type="hidden" name="pg" value="105">
        </form>
   
    </div>
    <?php endforeach;?>
</section>