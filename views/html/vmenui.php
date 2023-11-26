<?php
  require __DIR__ . '/' . '../../controllers/cmenus.php';
  // echo "<script type='application/javascript'>console.log('{$model->getPaginas()[0]}')</script>";
?>


<ul class="menu-list">
  <?php foreach($mMenu->getPaginas() as $item): ?>
  <?php if(($item['pagnom'] !== 'Ingresar') && ($item['pagnom'] !== 'Salir')):?>
  <li class="menu-list__menu-item menu-list__menu-item_hover">
          <?php if($item['pagnom'] == 'Carrito'):?>
            <a class="menu-list__menu-link carrito link-text_nav" href= <?="../../{$item['pagmen']}.php?pg={$item['pagid']}" ?>>
            <i class="carrito__compras"></i><?=$products?>
          </a>
          <?php else:?>
          <a class="menu-list__menu-link link link_text_nav" href= <?="../../{$item['pagmen']}.php?pg={$item['pagid']}" ?>><?= $item['pagnom'] ?></a>
          <?php endif;?>
  </li>
  <?php else: ?> 
  <li class="menu-list__menu-item menu-list__menu-item_log-in">
          <a class="menu-list__menu-link_log-in log-in link-text_nav" href= <?="../../{$item['pagmen']}.php?pg={$item['pagid']}" ?>>
            <span class="log-in__span"><?= $item['pagnom'] ?></span>            
            <i class="log-in__ico"></i>
          </a>
  </li>
  <?php endif; ?>
  <?php endforeach;?>
</ul> 
