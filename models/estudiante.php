<?php

	require '../db/conectar.php';

	class Estudiante{

		//Atributos
		private $password;
		private $user;

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

		public function setUser($user)
		{
			$this -> user = $user;
		}

		public function registrarEstudiante(){

			$insertSQL = "INSERT INTO tblestudiantes (nrodocumento,nombres,apellidos,correo) VALUES ('$this->nrodocumento','$this->nombres','$this->apellidos','$this->correo')";
			//se pasa a la variable res el resultado de la ejecucion de insertSQL
			$res = $this ->con->query($insertSQL);

			if($res)
			{
				print"Registro insertado";
			}
			else
			{
				print"hay problemas con el insert";
				exit();
			}
		}

		public function consultarEstudiante(){

			$sql = "SELECT * FROM ESTUDIANTES WHERE Password='$this->password' AND Usuario='$this->user'";

			$result = $this ->con->query($sql);

			if ($result ->num_rows > 0) {

					// output data of each row
			    // while($row = $result->fetch_assoc()) {
			    //     echo "Nombre: " . $row["Nombres"]. "<br>";
			    // }

					// TODO: Aplicar session a la vista que se generará y dejar visible por 3 minutos.
					// redireccionamiento a página en solo vista de calificaciones.
					header("location:../views/ratings.html");

			} else {
			    echo "Clave o usuario inválido";
			}
			// QUESTION: Consultar el motivo por el cual no cierra la conexión.
			// TODO: aplicar cierre de conexión
			//mysqli_close($this->$con);
			//$this->$con->close();

		}

		public function borrarEstudiante(){

			$sqlSelect = "SELECT NroDocumento, Nombres, Apellidos FROM tblestudiantes WHERE NroDocumento='$this->nrodocumento'";
			$result = $this ->con->query($sqlSelect);

			if ($result->num_rows > 0) {
				$sql = "DELETE FROM tblestudiantes WHERE NroDocumento='$this->nrodocumento'";

				if ($this ->con->query($sql)) {
					echo "El estudiante fue eliminado de manera exitosa.";
				} else {
					echo "Error deleting record: " . $con->error;
				}
			} else {
			    echo "No existe un estudiante con ese número de documento";
			}

			//$con->close();
		}

		public function actualizarEstudiante(){


			$sqlSelect = "SELECT NroDocumento, Nombres, Apellidos FROM tblestudiantes WHERE NroDocumento='$this->nrodocumento'";
			$result = $this ->con->query($sqlSelect);

			if ($result->num_rows > 0) {

				$sql = "UPDATE tblestudiantes SET Apellidos='$this->apellidos' WHERE NroDocumento='$this->nrodocumento'";

				if ($this ->con->query($sql) === TRUE) {
					echo "El estudiante fue eliminado de manera exitosa.";
				} else {
					echo "Error updating record: " . $conn->error;
				}
			} else {
			    echo "No existe un estudiante con ese número de documento";
			}

		}
	}

?>
