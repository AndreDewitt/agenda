<?php
require_once "../clases/consultas.php";

      if (!isset($_SESSION['usuario'])) {
        header("Location:../index.php");
      }
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <?php require_once "Dependencias.php";?>
  <meta charset="utf-8">
  <title></title>
</head>
<body>

  <a href="../procesos/cerrar.php">Cierralo</a>
  <a href="categorias.php">Categorías</a>
  <a href="contactos.php">Contactos</a>
  <label for=""><?php echo $_SESSION['usuario']; ?></label>
  <form id="form-categoria">
    <label for="nombre_categoria"></label>
    <input type="text" name="nombre_categoria">
    <label for="descripcion"></label>
    <textarea name="descripcion" rows="8"></textarea>
    <label for="color"></label>
    <input type="text" name="color">
    <button>Agregar Categoria</button>
  </form>
  <div id="cargadatos">

  </div>

  <form id="form-actualizarCategoria">
    <label for="nombre_categoriaA"></label>
    <input type="text" name="nombre_categoriaA">
    <label for="descripcionA"></label>
    <textarea name="descripcionA" rows="8"></textarea>
    <label for="colorA"></label>
    <input type="text" name="colorA">
    <button>Actualizar Categoria</button>
  </form>

</body>
</html>