<?php
    include("../configBD.php");

    $id_admin = ($_REQUEST["id_admin"]);
    $sqlGenAdmin = "DELETE  FROM  administrador WHERE `id_admin` = '$id_admin'";
    $respAX=[];
    $resGenAdmin = mysqli_query($conexion, $sqlGenAdmin);
?>