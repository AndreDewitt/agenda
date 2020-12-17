<?php
    require_once "../clases/consultasContactos.php";
    require_once "../clases/consultas.php";
    $obj = new consultasContactos();
    $resul = $obj->MostrarDatosContacto();

    $obj1 = new consultas();
    $n = $obj1->MostrarDatosCategoria();

    if (!isset($_SESSION['usuario'])) {
      header("Location:../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Contactos</title>
  <?php require_once "dependencias.php"; ?>
</head>
<body class="btabla">
  <div class="circle c_1"></div>
  <div class="circle c_2"></div>
  <?php require_once "alert/alerts.php"; ?>
  <?php require_once "modulos/modalContactos.php"; ?>
  <?php require_once "modulos/header.php"; ?>
  <section class="tabla">
    <div class="titulo">
        <h2>Categorías</h2>
        <button class="nuevo add"><i class="material-icons">add</i>Agregar nuevo</button>
    </div>
    <div id="cargadatosContactos">

    </div>
  </section>
  <?php require_once "modulos/footer.php"; ?>
</body>
</html>
