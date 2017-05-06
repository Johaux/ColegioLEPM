<?php
//incluimos el archivo validar.php
require "../sessions/validarSession.php";
session_unset();
session_destroy();
header("location:../index.html");
 ?>
