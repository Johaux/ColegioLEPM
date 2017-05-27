<?php

	class Conectar{
		public static function conectarDB(){

			//el mysql recibe: nombre de servidor, nombre de usuario
			//, clave, y nombre de BD
			$con = new mysqli('localhost','jorge','jorge12--','db_colegio_lepm');

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
