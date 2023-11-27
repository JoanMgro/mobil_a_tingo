<?php
require __DIR__ . '/' . '../../controllers/cadminusuarios.php';

?>
<section class="main__paginas_title section section_paginas_title">
    <h1>Administracion de Usuarios</h1>
  
</section>

<!-- Seccion para crear -->

<!-- Seccion para Filtrar -->
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
        <input type="hidden" name="pg" value="102">
    </form>
   
</section>

<!-- Seccion para Listado -->
<section class="main__paginas_body section section_paginas_body">

    <div class="pagina">
            <h4 class="pagina__info">-- Info Pagina --</h4>
            <h4 class="pagina__activa">-- Activa --</h4>
    </div>
    
    <?php foreach($listadoRegistros as $registro):?>
    <div class="pagina">
        
        <form id="<?php echo 'updateform' . $registro['id_cuenta'];?>" class="pagina__registro registro" action="#" method="post">
            <label class="registro__label" for="<?php echo 'id-' . $registro['id_cuenta'];?>"><b>Id:</b></label>
            <input class="registro__input registro__input_short type="text" name="id_cuenta" id="<?php echo 'id-' . $registro['id_cuenta'];?>" value="<?=$registro['id_cuenta']?>">
            
            <label class="registro__label" for="<?php echo $registro['fecha_registro'];?>"><b>Registro:</b></label>
            <input class="registro__input registro__input_short ng type="text" name="fecha_registro" id="<?php echo $registro['fecha_registro'];?>" value="<?=$registro['fecha_registro']?>">
            <label class="registro__label" for="<?php echo $registro['perfil'];?>"><b>Perfil:</b></label>
            <input class="registro__input registro__input_short ng type="text" name="perfil" id="<?php echo $registro['perfil'];?>" value="<?=$registro['perfil']?>">
            <!-- <p class="registro__col col col_id_cuenta"></p> -->
            
          

        </form>
        
        <form id="<?php echo 'form' . $registro['id_cuenta'];?>" action="#" method="post" class="pagina__checkbox">
            <?php if($registro['activo'] == 1):?>            
                <input type="checkbox" name="" id=<?php echo 'id'. $registro['id_cuenta']; ?> value=<?=$registro['id_cuenta']?> checked onchange="this.form.submit()">  
                <input type="hidden" name="activo" value="0"> 
            <?php else:?> 
                <input type="checkbox" name="" id=<?php echo 'id'. $registro['id_cuenta']; ?> value=<?=$registro['id_cuenta']?> onchange="this.form.submit()">
                <input type="hidden" name="activo" value="1"> 
            <?php endif;?> 
            <input type="hidden" name="id_cuenta" value=<?=$registro['id_cuenta']?>> 
            <input type="hidden" name="pg" value="102">
            <input type="hidden" name="controller" value="activar">
        </form>
   
    </div>
    <?php endforeach;?>
</section>