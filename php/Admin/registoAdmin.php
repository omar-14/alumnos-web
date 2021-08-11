<?php
        include("../configBD.php");

        $id_Admin = ($_POST["id_Admin"]);
        $usuario = ($_POST["usuario"]);
        $contrasena = md5($_POST["contrasena"]);
        $nombre = ($_POST["nombre"]);
        $primerApe = ($_POST["primerApe"]);
        $segundoApe = ($_POST["segundoApe"]);
        $email = ($_POST["email"]);

        $sql ="INSERT INTO `sem-20211`.`administrador` 
            (`id_admin`, 
            `usuario`, 
            `contrasena`, 
            `auditoria`, 
            `nombre`, 
            `apellidoPat`, 
            `apellidoMat`, 
            `email`
            )
            VALUES
            ('$id_Admin', 
            '$usuario', 
            '$contrasena', 
            NOW(), 
            '$nombre', 
            '$primerApe', 
            '$segundoApe', 
            '$email'
            )
        ";
        $respAX = [];
        $resInsAdmin = mysqli_query($conexion,$sql);

        if(mysqli_affected_rows($conexion) == 1){
            $respAX["cod"] = 1;
            $respAX["msj"] = "Listo, tu registro ha sigo guardado";
        } else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "Ha ocurriodo un error. Favor intentalo de nuevo";
        }

        echo json_encode($respAX);
?>
