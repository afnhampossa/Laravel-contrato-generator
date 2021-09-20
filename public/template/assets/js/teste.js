   
 $(document).ready(function () {
    $(".errop").hide();

    $(".hover").mouseover(function(){
        var  atualTr = $(this);
        var   atual =atualTr.attr('id');
        $.ajax({
            method:'post',
            url:'../library/jp/validarTeste.php',
            data:{validar:'ver',idDiciplina:atual},
            beforeSend: function(){

                $('#response').html(' <p>Processando Informação...</p>');
            },
            success:function (data) {
            console.log(data);
				var dados = data.split("|||");
                if(dados[0] == 0){
                    $('#erros').addClass('erros');
                    $("#erros").show();
                    $(".errop").show();
                    $('.corpoNotas').html("");
					$('.corpoNotas').parent().hide();
					$('.headerNotas').hide();
					$('.corpoTestes').html(dados[1]);
                }else{
                    $("#erros").hide();
                    $(".errop").hide();
					$('.headerNotas').fadeIn();
					$('.corpoNotas').parent().fadeIn();
                    $('.corpoNotas').html(dados[0]);
					$('.corpoTestes').html(dados[1]);
                }
				
            }
        });
    });

    $(".btn").click(function () {
         var   atual = $(this).val();
         $.ajax({
            method:'post',
            url:'../library/jp/validarTeste.php',
            data:{validar:'ver',idDiciplina:atual},
            beforeSend: function(){
                $('#response').html(' <p>Processando Informação...</p>');
            },
            success:function (data) {
            console.log(data);
				var dados = data.split("|||");
                if(dados[0] == 0){
                    $('#erros').addClass('erros');
                    $("#erros").show();
                    $(".errop").show();
                    $('.corpoNotas').html("");
					$('.corpoNotas').parent().hide();
					$('.headerNotas').hide();
					$('.corpoTestes').html(dados[1]);
                }else{
                    $("#erros").hide();
                    $(".errop").hide();
					$('.headerNotas').fadeIn();
					$('.corpoNotas').parent().fadeIn();
                    $('.corpoNotas').html(dados[0]);
					$('.corpoTestes').html(dados[1]);
                }
				
            }
        });
		

		
    });
	

	
});

