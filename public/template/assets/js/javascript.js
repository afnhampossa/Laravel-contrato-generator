$(function(){
	
	var atual_fs, next_fs, prev_fs;
	var formulario = $('form[name="formulario"]');
	var reNome = /^[a-zA-Z\sáéíóúàèìòùãõâêôûîÇç]+$/;
	
	function next(elem){
		atual_fs = $(elem).parent();
		next_fs = $(elem).parent().next();
		
		$('#progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
		atual_fs.hide(800);
		next_fs.show(800);
		
	};
	
	$('.prev').click(function(){
		atual_fs = $(this).parent();
		prev_fs  = $(this).parent().prev();
		
		$('#progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
		atual_fs.hide(800);
		prev_fs.show(800);
		
	});
    $('input[name=nextE0]').click(function(){
        $('.resp').html('<div class = "erros"><p>Clicou próximo</p></div>').delay(5000).fadeOut('slow');
        next($(this));
    });

	$('input[name=next1]').click(function(){
		var array = formulario.serializeArray();
			if(array[0].value == '' || array[1].value == '' || array[2].value == '' || array[3].value == ''  || array[4].value == '')
				$('.resp').html('<div class="erros"><p>Preencha todos Dados Pessoais</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});
	
	$('input[name=next2]').click(function(){
		var array = formulario.serializeArray();
			if(array[5].value == '' || array[6].value == ''  || array[7].value == '0' || array[8].value == '0' || array[9].value == '0')
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Identificação Civil</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});
	
	$('input[name=next3]').click(function(){
		var array = formulario.serializeArray();
			if(array[10].value == '0' || array[11].value == '0' || array[12].value == '0' || array[13].value == '0' || array[14].value == '0' || array[15].value == '0')
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Informação Profissional</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});
	
	$('input[name=next4]').click(function(){
		var array = formulario.serializeArray();
			if(array[19].value == '' || array[20].value == '' || array[21].value == '' || array[22].value == '' || array[23].value == '' || array[24].value == '' || array[25].value == '')
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Informação Académica</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});
	
	$('input[name=next5]').click(function(){
		var array = formulario.serializeArray();
			if(array[26].value == '' || array[27].value == '' || array[28].value == '' || array[29].value == '' || array[30].value == '' || array[31].value == '' || array[32].value == '' || array[33].value == '' || array[34].value == '' || array[35].value == '' || array[36].value == '' || array[37].value == '')
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Actos Administrativos</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});
	
	$('input[name=validarFuncionario]').click(function(evento){
		var array = formulario.serializeArray();
			if(array[38].value == '' || array[39].value == '' || array[40].value == '')
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Contacto</p></div>');
			else{
				$.ajax({
					method: 'post',
					url: 'jp/jPcadastrar.php',
					data: {cadastrar: 'sim', campos: array},
					/*dataType: 'json',*/
					beforeSend: function(){
						$('.resp').html('<div class = "erros"><p>Aguarde enquanto processamos seus dados</p></div>');
					},
					success: function(valor){
						$('.resp').html(valor);
					}
				});
			}
		evento.preventDefault();
	});


	//accoes para estudante
	$('input[name=nextE1]').click(function(){
		var array = formulario.serializeArray();
			if(array[0].value == '' || array[1].value == '' || array[2].value == '' || array[3].value == '' || array[4].value == '' || array[5].value == '' )
				$('.resp').html('<div class="erros"><p>Preencha todos dados Pessoais</p></div>');
			else if (!reNome.test(array[0].value))
				$('.resp').html('<div class="erros"><p>Apelído contém caracteres inválidos</p></div>');
			else if (!reNome.test(array[1].value))
				$('.resp').html('<div class="erros"><p>Outros Nomes contém caracteres inválidos</p></div>');
			else if (!reNome.test(array[4].value))
				$('.resp').html('<div class="erros"><p>Nome do Pai contém caracteres inválidos</p></div>');
			else if (!reNome.test(array[5].value))
				$('.resp').html('<div class="erros"><p>Nome da mãe contém caracteres inválidos</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});

	$('input[name=nextE2]').click(function(){
		var array = formulario.serializeArray();
			if(array[8].value == '' || array[9].value == '' || array[10].value == '' || array[11].value == '' || array[12].value == '' || array[13].value == ''){
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Identificação Civil</p></div>');
			 	$('html, body').animate({scrollTop: 0}, 1000);
			}
			else{
				$('.resp').html('');
				next($(this));
			}
	});

	$('input[name=nextE3]').click(function(){
		var array = formulario.serializeArray();
        if(array[14].value == '' || array[15].value == '' || array[16].value == '' || array[19].value == '' || array[20].value == '' || array[21].value == ''){
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Informação Residencial</p></div>');
			$('html, body').animate({scrollTop: 0}, 1000);
		} else{
			$('.resp').html('');
			next($(this));
		}
	});

	$('input[name=nextE4]').click(function(){
		var array = formulario.serializeArray();
			if(array[24].value == '' || array[25].value == '' ||  array[27].value == '' || array[28].value == '')
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Contacto</p></div>');
			else if (!(/^([\w-]+(\.[\w-]+)*)@(([\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(\.[a-z]{2})?)$/i.test(array[24].value))) 
				$('.resp').html('<div class="erros"><p>O e-mail informado é inválido!...</p></div>');
			else if (array[27].value !=  array[28].value )
				$('.resp').html('<div class="erros"><p>As senhas não correspondem!...</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});

	$('input[name=nextE5]').click(function(){
		var array = formulario.serializeArray();
			if(array[29].value == '' || array[30].value == '' || array[31].value == '' || array[34].value == '' )
				$('.resp').html('<div class="erros"><p>Preencha todos dados do encarregado</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});

	$('input[name=validarEstudante]').click(function(evento){
		var array = formulario.serializeArray();
			if(array[35].value == '' || array[36].value == '' || array[41].value == '' || array[42].value == '' || array[43].value == '' || array[45].value == '' )
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Acadêmicos</p></div>');
			
			else if (!(/^\d{4}$/.test(array[36].value) && array[36].value >= 2009 && array[36].value <= new Date().getFullYear()))
				$('.resp').html('<div class="erros"><p>O ano de ingresso é inválido</p></div>');
			else if (!(/^\d{4}$/.test(array[42].value) && array[42].value >= 1975 && array[42].value <= new Date().getFullYear() - 1))
				$('.resp').html('<div class="erros"><p>O ano de conclusão do ensino médio é inválido</p></div>');
			else if (!(/^\d{2}$/.test(array[43].value) && array[43].value >= 10 && array[43].value <= 20))
				$('.resp').html('<div class="erros"><p>A nota de conclusão do ensino médio é inválido</p></div>');
			else{
				$.ajax({
					method: 'post',
					url: '../library/jp/validarEstudante.php',
					data: {cadEst:'cadastro', campos: array},
					beforeSend: function(){
						$('.resp').html('<div class = "erros"><p>Aguarde enquanto processamos seus dados</p></div>');
					},
					success: function(valor){
						$('.resp').html(valor);
					},
		                    	error:function(data) {
		                        	$('.resp').html('<div class = "erros"><p>Problema de conexão, tente novamente...</p></div>');
		                    	}
				});
			}
			$('html, body').animate({scrollTop: 0}, 1000);
		evento.preventDefault();
	});

	$('.selecionar').change(function(){
		if($(this).val() != ''){
			var selecionar = $(this).attr("id");
			var query = $(this).val();
			var result = '';
			if(selecionar == "pais"){
				result = 'provinciaEnc';distritoEsc
			} else if(selecionar == "provinciaEsc"){
				result = 'distritoEsc';
			} else if(selecionar == "provinciaEnc"){
				result = 'distritoEnc';
			} else if(selecionar == "nacionalidade"){
				result = 'provinciaNasc';
			} else if(selecionar == "provinciaNasc"){
				result = 'distritoNasc';
			} else if(selecionar == "provinciaTA"){
				result = 'distritoTA';
			} else if(selecionar == "provinciaTF"){
				result = 'distritoTF';
			} else if(selecionar == "distritoEsc"){
				result = 'escola';
			} else if(selecionar == "faculdade"){
				result = 'curso';
			}
			$.ajax({
				url:"../library/jp/validarEstudante.php",
				method:"POST",
				data:{selecionar:selecionar, query:query},
				beforeSend: function(){
					$('#'+result).html('<option class = "aguarde"><p>Carregando...</p></option>');
				},
				success:function(data){
					$('#'+result).html(data);
				},
	                    	error:function(data) {
	                        	$('#'+result).html('<option class = "aguarde"><p>Problema na conexão...</p></option>');
	                    	}
			});
		}
 	});



 	//Guirande 20-12-2018
 	
});

