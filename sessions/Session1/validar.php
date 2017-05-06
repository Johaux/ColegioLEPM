<?php

session_start();

if (!isset($_SESSION['MainUser']))
{
  echo '<script language="javascript">';
  echo 'alert("la sesion esta cerrada")';
  echo '</script>';
  header("refresh:1; url=../Session1/index.php");
}else {

    echo '<script language="javascript">';
    echo 'alert("la sesion esta Abierta")';
    echo '</script>';
}

?>
