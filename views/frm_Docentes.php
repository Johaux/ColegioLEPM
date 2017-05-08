<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header id="home">
      </div><!--/#home-slider-->
      <div class="main-nav">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
              <h1><img class="img-responsive" src="../images/logo.png" alt="logo"></h1>
            </a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="scroll active"><a href="../index.html">Inicio</a></li>
              <li class="scroll"><a href="#services">Institución</a></li>
              <li class="scroll"><a href="#insert">Consultar</a></li>
              <li class="scroll"><a href="#insert">Actualizar</a></li>
              <li class="scroll"><a href="https://login.master2000.net/" target="_blank">Master 2000</a></li>
              <li class="scroll"><a href="../Sessions/salidaSegura.php">Salida Segura</a></li>            </ul>
          </div>
        </div>
      </div><!--/#main-nav-->
    </header><!--/#home-->

    <?php
    require "../sessions/validarSession.php";
    echo "<h1>Bienvenido:".$_SESSION['nom'] . " " . $_SESSION['ape'] . "</h1>";

    echo "ID de sesion: ".session_id();

    //sino, calculamos el tiempo transcurrido
    $fechaGuardada = $_SESSION["dTime"];
    $ahora = time();
    $tiempo_transcurrido = $ahora-$fechaGuardada;

    //sino, calculamos el tiempo transcurrido
    $fechaGuardada = $_SESSION["dTime"];
    echo "$fechaGuardada"."<br>";
    $ahora = time();
    echo "$ahora"."<br>";
    $tiempo_transcurrido = $ahora-$fechaGuardada;
    echo "$tiempo_transcurrido"."<br>";

    if ($tiempo_transcurrido >= 60) {

      // BUG: Evaluar por que no se arroja el mensaje de anuncio de salida del sitio web
      echo '<script language="javascript">';
      echo 'alert("Tiempo de Sesión excedido.")';
      echo '</script>';
      header("location:../index.html");

    }else {
      //sino, actualizo la fecha de la sesión
      $_SESSION["ultimoAcceso"] = $ahora;
    }
    ?>
    <button onclick="location.href = '../Sessions/salidaSegura.php'"> Salida Segura</button>


  </body>
</html>
