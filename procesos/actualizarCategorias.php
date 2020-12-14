<?php
    require_once "../clases/consultas.php";
    $obj = new consultas();

    #idCategoria').val
    #nombre_categoriaA
    #descripcionA').va
    #colorA').val(dato

    $datos = array (
        $_POST['idCategoria'],
        $_POST['nombre_categoriaA'],
        $_POST['descripcionA'],
        $_POST['colorA']
    );

    echo $obj->actualizarCategoria($datos);
 ?>
