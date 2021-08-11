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

    include("./configBD.php");  
    
    $sqlInsAlumno = "INSERT INTO `sem-20211`.`informacion_general` (`id_usuario`,`curp`,`nombre`,`primer_apellido`,`segundo_apellido`,`fecha_nacimiento`,`genero`,`email`,`tel_fijo`,`tel_movil`,`calle`,`num_calle`,`colonia`,`alca-mun`,`estado`) VALUES('$id_usuario','$curp','$nombre','$primerApe','$segundoApe','$fechaNaci','$genero','$email',$telFijo,$telCelu,'$calle','$num','$colonia','$alcaMun','$estado')";
    $resInsAlumno = mysqli_query($conexion,$sqlInsAlumno);
    $respAX = [];
    if(mysqli_affected_rows($conexion) == 1){
        $sqlInsAlumno = "INSERT INTO `sem-20211`.`informacion_escolar` (`id_usuario`,`tipo_esc`,`nombreEsc`,`localidad`,`formacion`,`promedio`,`programaAc`,`semestreAsig`,`NumeroProg`) VALUES('$id_usuario','$tipoEsc','$nomEsc','$localidad','$formacion','$promedio','$programa','$semestre','$numPrograma')";
        $resInsAlumno = mysqli_query($conexion,$sqlInsAlumno);
        if(mysqli_affected_rows($conexion) == 1){
            $respAX["cod"] = 1;
            $respAX["msj"] = "Listo, tu registro ha sigo guardado";
        }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "Error. Favor de intentarlo nuevamente";
        }
    }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "Ha ocurriodo un error. Favor intentalo de nuevo";
    }
    echo json_encode($respAX);
?>

