<?php

	require"../models/crud_user.php";


// TODO: Aplicar filtro adecuado para código malicioso
	//se hace filtro para evitar codigo malicioso
	// $nombresE = filter_input(INPUT_POST,'nombres',FILTER_SANITIZE_SPECIAL_CHARS) ;
	// $apellidosE = filter_input(INPUT_POST,'apellidos',FILTER_SANITIZE_SPECIAL_CHARS) ;
  $nombres =  $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
  $correo = $_POST['mail'];
  $nrodoc = $_POST['documento-identidad'];
  $tipodocumento = $_POST['tipo-documento'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $fechanacimiento = $_POST['birth-date'];
  $usuario = $_POST['user'];
  $tipousuario = $_POST['tipo-usuario'];
  $password = $_POST['password'];


	//se crea un objeto del modelo
	$objEstudiante = new Usuario();
	//se carga el objeto
	$objEstudiante -> setNombres($nombres);
  $objEstudiante -> setApellidos($apellidos);
  $objEstudiante -> setDocumento($nrodoc);
  $objEstudiante -> setCorreo($correo);
	$objEstudiante -> setTipoDocumento($tipodocumento);
	$objEstudiante -> setDireccion($direccion);
  $objEstudiante -> setTelefono($telefono);
	$objEstudiante -> setUsuario($usuario);
  $objEstudiante -> setFechaNacimiento($fechanacimiento);
  $objEstudiante -> setTipoUsuario($tipousuario);
  $objEstudiante -> setPassword($password);
  ;
	//se invoca el metodo de insertar
	$objEstudiante -> crearUsuario();
	//$objEstudiante -> consultarEstudiante();

?>
