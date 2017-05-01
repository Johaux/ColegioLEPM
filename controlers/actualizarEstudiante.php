<?php

	require"../modelo/estudiante.php";

	$nrodoc =  $_POST['nrodoc'];
	//se hace filtro para evitar codigo malicioso
	//$nombresE = filter_input(INPUT_POST,'nombres',FILTER_SANITIZE_SPECIAL_CHARS) ;
	$apellidosE = filter_input(INPUT_POST,'apellidos',FILTER_SANITIZE_SPECIAL_CHARS) ;

	//$correoE = $_POST['correo'];

	//se crea un objeto del modelo
	$objEstudiante = new Estudiante();
	//se carga el objeto
	$objEstudiante -> setDocumento($nrodoc);
	//$objEstudiante -> setNombres($nombresE);
	$objEstudiante -> setApellidos($apellidosE);
	//$objEstudiante -> setCorreo($correoE);
	//se invoca el metodo de insertar
	$objEstudiante -> actualizarEstudiante();

?>
