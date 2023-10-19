<section class="main__section section section_buscar-servicio">
      <p class="text text_section_buscar-servicio">Busqueda de servicios</p>

      <form id="buscar-servicio" action="../../index.php" method="GET" class="form">

        <input id="pg" type="hidden" name="pg" value="1000">
        <!-- <button id="locate" class="form__btn_locate btn_secondary btn_locate">Localizarme</button> -->
        <!-- Pais -->
        <label class="form__label-input_buscar-servicio" for="pais">Pais:</label>
        <input id="pais" class="form__input_buscar-servicio input input_buscar-servicio" type="text" name="pais" autocomplete="off" required>
        <!-- Departamento -->
        <label class="form__label-input_buscar-servicio" for="departamento">Departamento:</label>
        <input id="departamento" class="form__input_buscar-servicio input input_buscar-servicio" type="text" name="departamento" autocomplete="off">
        <!-- Ciudad -->
        <label class="form__label-input_buscar-servicio" for="ciudad">Ciudad:</label>
        <input id="ciudad" class="form__input_buscar-servicio input input_buscar-servicio" type="text" name="ciudad" autocomplete="off">
        <!-- Barrio -->
        <label class="form__label-input_buscar-servicio" for="barrio">Barrio:</label>
        <input id="barrio" class="form__input_buscar-servicio input input_buscar-servicio" type="text" name="barrio" autocomplete="off">
        <!-- Radio De Busqueda -->
        <label for="radio" class="form__label-input_buscar-servicio_radio text text_radio label-rad">
            <span class="">
              Radio de busqueda
            </span> 
            <i class="label-rad__gps-ico"></i>
        </label>
        <input id="radio" class="form__input_buscar-servicio_radio input input_buscar-servicio" type="number" name="radio" placeholder="Metros">
        <!-- Coordenadas -->
        <input id="lat" type="hidden" name="lat">
        <input id="long" type="hidden" name="long">
        
        <input id="btn-buscar-servicio" class="form__btn_buscar-servicio btn_secondary btn_buscar-servicio" type="submit" value="Buscar">

      </form>
    </section>
