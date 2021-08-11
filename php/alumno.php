<?php
    session_start();
    if(isset($_SESSION["usuario"])){
        $usuario = $_SESSION["usuario"];
        $conexion = mysqli_connect("localhost","root","","sem-20211");
        $sqlInfAlumno = "SELECT * FROM alumno WHERE usuario = '$usuario'";
        $resInfAlumno = mysqli_query($conexion, $sqlInfAlumno);
        $infAlumno = mysqli_fetch_row($resInfAlumno);
        
        $ID_USUARIO=$infAlumno[0];
        $_SESSION["id_usuario"] = $ID_USUARIO;
            $conexion = mysqli_connect("localhost","root","","sem-20211");
            $sqlInfAlumno = "SELECT * FROM informacion_general WHERE id_usuario = '$ID_USUARIO'";
            $sqlEscAlumno = "SELECT * FROM informacion_escolar WHERE id_usuario = '$ID_USUARIO'";
            $resInfAlumno = mysqli_query($conexion, $sqlInfAlumno);
            $informacionGeneral = mysqli_fetch_row($resInfAlumno);
            $resESCAlumno = mysqli_query($conexion, $sqlEscAlumno);
            $informacionEsc = mysqli_fetch_row($resESCAlumno);
    
    }else{
        header("location:./../index.html");
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo "$infAlumno[1]";?></title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="../css/registro.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<link href="./../materialize/css/materialize.min.css" rel="stylesheet">
<link href="./../js/plugins/validetta/dist/validetta.min.css" rel="stylesheet">
<link href="./../js/plugins/confirm/dist/jquery-confirm.min.css" rel="stylesheet">
<script src="./../js/jquery-3.5.1.min.js"></script>
<script src="./../materialize/js/materialize.min.js"></script>
<script src="./../js/plugins/validetta/dist/validetta.min.js"></script>
<script src="./../js/plugins/validetta/localization/validettaLang-es-ES.js"></script>
<script src="./../js/plugins/confirm/dist/jquery-confirm.min.js"></script>
<script src="./../js/alumno.js"></script>

</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col s12 m2 input-field escudo"id="logo-container">
                        <img src="../imagenes/logo-ipn.png" aling="center">
            </div>
            <div class="col s12 m8 center-align ">
                <h4 class="guinda titulo titulo_non">Instituto Polit&eacute;cnico Nacional</h4>
                <h4 class="azul titulo titulo_non">Escuela Superior de C&oacute;mputo</h4> 
            </div>
            <div class="col s12 m2 input-field escudo" id="logo-container">
                <img src="../imagenes/escudoESCOM.png">
            </div>
        </div>
    </div>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large green"><i class="fas fa-bars"></i></a>
        <ul>
            <li><a href='./cerrarSesion.php?nombreSesion=usuario' class="btn-floating blue tooltipped" data-position="top" data-tooltip="Cerrar Sesión"><i class="fas fa-sign-out-alt"></i></a></li>
        </ul>
    </div>
</header>
<main>
    <?php
    $PROGRA = array("ISC"=>"Ing. en Sistemas Computacionales (ISC)","IIA"=>"Ing. en Inteligencia Artificial (IIA)","LCD"=>"Lic. en Ciencia de Datos (LCD)");
    $progSelec = $PROGRA[$informacionEsc[7]]; 
    $OPCION = array("1"=>"Primera Opci&oacute;n","2"=>"Segunda Opci&oacute;n","3"=>"Tercera Opci&oacute;n");
    $numProgSelec = $OPCION[$informacionEsc[9]]; 
    $INICIOSEMESTRE = array("2021-1"=>"Semestre 2021-1","2021-2"=>"Semestre 2021-2");
    $tipoSemestre = $INICIOSEMESTRE[$informacionEsc[8]];
    $TIPOESCUELA = array("IPN"=>"Instituto Politécnico Nacional (IPN)","UNAM"=>"Universidad Nacional Autónoma de México (UNAM)","Colbach"=>"Colegio de Bachilleres (Colbach)","UAEM"=>"Universidad Autónoma del Estado de México (UAEM)","SE"=>"Secretaría de Educación del Gobierno del Estado de México (SE)","DGETAyCM"=>"Dirección General de Educación Tecnológica Agropecuaria y Ciencias del Mar (DGETAyCM)","DGETI"=>"Dirección General de Educación Tecnológica Industrial y de Servicios (DGETI)","DGB"=>"Dirección General del Bachillerato (DGB)","Privada"=>"Otro (Privada)");
    $instEsc = $TIPOESCUELA[$informacionEsc[2]];
    ?>
    <div class="container fond">
        <form id="formGeneral" autocomplete="on">
                <div class="row">
                    <div class="row center-align">
                        <h5 style="font-family:Georgia, 'Times New Roman', Times, serif;">Datos generales</h5>
                        <p>Para actualizar tus datos modifica el campo que quieres modificar y solo ese, al final solo da click en actializar para guardar los cambios</p>
                        <div class="col s12 m6">
                            <p style="font-size: 29px; color: #6C1D45; "><?php echo $infAlumno[1]; ?></p>
                        </div>
                        <div class="col s12 m6">
                            <p style="font-size: 29px; color: #006699; "><?php echo $informacionGeneral[3]." ".$informacionGeneral[4]; ?></p>
                        </div>
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="curp">CURP *</label>
                        <input type="text" id="curp" name="curp" value="<?php echo $informacionGeneral[2];?>" data-validetta="required,minLength[18],maxLength[18]">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="nombre">Nombre *</label>
                        <input type="text" id="nombre" value="<?php echo $informacionGeneral[3];?>" name="nombre" data-validetta="required">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="primerApe">Primer apellido *</label>
                        <input type="text" id="primerApe" name="primerApe" value="<?php echo $informacionGeneral[4];?>" data-validetta="required">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="segundoApe">Segundo apellido *</label>
                        <input type="text" id="segundoApe" name="segundoApe" value="<?php echo $informacionGeneral[5];?>" data-validetta="required">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="fechaNaci">Fecha de Nacimiento *</label>
                        <input type="text"  class="datepicker" id="fechaNaci"  name="fechaNaci" value="<?php echo $informacionGeneral[6];?>" data-validetta="required">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="genero">Género *</label>
                        <input type="text" id="genero" name="genero"  value="<?php echo $informacionGeneral[7];?>" data-validetta="required">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="email">Correo electr&oacute;nico *</label>
                        <input type="text" id="email" name="email" value="<?php echo $informacionGeneral[8];?>" data-validetta="required,email">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="telFijo">Tel&eacute;fono fijo *</label>
                        <input type="text" id="telFijo" name="telFijo" value="<?php echo $informacionGeneral[9];?>" data-validetta="required,number,maxLength[10]">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="telCelu">Tel&eacute;fono M&oacute;vil *</label>
                        <input type="text" id="telCelu" name="telCelu" value="<?php echo $informacionGeneral[10];?>" data-validetta="required,number,maxLength[10]">   
                    </div>
                </div>
                <div class="row center-align">
                    <h5 style="font-family:Georgia, 'Times New Roman', Times, serif;">Dirección</h5>
                    <div class="col s12 m6 input-field">
                        <label for="calle">Calle *</label>
                        <input type="text" id="calle" name="calle" value="<?php echo $informacionGeneral[11];?>" data-validetta="required">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="num">N&uacute;mero *</label>
                        <input type="text" id="num" name="num" value="<?php echo $informacionGeneral[12];?>" data-validetta="required">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="colonia">Colonia *</label>
                        <input type="text" id="colonia" name="colonia" value="<?php echo $informacionGeneral[13];?>" data-validetta="required">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="alcaMun">Alcald&iacute;a-Municipio *</label>
                        <input type="text" id="alcaMun" name="alcaMun" value="<?php echo $informacionGeneral[14];?>" data-validetta="required">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="estado">Estado *</label>
                        <input type="text" id="estado" name="estado" value="<?php echo $informacionGeneral[15];?>" data-validetta="required">   
                    </div>
                </div>
                <div class="row ">
                    <h5 class="center-align" style="font-family:Georgia, 'Times New Roman', Times, serif;">Informaci&oacute;n de escuela de procedencia</h5>
                    <div class="col s12 m6 input-field">
                        <select class="browser-default" id="tipoEsc" name="tipoEsc" required>
                            <option value="<?php echo $informacionEsc[2];?>"><?php echo $instEsc; ?></option>
                            <option value="IPN">Instituto Politécnico Nacional (IPN)</option>
                            <option value="UNAM">Universidad Nacional Autónoma de México (UNAM)</option>
                            <option value="Colbach">Colegio de Bachilleres (Colbach)</option>
                            <option value="UAEM">Universidad Autónoma del Estado de México (UAEM)</option>
                            <option value="SE">Secretaría de Educación del Gobierno del Estado de México (SE)</option>
                            <option value="DGETAyCM">Dirección General de Educación Tecnológica Agropecuaria y Ciencias del Mar (DGETAyCM)</option>
                            <option value="DGETI">Dirección General de Educación Tecnológica Industrial y de Servicios (DGETI)</option>
                            <option value="DGB">Dirección General del Bachillerato (DGB)</option>
                            <option value="Privada">Otro (Privada)</option>
                        </select>   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="nomEsc">Nombre de la escuela *</label>
                        <input type="text" id="nomEsc" name="nomEsc" value="<?php echo $informacionEsc[3];?>" data-validetta="required">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="localidad">Localidad *</label>
                        <input type="text" id="localidad" name="localidad" value="<?php echo $informacionEsc[4];?>" data-validetta="required">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="formacion">Formaci&oacute;n (opcional)</label>
                        <input type="text" id="formacion" name="formacion" value="<?php echo $informacionEsc[5];?>">   
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="promedio">Promedio *</label>
                        <input type="text" id="promedio" name="promedio" value="<?php echo $informacionEsc[6];?>" data-validetta="required">   
                    </div>
                </div>
                <div class="row">
                    <h5 class="center-align" style="font-family:Georgia, 'Times New Roman', Times, serif;">Asignaci&oacute;n</h5>
                    <div class="col s12 m6 input-field ">
                        <select class="browser-default" id="programa" name="programa" required>
                            <option value="<?php echo $informacionEsc[7];?>"><?php echo $progSelec;?></option>
                            <option value="ISC">Ing. en Sistemas Computacionales (ISC)</option>
                            <option value="IIA">Ing. en Inteligencia Artificial (IIA)</option>
                            <option value="LCD">Lic. en Ciencia de Datos (LCD)</option>
                        </select>  
                    </div>
                    <div class="col s12 m6 input-field">
                        <select class="browser-default" id="semestre" name="semestre" required>
                            <option value="<?php echo $informacionEsc[8];?>"><?php echo $tipoSemestre;?></option>
                            <option value="2021-1" >Semestre 2021-1</option>
                            <option value="2021-2">Semestre 2021-2</option>
                        </select>   
                    </div>
                    <div class="col s12 m6 input-field" >
                        <select class="browser-default" id="numPrograma" name="numPrograma" required>
                            <option value="<?php echo $informacionEsc[9];?>"><?php echo $numProgSelec;?></option>
                            <option value="1" >Primera Opci&oacute;n</option>
                            <option value="2">Segunda Opci&oacute;n</option>
                            <option value="3">Tercera Opci&oacute;n</option>
                        </select>
                    </div>
                    <div class="col s12 input-field;" style="margin-top: 0.675em; text-align: center;">
                        <input type="submit" class="btn green" style="width: 60%;" value="Actualizar">
                    </div>
                    <div class="col s12 input-field" style="margin-top: 0.675em; text-align: center;">
                        <input type="submit" class="btn orange" style="width: 60%;" value="Mandar pdf a correo electronico">
                    </div>
                </div>
        </form>
</main>
<footer>
    <div class="footer-copyright">
        <div class="container" style=""><br>
            © 2020 Copyright
            <a class="grey-text text-lighten-4 right" href="https://www.escom.ipn.mx">UTEYCV - ESCOM</a>
        </div>
    </div>
</footer>
</body>
</html>