<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    //echo "Hello World";
    $initime = 365*60*60*24 + time();
    setcookie('time', date('d-m-y H:i:s'), $initime);
      // NOTE:  como eliminar el contenido de una cookie
      //setcookie('cookie1');
     ?>
  </body>
</html>
