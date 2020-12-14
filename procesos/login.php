<?php
require_once "../clases/consultas.php";
  $datos = array($_POST['nombre_usuario'],
                  $_POST['password']);

        $obj = new consultas();
      if ($datos[0] == '' && $datos[1] == '') {
          echo 4;
      } else if ($datos[0] == ''){
          echo 2;
        }else if($datos[1] == ''){
          echo 3;
        }else {
          echo $obj->login($datos);
        }

 ?>
