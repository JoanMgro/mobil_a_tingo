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
        require __DIR__ . '/' . './views/html/vmenui.php';
      ?>
   
    </nav>
    <button id="hambu"  class="header__menu-btn menu-btn menu-btn_state_closed"></button>  
  </header>

  <main class="page__main main">

    <?php
          $pg = isset($_GET["pg"]) ? $_GET["pg"] : NULL;
          if(!$pg || $pg == '1000')
          {

            require __DIR__ . '/' . './views/html/vinicio.php';
          }

          if($pg === '1001') require __DIR__ . '/' . './views/html/vplanes.php';
          if($pg === '1002') require __DIR__ . '/' . './views/html/vfaq.php';
          if($pg === '1003') require __DIR__ . '/' . './views/html/vacercade.php';
          if($pg === '1004') require __DIR__ . '/' . './views/html/vcontacto.php';
          if($pg === '1005') require __DIR__ . '/' . './views/html/vlogin.php';
          if($pg === '1006') require __DIR__ . '/' . './views/html/vregistrarse.php';
          if($pg === '1020') require __DIR__ . '/' . './views/html/vdetresul.php';

    ?>
 
    


  </main>

  <!-- Footer -->
  <?php require __DIR__ . '/views/html/vfooter.php'; ?>

  <!-- Script -->
  <script type="text/javascript" src="./src/js/menu/hamburguer.js"></script>
  <?php require __DIR__ . '/views/html/scriptsJs.php'; ?>
  
</body>
</html>