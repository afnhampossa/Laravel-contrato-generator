  var smsError ='<div class="alert alert-danger" role="alert" style="text-align:center;"> Introdução incompleta de dados</div>';
  var smsProcess ='<div class="alert alert-info" role="alert" style="text-align:center;"> Aguarde enquanto processa</div>';

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

  $( ".btn" ).click(function(event) {
        event.preventDefault();

        pass = $("#password").val();
        email =$("#email").val();
        window.location.href = "pag/app.php";
        /*
       // alert(pass);
        if(( $("#password").val().length==0)||( $("#email").val().length==0)) return true;
      //  alert(pass+'-'+email);
        $.ajax({
                  url:"assets/jp/cnt_login.php",
                  method:"POST",
                  data:{selecionar:"login",password:pass,email:email},
                  beforeSend: function(){
                     $("#mensagem").html(smsProcess);
                  },
                  success:function(data){
                //   alert(data);
                    erro ='<div class="alert alert-danger" role="alert" style="text-align:center;"> Não foi possivel localizar a contas.</div>';
                    erro1 ='<div class="alert alert-danger" role="alert" style="text-align:center;"> Senha ou email incorrecto.</div>';
                    info ='<div class="alert alert-info" role="alert" style="text-align:center;"> Este email ja foi cadastrado.</div>';
                    sucesso ='<div class="alert alert-success" role="alert" style="text-align:center;"> Inserido com sucesso <a href="entra.php" >(entrar)</a><br> </div>';
                    if(data=='off1') $("#mensagem").html(erro);
                    else if(data=='off2') $("#mensagem").html(erro1);
                    else
                    if(data=='ok')
                        window.location.href = "pag/app.php";
                 //   alert(data);
              }
        });*/
   });

  });

  function aoCarregar(){
   // $("#btn_sub").position().left = $("#div_password").position().left;
     pos_pass=$("#password").position().left;
     pos_pass_div =$("#div_password").position().left;
    $("#btn_sub").offset({left: +pos_pass_div+pos_pass});
  }



   //  alert("ollllbbb");
