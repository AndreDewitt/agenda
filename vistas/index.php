<?php
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
  <title>Página Principal</title>
  <?php require_once "dependencias.php";?>
</head>
<body class="btabla">
  <div class="circle c_1"></div>
  <div class="circle c_2"></div>
  <?php require_once "alert/alerts.php"; ?>
  <?php require_once "modulos/header.php";?>
  <section class="informacion">
    <h2>Inicio</h2>
    <?php foreach ($resul as $key): ?>
      <div class="foto">
        <div class="contenedor-img">
          <img loading="lazy" src="data:image/jpg;base64,<?php echo base64_encode($key['foto_usuario'])?>" alt="">
        </div>
      </div>
      <div class="datos">
        <h2>Información del usuario</h2>
        <p>Nombre del usuario: <?php echo $key['nombre']?>.</p>
        <p>Apellidos: <?php echo $key['apellidos']?>.</p>
        <p>Telefono: <?php echo $key['telefono']?>.</p>
        <p>Fecha de nacimiento: <?php echo $key['fecha_nacimiento']?>.</p>
        <p>Edad: <?php echo $key['edad']?>.</p>
        <p>Email: <?php echo $key['email']?>.</p>
      </div>
    <?php endforeach; ?>
  </section>
  <?php require_once "modulos/footer.php"; ?> 
</body>
</html>
