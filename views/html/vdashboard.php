<?php
require_once __DIR__ . '/' . '../../controllers/cdashboard.php';
?>

<section class="main__paginas_title section section_paginas_title">
  <?php

  ?>
    <?php if(isset($_SESSION['nombre'])): ?>
      <h3>Bienvenido <?=$_SESSION['nombre']?></h3>            
    <?php else: ?><h
      3>Bienvenido <?=$_SESSION['nom_empresa']?></h3>
      <?php if($listaRegistros[0]['estado_suscripcion'] == 1):?>   
      <p>Tu suscripcion esta <b>Activa</b></p>
      <?php else:?>
      <p>No tienes suscripcion activa</p>
      
      <?php endif;?> 
      <div class="logo_img_empresa"><img class="logo_empresa" src="<?=$_SESSION['url_logo']?>" alt=""></div>   
    <?php endif;?>
    
     
    
  
    
</section>
<?php if($_SESSION['pefid'] == 1):?>
    <section class="main__section section section_dashboard">
        <p class="text text_dashboard_title">Mi Cuenta</p>
        <form id="cuenta" action="" method="" class="form-container__form form form_type_dashboard">
          
          <p class="form__text text text_micuenta">Email: <span><?= $_SESSION['id_cuenta']?></span></p>
          
            
        </form>
      </section>
<?php else:?>
<section class="main__paginas_body section section_paginas_body section_info_update">
<p class="text text_dashboard_title">Mi Cuenta</p>
<p class="text_indicador">cambiar campo que desea actualizar a exepcion de id, nombre y nit</p>

    <form action="#" class="form form_admin_empresa" method="post" id="cuentareg" enctype="multipart/form-data">
        <!-- Email -->
        <label class="registro__label" for="id"><b>Id:</b></label>
        <input disabled class="registro__input registro__input_long type="text" id="id" value="<?=$listaRegistros[0]['id_empresa']?>">
        <!-- Nombre -->
        <label class="registro__label" for="nombre"><b>Nombre:</b></label>
        <input disabled class="registro__input registro__input_long type="text" name="nom_empresa" id="nombre" value="<?=$listaRegistros[0]['nom_empresa']?>">
        <!-- NIT -->
        <label class="registro__label" for="nit"><b>Nit:</b></label>
        <input disabled class="registro__input registro__input_long type="text" name="nit" id="nit" value="<?=$listaRegistros[0]['nit']?>">
        <!-- logo -->
        <label class="registro__label" for="logo"><b>Logo:</b></label>
        <input class="registro__input registro__input_long" type="file" name="logo" id="logo" accept=".png, .jpg, .jpeg">
        <script type="text/javascript" src="../../src/js/validacion/validatelogo.js"></script>
        <!-- Latitud -->
        <label class="registro__label" for="lat"><b>Latitud:</b></label>
        <input  required class="registro__input registro__input_long type="number" name="latitud" id="lat" value="<?=$listaRegistros[0]['latitud']?>">
        <!-- Longitud -->
        <label class="registro__label" for="long"><b>Longitud:</b></label>
        <input  required class="registro__input registro__input_long type="number" name="longitud" id="long" value="<?=$listaRegistros[0]['longitud']?>">
        <!-- Pais -->
        <label class="registro__label" for="pais"><b>Pais:</b></label>
        <input  required class="registro__input registro__input_long type="text" name="pais" id="pais" value="<?=$listaRegistros[0]['pais']?>">
        <!-- depto -->
        <label class="registro__label" for="departamento"><b>Departamento:</b></label>
        <input  required class="registro__input registro__input_long type="text" name="departamento" id="departamento" value="<?=$listaRegistros[0]['departamento']?>">
        <!-- ciudad -->
        <label class="registro__label" for="ciudad"><b>ciudad:</b></label>
        <input  required class="registro__input registro__input_long type="text" name="ciudad" id="ciudad" value="<?=$listaRegistros[0]['ciudad']?>">
        <!-- barrio -->
        <label class="registro__label" for="barrio"><b>Barrio:</b></label>
        <input  required class="registro__input registro__input_long type="text" name="barrio" id="barrio" value="<?=$listaRegistros[0]['barrio']?>">
        <!-- direccion -->
        <label class="registro__label" for="direccion"><b>Direccion:</b></label>
        <input  required class="registro__input registro__input_long type="text" name="direccion" id="direccion" value="<?=$listaRegistros[0]['direccion']?>">
        <!-- info contacto -->
        <label class="registro__label" for="contacto"><b>Info Contacto:</b></label>
        <textarea  class="input input_registro field-container__input_tel" name="contacto" id="contacto" cols="30" rows="10"><?=$listaRegistros[0]['contacto']?></textarea>
        <!-- info servicios -->
        <label class="registro__label" for="servicios"><b>Info Servicios:</b></label>
        <textarea  class="input input_registro field-container__input_tel" name="servicios" id="servicios" cols="30" rows="10"><?=$listaRegistros[0]['servicios']?></textarea>
        <input disabled class="form__btn_actualizar" type="button" value="Actualizar" id="actualizar">
        <!-- <input disabled class="form__btn_actualizar" type="submit" value="Actualizar" id="actualizar"> -->
        <input class="form__btn_eliminar" type="button" value="Eliminar" id="eliminar">
        <!-- <input class="form__btn_eliminar" type="submit" value="Eliminar Cuenta" id="eliminar"> -->
        <input type="hidden" name="id_ubicacion" value="<?=$listaRegistros[0]['ubicacion']?>">
        <input type="hidden" name="controller" id="controller" value="">
        <script type="module" src="../../src/js/crude/crudemicuenta.js"></script> 
      </form>
      
  
</section>
<?php endif;?>

   


  





