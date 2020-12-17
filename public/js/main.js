//Ejecuta cuando haya terminado de cargar el documento
$(document).ready(function(){
  $('.nuevo').click(function() {
      $('.form-nuevo').addClass("abierto");
  });

  $('.cerrar').click(function() {
      $('.form-nuevo').removeClass("abierto");
  }); 

  $('.cerrar').click(function() {
      $('.form-editar').removeClass("abierto");
  });   

  $('.close-alert-dynamic').click(function() {
      $('.alert-dynamic-error').removeClass("notificacion");
  });

  $('.close-alert-delete').click(function() {
      $('.alert-delete').removeClass("notificacion");
  });

  $('.close-alert-delete').click(function() {
      $('.alert-delete-error').removeClass("notificacion");
  });

  $('.close-alert-login').click(function() {
      $('.alert-login-error').removeClass("notificacion");
  });

  $('.close-alert-signup').click(function() {
      $('.alert-signup-error').removeClass("notificacion");
  });

  $('.close-alert-update').click(function() {
      $('.alert-update').removeClass("notificacion");
  });

  $('.close-alert-insert').click(function() {
      $('.alert-insert').removeClass("notificacion");
  });

  $('.close-alert-cancel').click(function() {
      $('.alert-cancel').removeClass("notificacion");
  });

  $('.close-alert-nuevo').click(function() {
      $('.alert-nuevo-error').removeClass("notificacion");
  });
  
  $('#cargadatos').load('tabla.php');

  $('#cargadatosContactos').load('tablaContacto.php');
  
  $("#form-login").on('submit',function(evt){
    evt.preventDefault();
    datos = $("#form-login").serialize();
    $("#nombre_usuario").removeClass('input-error');
    $("#password").removeClass("input-error");
    $.ajax({
      type: "POST",
      data: datos,
      url: "procesos/login.php",
      success:function(r){
        if (r == 1) {
          window.location.href='vistas/';
        } else if (r == 4) {
          $("#password").addClass("input-error");
          $('.alert-login-error').addClass("notificacion");
          $('.alert-dynamic-error').addClass("notificacion");
          $('.texto').text('Debes ingresar la contraseña del usuario.');
          setTimeout(function(){ 
              $('.alert-login-error').removeClass("notificacion");
              $('.alert-dynamic-error').removeClass("notificacion");
              $('.texto').text('');
          }, 3000);
        } else if (r == 3){
          $("#nombre_usuario").addClass('input-error');
          $('.alert-login-error').addClass("notificacion");
          $('.alert-dynamic-error').addClass("notificacion");
          $('.texto').text('Debes ingresar el nombre del usuario.');
          setTimeout(function() { 
              $('.alert-login-error').removeClass("notificacion");
              $('.alert-dynamic-error').removeClass("notificacion");
              $('.texto').text('');
          }, 3000);
        } else if (r == 2){
          $("#nombre_usuario").addClass('input-error');
          $("#password").addClass("input-error");
          $('.alert-login-error').addClass("notificacion");
          $('.alert-dynamic-error').addClass("notificacion");
          $('.texto').text('Debes ingresar el nombre y contraseña del usuario.');
          setTimeout(function(){ 
              $('.alert-login-error').removeClass("notificacion");
              $('.alert-dynamic-error').removeClass("notificacion");
              $('.texto').text('');
          }, 3000);
        } 
      }
    });
  });

  $("#form-register").on('submit',function(evt){
    evt.preventDefault();
    var datos = new FormData(document.getElementById("form-register"));
    $("#nombre").removeClass("input-error");
    $("#apellidos").removeClass("input-error");
    $("#fecha_nacimiento").removeClass("input-error");
    $("#edad").removeClass("input-error");
    $("#telefono").removeClass("input-error");
    $("#email").removeClass("input-error");
    $("#nombre_usuario").removeClass("input-error");
    $("#password").removeClass("input-error");
    $("#foto").removeClass("input-error");
    $.ajax({
      type: "POST",
      data: datos,
      url: "procesos/registro.php",
      processData: false,
      contentType: false,
      success:function(r){
        if (r == 1) {
          window.location.href='index.php';
        } else {
          errorRegistro(r);
          $('.alert-signup-error').addClass("notificacion");
          setTimeout(function(){ 
              $('.alert-signup-error').removeClass("notificacion");
              $('.alert-dynamic-error').removeClass("notificacion");
              $('.texto').text('');
          }, 3000);
        }
      }
    });
  });

  $("#form-categoria").on('submit',function(evt){
    //quita las variables de la URL
    evt.preventDefault();
    datos = $("#form-categoria").serialize();
    $("#nombre_categoria").removeClass("input-error");
    $("#descripcion").removeClass("input-error");
    $("#color").removeClass("input-error");
    $.ajax({
      type: "POST",
      data: datos,
      url: "../procesos/registrarCategorias.php",
      success:function(r){
        if(r == 1) {
          $('#cargadatos').load('tabla.php');
          $('.alert-insert').addClass("notificacion"); 
          setTimeout(function(){ 
              $('.alert-insert').removeClass("notificacion");
          }, 3000);
          $("#nombre_categoria").removeClass("input-error");
          $("#descripcion").removeClass("input-error");
          $("#color").removeClass("input-error");
          $("#nombre_categoria").val("");
          $("#descripcion").val("");
          $("#color").val("");
        } else {
          console.log(r);
          errorRegCat(r);
          $('.alert-insert-error').addClass("notificacion"); 
          setTimeout(function(){ 
              $('.alert-insert-error').removeClass("notificacion");
              $('.alert-dynamic-error').removeClass("notificacion");
              $('.texto').text('');
          }, 3000);
        }
      }
    });
  });

  $("#form-actualizarCategoria").on('submit',function(evt){
    //quita las variables de la URL
    evt.preventDefault();
    datos = $(this).serialize();
    $("#nombre_categoriaA").removeClass("input-error");
    $("#descripcionA").removeClass("input-error");
    $("#colorA").removeClass("input-error");
    $.ajax({
      type: "POST",
      data: datos,
      url: "../procesos/actualizarCategorias.php",
      success:function(r){
        if(r == 1) {
          $('#cargadatos').load('tabla.php');
          $("#nombre_categoriaA").removeClass("input-error");
          $("#descripcionA").removeClass("input-error");
          $("#colorA").removeClass("input-error");
          $('.alert-update').addClass("notificacion"); 
          setTimeout(function(){ 
              $('.alert-update').removeClass("notificacion");
          }, 3000);
          $('.form-editar').removeClass("abierto");
        } else {
          errorActCat(r);
          $('.alert-update-error').addClass("notificacion"); 
          setTimeout(function(){ 
              $('.alert-update-error').removeClass("notificacion");
              $('.alert-dynamic-error').removeClass("notificacion");
              $('.texto').text('');
          }, 3000);
        }
      }
    });
  });

  $("#form-actualizarContacto").on('submit',function(evt){
    //quita las variables de la URL
    evt.preventDefault();
    datos = $(this).serialize();
    $("#nombre_contactoA").removeClass("input-error");
    $("#apaternoA").removeClass("input-error");
    $("#amaternoA").removeClass("input-error");
    $("#telefonoA").removeClass("input-error");
    $("#emailA").removeClass("input-error");
    $("#catA").removeClass("input-error");
    $.ajax({
      type: "POST",
      data: datos,
      url: "../procesos/actualizarContacto.php",
      success:function(r){
        if(r == 1) {
          $('#cargadatosContactos').load('tablaContacto.php');
          $('.alert-update').addClass("notificacion"); 
          $("#nombre_contactoA").removeClass("input-error");
          $("#apaternoA").removeClass("input-error");
          $("#amaternoA").removeClass("input-error");
          $("#telefonoA").removeClass("input-error");
          $("#emailA").removeClass("input-error");
          $("#catA").removeClass("input-error");
          setTimeout(function(){ 
              $('.alert-update').removeClass("notificacion");
          }, 3000);
          $('.form-editar').removeClass("abierto");
        } else {
          errorActCont(r);
          $('.alert-update-error').addClass("notificacion"); 
          setTimeout(function(){ 
              $('.alert-update-error').removeClass("notificacion");
              $('.alert-dynamic-error').removeClass("notificacion");
              $('.texto').text('');
          }, 3000);
        }
      }
    });
  });

  $("#form-ingresarContacto").on('submit', function (evt) {
    evt.preventDefault();
    datos = $(this).serialize();
    $("#nombre_contacto").removeClass("input-error");
    $("#apaterno").removeClass("input-error");
    $("#amaterno").removeClass("input-error");
    $("#telefono").removeClass("input-error");
    $("#email").removeClass("input-error");
    $("#cat").removeClass("input-error");
    $.ajax({
      type: "POST",
      data: datos,
      url: "../procesos/registrarContacto.php",
      success: function (r) {
        if(r == 1) {
          $('#cargadatosContactos').load('tablaContacto.php');
          $('.alert-insert').addClass("notificacion"); 
          $("#nombre_contacto").removeClass("input-error");
          $("#apaterno").removeClass("input-error");
          $("#amaterno").removeClass("input-error");
          $("#telefono").removeClass("input-error");
          $("#email").removeClass("input-error");
          $("#cat").removeClass("input-error");

          $("#nombre_contacto").val("");
          $("#apaterno").val("");
          $("#amaterno").val("");
          $("#telefono").val("");
          $("#email").val("");
          $("#cat").val("");
          setTimeout(function(){ 
              $('.alert-insert').removeClass("notificacion");
          }, 3000);
        } else {
          errorRegCont(r);
          $('.alert-insert-error').addClass("notificacion"); 
          setTimeout(function(){ 
              $('.alert-insert-error').removeClass("notificacion");
              $('.alert-dynamic-error').removeClass("notificacion");
              $('.texto').text('');
          }, 3000);
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

function formActualizarContacto(idContacto) {
    $.ajax({
        type:"POST",
        data:"idContacto="+idContacto,
        url:"../procesos/obtenerContacto.php",
        success:function(r) {
            datos = jQuery.parseJSON(r);
            $('#idContacto').val(datos['id_contacto']);
            $('#nombre_contactoA').val(datos['nombre_contacto']);
            $('#apaternoA').val(datos['a_paterno']);
            $('#amaternoA').val(datos['a_materno']);
            $('#telefonoA').val(datos['telefono']);
            $('#emailA').val(datos['email']);
        }
    });
}

function eliminarDatosContacto(idContacto) {
  $('.importante').addClass("notificacion");
  $('.close-check-delete').click(function () {
      $.ajax({
        type:"POST",
        data:"idContacto="+idContacto,
        url:"../procesos/eliminarContacto.php",
        success:function(r) {
          if (r == 1) {
            $('#cargadatosContactos').load('tablaContacto.php');
            $('.alert-delete').addClass("notificacion"); 
            setTimeout(function(){ 
                $('.alert-delete').removeClass("notificacion");
            }, 3000);
          } else {
            $('.alert-delete-error').addClass("notificacion"); 
            $('.alert-dynamic-error').addClass("notificacion");
            $('.texto').text('Es posible que contenga contactos registrados.');
            setTimeout(function(){ 
                $('.alert-delete-error').removeClass("notificacion");
                $('.alert-dynamic-error').removeClass("notificacion");
                $('.texto').text('');
            }, 3000);
          }
        }
    });
  });

  $('.close-abort-delete').click(function () {
    $('.importante').removeClass("notificacion");
  });
}

function eliminarDatos(idCategoria) {
  $('.importante').addClass("notificacion");
  $('.close-check-delete').click(function () {
    $.ajax({
        type:"POST",
        data:"idCategoria="+idCategoria,
        url:"../procesos/eliminarCategoria.php",
        success:function(r) {
          if (r==1) {
            $('#cargadatos').load('tabla.php');
            $('.alert-delete').addClass("notificacion"); 
            setTimeout(function(){ 
              $('.alert-delete').removeClass("notificacion");
          }, 3000);
          } else {
            $('.alert-delete-error').addClass("notificacion"); 
            $('.alert-dynamic-error').addClass("notificacion");
            $('.texto').text('Es posible que contenga contactos registrados.');
            setTimeout(function(){ 
                $('.alert-delete-error').removeClass("notificacion");
                $('.alert-dynamic-error').removeClass("notificacion");
                $('.texto').text('');
            }, 3000);
          }
        }
    });
  });

  $('.close-abort-delete').click(function () {
    $('.importante').removeClass("notificacion");
  });
}

function errorRegCat(err) {
  console.log(err);
  if (err == 2) {
    $("#nombre_categoria").addClass("input-error");
    $("#descripcion").addClass("input-error");
    $("#color").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar todos los campos.');
  } else if (err == 3) {
    $("#nombre_categoria").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debe ingresar el nombre de la nueva categoría.');
  } else if (err == 4) {
    $("#descripcion").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debe ingresar la descripción de la nueva categoría.');
  } else if (err == 5) {
    $("#color").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debe seleccionar un color para la categoría.');
  } else if (err == 11) {
    $("#nombre_categoria").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Es posible que exista una categoria con el mismo nombre.');
  }
}

function errorRegCont(err) {
  if (err == 2) {
    $("#nombre_contacto").addClass("input-error");
    $("#apaterno").addClass("input-error");
    $("#amaterno").addClass("input-error");
    $("#telefono").addClass("input-error");
    $("#email").addClass("input-error");
    $("#cat").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar todos los campos.');
  } else if (err == 3) {
    $("#nombre_contacto").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar el nombre del contacto.');
  } else if (err == 4) {
    $("#apaterno").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar el apellido paterno del contacto.');
  } else if (err == 5) {
    $("#amaterno").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar el apellido materno del contacto.');
  } else if (err == 6) {
    $("#telefono").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar el telefono del contacto.');
  } else if (err == 7) {
    $("#email").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar el email del contacto.');
  } else if (err == 8) {
    $("#cat").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes seleccionar la categoría del contacto.');
  }
}

function errorActCat(err) {
  if (err == 2) {
    $("#nombre_categoriaA").addClass("input-error");
    $("#descripcionA").addClass("input-error");
    $("#colorA").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar todos los campos.');
  } else if (err == 3) {
    $("#nombre_categoriaA").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar el nombre de la categoría.');
  } else if (err == 4) {
    $("#descripcionA").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar la descripción de la categoría.');
  } else if (err == 5) {
    $("#colorA").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes seleccionar el color de la categoría.');
  }
}

function errorActCont(err) {
  if (err == 2) {
    $("#nombre_contactoA").addClass("input-error");
    $("#apaternoA").addClass("input-error");
    $("#amaternoA").addClass("input-error");
    $("#telefonoA").addClass("input-error");
    $("#emailA").addClass("input-error");
    $("#catA").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar todos los campos.');
  } else if (err == 3) {
    $("#nombre_contactoA").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar el nombre del contacto.');
  } else if (err == 4) {
    $("#apaternoA").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar el apellido paterno del contacto.');
  } else if (err == 5) {
    $("#amaternoA").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar el apellido materno del contacto.');
  } else if (err == 6) {
    $("#telefonoA").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar el telefono del contacto.');
  } else if (err == 7) {
    $("#emailA").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes llenar el email del contacto.');
  } else if (err == 8) {
    $("#catA").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes seleccionar la categoría del contacto.');
  }
}

function errorRegistro (err) {
  if (err == 2) {
    $("#nombre").addClass("input-error");
    $("#apellidos").addClass("input-error");
    $("#fecha_nacimiento").addClass("input-error");
    $("#edad").addClass("input-error");
    $("#telefono").addClass("input-error");
    $("#email").addClass("input-error");
    $("#nombre_usuario").addClass("input-error");
    $("#password").addClass("input-error");
    $("#foto").addClass("input-error");
  } else if (err == 3) {
    $("#nombre_usuario").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes ingresar el nombre del usuario.');
  } else if (err == 4) {
    $("#password").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes ingresar la contraseña del usuario.');
  } else if (err == 5) {
    $("#nombre").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes ingresar el nombre real del usuario.');
  } else if (err == 6) {
    $("#apellidos").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes ingresar los apellidos del usuario.');
  } else if (err == 7) {
    $("#fecha_nacimiento").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes ingresar la fecha de nacimiento del usuario.');
  } else if (err == 8) {
    $("#edad").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes ingresar la edad del usuario.');
  } else if (err == 9) {
    $("#telefono").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes ingresar el telefono del usuario.');
  } else if (err == 10) {
    $("#email").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('Debes ingresar el email del usuario.');
  } else if (err == 11) {
    $("#nombre_usuario").addClass("input-error");
    $('.alert-dynamic-error').addClass("notificacion");
    $('.texto').text('El nombre del usuario ya existe.');
  } 
}