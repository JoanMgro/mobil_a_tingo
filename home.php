<?php
require __DIR__ . '/' . './controllers/cautenticar.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./src/css/style.css">
  
    <title>MobilATingo</title>
</head>
<body class="page">
  <header class="page__header header">
    <img class="header__logo-img logo-img" src="./src/images/logos/logo.png" alt="Logo Mobilatingo">
    <nav id="hambu-menu" class="header__nav nav nav_state_closed">

      <?php        
        require __DIR__ . '/' . './views/html/vmenuh.php';
      ?>
   
    </nav>
    <button id="hambu"  class="header__menu-btn menu-btn menu-btn_state_closed"></button>  
  </header>

  <main class="page__main main">

  <?php
  require __DIR__ . '/' . '/views/html/dashboard.php';
  ?>
    


  </main>

  <!-- Footer -->
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
  </footer>
  <!-- Script -->
  <?php require __DIR__ . '/views/html/scriptsJs.php'; ?>
  
</body>
</html>