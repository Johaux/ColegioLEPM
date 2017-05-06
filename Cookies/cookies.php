<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    //echo "Hello World";
    setcookie('cookie1','Hola',time()+60*60*24);
    if (isset($_COOKIE['cookie1']))
      print "La cookie tiene el valor de : ".$_COOKIE('cookie1');

      // NOTE:  como eliminar el contenido de una cookie
      //setcookie('cookie1');
     ?>
  </body>
</html>
