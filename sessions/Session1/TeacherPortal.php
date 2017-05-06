<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Docente</title>
  </head>
  <body>

          <?php
          require "validar.php";
          echo "el nombre de el usuario es:".$_SESSION['MainUser']."<br>";
          echo "Clave:".$_SESSION['AccessPassword']."<br>";
          echo "Tiempo de Session:".$_SESSION['dTime']."<br>";
          echo "ID de sesion: ".session_id();

          //sino, calculamos el tiempo transcurrido
          $fechaGuardada = $_SESSION["dTime"];
          echo "<br>".$fechaGuardada;
          $ahora = time();
          echo "<br>".$ahora;
          $tiempo_transcurrido = $ahora-$fechaGuardada;
          echo "<br>"."Transcurrido:".$tiempo_transcurrido;

          if ($tiempo_transcurrido >= 60) {

            header("location:salir.php");

          }else {
            //sino, actualizo la fecha de la sesión
            $_SESSION["ultimoAcceso"] = $ahora;
          }



           ?>

          <h1>Bienvenido al portal para docentes</h1>
          <button onclick="location.href = 'salir.php'"> Salida Segura</button>

  </body>
</html>
