<?php
  require_once "../clases/consultasContactos.php";
  $obj = new consultasContactos();
  $mostrar = $obj->MostrarDatosContacto();
?>
<table class="table" id="iddatatable">
  <thead>
    <tr>
      <th class="th-con">Nombre</th>
      <th class="th-con">Apellido Paterno</th>
      <th class="th-con">Apellido Materno</th>
      <th class="th-con">Telefono</th>
      <th class="th-con">Email</th>
      <th class="th-color"></th>
      <th class="th-editar"></th>
      <th class="th-eliminar"></th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($mostrar as $key):?>
      <tr>
        <td class="td-con"><?php echo $key['nombre_contacto']; ?></td>
        <td class="td-con"><?php echo $key['a_paterno']; ?></td>
        <td class="td-con"><?php echo $key['a_materno']; ?></td>
        <td class="td-con"><?php echo $key['telefono'];?></td>
        <td class="td-con"><?php echo $key['email'];?></td>
        <td class="">
          <?php $n = $obj->categoria($key['id_categoria']); ?>
          <label style="background-color: <?php echo $n[1]; ?>;" class="color_cat"></label>
          <?php echo $n[0]; ?>
        </td>
        <td class="td-editar" style="text-align: center;">
          <i class="editar boton btn-editar material-icons" onclick="formActualizarContacto(<?php echo $key['id_contacto']?>)">edit</i>
        </td>
        <td class="td-eliminar" style="text-align: center;">
          <i class="eliminar boton btn-eliminar material-icons" onclick="eliminarDatosContacto(<?php echo $key['id_contacto']?>)">delete</i>
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
