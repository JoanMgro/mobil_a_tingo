<?php
require __DIR__ . '/' . '../../controllers/cadminfaq.php';

?>
<section class="main__paginas_title section section_paginas_title">
    <h1>Administracion de FAQ</h1>
  
</section>
<!-- Seccion Crear -->
<section class="main__paginas_body section section_paginas_body section_paginas_update">
    <form action="#" class="form form_admin" method="post">
        <label class="registro__label" for="nombre"><b>Pregunta:</b></label>
        <input required class="registro__input registro__input_long type="text" name="question" id="nombre" value="">
        <label class="registro__label" for="descripcion"><b>Respuesta:</b></label>
        <textarea required class="registro__input registro__input_long type="text" name="answer" id="descripcion" rows="4" cols="10"></textarea>
        <label class="registro__label" for="activo"><b>Activo:</b></label>
        <input class="registro__input_check" type="checkbox" name="activo" id="activo" value="1">
        <input type="hidden" name="controller" value="crear">       
        <input class="registro__btn_crear" type="submit" value="Crear Plan">
    </form>
  
</section>
<!-- Seccion Paginacion -->
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
        <!-- <input type="hidden" name="pg" value="104"> -->
    </form>
   
</section>
<section class="main__paginas_body section section_paginas_body">

    <div class="pagina">
            <h4 class="pagina__info">-- Info FaQ --</h4>
            <h4 class="pagina__activa">-- Activa --</h4>
    </div>
    
    <?php foreach($listadoRegistros as $registro):?>
    <div class="pagina">
        
        <form id="<?php echo 'updateform' . $registro['id_faq'];?>" class="pagina__registro registro" action="" method="post">
            <label class="registro__label" for="<?php echo 'id-' . $registro['id_faq'];?>"><b>Id:</b></label>
            <input type="hidden" name="id_faq" value="<?=$registro['id_faq']?>">
            <input class="registro__input registro__input_short type="number" name="id_faq" id="<?php echo 'id-' . $registro['id_faq'];?>" value="<?=$registro['id_faq']?>" disabled>
            
            <label class="registro__label" for="<?php echo $registro['question'];?>"><b>Pregunta:</b></label>
            <input class="registro__input registro__input_short ng type="text" name="question" id="<?php echo $registro['question'];?>" value="<?=$registro['question']?>">
            <label class="registro__label" for="<?php echo $registro['answer'];?>"><b>Respuesta:</b></label>
            <textarea class="registro__input registro__input_short ng type="text" name="answer" id="<?php echo $registro['answer'];?>"><?=$registro['answer']?></textarea>
            
            
            <!-- <p class="registro__col col col_id_faq"></p> -->
            <input class="registro__btn_actualizar" id="<?php echo 'actualizar-' . $registro['id_faq'];?>" type="button" value="Actualizar">
            <script type="module" src="../../src/js/crude/crudefaq.js"></script>
            <input class="registro__btn_eliminar" id="<?php echo 'eliminar-' . $registro['id_faq'];?>" type="button" value="Eliminar">

        </form>
        
        <form id="<?php echo 'form' . $registro['id_faq'];?>" action="#" method="post" class="pagina__checkbox">
            <?php if($registro['activo'] == 1):?>            
                <input type="checkbox" name="" id=<?php echo 'id'. $registro['id_faq']; ?> value=<?=$registro['id_faq']?> checked onchange="<?php echo "document.querySelector('#form{$registro['id_faq']}').submit()"?>">  
                <input type="hidden" name="activo" value="0"> 
            <?php else:?> 
                <input type="checkbox" name="" id=<?php echo 'id'. $registro['id_faq']; ?> value=<?=$registro['id_faq']?> onchange="this.form.submit()">
                <input type="hidden" name="activo" value="1"> 
            <?php endif;?> 
            <input type="hidden" name="id_faq" value=<?=$registro['id_faq']?>> 
            <input type="hidden" name="pg" value="106">
            <input type="hidden" name="controller" value="activar">
        </form>
   
    </div>
    <?php endforeach;?>
</section>