<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Opcion 1</title>
  </head>
  <body>
    <?php require "validar.php";

    $cantidadVistitas=1;
    echo "Cantidad de visitas: $cantidadVistitas <br>";
    setcookie('cookieVisita',$cantidadVistitas,time()+60);
    $visita = $_COOKIE['cookie1Visita'];
    echo "Cantidad de visitas en cookie: $visita <br>";
     ?>

    Opcion 1 <br>
    <button onclick="location.href = 'salir.php'"> Salida Segura</button>
  </body>
</html>
