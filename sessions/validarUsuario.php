<?php

	require '../db/conectar.php';

	class Usuario{

		//Atributos
		private $password;
		private $user;
		private $position;

		//se crea la conexión
		private $con;

		//para crear un constructor se utiliza __construct()
		public function __construct(){
			$this -> con = Conectar::conectarDB();
		}

		//metodos get and set
		public function setPassword($password)
		{
			$this -> password = $password;
		}

		public function setPosition($position)
		{
			$this -> position = $position;
		}

		public function setUser($user)
		{
			$this -> user = $user;
		}

		public function validarUsuario(){

			if(isset($_POST['user']) && isset($_POST['password']) && isset($_POST['position']))
			{
				
				$sql = "SELECT * FROM USUARIOS WHERE Password='$this->password'
				AND Usuario='$this->user' AND Id_Tipo_Usuario=$this->position";

				$result = $this ->con->query($sql);

					if ($result ->num_rows > 0) {
						// output data of each row
				    while($row = $result->fetch_assoc()) {

							//echo $_POST['password']. " ==: " . $row["Password"]. $_POST['user']. " - Name: " . $row["Usuario"]. $_POST['position'] . " " . $row["Id_Tipo_Usuario"]. "<br>";
								//valida exitencia de usuario en base de datos

								// 	// TODO: Aplicar session a la vista que se generará y dejar visible por 3 minutos.
								// 	// redireccionamiento a página en solo vista de calificaciones.

					  		if ($_POST['user']==$row["Usuario"] && $_POST['password']==$row["Password"]
								&& $_POST["position"]==1)
					  		{
									  //Crear session
								    session_start();
								    $_SESSION['user'] = $_POST['user'];
								    $_SESSION['password'] = $_POST['password'];
										$_SESSION['position'] = $_POST['position'];

										$name = $row["Nombres"];
										$_SESSION['nom'] = $name;
										$lastName = $row["Apellidos"];
										$_SESSION['ape'] = $lastName;

								    $_SESSION['dTime'] = time();
										header("refresh:1; url=../views/frm_Administrativos.php");

								} else if ($_POST['user']==$row["Usuario"] && $_POST['password']==$row["Password"]
								&& $_POST["position"]==2)
								{

										session_start();
								    $_SESSION['user'] = $_POST['user'];
								    $_SESSION['password'] = $_POST['password'];
										$_SESSION['position'] = $_POST['position'];

										$name = $row["Nombres"];
										$_SESSION['nom'] = $name;
										$lastName = $row["Apellidos"];
										$_SESSION['ape'] = $lastName;

								    $_SESSION['dTime'] = time();
										header("refresh:1; url=../views/frm_Docentes.php");

								} else if ($_POST['user']==$row["Usuario"] && $_POST['password']==$row["Password"]
								&& $_POST["position"]==3)
								{

										session_start();
								    $_SESSION['user'] = $_POST['user'];
								    $_SESSION['password'] = $_POST['password'];
										$_SESSION['position'] = $_POST['position'];

										$name = $row["Nombres"];
										$_SESSION['nom'] = $name;
										$lastName = $row["Apellidos"];
										$_SESSION['ape'] = $lastName;

								    $_SESSION['dTime'] = time();
										header("refresh:1; url=../views/frm_Estudiantes.php");
								} else
								{
									  echo '<script language="javascript">';
								    echo 'alert("datos incorrectos")';
								    echo '</script>';
								    header("refresh:1; url=../views/frm_Login.html");
								}
					  }
					}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("Usuario, clave inválidos o tipo de usuario incorrecto")';
				echo '</script>';
				header("refresh:1; url=../views/frm_Login.html");
			}

			// QUESTION: Consultar el motivo por el cual no cierra la conexión.
			// TODO: aplicar cierre de conexión
			//mysqli_close($this->$con);
			//$this->$con->close();
		}
	}

	}

?>
