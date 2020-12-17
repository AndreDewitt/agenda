<?php
  require_once "../clases/consultas.php";
  $obj = new consultas();
  $mostrar = $obj->MostrarDatosCategoria();
?>
<table class="table" id="iddatatable">
  <thead>
    <tr>
      <th class="th th-nombre">Categoria</th>
      <th class="th">Descripcion</th>
      <th class="th-color"></th>
      <th class="th-editar"></th>
      <th class="th-eliminar"></th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($mostrar as $key):?>
      <tr>
        <td class="td"><?php echo $key['nombre_categoria']; ?></td>
        <td class="td"><?php echo $key['descripcion']; ?></td>
        <td class="td-color" class="td-color">
          <label style="background-color: <?php echo $key['color']; ?>;" class="color_cat"></label>
        </td>
        <td class="td-editar" style="text-align: center;">
          <i class="editar boton btn-editar material-icons" onclick="formActualizar(<?php echo $key['id_categoria']?>)">edit</i>
        </td>
        <td class="td-eliminar" style="text-align: center;">
          <i class="eliminar boton btn-eliminar material-icons" onclick="eliminarDatos(<?php echo $key['id_categoria']?>)">delete</i>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#iddatatable').DataTable();
    });

    $('.editar').click(function() {
        $('.form-editar').addClass("abierto");
    });
    
    $('.cerrar').click(function() {
        $('.form-editar').removeClass("abierto");
    });
  </script>
