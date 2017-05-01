<?php

	require"../models/estudiante.php";

	$password =  $_POST['password'];
	$user =  $_POST['user'];



	 //se crea un objeto del modelo
	 $objEstudiante = new Estudiante();

   //se carga el objeto
	 $objEstudiante -> setPassword($password);
	 $objEstudiante -> setUser($user);

	 //se invoca el metodo de consultar
	 $objEstudiante -> consultarEstudiante();

?>
