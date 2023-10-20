<?php if(!$pg || $pg == '1000'):?>
<script type='module' src='./src/js/index.js'></script>
<?php endif;?>
<?php if($pg == '1001'):?>
<script type='module' src='./src/js/planes.js'></script>
<?php endif;?>
<?php if($pg == '1002' || $pg == '1004' || $pg == '1003'):?>
<script type='module' src='./src/js/faqs.js'></script>
<?php endif;?>
<?php if($pg == '1005'):?>
<script type='module' src='./src/js/login.js'></script>
<?php endif;?>
<?php if($pg == '1006'):?>
<script type='module' src='./src/js/registrarse.js'></script>
<?php endif;?>
<?php if($pg == '10'):?>
<script type='module' src='./src/js/home.js'></script>
<?php endif;?>
<?php if($pg == '11'):?>
<script type='module' src='./src/js/suscripciones.js'></script>
<?php endif;?>
<?php if($pg == '12'):?>
<script type='module' src='./src/js/servicios.js'></script>
<?php endif;?>
<?php if($pg == '13'):?>
<script type='module' src='./src/js/contactenos.js'></script>
<?php endif;?>

