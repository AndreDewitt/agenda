<?php
  require_once "../clases/consultas.php";
  $obj = new consultas();
  $mostrar = $obj->MostrarDatosCategoria();
 ?>
  <div class="">
    <table class="table" id="iddatatable">
      <thead>
        <tr>
          <th>Categoria</th>
          <th>Descripcion</th>
          <th>Color</th>
          <th>editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($mostrar as $key):?>
          <tr>
            <td><?php echo $key['nombre_categoria']; ?></td>
            <td><?php echo $key['descripcion']; ?></td>
            <td><?php echo $key['color']; ?></td>
            <td></td>
            <td></td>
          </tr>
        <?php endforeach ?>
      </tbody>

      <tfoot>
        <tr>
          <td>Categoria</td>
          <td>Descripcion</td>
          <td>Color</td>
          <td>editar</td>
          <td>Eliminar</td>
        </tr>
      </tfoot>
    </table>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#iddatatable').DataTable();
    });
  </script>
