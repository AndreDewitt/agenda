<?php session_start();
      if (!isset($_SESSION['usuario'])) {
        header("Location:../index.php");
      }
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <a href="../procesos/cerrar.php">Cierralo</a>
  </body>
</html>
