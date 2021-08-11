
<div>
    
    <?php
    include("../configBD.php");
    $id_usuario = ($_POST["id_usuario"]);
    $sqlGenAlumno = "SELECT * FROM informacion_general,informacion_escolar WHERE informacion_general.id_usuario = $id_usuario AND informacion_escolar.id_usuario = $id_usuario";
    $respAX=[];
    $resGenAlumno = mysqli_query($conexion, $sqlGenAlumno);
    $informacion = mysqli_fetch_row($resGenAlumno);
    
    $PROGRA = array("ISC"=>"Ing. en Sistemas Computacionales (ISC)","IIA"=>"Ing. en Inteligencia Artificial (IIA)","LCD"=>"Lic. en Ciencia de Datos (LCD)");
    $progSelec = $PROGRA[$informacion[23]]; 
    $OPCION = array("1"=>"Primera Opci&oacute;n","2"=>"Segunda Opci&oacute;n","3"=>"Tercera Opci&oacute;n");
    $numProgSelec = $OPCION[$informacion[25]]; 
    $INICIOSEMESTRE = array("2021-1"=>"Semestre 2021-1","2021-2"=>"Semestre 2021-2");
    $tipoSemestre = $INICIOSEMESTRE[$informacion[24]];
    $TIPOESCUELA = array("IPN"=>"Instituto Politécnico Nacional (IPN)","UNAM"=>"Universidad Nacional Autónoma de México (UNAM)","Colbach"=>"Colegio de Bachilleres (Colbach)","UAEM"=>"Universidad Autónoma del Estado de México (UAEM)","SE"=>"Secretaría de Educación del Gobierno del Estado de México (SE)","DGETAyCM"=>"Dirección General de Educación Tecnológica Agropecuaria y Ciencias del Mar (DGETAyCM)","DGETI"=>"Dirección General de Educación Tecnológica Industrial y de Servicios (DGETI)","DGB"=>"Dirección General del Bachillerato (DGB)","Privada"=>"Otro (Privada)");
    $instEsc = $TIPOESCUELA[$informacion[18]];

    ?> 
    <script src="../../js/administrador.js"></script>
    <form id="formAdmi">
        <div class="row ">
            <h4 class="center-align" style="color: #006699">Presione Actualizar al final del formulario para guardar los cambios</h4>
            <div class="col s12 m4 input-field">
                <label class="active" for="curp">CURP *</label>
                <input type="text" id="curp" name="curp"  value="<?php echo $informacion[2];?>" data-validetta="required,minLength[18],maxLength[18]">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="nombre">Nombre *</label>
                <input type="text" id="nombre" value="<?php echo $informacion[3];?>" name="nombre" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="primerApe">Primer apellido *</label>
                <input type="text" id="primerApe" name="primerApe" value="<?php echo $informacion[4];?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="segundoApe">Segundo apellido *</label>
                <input type="text" id="segundoApe" name="segundoApe" value="<?php echo $informacion[5];?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="fechaNaci">Fecha de Nacimiento *</label>
                <input type="text"  class="datepicker" id="fechaNaci"  name="fechaNaci" value="<?php echo $informacion[6];?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="genero">Género *</label>
                <input type="text" id="genero" name="genero"  value="<?php echo $informacion[7];?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="email">Correo electr&oacute;nico *</label>
                <input type="text" id="email" name="email" value="<?php echo $informacion[8];?>" data-validetta="required,email">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="telFijo">Tel&eacute;fono fijo *</label>
                <input type="text" id="telFijo" name="telFijo" value="<?php echo $informacion[9];?>" data-validetta="required,number,maxLength[10]">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="telCelu">Tel&eacute;fono M&oacute;vil *</label>
                <input type="text" id="telCelu" name="telCelu" value="<?php echo $informacion[10];?>" data-validetta="required,number,maxLength[10]">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="calle">Calle *</label>
                <input type="text" id="calle" name="calle" value="<?php echo $informacion[11];?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="num">N&uacute;mero *</label>
                <input type="text" id="num" name="num" value="<?php echo $informacion[12];?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="colonia">Colonia *</label>
                <input type="text" id="colonia" name="colonia" value="<?php echo $informacion[13];?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="alcaMun">Alcald&iacute;a-Municipio *</label>
                <input type="text" id="alcaMun" name="alcaMun" value="<?php echo $informacion[14];?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="estado">Estado *</label>
                <input type="text" id="estado" name="estado" value="<?php echo $informacion[15];?>" data-validetta="required">   
            </div>
        </div>
        <div class="row">
            <h5 class="center-align" style="font-family:Georgia, 'Times New Roman', Times, serif;">Informaci&oacute;n de escuela de procedencia</h5>
            <div class="col s12 m6 input-field">
                <select class="browser-default" id="tipoEsc" name="tipoEsc" required>
                    <option value="<?php echo $informacion[18];?>"><?php echo $instEsc; ?></option>
                    <option value="IPN" >Instituto Politécnico Nacional (IPN)</option>
                    <option value="UNAM">Universidad Nacional Autónoma de México (UNAM)</option>
                    <option value="Colbach">Colegio de Bachilleres (Colbach)</option>
                    <option value="UAEM">Universidad Autónoma del Estado de México (UAEM)</option>
                    <option value="SE">Secretaría de Educación del Gobierno del Estado de México (SE)</option>
                    <option value="DGETAyCM">Dirección General de Educación Tecnológica Agropecuaria y Ciencias del Mar (DGETAyCM)</option>
                    <option value="DGETAyCM">Dirección General de Educación Tecnológica Agropecuaria y Ciencias del Mar (DGETAyCM)</option>
                    <option value="DGB">Dirección General del Bachillerato (DGB)</option>
                    <option value="Privada">Otro (Privada)</option>
                </select>
            </div>
            <div class="col s12 m6 input-field">
                <label class="active" for="nomEsc">Nombre de la escuela *</label>
                <input type="text" id="nomEsc" name="nomEsc" value="<?php echo $informacion[19];?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="localidad">Localidad *</label>
                <input type="text" id="localidad" name="localidad" value="<?php echo $informacion[20];?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="formacion">Formaci&oacute;n (opcional)</label>
                <input type="text" id="formacion" value="<?php echo $informacion[21];?>" name="formacion">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="promedio">Promedio *</label>
                <input type="text" id="promedio" name="promedio" value="<?php echo $informacion[22];?>" data-validetta="required,number">   
            </div>
        </div>
        <div class="row">
            <h5 class="center-align" id="asig" style="font-family:Georgia, 'Times New Roman', Times, serif;">Asignaci&oacute;n</h5>
            <div class="col s12 m6 input-field ">
                <select class="browser-default" id="programa" name="programa" required>
                    <option value="<?php echo $informacion[23];?>"><?php echo $progSelec;?></option>
                    <option value="ISC">Ing. en Sistemas Computacionales (ISC)</option>
                    <option value="IIA">Ing. en Inteligencia Artificial (IIA)</option>
                    <option value="LCD">Lic. en Ciencia de Datos (LCD)</option>
                </select>  
            </div>
            <div class="input-field col s12 m6">
                <select class="browser-default" id="numPrograma" name="numPrograma" required>
                    <option value="<?php echo $informacion[25];?>"><?php echo $tipoSemestre;?></option>
                    <option value="1" >Primera Opci&oacute;n</option>
                    <option value="2">Segunda Opci&oacute;n</option>
                    <option value="3">Tercera Opci&oacute;n</option>
                </select>
            </div>
            <div class="col s12 m6 input-field" >
                <select class="browser-default" id="semestre" name="semestre" required >
                    <option value="<?php echo $informacion[24];?>"><?php echo $numProgSelec;?></option>
                    <option value="2021-1" >Semestre 2021-1</option>
                    <option value="2021-2">Semestre 2021-2</option>
                </select>
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="grupo">Grupo para examen *</label>
                <input type="text" id="grupo" name="grupo" value="<?php echo $informacion[26];?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="horarioExa">Horario de examen *</label>
                <input type="text" id="horarioExa" disabled value="<?php echo $informacion[27];?>" name="horarioExa">   
            </div>
            <div class="col s12 input-field;" style="margin-top: 0.675em; text-align: center;">
                <input type="submit" class="btn green"  style="width: 60%;" value="Actualizar">
            </div>
            <div class="col s12 input-field;" style="margin-top: 0.675em; text-align: center;">
                <a class="btn red" href="./Administrador.php" style="width: 60%;">Cerrar</a>
            </div>
        </div>
    </form>
</div>


