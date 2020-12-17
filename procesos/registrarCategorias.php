<?php
  require_once "../clases/consultas.php";
  $obj = new consultas();
  $datos = array(
    $_POST['nombre_categoria'],
    $_POST['descripcion'],
    $_POST['color']
  );

  if ($datos[0] == '' && $datos[1] == '' && $datos[2] == '') {
    echo 2;
  } else if ($datos[0] == '') {
    echo 3;
  } else if ($datos[1] == '') {
    echo 4;
  } else if ($datos[2] == '') {
    echo 5;
  } else {
    echo $obj->registrarCategorias($datos);
  }
?>
