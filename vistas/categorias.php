<?php
require_once "../clases/consultas.php";

      if (!isset($_SESSION['usuario'])) {
        header("Location:../index.php");
      }
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <?php require_once "dependencias.php";?>
  <meta charset="utf-8">
  <title>Categorías</title>
</head>
<body class="btabla">
  <div class="circle c_1"></div>
  <div class="circle c_2"></div>
  <?php require_once "alert/alerts.php"; ?>
  <?php require_once "modulos/modalCategorias.php"; ?>
  <?php require_once "modulos/header.php"; ?>
  
  <section class="tabla">
    <div class="titulo">
        <h2>Categorías</h2>
        <button class="nuevo add"><i class="material-icons">add</i>Agregar nuevo</button>
    </div>
    <div id="cargadatos">

    </div>
  </section>
  <?php require_once "modulos/footer.php"; ?>
</body>
</html>
