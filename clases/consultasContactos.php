 <?php  
require_once "Conexion.php";
require_once "consultas.php";


class consultasContactos extends consultas
{
  

  function MostrarDatosContacto()
    {
      $nombre = $_SESSION['usuario'];
      $conexion = Conexion::Conectar();
      $sql1 = "SELECT id_usuario FROM t_usuarios WHERE nombre_usuario = '$nombre'";
      $resul1 = mysqli_query($conexion,$sql1);
      $id = mysqli_fetch_array($resul1);
      $sql = "SELECT * FROM t_contacto WHERE t_contacto.id_usuario = '$id[0]'";
      $resul = mysqli_query($conexion, $sql);
      return $resul;
    }

    public function categoria ($id) {
      $conexion = Conexion::Conectar();
      $sql = "SELECT nombre_categoria,color FROM t_categorias WHERE id_categoria = '$id'";
      $resul = mysqli_query($conexion,$sql);
      $nombre = mysqli_fetch_array($resul);
      return $nombre;
    }

    function registrarContactos($datos){
      $conexion = Conexion::Conectar();
      $nombre = $_SESSION['usuario'];
      
      $sql1 = "SELECT id_usuario FROM t_usuarios WHERE nombre_usuario = '$nombre'";
      $resul1 = mysqli_query($conexion,$sql1);
      $id = mysqli_fetch_array($resul1);
      
      $sql = "INSERT INTO t_contacto(nombre_contacto,a_paterno,a_materno,telefono,email,id_categoria,id_usuario) 
              VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$id[0]')";
      $resul = mysqli_query($conexion,$sql);
      
      return $resul;
    }

    public function eliminarContacto ($id) {
        $conexion = Conexion::Conectar();
        $sql = "DELETE FROM t_contacto WHERE id_contacto = '$id'";
        $result = mysqli_query($conexion,$sql);
        return $result;
    }

    public function actualizarContacto($d) {
      $conexion = Conexion::Conectar();
      $sql = "UPDATE t_contacto SET nombre_contacto = '$d[1]', a_paterno='$d[2]', a_materno='$d[3]', telefono= '$d[4]', email='$d[5]', id_categoria='$d[6]' WHERE id_contacto='$d[0]'";
      $resul = mysqli_query($conexion,$sql);
      return $resul;
    }

    public function obtenerContacto($id) {
      $conexion = Conexion::Conectar();
      $u = $_SESSION['usuario'];
      $sql1 = "SELECT id_usuario FROM t_usuarios WHERE nombre_usuario = '$u'";
      $result1 = mysqli_query($conexion,$sql1);
      $idUsuario = mysqli_fetch_row($result1);
      
      $sql = "SELECT nombre_contacto,a_paterno,a_materno,telefono,email 
              FROM t_contacto 
              WHERE id_contacto = '$id' AND id_usuario = '$idUsuario[0]'";
      $result = mysqli_query($conexion,$sql);
      $ver = mysqli_fetch_row($result);

      $datos = array (
          'id_contacto' => $id,
          'nombre_contacto' => $ver[0],
          'a_paterno' => $ver[1],
          'a_materno' => $ver[2],
          'telefono' => $ver[3],
          'email' => $ver[4]
      );
      return $datos;
    }
  }

?>