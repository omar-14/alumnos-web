$(document).ready(function(){
    $("#formLogin").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
          e.preventDefault(); //Cancelar el submit
            $.ajax({
                url:"./php/login.php",
                method:"POST",
                data:$("#formLogin").serialize(),
                cache:false,
                success:function(respAX){
                    let AX = JSON.parse(respAX);
                    $.alert({
                        title:"TWeb 2021-1",
                        content:"<h1 style='color: bisque;'>"+AX.msj+"</h1>",
                        theme:"supervan",
                        onDestroy:function(){
                            if(AX.cod == 1 && AX.tipo == "Admin00"){
                                window.location.href = "./php/Admin/Administrador.php";
                            }
                            if(AX.cod == 1 && AX.tipo == "Alumno"){
                                window.location.href = "./php/alumno.php";
                            }
                        }
                    });
                }
            });
        }
    });
});