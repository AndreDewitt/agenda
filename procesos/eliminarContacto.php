<?php 
    require_once "../clases/consultasContactos.php";

    $obj = new consultasContactos();

    echo $obj->eliminarContacto($_POST['idContacto']);
?>