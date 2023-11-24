<?php
require __DIR__ . '/' . '../../controllers/cdetallesres.php';

?>
<section class="main__paginas_title section section_paginas_title">
    <h1>Detalles Consulta</h1>
  
</section>
<section class="main__paginas_body section section_paginas_body section_info_update">
<div class="logo_img_empresa"><img class="logo_empresa" src="<?=$registro[0]['url_logo']?>" alt=""></div>

    <form action="#" class="form form_admin_empresa" method="post" id="cuentareg" enctype="multipart/form-data">
        <!-- Email -->
        <label class="registro__label" for="id"><b>Email:</b></label>
        <input readonly class="registro__input registro__input_long type="text" id="id" value="<?=$registro[0]['id_empresa']?>">
        <!-- Nombre -->
        <label class="registro__label" for="nombre"><b>Nombre:</b></label>
        <input readonly class="registro__input registro__input_long type="text" name="nom_empresa" id="nombre" value="<?=$registro[0]['nom_empresa']?>">
        <!-- NIT -->
        <label class="registro__label" for="nit"><b>Nit:</b></label>
        <input readonly class="registro__input registro__input_long type="text" name="nit" id="nit" value="<?=$registro[0]['nit']?>">
       
        <!-- Pais -->
        <label class="registro__label" for="pais"><b>Pais:</b></label>
        <input  readonly class="registro__input registro__input_long type="text" name="pais" id="pais" value="<?=$registro[0]['pais']?>">
        <!-- depto -->
        <label class="registro__label" for="departamento"><b>Departamento:</b></label>
        <input  readonly class="registro__input registro__input_long type="text" name="departamento" id="departamento" value="<?=$registro[0]['departamento']?>">
        <!-- ciudad -->
        <label class="registro__label" for="ciudad"><b>ciudad:</b></label>
        <input  readonly class="registro__input registro__input_long type="text" name="ciudad" id="ciudad" value="<?=$registro[0]['ciudad']?>">
        <!-- barrio -->
        <label class="registro__label" for="barrio"><b>Barrio:</b></label>
        <input  readonly class="registro__input registro__input_long type="text" name="barrio" id="barrio" value="<?=$registro[0]['barrio']?>">
        <!-- direccion -->
        <label class="registro__label" for="direccion"><b>Direccion:</b></label>
        <input  readonly class="registro__input registro__input_long type="text" name="direccion" id="direccion" value="<?=$registro[0]['direccion']?>">
        <!-- info contacto -->
        <label class="registro__label" for="contacto"><b>Info Contacto:</b></label>
        <textarea readonly class="input input_registro field-container__input_tel" name="contacto" id="contacto" cols="30" rows="10"><?=$registro[0]['contacto']?></textarea>
        <!-- info servicios -->
        <label class="registro__label" for="servicios"><b>Info Servicios:</b></label>
        <textarea readonly class="input input_registro field-container__input_tel" name="servicios" id="servicios" cols="30" rows="10"><?=$registro[0]['servicios']?></textarea>
        
      </form>
      
  
</section>