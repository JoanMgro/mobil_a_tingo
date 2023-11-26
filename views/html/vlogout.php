<?php
session_start();
session_destroy();
echo "<script type='text/javascript'>window.location='index.php?pg=1000';</script>";
exit();
?>