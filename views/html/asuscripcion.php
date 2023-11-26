<?php
require __DIR__ . '/' . '../../controllers/cadminsuscripciones.php';

?>
<section class="main__paginas_title section section_paginas_title">
    <h1>Mis Suscripciones</h1>
    
  
</section>

<section class="main__paginas_body section section_paginas_body">

    <div class="pagina">
            <h4 class="pagina__info">-- suscripcion Pagina --</h4>
            
    </div>
    <?php if(empty($listadoRegistros)):?>
        <div class="pagina">
            <h4 class="registro__nuevasus">No hay suscripciones Activas</h4>
            <label class="registro__label" for="planSelect"><b>Plan:</b></label>
            <select class="registro__input registro__input_long name="id_plan" id="planSelect">
                <option value="">Elegir Plan</option>
            <?php foreach($listadoPlanes as $plan):?>
                <option value="<?= $plan['id_plan']?>"><?=$plan['nom_plan']?></option>
                
            <?php endforeach;?>
            
            </select>
            <label class="registro__label" for="descPlan"><b>Descripcion:</b></label>
            <textarea class="registro__nuevasus" name="" id="descPlan" cols="10" rows="10" readonly></textarea>
            <label class="registro__label" for="vigencia"><b>Duracion:</b></label>
            <input class="registro__input registro__input_long type="number" name="dias_vigencia" id="vigencia" value="" disabled>
            <label class="registro__label" for="valor"><b>Valor:</b></label>
            <input class="registro__input registro__input_long type="number" name="valor_plan" id="valor" value="" disabled>
            <input id="empresa" type="hidden" name="empresa" value="<?=$_SESSION['id_empresa']?>"> 
            <script type="text/javascript">
            document.querySelector('#planSelect').addEventListener('change', (e) =>{
            
                if(e.target.value != '')
                {
                    const doc =JSON.parse(`<?php echo json_encode($listadoPlanes)?>`);
                    const w = doc.filter((elem, index)=> elem.id_plan == e.target.value);
                    document.querySelector('#descPlan').value = w[0].desc_plan;
                    document.querySelector('#vigencia').value = w[0].dias_vigencia;
                    document.querySelector('#valor').value = w[0].valor_plan;                    

                } 
                else
                {
                    document.querySelector('#descPlan').value = '';
                    document.querySelector('#vigencia').value = '';
                    document.querySelector('#valor').value = ''; 
                }
                
            
                 
               

            });
            </script>

            
            
            <input class="registro__btn_actualizar" id="comprar" type="button" value="Comprar">
            <script type="module" src="../../src/js/crude/crudesuscribir.js"></script>
            
            
        </div>
    <?php else:?>
    <?php foreach($listadoRegistros as $registro):?>
    <div class="pagina">
        
        <form id="<?php echo 'updateform' . $registro['id_suscripcion'];?>" class="pagina__registro registro" action="" method="post">
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
            <!-- <p class="registro__col col col_id_suscripcion"></p> -->
           

        </form>
   
    </div>
    <?php endforeach;?>
    <?php endif;?>
</section>