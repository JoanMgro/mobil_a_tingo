<?php
require_once __DIR__ . '/' . '../../controllers/cdashboard.php';
?>
    <section class="main__section section section_dashboard">
        <p class="text text_dashboard_title">Mi Cuenta</p>
        <form id="cuenta" action="" method="" class="form-container__form form form_type_dashboard">
          <?php if(isset($_SESSION['nombre'])): ?>
            <p class="form__text text text_micuenta">Nombre: <span> <?= $_SESSION['nombre']?> </span></p>
          <?php else: ?>
            <p class="form__text text text_micuenta">Nombre: <span> <?= $_SESSION['nom_empresa']?> </span></p>
            <?php endif;?>
          <p class="form__text text text_micuenta">Email: <span><?= $_SESSION['id_cuenta']?></span></p>
          
          <?php if(isset($_SESSION['nit'])): ?>
            <p class="form__text text text_micuenta">Nit: <span><?= $_SESSION['nit']?></span></p>
          <?php endif;?>
                   
          <input id="cuenta-btn" class="form__btn_cuenta btn_secondary btn_cuenta" type="submit" value="modificar">
  
        </form>
      </section>


  





