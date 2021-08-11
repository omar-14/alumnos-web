$(document).ready(function(){
    $('select').formSelect();
    $('.fixed-action-btn').floatingActionButton();
    $('.tooltipped').tooltip();
    $("form#formAlmnUpdt").validetta();
    $('.sidenav').sidenav();
    $('.ver').on('click', function() {
        let id_admin = $(this).attr("data-boleta");
        $.ajax({
            type: "POST",
            url:"./verAdmin.php",
            data:{id_admin:id_admin},
            cache:"false",
            success: function(respAX) {
                $('#central').html(respAX);
            }
        });
        return false;
    });

    $('.editar').on('click', function() {
        let id_admin = $(this).attr("data-boleta");
        $.ajax({
            type: "POST",
            url:"./modificarAdmin.php",
            data:{id_admin:id_admin},
            cache:"false",
            success: function(respAX) {
                $('.edit').html(respAX);
            }
        });
        return false;
    });

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
    
    $("#formAdmin").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault(); //Cancelar el submit
            let id_Admin = $("#id_Admin").val();
            let usuario = $("#usuario").val();
            let contrasena = $("#contrasena").val();
            let nombre = $("#nombre").val();
            let primerApe = $("#primerApe").val();
            let segundoApe = $("#segundoApe").val();
            let email = $("#email").val();
            $.ajax({
                url:"./registoAdmin.php",
                method:"POST",
                data:{id_Admin:id_Admin, usuario:usuario, contrasena:contrasena, nombre:nombre, primerApe:primerApe, segundoApe:segundoApe, email:email},
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


