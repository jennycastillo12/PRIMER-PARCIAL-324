<?php
session_start();
//destruimos la sesion
session_destroy();
//
header("location:index.php");
?>