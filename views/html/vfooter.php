<?php
require_once __DIR__ . '/' . '../../controllers/cconfig.php';
?>
<footer class="page__footer footer">
    <div class="footer__grupo-legal grupo-legal">
      <p class="grupo-legal__terminos text text_terminos">
        <a class="link link_text_terminos" href="#">Terminos y condiciones</a> | <a class="link link_text_terminos" href="#">Politica de privacidad</a>
      </p>
      <p class="grupo-legal__copyright text text_copyright">@2023 Bogota, co. Todos los derechos reservados</p>
    </div>
    
    <div class="footer__grupo_info">
        <div><p class="text text_info_mobil"><?=$listaRegistros[0]['nomemp']?> NIT. <?=$listaRegistros[0]['nit']?></p></div>
        <?php if($listaRegistros[0]['mosema']):?>
        <div><p class="text text_info_mobil"><?=$listaRegistros[0]['emacon']?></p></div>
        <?php endif;?>
        <?php if($listaRegistros[0]['mostel']):?>
        <div><p class="text text_info_mobil"><?=$listaRegistros[0]['telcon']?></p></div>
        <?php endif;?>
        <?php if($listaRegistros[0]['moscel']):?>
        <div><p class="text text_info_mobil"><?=$listaRegistros[0]['celcon']?></p></div>
        <?php endif;?>
        <?php if($listaRegistros[0]['mosdir']):?>
        <div><p class="text text_info_mobil"><?=$listaRegistros[0]['dircon']?></p></div>
        <?php endif;?>
    </div>

    
    <div class="footer__grupo-redes grupo-redes">
      <p class="grupo-redes__titulo text text_redes">Siguenos en redes sociales</p>
      <div class="grupo-redes__iconos grupo-iconos">
        <?php if($listaRegistros[0]['mosface']):?>
        <a class="grupo-iconos__red link link_red_face" href="#"></a>
        <?php endif;?>
        <?php if($listaRegistros[0]['mosinst']):?>
        <a class="grupo-iconos__red link link_red_insta" href="#"></a>
        <?php endif;?>
        <?php if($listaRegistros[0]['mosx']):?>
        <a class="grupo-iconos__red link link_red_x" href="#"></a>
        <?php endif;?>
        <?php if($listaRegistros[0]['moswass']):?>
        <a class="grupo-iconos__red link link_red_wsup" href="#"></a>
        <?php endif;?>
      </div>
    </div>
  </footer>