<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrativos</title>
  </head>
  <body>

    <?php
    require "../sessions/validarSession.php";
    echo "el nombre de el usuario es:".$_SESSION['user']."<br>";
    echo "Clave:".$_SESSION['password']."<br>";
    echo "Tiempo de Session:".$_SESSION['dTime']."<br>";
    echo "ID de sesion: ".session_id();

    //sino, calculamos el tiempo transcurrido
    $fechaGuardada = $_SESSION["dTime"];
    $ahora = time();
    $tiempo_transcurrido = $ahora-$fechaGuardada;

    if ($tiempo_transcurrido >= 60) {

      //header("location:salir.php");
      echo "debe salir";

    }else {
      //sino, actualizo la fecha de la sesión
      $_SESSION["ultimoAcceso"] = $ahora;
    }
    ?>
    <button onclick="location.href = '../Sessions/salidaSegura.php'"> Salida Segura</button>


  </body>
</html>
