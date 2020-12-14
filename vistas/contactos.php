<?php
session_start();
require_once "../clases/consultas.php";
$obj = new consultas();
$resul = $obj->MostrarDatos();

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
  <a href="categorias.php">Categorías</a>
  <a href="contactos.php">Contactos</a>
  <div class="container">
    <?php foreach ($resul as $key): ?>
      <p><?php echo $key['nombre_usuario']?></p>
      <p><?php echo $key['nombre']?></p>
      <p><?php echo $key['apellidos']?></p>
      <p><?php echo $key['telefono']?></p>
      <p><?php echo $key['fecha_nacimiento']?></p>
      <p><?php echo $key['edad']?></p>
      <p><?php echo $key['email']?></p>
    <?php endforeach; ?>
  </div>
</body>
</html>
