<html>
  <head>
    <meta charset="utf-8">
    <title>BUSCR USUARIOS</title>

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

	require '../db/conectar.php';
	class Usuario{
		//Atributos

		private $nombres;
		private $apellidos;
		private $correo;
    private $tipodocumento;
    private $nrodocumento;
    private $direccion;
    private $telefono;
    private $fechanacimiento;
    private $usuario;
    private $tipousuario;
    private $password;

		//se crea la conexión
		private $con;

		//para crear un constructor se utiliza __construct()
		public function __construct(){
			$this -> con = Conectar::conectarDB();
		}

		//metodos get and set
		public function setDocumento($nrodoc)
		{
			$this -> nrodocumento = $nrodoc;
		}

    public function setNombres($nombres)
		{
			$this -> nombres = $nombres;
		}

    public function setApellidos($apellidos)
		{
			$this -> apellidos = $apellidos;
		}

    public function setCorreo($correo)
		{
			$this -> correo = $correo;
		}

    public function setTipoDocumento($tipodocumento)
		{
			$this -> tipodocumento = $tipodocumento;
		}

    public function setDireccion($direccion)
		{
			$this -> direccion = $direccion;
		}

    public function setTelefono($telefono)
		{
			$this -> telefono = $telefono;
		}

    public function setFechaNacimiento($fechanacimiento)
		{
			$this -> fechanacimiento = $fechanacimiento;
		}

    public function setUsuario($usuario)
		{
			$this -> usuario = $usuario;
		}

    public function setTipoUsuario($tipousuario)
		{
			$this -> tipousuario = $tipousuario;
		}

    public function setPassword($password)
		{
			$this -> password = $password;
		}

		public function crearUsuario(){

			//se pasa a la variable res el resultado de la ejecucion de insertSQL

      $insertSQL = "INSERT INTO `usuarios` (`Id_Usuario`, `Documento_Identidad`,
      `Id_Tipo_Documento`, `Nombres`, `Apellidos`, `Fecha_Nacimiento`, `E-Mail`,
      `Usuario`, `Id_Tipo_Usuario`, `Password`, `Direccion`, `Telefono`)
      VALUES (NULL, '$this->nrodocumento', '$this->tipodocumento', '$this->nombres',
      '$this->apellidos', '$this->fechanacimiento', '$this->correo', '$this->usuario',
      '$this->tipousuario', '$this->password', '$this->direccion', '$this->telefono')";

      $res = $this ->con->query($insertSQL);

			if($res)
			{
				echo '<script language="javascript">';
				echo 'alert("El usuario fue registrado!.")';
				echo '</script>';
			 	header("refresh:1; url=../views/frm_createUser.php");
				//<li><a href="javascript:history.back(-1);" title="Ir la página anterior">Volver</a></li>
			}
			else
			{

					echo '<script language="javascript">';
					echo 'alert("No fue posible ingresar el usuario!.")';
					echo '</script>';
				exit();
			}
			$this ->con->close();
		}

		public function borrarUsuario(){

			$sqlSelect = "SELECT * FROM USUARIOS WHERE Documento_Identidad='$this->nrodocumento'";

			$result = $this ->con->query($sqlSelect);

			if ($result->num_rows > 0) {
				$sql = "DELETE FROM USUARIOS WHERE Documento_Identidad='$this->nrodocumento'";

				if ($this ->con->query($sql)) {
					echo '<script language="javascript">';
					echo 'alert("El usuario fue eliminado de nuestra base de datos!.")';
					echo '</script>';
					header("refresh:1; url=../views/frm_deleteUser.php");

					//echo "El usuario $this->nrodocumento fue eliminado de manera exitosa.";
				} else {
					echo "Error al eliminar el usuario: " . $con->error;
				}
			} else {
				echo '<script language="javascript">';
				echo 'alert("El usuario NO existe en nuestra base de datos!.")';
				echo '</script>';
				header("refresh:1; url=../views/frm_deleteUser.php");

				// echo "No existe un usuario con el documento $this->nrodocumento en nuestas bases datos";
			}

			$this ->con->close();
		}

		public function actualizarUsuario(){


			$sqlSelect = "SELECT * FROM USUARIOS WHERE Documento_Identidad='$this->nrodocumento'";
			$result = $this ->con->query($sqlSelect);

			if ($result->num_rows > 0) {

				$sql ="UPDATE `usuarios` SET `Password` = '12345', `Direccion` = 'Cr 52 64 10'
				WHERE `usuarios`.`Id_Usuario` = 3 WHERE NroDocumento='$this->nrodocumento";

				if ($this ->con->query($sql) === TRUE) {
					echo '<script language="javascript">';
					echo 'alert("los datos fueron actualizados!.")';
					echo '</script>';
					header("refresh:1; url=../views/frm_deleteUser.php");

				} else {
					echo '<script language="javascript">';
					echo 'alert("El usuario NO existe en nuestra base de datos!.")';
					echo '</script>';
					header("refresh:1; url=../views/frm_deleteUser.php");

					//echo "Error updating record: " . $conn->error;
				}
			} else {
			    echo "No existe un USUARIO con ese número de documento";
			}
			$this ->con->close();
		}

    public function actualizarEstudiante(){


      $sqlSelect = "SELECT * FROM USUARIOS WHERE Documento_Identidad='$this->nrodocumento'";
      $result = $this ->con->query($sqlSelect);

      if ($result->num_rows > 0) {

        $sql ="UPDATE `usuarios` SET `Password` = '12345', `Direccion` = 'Cr 52 64 10'
        WHERE `usuarios`.`Id_Usuario` = 3 WHERE NroDocumento='$this->nrodocumento";

        if ($this ->con->query($sql) === TRUE) {
          echo '<script language="javascript">';
          echo 'alert("los datos fueron actualizados!.")';
          echo '</script>';
          header("refresh:1; url=../views/frm_deleteUser.php");

        } else {
          echo '<script language="javascript">';
          echo 'alert("El usuario NO existe en nuestra base de datos!.")';
          echo '</script>';
          header("refresh:1; url=../views/frm_deleteUser.php");

          //echo "Error updating record: " . $conn->error;
        }
      } else {
          echo "No existe un USUARIO con ese número de documento";
      }
      $this ->con->close();
    }

		public function buscarUsuario(){

			$sql = "SELECT * FROM USUARIOS  WHERE Documento_Identidad='$this->nrodocumento'";
			$result = $this ->con->query($sql);
			$count = 0;

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
						echo "<h1>El usuario fue encontrado en nuesta base de datos con el nombre:</br></h1>";
			        echo "Nombres:" . $row["Nombres"]." ". $row["Apellidos"]."<br>";
							$count++;

			    }
			} else {

			    echo "No existe un usuario con los datos registrados";
			}
			// TODO: Emplear para estadísticas
			//echo "Cantidad de usuarios registrados: $count";
			$this ->con->close();
	}

	public function listarTodos(){

		$sql = "SELECT * FROM USUARIOS";
		$result = $this ->con->query($sql);
		$count = 0;

		if ($result->num_rows > 0) {
				// output data of each row
				echo "<h1>El usuario fue encontrado en nuesta base de datos con el nombre:</br></h1>";

				while($row = $result->fetch_assoc()) {
						echo "Nombres:" . $row["Nombres"]." ". $row["Apellidos"]."<p>";
						$count++;
				}
				echo "<h2>Se encontraron $count usuarios en nuestro sistema</h2>";
		} else {
      echo '<script language="javascript">';
      echo 'alert("La consulta no tuvo exito o no hay ningún usuario registrado!.")';
      echo '</script>';
      header("refresh:1; url=../views/frm_Administrativos.php");
		}

		// TODO: Emplear para estadísticas
		//echo "Cantidad de usuarios registrados: $count";
		$this ->con->close();
}
public function listarEstudiantes(){

  $sql = "SELECT * FROM USUARIOS WHERE Id_Tipo_Usuario=4";
  $result = $this ->con->query($sql);
  $count = 0;

  if ($result->num_rows > 0) {
      // output data of each row
      echo "<h1>El usuario fue encontrado en nuesta base de datos con el nombre:</br></h1>";

      while($row = $result->fetch_assoc()) {
          echo "Nombres:" . $row["Nombres"]." ". $row["Apellidos"]."<p>";
          $count++;
      }
      echo "<h2>Se encontraron $count usuarios en nuestro sistema</h2>";
  } else {
    echo '<script language="javascript">';
    echo 'alert("La consulta no tuvo exito o no hay ningún usuario registrado!.")';
    echo '</script>';
    header("refresh:1; url=../views/frm_Docentes.php");
  }

  // TODO: Emplear para estadísticas
  //echo "Cantidad de usuarios registrados: $count";
  $this ->con->close();
}
}
?>
</section>




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
