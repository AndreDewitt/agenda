<?php 
    require_once "../clases/consultasContactos.php";

    $obj = new consultasContactos();
    echo json_encode($obj->obtenerContacto($_POST['idContacto']));
?>