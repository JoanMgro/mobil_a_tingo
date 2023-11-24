<?php
require_once __DIR__ . '/' . '../../controllers/cconfig.php';
?>

<section class="main__paginas_title section section_paginas_title">
    <h1>Configuracion</h1>
  
</section>

<section class="main__paginas_body section section_paginas_body section_info_update">
<p class="text text_dashboard_title">Configuracion Footer</p>
<p class="text_indicador">cambiar campo que desea actualizar</p>

    <form action="#" class="form form_admin_empresa" method="post" id="cuentareg">
        <!-- id -->
        <input type="hidden" name="idconfig" value="<?=$listaRegistros[0]['idconfig']?>">
        <!-- Nit -->
        <label class="registro__label" for="nit"><b>Nit:</b></label>
        <input class="registro__input registro__input_long type="text" name="nit" id="nit" value="<?=$listaRegistros[0]['nit']?>">
        <!-- Nombre -->
        <label class="registro__label" for="nomemp"><b>Nombre:</b></label>
        <input class="registro__input registro__input_long" type="text" name="nomemp" id="nomemp" value="<?=$listaRegistros[0]['nomemp']?>">
        <!-- direccion -->
        <label class="registro__label" for="dircon"><b>Direccion:</b></label>
        <input class="registro__input registro__input_long" type="text" name="dircon" id="dircon" value="<?=$listaRegistros[0]['dircon']?>">
        <!--Mostrar direccion  -->
        <label class="registro__label_check-conf" for="mosdir"><b>Mostrar Direccion:</b></label>
        <?php if($listaRegistros[0]['mosdir'] == 1):?>        
        <input class="registro__input_check-conf" type="checkbox" name="mosdir" id="mosdir" checked value="1">
        <?php else:?>
        <input class="registro__input_check-conf" type="checkbox" name="mosdir" id="mosdir" value="0">
        <?php endif;?>
        <!-- Telefono Fijo -->
        <label class="registro__label" for="telcon"><b>Telefono:</b></label>
        <input class="registro__input registro__input_long" type="text" name="telcon" id="telcon" value="<?=$listaRegistros[0]['telcon']?>">
        <!-- mostel -->
        <label class="registro__label_check-conf" for="mostel"><b>Mostrar Telefono:</b></label>
        <?php if($listaRegistros[0]['mostel'] == 1):?>        
        <input class="registro__input_check-conf" type="checkbox" name="mostel" id="mostel" checked value="1">
        <?php else:?>
        <input class="registro__input_check-conf" type="checkbox" name="mostel" id="mostel" value="0">
        <?php endif;?>
        <!-- Celular -->
        <label class="registro__label" for="celcon"><b>Celular:</b></label>
        <input class="registro__input registro__input_long" type="text" name="celcon" id="celcon" value="<?=$listaRegistros[0]['celcon']?>">
        <!-- moscel -->
        <label class="registro__label_check-conf" for="moscel"><b>Mostrar Celular:</b></label>
        <?php if($listaRegistros[0]['moscel'] == 1):?>        
        <input class="registro__input_check-conf" type="checkbox" name="moscel" id="moscel" checked value="1">
        <?php else:?>
        <input class="registro__input_check-conf" type="checkbox" name="moscel" id="moscel" value="0">
        <?php endif;?>
        <!-- emacon -->
        <label class="registro__label" for="emacon"><b>Email:</b></label>
        <input class="registro__input registro__input_long" type="text" name="emacon" id="emacon" value="<?=$listaRegistros[0]['emacon']?>">
        <!-- mosema -->
        <label class="registro__label_check-conf" for="mosema"><b>Mostrar Email:</b></label>
        <?php if($listaRegistros[0]['mosema'] == 1):?>        
        <input class="registro__input_check-conf" type="checkbox" name="mosema" id="mosema" checked value="1">
        <?php else:?>
        <input class="registro__input_check-conf" type="checkbox" name="mosema" id="mosema" value="0">
        <?php endif;?>
        <!-- mosface -->
        <label class="registro__label_check-conf" for="mosface"><b>Mostrar Facebook:</b></label>
        <?php if($listaRegistros[0]['mosface'] == 1):?>        
        <input class="registro__input_check-conf" type="checkbox" name="mosface" id="mosface" checked value="1">
        <?php else:?>
        <input class="registro__input_check-conf" type="checkbox" name="mosface" id="mosface" value="0">
        <?php endif;?>
        <!-- mosinst -->
        <label class="registro__label_check-conf" for="mosinst"><b>Mostrar Instagram:</b></label>
        <?php if($listaRegistros[0]['mosinst'] == 1):?>        
        <input class="registro__input_check-conf" type="checkbox" name="mosinst" id="mosinst" checked value="1">
        <?php else:?>
        <input class="registro__input_check-conf" type="checkbox" name="mosinst" id="mosinst" value="0">
        <?php endif;?>
        <!-- moswass -->
        <label class="registro__label_check-conf" for="moswass"><b>Mostrar Whatsapp:</b></label>
        <?php if($listaRegistros[0]['moswass'] == 1):?>        
        <input class="registro__input_check-conf" type="checkbox" name="moswass" id="moswass" checked value="1">
        <?php else:?>
        <input class="registro__input_check-conf" type="checkbox" name="moswass" id="moswass" value="0">
        <?php endif;?>
        <!-- mosx -->
        <label class="registro__label_check-conf" for="mosx"><b>Mostrar X:</b></label>
        <?php if($listaRegistros[0]['mosx'] == 1):?>        
        <input class="registro__input_check-conf" type="checkbox" name="mosx" id="mosx" checked value="1">
        <?php else:?>
        <input class="registro__input_check-conf" type="checkbox" name="mosx" id="mosx" value="0">
        <?php endif;?>
        <!-- Boton y Js         -->
        <?php if(isset($listaRegistros[0]['idconfig'])):?>
        <input disabled class="form__btn_actualizar" type="button" value="Actualizar" id="btnSub">
        <input type="hidden" name="controller" id="controller" value="actualizar">
        <?php else:?>
        <input disabled class="form__btn_actualizar" type="button" value="Crear" id="btnSub">
        <input type="hidden" name="controller" id="controller" value="crear">    
        <?php endif;?>
        <script type="module" src="../../src/js/crude/crudeconfig.js"></script> 
      </form>
      
  
</section>

   


  





