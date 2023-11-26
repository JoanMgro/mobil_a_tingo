<?php
require __DIR__ . '/' . '../../controllers/cadminsuscripciones.php';

?>
<section class="main__paginas_title section section_paginas_title">
    <h1>Mis Suscripciones</h1>
    
  
</section>

<section class="main__paginas_body section section_paginas_body">

    <?php if(empty($listadoRegistros)):?>
        <div class="pagina">
            <h4 class="registro__nuevasus">No hay suscripciones Activas</h4>         
                       
            

    <?php else:?>
    <?php foreach($listadoRegistros as $registro):?>
    <div class="pagina">
        
        <form id="<?php echo 'updateform' . $registro['id_suscripcion'];?>" class="pagina__registro registro">
            <label class="registro__label" for="<?php echo 'id-' . $registro['id_suscripcion'];?>"><b>Id:</b></label>
            <input class="registro__input registro__input_long type="number" name="id_suscripcion" id="<?php echo 'id-' . $registro['id_suscripcion'];?>" value="<?=$registro['id_suscripcion']?>" disabled>
            <label class="registro__label" for="<?php echo $registro['nom_plan'];?>"><b>Nombre:</b></label>
            <input class="registro__input registro__input_long type="text" name="nom_plan" id="<?php echo $registro['nom_plan'];?>" value="<?=$registro['nom_plan']?>" disabled>
            <label class="registro__label" for="<?php echo $registro['fecha_inicio'];?>"><b>Inicio:</b></label>
            <input class="registro__input registro__input_long ng type="text" name="fecha_inicio" id="<?php echo $registro['fecha_inicio'];?>" value="<?=$registro['fecha_inicio']?>" disabled>
            <label class="registro__label" for="<?php echo $registro['fecha_fin'];?>"><b>Fin:</b></label>
            <input class="registro__input registro__input_long ng type="text" name="fecha_fin" id="<?php echo $registro['fecha_fin'];?>" value="<?=$registro['fecha_fin']?>" disabled>
            <label class="registro__label" for="<?php echo 'estado' . $registro['fecha_inicio'];?>"><b>Estado:</b></label>
            <input class="registro__input registro__input_long ng type="text" name="estado_suscripcion" id="<?php echo 'estado' . $registro['fecha_inicio'];?>" value="<?php echo $registro['estado_suscripcion'] == 1 ? 'Activo' : 'Vencido';?>" disabled>
            <input class="registro__btn_actualizar" id="<?php echo 'cancelar-' . $registro['id_suscripcion'];?>" type="button" value="Cancelar Suscripcion">
            <script type="module" src="../../src/js/crude/crudecancelar.js"></script>       

        </form>
   
    </div>
    <?php endforeach;?>
    <?php endif;?>
</section>