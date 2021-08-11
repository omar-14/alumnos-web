$(document).ready(function(){
    $('select').formSelect();
    $('.fixed-action-btn').floatingActionButton();
    $('.tooltipped').tooltip();
    $("form#formAlmnUpdt").validetta();
    $('.sidenav').sidenav();

    $('.eliminar').on('click', function() {
        let id_admin = $(this).attr("data-boleta");
        $.confirm({
            title: 'Alerta de borrado!',
            content: 'DE VERDAD QUIERES BORRAR?!',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "POST",
                        url:"./eliminar_admin.php",
                        data:{id_admin:id_admin},
                        cache:"false",
                        success: function(respAX) {
                            $.alert(respAX);
                            location.reload();
                        }
                    });
                    
                },
                cancel: function () {
                    $.alert('Cancelado!');
                },
            }
        });

        return false;
    });
    
    $("#formHorario").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault(); //Cancelar el submit
            let id_horarios = $("#id_horarios").val();
            let grupoH = $("#grupoH").val();
            let lab = $("#lab").val();
            let cupo = $("#cupo").val();
            let horario = $("#horario").val();
            $.ajax({
                url:"./inser_horarios.php",
                method:"POST",
                data:{id_horarios:id_horarios, grupoH:grupoH, lab:lab, cupo:cupo, horario:horario},
                cache:false,
                success:function(respAX){
                    let AX = JSON.parse(respAX);
                    $.alert({
                        title:"TWeb 2021-1",
                        content:"<h5>"+AX.msj+"</h5>",
                        theme:"dark",
                        onDestroy:function(){
                            if(AX.cod == 1){
                            location.reload();
                            }
                        }
                    });
                }
            });
        }
    });
});


