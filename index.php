<?php session_start();
      if (isset($_SESSION['usuario'])) {
        header("Location:vistas/");
      }
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once "public/Dependencias.php"; ?>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <form id="form-login">
        <label for="nombre_usuario">Nombre de usuario</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        <button>Ingresar</button>
        <a href="registro.php">Registrarse</a>
      </form>
  </body>

</html>
