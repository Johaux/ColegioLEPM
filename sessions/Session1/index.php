<html>
  <head>
    <meta charset="utf-8">
    <title>Ingreso</title>
  </head>
  <body>
    <form action="UserControl.php" method="post" align="center">

        <fieldset style="width:350px; background-color:Beige; margin:auto">
            <legend>Formulario de Acceso al Aplicativo</legend>
            <br>
            <input type="text" name="MainUser" placeholder="Ingresa tu Usuario"> <br>
            <br>
            <input type="password" name="AccessPassword" placeholder="Contraseña"><br><br>

            <select name="Position">
                <option value="Estudiante">Estudiante</option>
                <option value="Docente">Docente</option>
                <option value="Empleado">Empleado</option>
            </select> <br>
            <p>
                <input type="submit" value="Ingresar">
        </fieldset>

    </form>
  </body>
</html>
