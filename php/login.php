<?php
    session_start();
    $usuario = $_POST["usuario"];
    $contrasena = md5($_POST["contrasena"]);
    $respAX = [];
    $saludo = "";

    $conexion = mysqli_connect("localhost","root","","sem-20211");
    $sqlVeriAlumno = "SELECT * FROM alumno WHERE usuario = '$usuario' AND contrasena = '$contrasena'"; 
    $resGetAlumno = mysqli_query($conexion,$sqlVeriAlumno);
    $infGetAlumno = mysqli_fetch_row($resGetAlumno);

    $sqlVeriAdmin ="SELECT * FROM administrador WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $resGetAdmin = mysqli_query($conexion,$sqlVeriAdmin);

    if(mysqli_num_rows($resGetAdmin) == 1){
        
        $infGetAdmin = mysqli_fetch_row($resGetAdmin);
        $_SESSION["usuario"] = $usuario;
        date_default_timezone_set("America/Mexico_City");
        $hora = date("h");
        $Horario = date ("a");
        if($hora <= "12" && $Horario == "am"){
            $saludo="Buenos dias";
        }
        if($hora < "07" && $Horario == "pm"){
            $saludo="Buenas tardes";
        } else if($hora >= "12" && $Horario == "pm"){
            $saludo="Buenas tardes";
        }
        if($hora >"07" && $hora != "12" && $Horario == "pm"){
            $saludo="Buenas noches";
        }

        $respAX["cod"] = 1;
        $respAX["msj"] = $saludo." ".$infGetAdmin[4]." Bienvenido Administrador!!!";
        $respAX["tipo"] = "Admin00";

        echo  json_encode($respAX);
    } else{
        if(mysqli_num_rows($resGetAlumno) == 1){
            $ID_USUARIO = $infGetAlumno[0];
            $sqlGetAlumno = "SELECT * FROM `sem-20211`.`informacion_general` WHERE id_usuario= '$ID_USUARIO'";
            $SearchAlumno = mysqli_query($conexion,$sqlGetAlumno);
            $GetAlumno = mysqli_fetch_row($SearchAlumno);
            $_SESSION["usuario"] = $usuario;
            $_SESSION["id_usuario"] =$ID_USUARIO;
            date_default_timezone_set("America/Mexico_City");
            $hora = date("h");
            $Horario = date ("a");
            if($hora <= "12" && $Horario == "am"){
                $saludo="Buenos dias";
            }
            if($hora < "07" && $Horario == "pm"){
                $saludo="Buenas tardes";
            } else if($hora >= "12" && $Horario == "pm"){
                $saludo="Buenas tardes";
            }
            if($hora >"07" && $hora != "12" && $Horario == "pm"){
                $saludo="Buenas noches";
            }
            $respAX["cod"] = 1;
            $respAX["msj"] = $saludo." ".$GetAlumno[3]." Bienvenido!!!";
            $respAX["tipo"] = "Alumno";
        }else if(mysqli_num_rows($resGetAlumno) == 0){
            $respAX["cod"] = 0;
            $respAX["msj"] = "Error. El usuario o contrase&ntilde;a son incorrectos.";
            $respAX["tipo"] = "recarga";
        }
    
        echo  json_encode($respAX);
        //echo mysqli_num_rows($resGetAdmin);
    }
?>