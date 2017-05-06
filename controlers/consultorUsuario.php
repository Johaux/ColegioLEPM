<?php

	require"../sessions/validarUsuario.php";

	$password =  $_POST['password'];
	$user =  $_POST['user'];
	$position = $_POST['position'];

	 //se crea un objeto del modelo
	 $objEstudiante = new Estudiante();

   //se carga el objeto
	 $objEstudiante -> setPassword($password);
	 $objEstudiante -> setUser($user);
	 $objEstudiante -> setPosition($position);

	 //se invoca el metodo de consultar
	 $objEstudiante -> validarUsuario();

?>
