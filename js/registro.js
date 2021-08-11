$(document).ready(function(){
  

  $("#formRegistro").validetta({
    bubblePosition: 'bottom',
      bubbleGapTop: 10,
      bubbleGapLeft: -5,
      onValid:function(e){
        e.preventDefault(); //Cancelar el submit
        let usuario = $("#usuario").val();
        let contrasena = $("#contrasena").val();
        $.ajax({
          url:"./php/registro_AX.php",
          method:"POST",
          data:{usuario:usuario, contrasena:contrasena},
          cache:false,
          success:function(respAX){
            let AX = JSON.parse(respAX);
            $.alert({
              title:"TWeb 2021-1",
              content:"<h5>"+AX.msj+"</h5>",
              theme:"dark",
              onDestroy:function(){
                if(AX.cod == 1){
                  window.location.href="./formulario.html";
                } else if(AX.cod == 0){
                  location.reload();
                }
              }
            });
          }
        });
      }
  });
});