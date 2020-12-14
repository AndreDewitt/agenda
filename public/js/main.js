
//Ejecuta cuando haya terminado de cargar el documento
$(document).ready(function(){
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
            alert("Registro de puta madre");
          }else if (r == 3) {
              alert("No llenaste la Contraseña");
            }else if(r == 2){
              alert("No llenaste el usuario");
            }else if(r == 4){
              alert("Llena todos los campos");
            }else if(r == 5){
              alert("No llenaste foto baboso");
            }else if(r == 6){
              alert("No llenaste el nombre baboso");
            }else if(r == 7){
              alert("No llenaste los apellidos baboso");
            }else if(r == 8){
              alert("No llenaste la fecha de nacimiento");
            }else if(r == 9){
              alert("No llenaste tu edad huerfano");
            }else if(r == 10){
              alert("No llenaste el telefono");
            }else if(r == 11){
              alert("No llenaste el emali hacker");
            }else{
              alert("Error de registro ._.");
            }
          }
      });
    });
});
