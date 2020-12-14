<?php
session_start();
require_once "Conexion.php";

class consultas extends Conexion
{

  function login($datos) {
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

   public function obtenerCategoria($id) {
      $conexion = Conexion::Conectar();
      $u = $_SESSION['usuario'];
      $sql1 = "SELECT id_usuario FROM t_usuarios WHERE nombre_usuario = '$u'";
      $result1 = mysqli_query($conexion,$sql1);
      $idUsuario = mysqli_fetch_row($result1);
      
      $sql = "SELECT id_categoria,nombre_categoria,descripcion,color FROM t_categorias WHERE id_categoria = '$id' AND id_usuario = '$idUsuario[0]'";
      $result = mysqli_query($conexion,$sql);
      $ver = mysqli_fetch_row($result);
      $datos = array (
          'id_categoria' => $ver[0],
          'nombre_categoria' => $ver[1],
          'descripcion' => $ver[2],
          'color' => $ver[3]
      );
      return $datos;
   }

    public function actualizarCategoria ($datos) {
      $conexion = Conexion::Conectar();
      $sql = "UPDATE t_categorias SET nombre_categoria = '$datos[1]', descripcion = '$datos[2]', color = '$datos[3]' WHERE id_categoria = '$datos[0]'";
      $resul = mysqli_query($conexion,$sql);
      return $resul;
    }

    public function eliminarCategoria ($id) {
        $conexion = Conexion::Conectar();

        $sql = "DELETE FROM t_categorias WHERE id_categoria = '$id'";

        $resul = mysqli_query($conexion,$sql);

        return $resul;
    }
  }
 ?>
