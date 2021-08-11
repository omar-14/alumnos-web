<?php
    session_start();
    $usuario = $_SESSION["usuario"];
    if(isset($_SESSION["usuario"])){
        $conexion = mysqli_connect("localhost","root","","sem-20211");
        $sqlInfAdmin = "SELECT * FROM administrador WHERE usuario = '$usuario'";
        $resInfAdmin = mysqli_query($conexion, $sqlInfAdmin);

        if(mysqli_affected_rows($conexion) == 1){
            $infAdmin = mysqli_fetch_row($resInfAdmin);
            include("./horarios.php");
        }else{
            header("location:../../login.html");
        } 
    }else{
        header("location:../../index.html");
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $usuario;?></title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
<link href="../../css/admin.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<link href="../../materialize/css/materialize.min.css" rel="stylesheet">
<link href="../../js/plugins/validetta/dist/validetta.min.css" rel="stylesheet">
<link href="../../js/plugins/confirm/dist/jquery-confirm.min.css" rel="stylesheet">
<script src="../../js/jquery-3.5.1.min.js"></script>
<script src="../../materialize/js/materialize.min.js"></script>
<script src="../../js/plugins/validetta/dist/validetta.min.js"></script>
<script src="../../js/plugins/validetta/localization/validettaLang-es-ES.js"></script>
<script src="../../js/plugins/confirm/dist/jquery-confirm.min.js"></script>
<script src="../../js/horarios.js"></script>

</head>
<body>
    <header>
        <div style="text-align: center;">
            <img src="../../imagenes/admin.png" class="responsive-img">
        </div>
        <nav class="grey">
            <div class="nav-wrapper">
            <a href="./Administrador.php" class="brand-logo center" style="font-size: 25px;">Administrador</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#">Gestion Administradores</a></li>
            </ul>
            </div>
        </nav><br>
        <ul class="sidenav" id="mobile-demo">
            <li><a class="nav-link" id="div-btn0" href="./Administrador.php">Administrador</a></li>
            <li><a class="nav-link" id="div-btn4" href="#">Gestion Administradores</a></li>
            <li><a class="nav-link" id="div-btn5" href="#">Roportes</a></li>
        </ul>
    </header>

    <main><br>
        <div class="container fond">
            <div class="edit" id="central">
                <form id="formHorario">
                    <div class="row ">
                        <h5 style="text-align: center;">Selecciona el id (identificador) del alumno que quiera modificar</h5><br>
                        <div class="col s12 m4 input-field">
                            <label for="id_horarios">id_Horario *</label>
                            <input type="text" id="id_horarios" name="id_horarios" data-validetta="required">   
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="grupoH">Grupo *</label>
                            <input type="text" id="grupoH" name="grupoH" data-validetta="required">   
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="lab">Laboratorio *</label>
                            <input type="text" id="lab" name="lab" data-validetta="required">   
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="cupo">Cupo *</label>
                            <input type="text" id="cupo" name="cupo" data-validetta="required">   
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="horario">Horario *</label>
                            <input type="text" id="horario" name="horario"  data-validetta="required">   
                        </div>
                        <div class="col s12 input-field;" style="margin-top: 0.675em; text-align: center;">
                            <input type="submit" class="btn blue" style="width: 60%;" value="Enviar">
                        </div>
                    </div>
                </form>
                <div class="col s12 centered">
                        <table class="responsive-table centered highlight">
                            <thead>
                                <tr >
                                    <th>Grupo</th><th>Laboratorio</th><th>Cupo</th><th>Horario</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $Registros; ?>
                            </tbody>
                        </table>
                        <br><br>
                    </div>
            </div>
        </div>
    </main><br>
    <footer class="page-footer grey">
        <div class="footer-copyright">
            <div class="container">
            © 2021 Copyright Omar Ramos Herrera
            <a class="grey-text text-lighten-4 right" href="#!">IPN</a>
            </div>
        </div>
    </footer>
    <div class="fixed-action-btn">
            <a class="btn-floating btn-large orange"><i class="fas fa-bars"></i></a>
            <ul>
                <li><a href='./../cerrarSesion.php?nombreSesion=usuario' class="btn-floating red tooltipped" data-position="top" data-tooltip="Cerrar Sesión"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
</body>
<script>
</script>
</html>


