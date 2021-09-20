	//<script src="assets/iCheck/icheck.min.js"></script>
	//alert("ola mundoooo5...");
  //alert($("#idSexo").val());

  var smsError ='<div class="alert alert-danger" role="alert" style="text-align:center;"> Introdução incompleta de dados</div>';
  var smsProcess ='<div class="alert alert-info" role="alert" style="text-align:center;"> Aguarde enquanto processa</div>';
	$(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

  });

 $( ".inp" ).click(function(btn) {
    $("#mensagem").html('');
 });
 $("#optionsM").change(function(btn) {
   // alert("kkkkkk");
 });
  $( ".btn" ).click(function(btn) {
      btn.preventDefault();
      
      if(this.value==0){
        //mover para a proxima tab no castro do usuario
         if (($("#apelido").val().length==0)||($("#nome").val().length==0)||($("#email").val().length==0)||($("#dataNasc").val().length==0)) {
             $("#mensagem").html(smsError);
         }else {
            if( email($("#email").val() ) ){
               $("#div_step1").css({display:"block"});
               $("#div_step0").css({display:"none"});
            }else $("#mensagem").html(smsError);
         }
      }
      if(this.value==1){
         //voltar para tab 2 no cadastro de usuario
         $("#div_step1").css({display:"none"});
         $("#div_step0").css({display:"block"});
      }
      if(this.value==2){
        //enviar os dados para cadastro do novo usuario
          if (($("#password").val().length==0)||($("#conf_password").val().length==0)) 
              $("#mensagem").html(smsError);  
          else{

              apelido = $("#apelido").val();
              nome = $("#nome").val();
              email =$("#email").val();
              dataNasc =$("#dataNasc").val();
            //  pass1 = $("#password").val();
              //pass2 =$("#conf_password").val();
              homem = $("#idSexo").is(':checked');
              password1= $("#password").val();
              password2= $("#conf_password").val();

              beatmaker = $("#beatMaker").is(':checked');
              compositor= $("#compositor").is(':checked');
              produtor = $("#produtor").is(':checked');
              design = $("#design").is(':checked');

             if(!($("#password").val()==$("#conf_password").val()))  $("#mensagem").html(smsError);  
             else
             {               
                $.ajax({
                  url:"assets/jp/cnt_login.php",
                  method:"POST",
                  data:{selecionar:"cadastro", nome:nome,apelido:apelido,email:email,dataNasc:dataNasc,homem:homem, password:password1,
                  beatmaker:beatmaker, compositor:compositor, produtor:produtor,design:design},
                  beforeSend: function(){                        
                     $("#mensagem").html(smsProcess);
                  },
                  success:function(data){
                    console.log(data);
                    erro ='<div class="alert alert-danger" role="alert" style="text-align:center;"> Não foi possivel introduzir os dados.</div>';
                    info ='<div class="alert alert-info" role="alert" style="text-align:center;"> Este email ja foi cadastrado.</div>';
                    sucesso ='<div class="alert alert-success" role="alert" style="text-align:center;"> Inserido com sucesso <a href="entra.php" >(entrar)</a><br> </div>';
                    if(data=='ok')
                       $("#mensagem").html(sucesso);
                    else if(data=='off')  
                            $("#mensagem").html(erro);
                    else  $("#mensagem").html(info);
                  }
              });
             }
          }
      }
  });
  function email(email) {
    var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return regex.test(email);
  }
  function aoCarregar(){
   // $("#btn_sub").position().left = $("#div_password").position().left;
     pos_pass=$("#password").position().left;
     pos_pass_div =$("#div_password").position().left;
    $("#btn_sub").offset({left: +pos_pass_div+pos_pass});
    //$("#btn_sub1").offset({left: +pos_pass_div+pos_pass+$("#btn_sub").length});

   // alert($("#btn_sub").length+'rrrr');

    pos_pass=$("#nome").position().left;
    pos_pass_div =$("#div_username").position().left;
    $("#btn_sub_prox").offset({left: +pos_pass_div+pos_pass});

    lnk=$("#lnkTitulo").position().left;
    $("#lblTitulo").offset({left: lnk+50});
  }



  