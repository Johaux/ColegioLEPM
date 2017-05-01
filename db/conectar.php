


<?php

/* TAREA: implementar una vista controlador y modelo para traer datos*/
	class Conectar{
		public static function conectarDB(){
			//el mysql recibe: nombre de servidor, nombre de usuario
			//, clave, y nombre de BD
			$con = new mysqli('localhost','johan','123456789','dbprueba');

			if($con ->connect_error)
			{
				print "No se puede realizar la conexión";
				exit();
			}
			else
			{
				return $con;
			}
		}

	}
	//se utiliza dos puntos para llamar metodo estatico
	//$res = Conectar::conectarDB();
?>
