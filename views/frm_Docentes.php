<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>DOCENTES</title>

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/animate.min.css" rel="stylesheet">
  <link href="../css/font-awesome.min.css" rel="stylesheet">
  <link href="../css/lightbox.css" rel="stylesheet">
  <link href="../css/main.css" rel="stylesheet">
  <link id="css-preset" href="../css/presets/preset1.css" rel="stylesheet">
  <link href="../css/responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/menu.css">

  <style media="screen">

  </style>

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
              <li class="scroll"><a href="../views/frm_docenteConsulta.php" title="Consulta estudiates y Docentes">Consultar</a></li>
              <li class="scroll"><a href="#insert">Actualizar</a></li>
              <li class="scroll"><a href="https://login.master2000.net/" target="_blank">Master 2000</a></li>
              <li class="scroll"><a href="../Sessions/salidaSegura.php">Salida Segura</a></li>            </ul>
          </div>
        </div>
      </div><!--/#main-nav-->
    </header><!--/#home-->

    <section>
    <?php
    require "../sessions/validarSession.php";
    echo "<h1>Bienvenido:".$_SESSION['nom'] . " " . $_SESSION['ape'] . "</h1>";
    if (isset($_COOKIE['time']))
      $time = $_COOKIE['time'];
    else
    echo "welcome";       
    echo "Tu ultima conexion fue: " .$time."<br>";
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
    </section>
    <footer id="footer">
      <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="container text-center">
          <div class="footer-logo">
            <a href="index.html"><img class="img-responsive" src="../images/logo.png" alt=""></a>
          </div>
          <div class="social-icons">
            <ul>
              <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <p></p>
            </div>
            <div class="col-sm-6">
              <p class="pull-right"><a href="https://johaux.github.io/"> &copy; 2017 JOGO DEV.</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>



    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.inview.min.js"></script>
    <script type="text/javascript" src="../js/wow.min.js"></script>
    <script type="text/javascript" src="../js/mousescroll.js"></script>
    <script type="text/javascript" src="../js/smoothscroll.js"></script>
    <script type="text/javascript" src="../js/jquery.countTo.js"></script>
    <script type="text/javascript" src="../js/lightbox.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>

  </body>
</html>
