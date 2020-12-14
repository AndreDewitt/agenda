<?php
    require_once "Conexion.php";

  class consultas extends Conexion
  {

    function login($datos)
    {
      $conexion = Conexion::Conectar();
      $password = sha1($datos[1]);
      $sql = "SELECT COUNT(*) AS total FROM t_usuarios WHERE nombre_usuario = '$datos[0]' AND password = '$password'";
      $resul = mysqli_query($conexion,$sql);
      $cantidad = mysqli_fetch_array($resul);
      if ($cantidad['total'] > 0) {
        $_SESSION['usuario'] = $datos[0];

      }
      return $cantidad['total'];
    }

    function insertarUsuario($datos)
    {
      $conexion = Conexion::Conectar();
      $password = sha1($datos[1]);
      $sql = "INSERT INTO t_usuarios(nombre_usuario,password,foto_usuario,nombre,apellidos,fecha_nacimiento,
      edad,telefono,email) VALUES('$datos[0]','$password','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]')";
      $resul = mysqli_query($conexion,$sql);
      if ($resul) {
        return 1;
      }else {
        return 0;
      }
    }
  }




 ?>
