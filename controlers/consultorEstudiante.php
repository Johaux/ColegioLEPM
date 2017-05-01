<?php

	require"../modelo/estudiante.php";

	$nrodoc =  $_POST['nrodoc'];

	//se crea un objeto del modelo
	$objEstudiante = new Estudiante();

  //se carga el objeto
	$objEstudiante -> setDocumento($nrodoc);

	//se invoca el metodo de consultar
	$objEstudiante -> consultarEstudiante();

?>
