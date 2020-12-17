<?php session_start();
      if (isset($_SESSION['usuario'])) {
        header("Location:vistas/");
      }
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once "public/dependencias.php"; ?>
    <meta charset="utf-8">
    <title>Registrar Usuarios</title>
  </head>
  <body class="login">
    <?php require_once "vistas/alert/alerts.php";?>
    <div class="circle c_1"></div>
    <div class="circle c_2"></div>
    <main>
        <div class="formulario registro">
            <h1>Formulario de registro</h1>
            <form id="form-register">
                <div class="personal">
                    <h3>Información personal</h3>
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
                </div>
                <div class="cuenta">
                    <h3>Información de la cuenta</h3>
                    <label for="nombre_usuario">Nombre de usuario</label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario">
                    
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">
                    
                    <label for="foto">Selecciona una foto</label>
                    <input type="file" name="foto" id="foto">
                </div>
                <div class="botones">
                    <button class="btn btn-primary">Confirmar</button>
                    <a href="./" class="btn-login">Cancelar</a>
                </div>
            </form>
        </div>
        <div class="img">
            <?php require_once "public/svg/svg-signin.php"; ?>
        </div>
    </main>
  </body>
</html>
