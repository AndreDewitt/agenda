<?php

  /**
   *
   */
  class Conexion
  {

    function Conectar()
    {
      $conexion = mysqli_connect('localhost',
                                  'root',
                                  '',
                                  'agenda');
      return $conexion;
    }
  }



 ?>
