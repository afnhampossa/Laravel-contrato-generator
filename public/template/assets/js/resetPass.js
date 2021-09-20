$(document).on("click",".resetPass",function(){
      if(confirm("Pretende alterar o password do " + $(this).closest('tr').children(':eq(2)').text()) + '?'){
        codigo = $(this).closest('tr').children(':eq(0)').text();
        nome = $(this).closest('tr').children(':eq(2)').text() + ', ' + $(this).closest('tr').children(':eq(1)').text();
        email = $(this).attr('email');

             $.ajax({
                    type:'post',
                    url:'../library/jp/envioEmail.php',
                    data: {validar: 'resetPassEs', email: email, nome: nome, codigo: codigo} ,
                    beforeSend:function(data){
                        $('.resp').html('<div class = "aguarde"><p>Processando o seu pedido...</p></div>').fadeIn();
                    },
                    success:function(data){
                        console.log(data);
                        if (data == 1) {
                            $('.resp').html('<div class = "certo"><p>O seu pedido foi processado com sucesso...</p></div>').delay(5000).fadeOut('slow');
                        } else {
                            $('.resp').html('<div class = "erros"><p>Nao foi possível processar o seu pedido...</p></div>').delay(5000).fadeOut('slow');
                        }
                    },
                    error:function(status,error){
                        $('.resp').html('<div class = "erros"><p>Problema de conexão, verifique sua rede...</p></div>').delay(7000).fadeOut('slow');
                    }
              });

          return false;
      }else{
          return false;
      }
}); 