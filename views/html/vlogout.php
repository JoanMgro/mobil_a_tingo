<?php
session_start();
session_destroy();
echo "<script type='text/javascript'>window.location='index.php?1000';</script>";
exit();
?>