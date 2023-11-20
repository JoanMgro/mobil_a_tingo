<?php
require __DIR__ . '/' . '../../controllers/cadminplanes.php';

?>
<section class="main__paginas_title section section_paginas_title">
    <h1>Administracion de Planes</h1>
  
</section>
<section class="main__paginas_body section section_paginas_body section_paginas_update">
    <form action="#" class="form form_admin" method="post">
        <label class="registro__label" for="nombre"><b>Nombre:</b></label>
        <input required class="registro__input registro__input_long type="text" name="nom_plan" id="nombre" value="">
        <label class="registro__label" for="descripcion"><b>Descripcion:</b></label>
        <textarea required class="registro__input registro__input_long type="text" name="desc_plan" id="descripcion" rows="4" cols="10"></textarea>
        <label class="registro__label" for="valor"><b>Valor:</b></label>
        <input required class="registro__input registro__input_long type="number" name="valor_plan" id="valor" value="">
        <label class="registro__label" for="vigencia"><b>Dias Vigencia:</b></label>
        <input required class="registro__input registro__input_long type="number" name="dias_vigencia" id="vigencia" value="">
        <label class="registro__label" for="activo"><b>Activo:</b></label>
        <input class="registro__input_check" type="checkbox" name="activo" id="activo" value="1">
        <input type="hidden" name="controller" value="crear">
       
        <input class="registro__btn_crear" type="submit" value="Crear Plan">
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
        
        <form id="<?php echo 'updateform' . $registro['id_plan'];?>" class="pagina__registro registro" action="" method="post">
            <label class="registro__label" for="<?php echo 'id-' . $registro['id_plan'];?>"><b>Id:</b></label>
            <input type="hidden" name="id_plan" value="<?=$registro['id_plan']?>">
            <input class="registro__input registro__input_short type="number" name="id_plan" id="<?php echo 'id-' . $registro['id_plan'];?>" value="<?=$registro['id_plan']?>" disabled>
            
            <label class="registro__label" for="<?php echo $registro['nom_plan'];?>"><b>Nombre:</b></label>
            <input class="registro__input registro__input_short ng type="text" name="nom_plan" id="<?php echo $registro['nom_plan'];?>" value="<?=$registro['nom_plan']?>">
            <label class="registro__label" for="<?php echo $registro['desc_plan'];?>"><b>Descripcion:</b></label>
            <textarea class="registro__input registro__input_short ng type="text" name="desc_plan" id="<?php echo $registro['desc_plan'];?>"><?=$registro['desc_plan']?></textarea>
            <label class="registro__label" for="<?php echo $registro['valor_plan'];?>"><b>Valor:</b></label>
            <input class="registro__input registro__input_short ng type="text" name="valor_plan" id="<?php echo $registro['valor_plan'];?>" value="<?=$registro['valor_plan']?>">
            <label class="registro__label" for="<?php echo $registro['dias_vigencia'];?>"><b>Dias Vigencia:</b></label>
            <input class="registro__input registro__input_short ng type="number" name="dias_vigencia" id="<?php echo $registro['dias_vigencia'];?>" value="<?=$registro['dias_vigencia']?>">
            
            <!-- <p class="registro__col col col_id_plan"></p> -->
            <input class="registro__btn_actualizar" id="<?php echo 'actualizar-' . $registro['id_plan'];?>" type="button" value="Actualizar">
            <script type="module" src="../../src/js/crude/crudeplanes.js"></script>
            <input class="registro__btn_eliminar" id="<?php echo 'eliminar-' . $registro['id_plan'];?>" type="button" value="Eliminar">

        </form>
        
        <form id="<?php echo 'form' . $registro['id_plan'];?>" action="#" method="post" class="pagina__checkbox">
            <?php if($registro['activo'] == 1):?>            
                <input type="checkbox" name="" id=<?php echo 'id'. $registro['id_plan']; ?> value=<?=$registro['id_plan']?> checked onchange="<?php echo "document.querySelector('#form{$registro['id_plan']}').submit()"?>">  
                <input type="hidden" name="activo" value="0"> 
            <?php else:?> 
                <input type="checkbox" name="" id=<?php echo 'id'. $registro['id_plan']; ?> value=<?=$registro['id_plan']?> onchange="this.form.submit()">
                <input type="hidden" name="activo" value="1"> 
            <?php endif;?> 
            <input type="hidden" name="id_plan" value=<?=$registro['id_plan']?>> 
            <input type="hidden" name="pg" value="103">
            <input type="hidden" name="controller" value="activar">
        </form>
   
    </div>
    <?php endforeach;?>
</section>