<!-- titulo seccion de informacion Telefonica -->
<?php
require __DIR__ . '/' . '../../controllers/ctipotelefonos.php';
?>
        
<select  id="tel_tipo-0" class="label field-container__label_tel">
  <option value="">-- Elegir Opcion --</option>
  <?php foreach($tipTelModel->getTipoTelefonos() as $item): ?>
  <option value="<?= $item['desc_tipo_telefono'] ?>" ><?= $item['desc_tipo_telefono'] ?></option>
  <?php endforeach; ?>
</select>

   
<!-- 
<div id="telf-container" class="form__field-container_tel">
  <div id="t-0"  class="field-container field-container_tel">        
    <label id="t-0-1" class="label field-container__label_tel" for="t-0-2">Telefono Fijo:</label>
    <input id="t-0-2" class="input input_registro field-container__input_tel" type="number" name="u-tel-fijo" autocomplete="off" required>

  </div>   

</div> -->
     
    