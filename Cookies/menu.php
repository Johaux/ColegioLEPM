<?php
//crear una cookie para almacenar el Color
//que quiere aplicar a una página
//note: cada vez que el isuario ingrese verá el color de página elegido

if (isset($_COOKIE['bgcolor'])) {
  $color = $_COOKIE['bgcolor'];
}
else {
  $color = '#ffffff';
}

if (isset($_POST['enviar'])) {
  if (isset($_POST['color'])) {
    if ($_POST['color'] == "Rojo") {
      $color = '#ff0000';
    }elseif ($_POST['color'] == "Azul") {
      $color = '#0d00ff';
    }else {
      $color = '#0dff00';
    }
  }else {
    $color = '#ffffff';
  }
  setcookie('bgcolor',$color,time() + 5);
}


?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body style="background-color:<?php echo $color;?>">
     <form class="formColor" action="menu.php" method="post">
       <select class="" name="color">
         <option>Rojo</option>
         <option >Azul</option>
         <option >Verde</option>
       </select><br>
       <input type="submit" name="enviar" value="Cambiar Color">
     </form>
   </body>
 </html>
