<?php
//incluimos el archivo validar.php
require "validar.php";
session_unset();
session_destroy();
header("location:index.php");
 ?>
