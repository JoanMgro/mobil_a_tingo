<?php
session_start();
$auth = isset($_SESSION['validated']) ? $_SESSION['validated'] : NULL;

if($auth != '@1r;:**3')
{
    session_destroy();
    header('location: ../index.php');
    exit();
}
?>