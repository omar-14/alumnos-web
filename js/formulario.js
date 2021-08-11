$(document).ready(function(){
    var rango = [1990,2020];
    $('.datepicker').datepicker({
        format:"yyyy-mm-dd",
        autoClose:true,
        minDate:new Date(1990,0,1),
        maxDate:new Date(2020,11,31),
        yearRange:rango,
        i18n:{
            months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            monthsShort:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
            weekdays:["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],
            weekdaysShort:["Dom","Lun","Mar","Mie","Jue","Vie","Sab"],
            weekdaysAbbrev:["D","L","M","M","J","V","S"]
        }
    });
    $("#formGeneral").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault(); //Cancelar el submit
            let curp = $("#curp").val();
            let nombre = $("#nombre").val();
            let primerApe = $("#primerApe").val();
            let segundoApe = $("#segundoApe").val();
            let fechaNaci = $("#fechaNaci").val();
            let genero = $("#genero").val();
            let email = $("#email").val();
            let telFijo = $("#telFijo").val();
            let telCelu = $("#telCelu").val();
            let calle = $("#calle").val();
            let num = $("#num").val();
            let colonia = $("#colonia").val();
            let alcaMun = $("#alcaMun").val();
            let estado = $("#estado").val();

            let tipoEsc = $("#tipoEsc").val();
            let nomEsc = $("#nomEsc").val();
            let localidad = $("#localidad").val();
            let formacion = $("#formacion").val();
            let promedio = $("#promedio").val();
            
            let programa = $("#programa").val();
            let semestre = $("#semestre").val();
            let numPrograma = $("#numPrograma").val();
            $.ajax({
                url:"./php/formulario_AX.php",
                method:"POST",
                data:{curp:curp, nombre:nombre, primerApe:primerApe, segundoApe:segundoApe, fechaNaci:fechaNaci, genero:genero, email:email, telFijo:telFijo, telCelu:telCelu, calle:calle, num:num, colonia:colonia, alcaMun:alcaMun, estado:estado, tipoEsc:tipoEsc, nomEsc:nomEsc, localidad:localidad, formacion:formacion, promedio:promedio, programa:programa, semestre:semestre, numPrograma:numPrograma},
                cache:false,
                success:function(respAX){
                    let AX = JSON.parse(respAX);
                    $.alert({
                        title:"TWeb 2021-1",
                        content:"<h5>"+AX.msj+"</h5>",
                        theme:"dark",
                        onDestroy:function(){
                            if(AX.cod == 1){
                            
                            window.location.replace("./php/PDF_Alum.php?curp="+curp);
                            }
                        }
                    });
                }
            });
        }
    });
    $('select').formSelect();
});