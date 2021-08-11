<?php
  session_start();
  $usuario = ($_POST["usuario"]);
  $contrasena = md5($_POST["contrasena"]);

  include("./configBD.php");
  $sqlVeriUsuario = "SELECT * FROM alumno WHERE usuario=$usuario";  
  $resInsAlumno = mysqli_query($conexion,$sqlVeriUsuario);
  $respAX = [];
  
  if(mysqli_affected_rows($conexion) == 1){
    $respAX["cod"] = 0;
    $respAX["msj"] = "Error. Usuario ya registrado";
  } else{
    $sqlInsAlumno = "INSERT INTO `sem-20211`.`alumno` (`usuario`,`contrasena`,`auditoria`) VALUES('$usuario','$contrasena',NOW())";
    $resInsAlumno = mysqli_query($conexion,$sqlInsAlumno);
  
    $respAX = [];
    if(mysqli_affected_rows($conexion) == 1){
      $_SESSION["usuario"]=$usuario;
      $_SESSION["id_usuario"] = $last_id = mysqli_insert_id($conexion);
      $respAX["cod"] = 1;
      $respAX["msj"] = "Gracias, Tu registro se guard&oacute; correctamente.";
    }else{
      $respAX["cod"] = 0;
      $respAX["msj"] = "Error. Favor de intentarlo nuevamente";
    }
  }

  echo json_encode($respAX);
?>

