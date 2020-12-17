<?php
    require_once "../clases/consultas.php";
    $obj = new consultas();

    $datos = array (
        $_POST['idCategoria'],
        $_POST['nombre_categoriaA'],
        $_POST['descripcionA'],
        $_POST['colorA']
    );

    if ($datos[0] == '' && $datos[1] == '' && $datos[2] == '') {
        echo 2;
    } else if ($datos[1] == '') {
        echo 3;
    } else if ($datos[2] == '') {
        echo 4;
    } else if ($datos[3] == '') {
        echo 5;
    } else {
        echo $obj->actualizarCategoria($datos);
    }

 ?>
