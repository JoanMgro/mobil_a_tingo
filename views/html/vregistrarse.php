<section class="main__section section section_registrarse">
  <p class="text text_registrarse_titulo">Datos de Registro</p>      
      
  <form id="registrarse" action="../../controllers/cempresa.php" method="POST" class="form form_registrarse">
    <!-- titulo seccion de login -->
    <p class="form__text text text_form_titulo-seccion">Informacion de Log in</p>
    <!-- campo Email -->
    <label class="form__label_registro_login-info" for="email">Email:</label>
    <input id="email" class="form__input_registro_login-info input input_registro" type="email" name="email" autocomplete="off" required>
    <!-- campo password -->
    <label class="form__label_login" for="pass">Password:</label>
    <input id="pass" class="form__input_registro_login-info input input_registro" type="password" name="pass" autocomplete="off" required>
        
    <!-- titulo seccion de informacion empresa -->
    <p class="form__text text text_form_titulo-seccion">Informacion de la empresa</p>
    <!-- campo nombre -->
    <label class="form__label_registro_login-info" for="nombre">Nombre:</label>
    <input id="nombre" class="form__input_registro_login-info input input_registro" type="text" name="nombre" autocomplete="off" required>
    <!-- campo nit -->
    <label class="form__label_registro_login-info" for="nit">Nit:</label>
    <input id="nit" class="form__input_registro_login-info input input_registro" type="text" name="nit" autocomplete="off" required>
    <!-- campo logo -->
    <label class="form__label_registro_login-info" for="logo">Logo:</label>
    <input id="logo" class="form__input_registro_login-info input input_registro" type="file" name="logo" autocomplete="off">
        
    <!-- titulo seccion de informacion Ubicacion -->
    <p class="form__text text text_form_titulo-seccion">Informacion de Ubicacion</p>
    <!-- Boton localizarme -->
    <button id="locate" class="form__btn_registrarse-secondary btn_secondary btn_locate">Localizarme</button>
    <!-- Campo coordenadas -->
    <label class="form__label" for="latitud">Coord Latitud:</label>
    <input id="latitud" class="form__input_registro input input_registro" type="text" name="latitud" autocomplete="off" required>
    <label class="form__label" for="longitud">Coord Longitud:</label>
    <input id="longitud" class="form__input_registro input input_registro" type="text" name="longitud" autocomplete="off" required>
    <!-- Campo pais -->
    <label class="form__label label " for="pais">Pais:</label>
    <input id="pais" class="form__input_registro input input_registro" type="text" name="pais" autocomplete="off" required>
    <!-- Campo departamento -->
    <label class="form__label label " for="departamento">Departamento:</label>
    <input id="departamento" class="form__input_registro input input_registro" type="text" name="departamento" autocomplete="off" required>
    <!-- Campo ciudad -->
    <label class="form__label label " for="ciudad">Ciudad:</label>
    <input id="ciudad" class="form__input_registro input input_registro" type="text" name="ciudad" autocomplete="off" required>
    <!-- Campo barrio -->
    <label class="form__label label " for="barrio">Barrio:</label>
    <input id="barrio" class="form__input_registro input input_registro" type="text" name="barrio" autocomplete="off" required>
    <!-- Campo direccion -->
    <label class="form__label_registro-direccion" for="direccion">Direccion:</label>
    <input id="direccion" class="form__input_registro-direccion input input_registro" type="text" name="direccion" autocomplete="off" required>
        
    <!-- titulo seccion de informacion Telefonica -->
    <p class="form__text text text_form_titulo-seccion">Informacion de contacto</p>
    
    <div id="telf-container" class="form__field-container_tel">
      <div id="tel-0"  class="field-container field-container_tel"> 
        <!-- llamo la vista de telefonos        -->
        <textarea class="input input_registro field-container__input_tel" name="info_contacto" id="info_contacto" cols="30" rows="10"></textarea>   
        
      </div>   
    </div>
    <p class="form__text text text_form_titulo-seccion">Resumen Servicios</p>
    <div id="serv-container" class="form__field-container_tel">
      <div id="serv-0"  class="field-container field-container_tel"> 
        <!-- llamo la vista de telefonos        -->
        <textarea class="input input_registro field-container__input_tel" name="servicios" id="servicios" cols="30" rows="10"></textarea>   
        
      </div>   
    </div>
    <input type="hidden" name="telefonos" id="num-tel" value="1" readonly>
    <input type="hidden" name="action" id="crear_empresa" value="crearEmpresa" readonly>        
   
        
    <input id="save" class="form__btn_guardar btn_secondary btn_registrarse_guardar" type="submit" value="Guardar">

  </form>
</section>

