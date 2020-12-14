<?php 
    require_once "../clases/consultas.php";

    $obj = new consultas();

    echo $obj->eliminarCategoria($_POST['idCategoria']);
?>