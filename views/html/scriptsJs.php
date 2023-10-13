<?php if(!$pg || $pg == '0'):?>
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
