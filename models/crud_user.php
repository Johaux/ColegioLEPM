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
		}

		public function consultarUsuario(){

			$sql = "SELECT NroDocumento, Nombres, Apellidos FROM USUARIOS WHERE Documento_Identidad='$this->nrodocumento'";
			$result = $this ->con->query($sql);

			if ($result->num_rows > 0) {

					// output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "NroDocumento: " . $row["NroDocumento"]. " - Name: " . $row["Nombres"]. " " . $row["Apellidos"]. "<br>";
			    }
			} else {
			    echo "0 results";
			}
			//$con->close();
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

			//$con->close();
		}

		public function actualizarUsuario(){


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
