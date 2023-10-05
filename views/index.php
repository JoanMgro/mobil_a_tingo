<?php require_once __DIR__ . '/' . './site/index.php';?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../../src/css/style.css">
  
    <title>MobilATingo</title>
</head>
<body class="page">
  <header class="page__header header">
    <img class="header__logo-img logo-img" src="./src/images/logos/logo.png" alt="Logo Mobilatingo">
    <nav id="hambu-menu" class="header__nav nav nav_state_closed">
    <!-- Insertar menu -->
    <?php require 'menui.php' ?>              
    </nav>
    <button id="hambu"  class="header__menu-btn menu-btn menu-btn_state_closed"></button>  
  </header>

<main class="page__main main">

<section class="main__registrarse registrarse">
  <p class="text text_registrarse registrarse__text">¿Aun no eres miembro de nuestro directorio?</p>
  <a href="#" class="btn btn_registrarse">Registrarse</a>
</section>
<section class="main__buscar-servicio buscar-servicio">
  <p class="text text_buscar buscar-servicio__text">Busqueda de servicios</p>
  <!-- Abajo de esta linea va la form de busqueda-->
  <form action=""  method="get" class="buscar-servicio__form-buscar form-buscar">
     
    <!-- Abajo de esta linea las views de los filtros de busqueda -->  
    <?=$inputView->setArrayVars('nom_pais', 'Paises')?>
    <?=$inputView->render('pais')?>
    <?=$inputView->setArrayVars('nom_dept', 'Departamentos')?>
    <?=$inputView->render('departamento')?>
    <?=$inputView->setArrayVars('nom_ciudad', 'Ciudades')?>
    <?=$inputView->render('ciudad')?>
    <?=$inputView->setArrayVars('nom_barrio', 'Barrios')?>
    <?=$inputView->render('barrio')?>

     <!-- Arriba de esta linea las views de los filtros de busqueda -->  
     <div class="form-buscar__radio-cont radio-cont">
          <label for="radio" class="radio-cont__label text text_radio label-rad">
            <span class="">
              Radio de busqueda
            </span> 
            <i class="label-rad__gps-ico"></i>
          </label>
          <input id="radio" class="input input_radio" type="number" name="radio" placeholder="Metros">
        </div>
        <input id="my-coords" type="hidden" name="my_coords">
        <input id="controller" type="hidden" name="search-controller" value="searchController">
        <input id="find-me" class="radio-cont__btn btn btn_buscar" type="submit" value="Buscar"> 
    
  </form>
</section>

<!-- Abajo de esta linea van los resultados de la busqueda -->
<section class="main__search-results search-results">
  <?php
  // $pon = isset($_GET["my_coords"]) ? $_GET["my_coords"] : 1; 
  // $pon = json_decode($pon);
  // echo "<p>{$pon->latitud}</p>"; 
  // echo "<p>{$pon->longitud}</p>";
  if(isset($searchController)){
    
    echo "<p>1</p>"; 

  }else{
    echo "<p>{}</p>"; 

  }

  

  ?>

  <!-- contenido creado dinamicamente con resultados de la busqueda -->
  <?php if($searchData): ?>
  <?php foreach($searchData as $key => $value): ?>
    <p><?= $key . $value ?></p>
  <?php endforeach; ?>
  <?php endif; ?>
  

</section>
<!-- Arriba de esta linea van los resultados de la busqueda -->

<section class="main__ofertas ofertas-cont">
  <p class="ofertas-cont__titulo text text_ofertas_titulo">Ofertas del dia</p>
  <div class="ofertas-cont__carrusel carrusel">
    <button class="carrusel__arrow-btn carrusel__arrow-btn_left arrow-btn arrow-btn_left"></button>        
    <!-- <div class="carrusel__display display"> -->
      <!-- Aca entran las cartas de las promociones -->
      <div class="carrusel__card card">
        <img class="card__image" src="./src/images/banners/Banner-01.png" alt="">
        <div class="card__info-cont info-cont">
          <p class="info-cont__name text text_card">REPARA MAX S.A.S</p>
          <p class="info-cont__address text text_card">Calle 93 # 41-80</p>
          <div class="info-cont__buttons buttons-cont">
            <a class="buttons-cont__ver btn btn_card">ver</a>
            <a class="buttons-cont__agendar btn btn_card">Agendar</a>
          </div>  
        </div>
      
      </div>

      <div class="carrusel__card card carrusel__card_show_two">
        <img class="card__image" src="./src/images/banners/Banner-01.png" alt="">
        <div class="card__info-cont info-cont">
          <p class="info-cont__name text text_card">REPARA MAX S.A.S</p>
          <p class="info-cont__address text text_card">Calle 93 # 41-80</p>
          <div class="info-cont__buttons buttons-cont">
            <a class="buttons-cont__ver btn btn_card">ver</a>
            <a class="buttons-cont__agendar btn btn_card">Agendar</a>
          </div>  
        </div>
      
      </div>

      <div class="carrusel__card card carrusel__card_show_three">
        <img class="card__image" src="./src/images/banners/Banner-01.png" alt="">
        <div class="card__info-cont info-cont">
          <p class="info-cont__name text text_card">REPARA MAX S.A.S</p>
          <p class="info-cont__address text text_card">Calle 93 # 41-80</p>
          <div class="info-cont__buttons buttons-cont">
            <a class="buttons-cont__ver btn btn_card">ver</a>
            <a class="buttons-cont__agendar btn btn_card">Agendar</a>
          </div>  
        </div>
      
      </div>
      <!-- Aca llegan las cartas de las promociones -->
    <!-- </div> -->
    <button class="carrusel__arrow-btn carrusel__arrow-btn_right arrow-btn arrow-btn_right"></button>
  </div>
</section>
<section class="main__unete unete">
  <div class="unete__info info-cont info-cont_unete">
    <p class="text text_unete">Ofrece tus servicios en linea<br>con nosotros</p>
    <a href="" class="btn btn_unete">Unete Ahora 
      <span class="btn__ico">
        <!-- <img class="unete__icon-img" src="./src/images/icons/unete-icon.png" alt=""> -->
      </span>
    </a>


  </div>

</section>
</main>

<footer class="page__footer footer">
    <div class="footer__grupo-legal grupo-legal">
      <p class="grupo-legal__terminos text text_terminos">
        <a class="link link_text_terminos" href="#">Terminos y condiciones</a> | <a class="link link_text_terminos" href="#">Politica de privacidad</a>
      </p>
      <p class="grupo-legal__copyright text text_copyright">@2023 Bogota, co. Todos los derechos reservados</p>
    </div>
    <div class="footer__grupo-redes grupo-redes">
      <p class="grupo-redes__titulo text text_redes">Siguenos en redes sociales</p>
      <div class="grupo-redes__iconos grupo-iconos">
        <a class="grupo-iconos__red link link_red_face" href="#"></a>
        <a class="grupo-iconos__red link link_red_insta" href="#"></a>
        <a class="grupo-iconos__red link link_red_x" href="#"></a>
        <a class="grupo-iconos__red link link_red_wsup" href="#"></a>
      </div>
    </div>
    <div class="footer__newsletter newsletter">
      <input class="newsletter__email input input_newsletter" type="text" placeholder="Inscribe tu email para recibir las ultimas noticias">
      <button class="newsletter__send btn btn_send">Enviar</button>
    </div>

  </footer>

 
  
   <script type="module" src="./src/js/main.js"></script>
</body>
</html>
