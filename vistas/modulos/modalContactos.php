<div class="modal-form form-nuevo">
    <div class="formulario">
        <i class="material-icons cerrar">close</i>
        <h3>Registrar contacto</h3>
        <form id="form-ingresarContacto">
            <form id="form-contacto">
            <label for="nombre_contacto">Nombre</label>
            <input type="text" name="nombre_contacto" id="nombre_contacto">
            <label for="apaterno">Apellido parterno</label>
            <input type="text" name="apaterno" id="apaterno"></input>
            <label for="amaterno">Apellido materno</label>
            <input type="text" name="amaterno" id="amaterno">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" id="telefono">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <label for="categoria">Categoria</label>
            <select id="cat" name="cat" id="cat">
                <option value="0">Selecciona una opción</option>
                <?php foreach ($n as $key): ?>
                    <option value="<?php echo $key['id_categoria']?>"><?php echo $key['nombre_categoria']?></option>
                <?php endforeach;?>
            </select>
            <button>Agregar Contacto</button>
        </form>
    </div>
</div>
<div class="modal-form form-editar">
    <div class="formulario">
        <i class="material-icons cerrar">close</i>
        <h3>Actualizar contacto</h3>
        <form id="form-actualizarContacto">
            <input type="text" hidden="" name="idContacto" id="idContacto">
            <label for="nombre_contactoA">Nombre</label>
            <input type="text" name="nombre_contactoA" id="nombre_contactoA">
            <label for="apaternoA">Apellido parterno</label>
            <input type="text" name="apaternoA" id="apaternoA">
            <label for="amaternoA">Apellido materno</label>
            <input type="text" name="amaternoA" id="amaternoA">
            <label for="telefonoA">Telefono</label>
            <input type="text" name="telefonoA" id="telefonoA">
            <label for="emailA">Email</label>
            <input type="email" name="emailA" id="emailA">
            <label for="categoria">Categoria</label>
            <select name="catA" id="catA">
                <?php $n1 = $obj->categoria($key['id_categoria']); ?>
                <option value="<?php echo $n1[1]; ?>"><?php echo $n1[0];?></option>
                <?php foreach ($n as $key): ?>
                    <option value="<?php echo $key['id_categoria']?>"><?php echo $key['nombre_categoria']?></option>
                <?php endforeach;?>
            </select>
            <button>Actualizar contacto</button>
        </form>
    </div>
</div>    

  