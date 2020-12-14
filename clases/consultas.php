<?php
session_start();
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
    $sql = "INSERT INTO t_usuarios(nombre_usuario,password,nombre,apellidos,fecha_nacimiento,
      edad,telefono,email) VALUES('$datos[0]','$password','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')";
      $resul = mysqli_query($conexion,$sql);
      if ($resul) {
        return 1;
      }else {
        return 0;
      }
    }
    function MostrarDatos()
    {
      $nombre = $_SESSION['usuario'];
      $conexion = Conexion::Conectar();
      $sql = "SELECT * FROM t_usuarios WHERE nombre_usuario = '$nombre'";
      $resul = mysqli_query($conexion, $sql);
      return $resul;
    }

    function MostrarDatosCategoria()
    {
      $nombre = $_SESSION['usuario'];
      $conexion = Conexion::Conectar();
      $sql1 = "SELECT id_usuario FROM t_usuarios WHERE nombre_usuario = '$nombre'";
      $resul1 = mysqli_query($conexion,$sql1);
      $id = mysqli_fetch_array($resul1);
      $sql = "SELECT * FROM t_categorias WHERE id_usuario = '$id[0]'";
      $resul = mysqli_query($conexion, $sql);
      return $resul;
    }

     function mostrarContactos()
    {
      $nombre = $_SESSION['usuario'];
      $conexion = Conexion::Conectar();
      $sql = "SELECT * FROM t_usuarios WHERE nombre_usuario = '$nombre'";
      $resul = mysqli_query($conexion, $sql);
      return $resul;
    }

    function registrarCategorias($datos)
   {
     $conexion = Conexion::Conectar();
     $nombre = $_SESSION['usuario'];
     $sql1 = "SELECT id_usuario FROM t_usuarios WHERE nombre_usuario = '$nombre'";
     $resul1 = mysqli_query($conexion,$sql1);
     $id = mysqli_fetch_array($resul1);
     $sql = "INSERT INTO t_categorias(nombre_categoria,descripcion,color,id_usuario) VALUES('$datos[0]','$datos[1]','$datos[2]','$id[0]')";
     $resul = mysqli_query($conexion,$sql);
     return $resul;
   }

  }




 ?>
