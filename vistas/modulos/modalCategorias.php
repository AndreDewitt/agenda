<div class="modal-form form-nuevo">
    <div class="formulario">
        <i class="material-icons cerrar">close</i>
        <h3>Nueva categoría</h3>
        <form id="form-categoria">
            <label for="nombre_categoria">Nombre de la categoría</label>
            <input type="text" name="nombre_categoria" id="nombre_categoria">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" rows="8" id="descripcion"></textarea>
            <label for="color">Color</label>
            <input type="color" name="color" id="color">
            <button>Agregar Categoria</button>
        </form>
    </div>
</div>
<div class="modal-form form-editar">
    <div class="formulario">
        <i class="material-icons cerrar">close</i>
        <h3>Actualizar categría</h3>
        <form id="form-actualizarCategoria">
            <input type="text" hidden="" name="idCategoria" id="idCategoria">
            <label for="nombre_categoriaA">Nombre de la categoría</label>
            <input type="text" name="nombre_categoriaA" id="nombre_categoriaA">
            <label for="descripcionA">Descripcion</label>
            <textarea name="descripcionA" id="descripcionA" rows="8"></textarea>
            <label for="colorA">Color</label>
            <input type="color" name="colorA" id="colorA">
            </select>
            <button>Actualizar Categoria</button>
        </form>
    </div>
</div>
<div class="modal-form form-eliminar">
    <div class="formulario">
        <h3>¿Seguro de eliminar este gasto?</h3>
        <button class="btn-eliminar" >Eliminar</button>
        <button class="cerrar">Cancelar</button>
    </div>
</div>