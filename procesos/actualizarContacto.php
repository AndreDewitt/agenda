<?php 
    require_once "../clases/consultasContactos.php";
    $obj = new consultasContactos();

    $datos = array (
        $_POST['idContacto'],
        $_POST['nombre_contactoA'],
        $_POST['apaternoA'],
        $_POST['amaternoA'],
        $_POST['telefonoA'],
        $_POST['emailA'],
        $_POST['catA']
    );

    if ($datos[1] == '' && $datos[2] == '' && $datos[3] == '' && $datos[4] == '' && $datos[5] == '' && $datos[6] == 0 ) {
        echo 2;
    } else if ($datos[1] == '') {
        echo 3;
    } else if ($datos[2] == '') {
        echo 4;
    } else if ($datos[3] == '') {
        echo 5;
    } else if ($datos[4] == '') {
        echo 6;
    } else if ($datos[5] == '') {
        echo 7;
    } else if ($datos[6] == 0) {
        echo 8;
    } else {
        echo $obj->actualizarContacto($datos);
    }
?>