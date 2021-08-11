<?php
    include("../configBD.php");

    $id_usuario = ($_REQUEST["id_usuario"]);
    $sqlGenAlumno = "DELETE  FROM  alumno WHERE `id_usuario` = '$id_usuario'";
    $respAX=[];
    $resGenAlumno = mysqli_query($conexion, $sqlGenAlumno);
    
    echo mysqli_affected_rows($conexion);
?>