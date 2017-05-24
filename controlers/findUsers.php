<?php

	require"../models/crud_user.php";


  $nrodoc = $_POST['documento-identidad'];


	//se crea un objeto del modelo
	$objEstudiante = new Usuario();
	//se carga el objeto
  $objEstudiante -> setDocumento($nrodoc);

	//se invoca el metodo de insertar
	$objEstudiante -> buscarUsuario();
	//$objEstudiante -> consultarEstudiante();

?>
