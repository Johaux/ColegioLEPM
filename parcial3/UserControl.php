<?php
$user = "johan";
$pass = "1234";

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

     header("location:main.php");

  }else
  {
    echo '<script language="javascript">';
    echo 'alert("datos incorrectos")';
    echo '</script>';
    header("refresh:1; url=index.php");
  }
}


?>
