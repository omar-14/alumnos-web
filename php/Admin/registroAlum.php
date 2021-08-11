<div id="central-content">
<script src="../../js/inser_alum_admin.js"></script>

    <form id="formAdmiAlum">
        <div class="row">
            <h5 style="text-align: center;">Agregar nuevo Alumno</h5><br>
            <div class="col s12 m6 input-field">
                <label for="usuario">Usuario *</label>
                <input type="text" id="usuario" name="usuario" value="" data-validetta="required,numbrer,minLength[8],maxLength[10]">   
            </div>
            <div class="col s12 m6 input-field">
                <label for="contrasena">Contrase&ntilde;a *</label>
                <input type="password" id="contrasena" name="contrasena" value="" data-validetta="required,minLength[6],maxLength[16]">   
            </div>
        </div>
        <div class="row">
            <h5 style="text-align: center;">Datos generales</h5><br>
            <div class="col s12 m4 input-field">
                <label for="curp">CURP *</label>
                <input type="text" id="curp" name="curp" value="" data-validetta="required,minLength[18],maxLength[18]">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="nombre">Nombre *</label>
                <input type="text" id="nombre" value="" name="nombre" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="primerApe">Primer apellido *</label>
                <input type="text" id="primerApe" name="primerApe" value="" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="segundoApe">Segundo apellido *</label>
                <input type="text" id="segundoApe" name="segundoApe" value="" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="fechaNaci">Fecha de Nacimiento *</label>
                <input type="text"  class="datepicker" id="fechaNaci"  name="fechaNaci" value="" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="genero">Género *</label>
                <input type="text" id="genero" name="genero"  value="" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="email">Correo electr&oacute;nico *</label>
                <input type="text" id="email" name="email" value="" data-validetta="required,email">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="telFijo">Tel&eacute;fono fijo *</label>
                <input type="text" id="telFijo" name="telFijo" value="" data-validetta="required,number,maxLength[10]">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="telCelu">Tel&eacute;fono M&oacute;vil *</label>
                <input type="text" id="telCelu" name="telCelu" value="" data-validetta="required,number,maxLength[10]">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="calle">Calle *</label>
                <input type="text" id="calle" name="calle" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="num">N&uacute;mero *</label>
                <input type="text" id="num" name="num" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="colonia">Colonia *</label>
                <input type="text" id="colonia" name="colonia" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="alcaMun">Alcald&iacute;a-Municipio *</label>
                <input type="text" id="alcaMun" name="alcaMun" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="estado">Estado *</label>
                <input type="text" id="estado" name="estado" data-validetta="required">   
            </div>
        </div>
        <div class="row">
            <h5 class="center-align" style="font-family:Georgia, 'Times New Roman', Times, serif;">Informaci&oacute;n de escuela de procedencia</h5>
            <div class="col s12 m6 input-field">
                <select class="browser-default" id="tipoEsc" name="tipoEsc" required>
                    <option value="" disabled selected>Tipo de escuela de procedencia *</option>
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
                <label for="nomEsc">Nombre de la escuela *</label>
                <input type="text" id="nomEsc" name="nomEsc" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="localidad">Localidad *</label>
                <input type="text" id="localidad" name="localidad" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="formacion">Formaci&oacute;n (opcional)</label>
                <input type="text" id="formacion" name="formacion">   
            </div>
            <div class="col s12 m4 input-field">
                <label for="promedio">Promedio *</label>
                <input type="text" id="promedio" name="promedio" data-validetta="required">   
            </div>
        </div>
        <div class="row">
            <h5 class="center-align" id="asig" style="font-family:Georgia, 'Times New Roman', Times, serif;">Asignaci&oacute;n</h5>
            <div class="col s12 m6 input-field ">
            <select class="browser-default" id="programa" name="programa" required>
                <option value="" disabled selected>Programa acad&eacute;mico asignado *</option>
                <option value="ISC">Ing. en Sistemas Computacionales (ISC)</option>
                <option value="IIA">Ing. en Inteligencia Artificial (IIA)</option>
                <option value="LCD">Lic. en Ciencia de Datos (LCD)</option>
            </select>  
            </div>
            <div class="input-field col s12 m6">
                <select class="browser-default" id="numPrograma" name="numPrograma" required>
                    <option value="" disabled selected>Numero de programa asignado en examen *</option>
                    <option value="1" >Primera Opci&oacute;n</option>
                    <option value="2">Segunda Opci&oacute;n</option>
                    <option value="3">Tercera Opci&oacute;n</option>
                </select>
            </div>
            <div class="col s12 m6 input-field" >
                <select class="browser-default" id="semestre" name="semestre" required >
                    <option value="" disabled selected>Semestre de inicio *</option>
                    <option value="2021-1" >Semestre 2021-1</option>
                    <option value="2021-2">Semestre 2021-2</option>
                </select>
            </div>
            <div class="col s12 input-field;" style="margin-top: 0.675em; text-align: center;">
                <input type="submit" class="btn blue" style="width: 60%;" value="Registar">
            </div>
            <div class="col s12 input-field" style="margin-top: 0.675em; text-align: center;">
                <input type="submit" class="btn orange" style="width: 60%;" value="Mandar pdf a correo electronico">
            </div>
            <div class="col s12 input-field;" style="margin-top: 0.675em; text-align: center;">
                <a class="btn red" href="./Administrador.php" style="width: 60%;">Cerrar</a>
            </div>
        </div>
    </form>
</div>