
//Ejecuta cuando haya terminado de cargar el documento
$(document).ready(function(){
  $('#cargadatos').load('tabla.php');
    $("#form-login").on('submit',function(evt){
      //quita las variables de la URL
      evt.preventDefault();
      datos = $("#form-login").serialize();
      $.ajax({
        type: "POST",
        data: datos,
        url: "procesos/login.php",
        success:function(r){
          if (r == 1) {
          window.location.href='vistas/';
          }else if (r == 3) {
              alert("Contraseña incorrecta");
            }else if(r == 2){
              alert("Nombre de Usuario Incorrecto");
            }else if(r == 4){
              alert("Llena todos los campos");
            }else {
              alert("Escribe bien pendeje");
            }
          }
      });
    });

    $("#form-register").on('submit',function(evt){
      evt.preventDefault();
      datos = $("#form-register").serialize();
      $.ajax({
        type: "POST",
        data: datos,
        url: "procesos/registro.php",
        success:function(r){
          if (r == 1) {
            window.location.href='index.php';
          }else if (r == 3) {
              alert("No llenaste la Contraseña");
            }else if(r == 2){
              alert("No llenaste el usuario");
            }else if(r == 4){
              alert("Llena todos los campos");
            }else if(r == 5){
              alert("No llenaste el nombre baboso");
            }else if(r == 6){
              alert("No llenaste los apellidos baboso");
            }else if(r == 7){
              alert("No llenaste la fecha de nacimiento");
            }else if(r == 8){
              alert("No llenaste tu edad huerfano");
            }else if(r == 9){
              alert("No llenaste el telefono");
            }else if(r == 10){
              alert("No llenaste el emali hacker");
            }else{
              alert("Error de registro ._.");
            }
          }
      });
    });

    $("#form-categoria").on('submit',function(evt){
      //quita las variables de la URL
      evt.preventDefault();
      datos = $("#form-categoria").serialize();
      $.ajax({
        type: "POST",
        data: datos,
        url: "../procesos/registrarCategorias.php",
        success:function(r){
          if(r == 1) {
            $('#cargadatos').load('tabla.php');
            alert("Registro Exitoso");
          }else{
              alert("Escribe bien pendeje");
            }
          }
      });
    });

    $("#form-actualizarCategoria").on('submit',function(evt){
      //quita las variables de la URL
      evt.preventDefault();
      datos = $(this).serialize();
      $.ajax({
        type: "POST",
        data: datos,
        url: "../procesos/actualizarCategorias.php",
        success:function(r){
          if(r == 1) {
            $('#cargadatos').load('tabla.php');
            alert("Registro Exitoso");
          }else{
              console.log(r);
              alert("Escribe bien pendeje");
            }
          }
      });
    });
});


function formActualizar(idCategoria) {
    $.ajax({
        type:"POST",
        data:"idCategoria="+idCategoria,
        url:"../procesos/obtenerCategoria.php",
        success:function(r) {
            datos = jQuery.parseJSON(r);
            $('#idCategoria').val(datos['id_categoria']);
            $('#nombre_categoriaA').val(datos['nombre_categoria']);
            $('#descripcionA').val(datos['descripcion']);
            $('#colorA').val(datos['color']);
        }
    });
}

function eliminarDatos(idCategoria) {
    $.ajax({
        type:"POST",
        data:"idCategoria="+idCategoria,
        url:"../procesos/eliminarCategoria.php",
        success:function(r) {
          if (r==1) {
            $('#cargadatos').load('tabla.php');
            alert("Eliminado correctamente");
          } else {
            alert("error al eliminar");
          }
        }
    });
}