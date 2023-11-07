<?php
require __DIR__ . '/' . '../../controllers/cadminpag.php';

?>
<section class="main__paginas_title section section_paginas_title">
    <h1>Administracion de paginas</h1>
  
</section>
<section class="main__paginas_body section section_paginas_body section_paginas_update">
    <form action="#" class="form form_admin" method="post">
        <label class="registro__label" for="id"><b>Id:</b></label>
        <input required class="registro__input registro__input_long type="number" name="id" id="id" value="">
        <label class="registro__label" for="nombre"><b>Nombre:</b></label>
        <input required class="registro__input registro__input_long type="text" name="nombre" id="nombre" value="">
        <label class="registro__label" for="archivo"><b>Archivo:</b></label>
        <input required class="registro__input registro__input_long type="text" name="archivo" id="archivo" value="">
        <label class="registro__label" for="orden"><b>Orden:</b></label>
        <input required class="registro__input registro__input_long type="number" name="orden" id="orden" value="">
        <label class="registro__label" for="menu"><b>Menu:</b></label>
        <input required class="registro__input registro__input_long type="text" name="menu" id="menu" value="">
        <label class="registro__label" for="activo"><b>Activa:</b></label>
        <input class="registro__input_check" type="checkbox" name="activo" id="activo" value="1">
        <input type="hidden" name="controller" value="crear">
       
        <input class="registro__btn_crear" type="submit" value="Crear Pagina">
    </form>
  
</section>
<section class="main__paginas_body section section_paginas_body">
    <form id="pagBuscar" action="#" class="form form_admin" method="post">
        <label for="buscar" class="form__label_admin">Filtrar</label> 
        <input class="form__input_admin" name="filtro" id="buscar" type="text" autocomplete="off" onchange="this.form.submit()" value="<?php echo isset($filtro) ? $filtro : '';?>">
        <label for="registros" class="form__label_limite">Registros por pagina</label>
        <input class="form__input_limite" name="limite" id="registros" type="number" autocomplete="off" onchange="this.form.submit()" value="<?php echo $limite;?>">
        <label for="page" class="form__label_paginacion">Mostrando</label>
        <input class="form__input_paginacion" name="page" id="page" type="number" autocomplete="off" onchange="this.form.submit()" value="<?php echo $page;?>">
        <p id="totalpages" class="form__parrafo_paginacion">de <?=$totalPages?></p>
        <!-- Manipulamos la var page -->
        <input class="form__prev_paginacion" id="prev" name="prev" type="button" value="<">
        <input class="form__next_paginacion" id="next" name="next" type="button" value=">">
        <script type="text/javascript" src="../../src/js/paginacion/paginacion.js"></script>
        <input type="hidden" name="pg" value="104">
    </form>
   
</section>
<section class="main__paginas_body section section_paginas_body">

    <div class="pagina">
            <h4 class="pagina__info">-- Info Pagina --</h4>
            <h4 class="pagina__activa">-- Activa --</h4>
        </div>
    
    <?php foreach($listadoRegistros as $registro):?>
    <div class="pagina">
        
        <form id="<?php echo 'updateform' . $registro['pagid'];?>" class="pagina__registro registro" action="" method="post">
            <label class="registro__label" for="<?php echo 'id-' . $registro['pagid'];?>"><b>Id:</b></label>
            <input class="registro__input registro__input_short type="number" name="pagid" id="<?php echo 'id-' . $registro['pagid'];?>" value="<?=$registro['pagid']?>">
            <label class="registro__label" for="<?php echo $registro['pagnom'];?>"><b>Nombre:</b></label>
            <input class="registro__input registro__input_short ng type="text" name="pagnom" id="<?php echo $registro['pagnom'];?>" value="<?=$registro['pagnom']?>">
            <label class="registro__label" for="<?php echo $registro['pagarc'];?>"><b>Archivo:</b></label>
            <input class="registro__input registro__input_short ng type="text" name="pagarc" id="<?php echo $registro['pagarc'];?>" value="<?=$registro['pagarc']?>">
            <label class="registro__label" for="<?php echo $registro['pagord'];?>"><b>Orden:</b></label>
            <input class="registro__input registro__input_short ng type="text" name="pagord" id="<?php echo $registro['pagord'];?>" value="<?=$registro['pagord']?>">
            <label class="registro__label" for="<?php echo $registro['pagmen'];?>"><b>Menu:</b></label>
            <input class="registro__input registro__input_short ng type="text" name="pagmen" id="<?php echo $registro['pagmen'];?>" value="<?=$registro['pagmen']?>">
            <!-- <p class="registro__col col col_pagid"></p> -->
            <input type="hidden" name="oldid" value="<?=$registro['pagid']?>"> 
            <input class="registro__btn_actualizar" id="<?php echo 'actualizar-' . $registro['pagid'];?>" type="button" value="Actualizar">
            <script type="module" src="../../src/js/crude/actualizar.js"></script>
            <input class="registro__btn_eliminar" id="<?php echo 'eliminar-' . $registro['pagid'];?>" type="button" value="Eliminar">

        </form>
        
        <form id="<?php echo 'form' . $registro['pagid'];?>" action="#" method="post" class="pagina__checkbox">
            <?php if($registro['pagmos'] == 1):?>            
                <input type="checkbox" name="" id=<?php echo 'id'. $registro['pagid']; ?> value=<?=$registro['pagid']?> checked onchange="<?php echo "document.querySelector('#form{$registro['pagid']}').submit()"?>">  
                <input type="hidden" name="pagmos" value="0"> 
            <?php else:?> 
                <input type="checkbox" name="" id=<?php echo 'id'. $registro['pagid']; ?> value=<?=$registro['pagid']?> onchange="this.form.submit()">
                <input type="hidden" name="pagmos" value="1"> 
            <?php endif;?> 
            <input type="hidden" name="pagid" value=<?=$registro['pagid']?>> 
            <input type="hidden" name="pg" value="104">
            <input type="hidden" name="controller" value="activar">
        </form>
   
    </div>
    <?php endforeach;?>
</section>