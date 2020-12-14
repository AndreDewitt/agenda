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
      <form id="form-register">
        <label for="nombre_usuario">Nombre de usuario</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        <label for="nombre">Nombre(s)</label>
        <input type="text" name="nombre" id="nombre">
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
        <label for="edad">Edad</label>
        <input type="number" name="edad" id="edad">
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" id="telefono">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <button>registrar</button>
      </form>
  </body>

</html>
