<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CREAR USUARIOS</title>

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
              <li><a href="javascript:history.back(-1);" title="Ir la página anterior">Volver</a></li>
              <li class="scroll"><a href="https://login.master2000.net/" target="_blank">Master 2000</a></li>
              <li class="scroll"><a href="../Sessions/salidaSegura.php">Salida Segura</a></li>
            </ul>
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

          if ($tiempo_transcurrido >= 60) {

            // TODO: habilitar el direccionamiento a inicio antes de realizar la entrega del trabajo
            // BUG: Evaluar por que no se arroja el mensaje de anuncio de salida del sitio web
            echo '<script language="javascript">';
            echo 'alert("Tiempo de Sesión excedido.")';
            echo '</script>';
            //header("location:../index.html");

          }else {
            //sino, actualizo la fecha de la sesión
            $_SESSION["ultimoAcceso"] = $ahora;
          }
          ?>
    </section>


    <section id="insert">
      <div id="insert-user" class="parallax">
        <div class="container">
          <div class="row">
            <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
              <h2>ACTUALIZA LOS DATOS DEL USUARIO</h2>
              <p>Por favor ingresar los datos completos para registrar de manera adecuada la actualización del usuario</p>
            </div>
          </div>
          <!-- <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
              <div class="col-sm-12"> -->
                <form id="contact-form" name="insert-user" method="post" action="../controlers/updatetUsers.php">
                  <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  </div>
                  <div class="form-group">
                    <p>Ingresa los nombres:</p>
                    <input type="text" name="nombres" class="form-control"  required="required">
                  </div>
                  <div class="form-group">
                    <p>Ingresa los apellidos:</p>
                    <input type="text" name="apellidos" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <p>Documento de Identidad</p>
                    <input type="text" name="documento-identidad" class="form-control" required="required"
                    title="EL DOCUMENTO DE INDENTIDAD NO PUEDE SER MODIFICADOS, LA ACTUALIZACIÓN SE REALIZA SOBRE ESTE VALOR.">
                  </div>
                  <div class="form-group">
                    <p>Ingresa el Tipo de Documento de Identidad</p>
                    <select name="tipo-documento" class="form-control" required="required">
                        <option value="3">Cédula</option>
                        <option value="2">Tarjeta de Identidad</option>
                        <option value="1">Cédula de Extranjería</option>
                        <option value="1">Pasaporte</option>
                    </select>
                  </div>
                  <div class="form-group">
                    Fecha de nacimiento
                    <input type="date" name="birth-date" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    Dirección
                    <input type="text" name="direccion" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    Teléfono
                    <input type="text" name="telefono" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <p>E-mail</p>
                    <input type="email" name="mail" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <p>Registre Usuario</p>
                    <input type="text" name="user" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <p>Registre Contraseña</p>
                    <input type="password" name="password" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <p>Tipo de Usuario</p>
                    <select name="tipo-usuario" class="form-control" required="required">
                        <option value="3">Alumno</option>
                        <option value="2">Docente</option>
                        <option value="1">Administrativo</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn-submit">Modificar</button>
                  </div>

                </form>
              </div>
            </div>
          <!-- </div>
        </div>
      </div> -->
    </section><!--/#insert-contact-->

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
