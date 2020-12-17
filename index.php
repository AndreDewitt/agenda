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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body class="login">      
    <div class="circle c_1"></div>
    <div class="circle c_2"></div>
    <main>
        <div class="img">
            <?php require_once "public/svg/svg-login.php"; ?>
        </div>
        <div class="formulario">
            <h1>Iniciar Sesión</h1>
            <form id="form-login">
                <label for="nombre_usuario">Nombre de usuario</label>
                <input type="text" name="nombre_usuario" id="nombre_usuario">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">
                <div class="botones">
                    <button>Entrar</button>
                    <a href="registro.php">Registrarse</a>
                </div>
            </form>
        </div>
    </main>
    <?php require_once "vistas/alert/alerts.php";?>
</body>
</html>
