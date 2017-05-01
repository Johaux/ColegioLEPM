<!DOCTYPE html>

<html>

	<head>
  		<title>Daniel Cifuentes!</title>
  		<meta charset="utf-8" />
	</head>

	<body>
		<h1 style="color:blue">Registro de estudiantes</h1>
		<form method="post" action="../controlador/controladorEstudiante.php">
			<label>Documento</label><br>
			<input type="number" name="nrodoc" required="required"><br>
			<label>Nombres</label><br>
			<input type="text" name="nombres" required="required"><br>
			<label>Apellidos</label><br>
			<input type="text" name="apellidos" required="required"><br>
			<label>Correo</label><br>
			<input type="email" name="correo" required="required"><br>

			<input type="submit" name="enviar" value="Registrar"><br>

		</form>

		<form class="" action="../controlador/consultorEstudiante.php" method="post">
			<label>Consulta los Estudiantes por Número de Documento</label><br>
			<input type="number" name="nrodoc" required="required"><br>

			<input type="submit" name="enviar" value="Consultar"><br>
		</form>

		<form class="" action="../controlador/borrarEstudiante.php" method="post">
			<label>Borra los Estudiantes por Número de Documento</label><br>
			<input type="number" name="nrodoc" required="required"><br>

			<input type="submit" name="enviar" value="Borrar"><br>
		</form>
		<form class="" action="../controlador/actualizarEstudiante.php" method="post">
			<label>Actualiza los Estudiantes por Número de Documento</label><br>
			<input type="number" name="nrodoc" required="required"><br>
			<label>Apellidos</label><br>
			<input type="text" name="apellidos" required="required"><br>


			<input type="submit" name="enviar" value="Actualizar"><br>
		</form>

	</body>


</html>
