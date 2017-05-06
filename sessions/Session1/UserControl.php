
<?php

$user;
$pass;

$gestor = fopen('db.txt', 'r');

  while (!feof($gestor)) {
    $datos = fgets($gestor);
    $datosArr = Array();

    $datosArr = explode(";",$datos);
    $user = $datosArr[0];
    $pass = $datosArr[1];
}

fclose($gestor);
if(isset($_POST['MainUser']) && isset($_POST['AccessPassword']) && isset($_POST['Position']))
{

  if ($_POST['MainUser']==$user && $_POST['AccessPassword']==$pass)
  {
    //Crear session
    session_start();
    $_SESSION['MainUser'] = $_POST['MainUser'];
    $_SESSION['AccessPassword'] = $_POST['AccessPassword'];
    $_SESSION['Position'] = $_POST['Position'];
    $_SESSION['dTime'] = time();

    switch ($_POST['Position']) {
          case 'Estudiante':
          //redireccionamos el usuario al menu Estudiante
            header("location:StudentPortal.php");
            break;

          case 'Docente':
          //redireccionamos el usuario al menu Docente
              header("location:TeacherPortal.php");
              break;

          case 'Empleado':
          //redireccionamos el usuario al menu Empleados
                  header("location:EmployeePortal.php");
              break;
          default:
          //redireccionamos el usuario al menu
            header("location:menu.php");
            break;
        }

  }else
  {
    echo '<script language="javascript">';
    echo 'alert("datos incorrectos")';
    echo '</script>';
    header("refresh:1; url=../Session1/index.php");
  }
}

?>
