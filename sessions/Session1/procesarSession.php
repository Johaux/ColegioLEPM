<?php

echo "Datos de la sesion <br>";

//iniciamos sesion
session_start();
$_SESSION['MainUser']=$_POST['MainUser'];
$_SESSION['AccessPassword']=$_POST['AccessPassword'];
$_SESSION['Position']=$_POST['Position'];

echo "el nombre de el usuario es:".$_SESSION['MainUser']."<br>";
echo "Clave:".$_SESSION['AccessPassword']."<br>";
echo "Cargo:".$_SESSION['Position']."<br>";
echo "ID de sesion: ".session_id();

 ?>
