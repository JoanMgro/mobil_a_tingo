<?php  
  $pg = isset($__GET["pg"]) ? $__GET["pg"] : NULL;
  $viewClassName = match ($pg){
    0 => 'views/index',
    default => 'IndexView',
  };
  if (!$pg){
    // require_once __DIR__ . '/views/site/index.php';

    require __DIR__ . '/views/index.php';
  

   
  }

  // $model = NULL;
  // $controller = NULL;
  // $view = new $viewClassName;
  // $view->render();
  
  // require __DIR__ . '/' . $element . '.php';
 

?>

<!-- $message = match ($statusCode) {
    200, 300 => null,
    400 => 'not found',
    500 => 'server error',
    default => 'unknown status code',
}; -->