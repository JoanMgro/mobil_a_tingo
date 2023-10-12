



<?php 
  /*
  1. Preguntar por la pagina en cuestion.

  */
  $pg = isset($_GET["pg"]) ? $_GET["pg"] : NULL;
  if(!$pg)require __DIR__ . '/' . './html/index.php';
  if($pg == 1)require __DIR__ . '/' . './router/index.php';
?>

