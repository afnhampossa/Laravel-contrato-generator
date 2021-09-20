$(function(){
	
	var atual_fs, next_fs, prev_fs;
	var formulario = $('form[name="formulario"]');
	
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
        $('.resp').html('');
        next($(this));
    });

	//accoes para estudante
	$('input[name=nextE1]').click(function(){
		var array = formulario.serializeArray();
			if(array[0].value == '' || array[1].value == '' || array[2].value == '' || array[3].value == '' || array[4].value == '' || array[5].value == '' )
				$('.resp').html('<div class="erros"><p>Preencha todos dados Pessoais</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});

	$('input[name=nextE2]').click(function(){
		var array = formulario.serializeArray();
			if(array[8].value == '' || array[9].value == '' || array[10].value == '' || array[11].value == '' || array[12].value == '' || array[13].value == '')
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Identificação Civil</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});

	$('input[name=nextE3]').click(function(){
		var array = formulario.serializeArray();
		if(array[14].value == '' || array[15].value == '' || array[16].value == '' || array[19].value == '' || array[20].value == '' || array[21].value == '')
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Informação Residencial</p></div>');
		else{
			$('.resp').html('');
			next($(this));
		}
	});

	$('input[name=nextE4]').click(function(){
		var array = formulario.serializeArray();
			if(array[24].value == '' || array[25].value == '' )
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Contacto</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});

	$('input[name=nextE5]').click(function(){
		var array = formulario.serializeArray();
			if(array[27].value == '' || array[28].value == '' || array[29].value == '' || array[32].value == '' )
				$('.resp').html('<div class="erros"><p>Preencha todos dados do encarregado</p></div>');
			else{
				$('.resp').html('');
				next($(this));
			}
	});

	$('button[name=actualizarEstudante]').click(function(evento){
		var array = formulario.serializeArray();
			if(array[33].value == '' || array[34].value == '' || array[36].value == '' || array[37].value == '' || array[38].value == '' || array[39].value == '' || array[40].value == '' || array[41].value == '' || array[42].value == ''  || array[43].value == '')
				$('.resp').html('<div class="erros"><p>Preencha todos dados de Acadêmicos</p></div>');
			else{
				$.ajax({
					method: 'post',
					url: '../library/jp/validarEstudante.php',
					data: {cadEst:'actualizar', campos: array},
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
				}
			});
		}
 	});
});