<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Docente</title>
  </head>
  <body>
    <?php
          require "validar.php";

          //sino, calculamos el tiempo transcurrido
          $fechaGuardada = $_SESSION["dTime"];
          $ahora = time();
          $tiempo_transcurrido = $ahora-$fechaGuardada;
          echo "<br>"."Transcurrido:".$tiempo_transcurrido."<br>";

if ($_SESSION['Position']== 'Estudiante') {

echo "<h1>Bienvenido al portal PHP</h1>";
  echo "<a href='opcion1.php'>opcion 1</a>   ";
  echo "<a href='opcion2.php'>opcion 2</a>   ";
  echo "<a href='#'>opcion 3</a>   ";
  echo "<a href='salir.php'>Salida Segura</a>   ";


  if ($tiempo_transcurrido >= 30) {
    header("location:salir.php");
  }
}else {
  echo "<h1>Bienvenido al portal PHP</h1>";
  echo "<a href='#'>opcion 1</a>   ";
  echo "<a href='opcion2.php'>opcion 2</a>   ";
  echo "<a href='opcion3.php'>opcion 3</a>   ";
  echo "<a href='salir.php'>Salida Segura</a>   ";

  if ($tiempo_transcurrido >= (60*15)) {
    header("location:salir.php");
  }
}
?>

  </body>
</html>
