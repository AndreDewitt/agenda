<?php
require_once "../clases/consultas.php";
$datos = array($_POST['nombre_usuario'],
                $_POST['password'],
              $_POST['nombre'],
              $_POST['apellidos'],
              $_POST['fecha_nacimiento'],
              $_POST['edad'],
              $_POST['telefono'],
              $_POST['email']);

        $obj = new consultas();
        if ($datos[0] == '' && $datos[1] == '' && $datos[2] == '' && $datos[3] == '' && $datos[4] == '' && $datos[5] == '' && $datos[6] == ''
        && $datos[7] == '') {
            echo 4;
        } else if($datos[0] == '') {
            echo 2;
          }else if($datos[1] == ''){
            echo 3;
          }else if($datos[2] == ''){
            echo 5;
          }else if($datos[3] == ''){
            echo 6;
          }else if($datos[4] == ''){
            echo 7;
          }else if($datos[5] == ''){
            echo 8;
          }else if($datos[6] == ''){
            echo 9;
          }else if($datos[7] == ''){
            echo 10;
          }else{
          echo $obj->insertarUsuario($datos);
        }

 ?>
