<?php

session_start();

if (!isset($_SESSION['user']))
{
  echo '<script language="javascript">';
  echo 'alert("La sesion esta cerrada")';
  echo '</script>';
  header("refresh:1; url=../Session1/index.php");
}else {

    echo '<script language="javascript">';
    echo 'alert("Has iniciado sesion de manera adecuada")';
    echo '</script>';
}

?>
