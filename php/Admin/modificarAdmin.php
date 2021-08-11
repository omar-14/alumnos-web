<div>
    <?php
        include("../configBD.php");
        $id_admin = ($_POST["id_admin"]);
        $sql = "SELECT * FROM administrador WHERE id_admin = '$id_admin'";
        $respAX=[];
        $resGenAdmin = mysqli_query($conexion, $sql);
        $informacion = mysqli_fetch_row($resGenAdmin);
    ?> 
    <script src="../../js/actualiza_admin.js"></script>
    <form id="formAdminM">
        <div class="row ">
            <h5 style="text-align: center;">Selecciona el id (identificador) del alumno que quiera modificar</h5><br>
            <div class="col s12 m4 input-field">
                <label class="active" for="id_Admin">id_Admin *</label>
                <input type="text" id="id_Admin" name="id_Admin" value="<?php echo $informacion[0]; ?>" data-validetta="required,minLength[8],maxLength[18]">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="usuario">Usuario *</label>
                <input type="text" id="usuario" name="usuario" value="<?php echo $informacion[1]; ?>" data-validetta="required,number">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="nombre">Nombre *</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $informacion[4]; ?>" data-validetta="required">   
            </div>
                <div class="col s12 m4 input-field">
                <label class="active" for="primerApe">Primer apellido *</label>
                <input type="text" id="primerApe" name="primerApe" value="<?php echo $informacion[5]; ?>"  data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="segundoApe">Segundo apellido *</label>
                <input type="text" id="segundoApe" name="segundoApe" value="<?php echo $informacion[6]; ?>" data-validetta="required">   
            </div>
            <div class="col s12 m4 input-field">
                <label class="active" for="email">Correo electr&oacute;nico *</label>
                <input type="text"  id="email"  name="email" value="<?php echo $informacion[7]; ?>" data-validetta="required,email">
            </div>  
            <div class="col s12 input-field;" style="margin-top: 0.675em; text-align: center;">
                <input type="submit" class="btn green" style="width: 60%;" value="Actualizar">
            </div> 
            <div class="col s12 input-field;" style="margin-top: 0.675em; text-align: center;">
                <a class="btn red" href="./gestionAdmin.php" style="width: 60%;">Cerrar</a>
            </div>
        </div>
    </form>
</div>