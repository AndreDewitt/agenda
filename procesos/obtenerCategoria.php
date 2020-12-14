<?php 
    require_once "../clases/consultas.php";

    $obj = new consultas();
    echo json_encode($obj->obtenerCategoria($_POST['idCategoria']));
?>