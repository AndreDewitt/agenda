<?php
  require_once "../clases/consultas.php";
  $obj = new consultas();
  $datos = array(
    $_POST['nombre_categoria'],
                  $_POST['descripcion'],
                  $_POST['color']);

                if ($obj->registrarCategorias($datos)) {
                  echo 1;
                }else {
                  echo 0;
                }

 ?>
