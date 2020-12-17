<?php 
    require_once "../clases/consultasContactos.php";
    $obj = new consultasContactos();

    $datos = array (
        $_POST['nombre_contacto'],
        $_POST['apaterno'],
        $_POST['amaterno'],
        $_POST['telefono'],
        $_POST['email'],
        $_POST['cat']
    );

    if ($datos[0] == '' && $datos[1] == '' && $datos[2] == '' && $datos[3] == '' && $datos[4] == '' && $datos[5] == 0 ) {
        echo 2;
    } else if ($datos[0] == '') {
        echo 3;
    } else if ($datos[1] == '') {
        echo 4;
    } else if ($datos[2] == '') {
        echo 5;
    } else if ($datos[3] == '') {
        echo 6;
    } else if ($datos[4] == '') {
        echo 7;
    } else if ($datos[5] == 0) {
        echo 8;
    } else {
        echo $obj->registrarContactos($datos);
    }
?>