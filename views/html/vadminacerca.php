<?php
require_once __DIR__ . '/' . '../../controllers/cadminacerca.php';
?>

<section class="main__paginas_title section section_paginas_title">
    <h1>Administracion de Acerca de</h1>
  
</section>

<section class="main__paginas_body section section_paginas_body section_info_acerca">
<p class="text text_dashboard_title">Acerca De</p>
<p class="text_indicador">cambiar campo que desea actualizar</p>

    <form action="#" class="form form_admin_empresa" method="post" id="cuentareg">
        <input type="hidden" id="idAcerca" name="id_acerca" value="<?=$listaRegistros[0]['id_acerca']?>">

        <label class="registro__label" for="contacto"><b>Texto Acerca:</b></label>
        <textarea  class="input input_registro field-container__input_acerca" name="texto_acerca" id="contacto" cols="30" rows="10"><?=$listaRegistros[0]['texto_acerca']?></textarea>
       
        <input disabled class="form__btn_actualizar" type="button" value="Actualizar" id="actualizar">
        
        
        
        <input type="hidden" name="controller" id="controller" value="actualizar">
        <script type="module" src="../../src/js/crude/crudeacerca.js"></script> 
      </form>
      
  
</section>


   

