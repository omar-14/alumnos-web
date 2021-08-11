<?php
    session_start();
    $id_usuario = $_SESSION["id_usuario"];
    $curp = ($_POST["curp"]);
    $nombre = ($_POST["nombre"]);
    $primerApe = ($_POST["primerApe"]);
    $segundoApe = ($_POST["segundoApe"]);
    $fechaNaci = ($_POST["fechaNaci"]);
    $genero = ($_POST["genero"]);
    $email = ($_POST["email"]);
    $telFijo = ($_POST["telFijo"]);
    $telCelu = ($_POST["telCelu"]);
    $calle = ($_POST["calle"]);
    $num = ($_POST["num"]);
    $colonia = ($_POST["colonia"]);
    $alcaMun = ($_POST["alcaMun"]);
    $estado = ($_POST["estado"]);

    $tipoEsc = ($_POST["tipoEsc"]);
    $nomEsc = ($_POST["nomEsc"]);
    $localidad = ($_POST["localidad"]);
    $formacion = ($_POST["formacion"]);
    $promedio = ($_POST["promedio"]);

    $programa = ($_POST["programa"]);
    $semestre = ($_POST["semestre"]);
    $numPrograma = ($_POST["numPrograma"]);

    if($semestre == "2021-2"){
        include("./configBD.php");  
    
        $sqlInsAlumno = "UPDATE `sem-20211`.`informacion_general` 
        SET
        `curp` = '$curp', 
        `nombre` = '$nombre', 
        `primer_apellido` = '$primerApe', 
        `segundo_apellido` = '$segundoApe', 
        `fecha_nacimiento` = '$fechaNaci', 
        `genero` = '$genero', 
        `email` = '$email', 
        `tel_fijo` = $telFijo, 
        `tel_movil` = $telCelu, 
        `calle` = '$calle', 
        `num_calle` = '$num', 
        `colonia` = '$colonia', 
        `alca-mun` = '$alcaMun', 
        `estado` = '$estado'
        WHERE
        `id_usuario` = '$id_usuario' ";
        $resInsAlumno = mysqli_query($conexion,$sqlInsAlumno);
        $Afect=mysqli_affected_rows($conexion);

        $respAX = [];
        
        $sqlInserAlumno = " UPDATE `sem-20211`.`informacion_escolar` 
            SET
            `tipo_esc` = '$tipoEsc', 
            `nombreEsc` = '$nomEsc', 
            `localidad` = '$localidad', 
            `formacion` = '$formacion', 
            `promedio` = '$promedio', 
            `programaAc` = '$programa', 
            `semestreAsig` = '$semestre', 
            `NumeroProg` = '$numPrograma'
            WHERE
            `id_usuario` = '$id_usuario' ";
        $resInsAlumno = mysqli_query($conexion,$sqlInserAlumno);

        if(mysqli_affected_rows($conexion) == 1){
                $respAX["cod"] = 1;
                $respAX["msj"] = "Listo, tu registro ha sigo guardado. Ya puedes cerrar sesi&oacute;n";
        }else{
                $respAX["cod"] = 0;
                $respAX["msj"] = "No se guardo ningun cambio. Favor de intentarlo nuevamente o cierre sesi&oacute;n desde el menu de color verde ubicado en la esquina inferior derecha";
                
        }
    } else{
        $respAX["cod"] = 0;
        $respAX["msj"] = "El periodo que te fue asignado,"." ".$semestre." "." no es el correcto para este registro, por favor comunicate con las autoridades de ESCOM para solucionar tu problema";
    }
    echo  json_encode($respAX);
    //echo $sqlInsAlumno;
?>

