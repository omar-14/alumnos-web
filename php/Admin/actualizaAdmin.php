<?php
        include("../configBD.php");

        $id_Admin = ($_POST["id_Admin"]);
        $usuario = ($_POST["usuario"]);
        $nombre = ($_POST["nombre"]);
        $primerApe = ($_POST["primerApe"]);
        $segundoApe = ($_POST["segundoApe"]);
        $email = ($_POST["email"]);

        $sql ="UPDATE `administrador` 
        SET
        `id_admin` = '$id_Admin', 
        `usuario` = '$usuario', 
        `nombre` = '$nombre', 
        `apellidoPat` = '$primerApe', 
        `apellidoMat` = '$segundoApe', 
        `email` = '$email'
        
        WHERE
        `id_admin` = '$id_Admin' ;
        ";
        $respAX = [];
        $resInsAdmin = mysqli_query($conexion,$sql);

        if(mysqli_affected_rows($conexion) == 1){
            $respAX["cod"] = 1;
            $respAX["msj"] = "Listo, tu registro ha sigo actualizado";
        } else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "Ha ocurriodo un error. Favor intentalo de nuevo";
        }

        echo json_encode($respAX);
        //echo $sql;
?>
