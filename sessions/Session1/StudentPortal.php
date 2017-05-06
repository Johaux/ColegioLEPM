<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Estudiantes</title>
  </head>
  <body>
    <?php
    require "validar.php";
     ?>
    <h1>Bienvenido al portal para estudiantes</h1>
    	<h1>menu principal</h1><br><br>

      <?php
      require "validar.php";
      echo "el nombre de el usuario es:".$_SESSION['MainUser']."<br>";
      echo "Clave:".$_SESSION['AccessPassword']."<br>";
      echo "Tiempo de Session:".$_SESSION['dTime']."<br>";
      echo "ID de sesion: ".session_id();

      //sino, calculamos el tiempo transcurrido
      $fechaGuardada = $_SESSION["dTime"];
      $ahora = time();
      $tiempo_transcurrido = $ahora-$fechaGuardada;

      if ($tiempo_transcurrido >= 60 {

        header("location:salir.php");

      }else {
        //sino, actualizo la fecha de la sesión
        $_SESSION["ultimoAcceso"] = $ahora;
      }
      ?>
      <button onclick="location.href = 'salir.php'"> Salida Segura</button>

  </body>
</html>
