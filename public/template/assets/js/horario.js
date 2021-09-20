$(function() {
	$('.selecionar').change(function() {
		if($(this).val() != '' && $(this).attr("id") != 'cursos'){
			var selecionar = $(this).attr("id");
			var query = $(this).val();
			var idCurso = $(this).attr("idCurso");
			var nivel = $('#nivelDiscHorario').val(), semestre =  getSemestre(nivel);
			var result = 'disciplinaCurso';
			var periodo = getTempo(nivel, $(this).attr('periodo'));
			$('.salvar').attr({'periodo': periodo, 'idCurso': idCurso});

			$.ajax({
				url:"../library/jp/validarHorario.php",
				method:"POST",
				data:{
					selecionar:selecionar, 
					idCurso:idCurso, 
					query:query, 
					nivel:nivel, 
					semestre:semestre,
					idperiodo: periodo,
					idDisciplina: $('#nivelDiscHorario option:selected').attr('filtroDisc'),
					ano: 2018
				},
				beforeSend: function(){
					$('.'+result).html('<option class = "aguarde"><p>Carregando...</p></option>');
				},
				success:function(data){
					var dados = data.split('||');
					console.log(dados[0]);
					$('.'+result).html(dados[0]);
					for (var i = 1, j = 1; i < 7; i++, j+=3) {
						$('tr[tempo='+i+'] :first-child').html(dados[j+1] + ' - ' + dados[j+2] );
					}

					$('[tempo] [dia]').removeAttr('idDisciplina').removeAttr('rowspan').removeAttr('title').removeAttr('style').css("height","40px").text('');
					
					for (var i = 19, j = 1; i < dados.length - 5; i+=6) {
						var tempo =  parseInt(dados[i+1]), dia = parseInt(dados[i]), repeticao = parseInt(dados[i+2]);
						$('[tempo='+tempo+'] [dia='+dia+']').attr({'rowspan': repeticao, 'idDisciplina': dados[i+3], 'title': dados[i+4]}).text(dados[i+5]);

						for (var k = tempo + 1; k <= tempo + repeticao - 1; k++) {
							$('[tempo='+k+'] [dia='+dia+']').css('display', 'none');
						}
					}
				},
				error: function(data) {
					alert(data);
					console.log(data);
				}
			});
		}else if($(this).val() != ''){
			console.log($(this).children('option:selected').attr('periodo').length);
			$('#nivelDiscHorario').attr({'idCurso': $(this).val(), 'periodo': $(this).children('option:selected').attr('periodo')});
			$('#nivelDiscHorario').css('display', 'inline-block');
			$.ajax({
				url:"../library/jp/validarHorario.php",
				method:"POST",
				data:{
					selecionar:'curso', 
					idCurso: $(this).val(),
					semestre: (new Date()).getMonth() < 6 ? 1 : 2
				},
				beforeSend: function(){
					$('#nivelDiscHorario').html('<option class = "aguarde"><p>Carregando...</p></option>');
				},
				success:function(data){
					console.log(data);
					$('#nivelDiscHorario').html(data);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}else{
			$('#nivelDiscHorario').css('display', 'none');
		}
	});

	$('td[dia]').click(function() {
		$('.t').attr({'dia': $(this).attr('dia'), 'tempo': $(this).parent().attr('tempo')});
		$('td[dia]').css('background-color', 'white');
		$(this).text('').css('background-color', '#cccccc69');
		$(this).removeAttr('idDisciplina').removeAttr('title');
		$('.dt').attr('restantes', $(this).parent().parent().children().length - parseInt($(this).parent().attr('tempo')) + 1)
	});

	$('.dt').change(function() {
		if (parseInt($(this).attr('restantes')) >= parseInt($(this).val())) {
			var anterior = parseInt($('[tempo='+$(this).attr('tempo')+'] [dia='+$(this).attr('dia')+']').attr('rowspan'));
			var atual = parseInt($(this).val());

			$('[tempo='+$(this).attr('tempo')+'] [dia='+$(this).attr('dia')+']').attr('rowspan', $(this).val())
			
			for (var i = parseInt($(this).attr('tempo')) + 1; i < parseInt($(this).attr('tempo')) + parseInt($(this).val()); i++) {
				$('[tempo='+i+'] [dia='+$(this).attr('dia')+']').css('display', 'none');
				if (parseInt($('[tempo='+i+'] [dia='+$(this).attr('dia')+']').attr('rowspan')) > 1 || parseInt($('[tempo='+i+'] [dia='+$(this).attr('dia')+']').attr('idDisciplina')) != '') {
					var repeticao = parseInt($('[tempo='+i+'] [dia='+$(this).attr('dia')+']').attr('rowspan'));
					$('[tempo='+i+'] [dia='+$(this).attr('dia')+']').removeAttr('rowspan').removeAttr('idDisciplina').removeAttr('title').removeAttr('style').css({"height":"40px", 'display': 'none'}).text('');
					for (var k = i + 1; k < i + repeticao; k++) {
						$('[tempo='+k+'] [dia='+$(this).attr('dia')+']').removeAttr('style').css("height","40px");
					}
				}
			}

			for (var i = parseInt($(this).attr('tempo')) + atual; i < parseInt($(this).attr('tempo')) + anterior; i++) {
				$('[tempo='+i+'] [dia='+$(this).attr('dia')+']').removeAttr('style').css("height","40px");
			}
		} else {
			console.log('excedeu o limite');
		}
		
	});

	$('.disciplinaCurso').change(function() {
		$('[tempo='+$(this).attr('tempo')+'] [dia='+$(this).attr('dia')+']').text($(this).children('option:selected').text()).attr({'idDisciplina': $(this).val(), 'title': $(this).children('option:selected').attr('title')});
	});

	$('.salvar').click(function() {
		var idCurso = $(this).attr('idCurso'), periodo = $(this).attr('periodo'), ano = (new Date()).getFullYear();
		var filtro = '( ' + idCurso + ', ' + periodo + ', ' + ano;

		var values = '', idDisciplina = '( ';

		$('td[idDisciplina]').each(function() {
			values += filtro  + ', ' +  $(this).attr('idDisciplina')  + ', ' + $(this).attr('dia')  + ', ' + $(this).parent().attr('tempo')  + ', ' + (parseInt($(this).attr('rowspan')) >= 1 ? $(this).attr('rowspan') : 1)  + ' ), ';
		});
		values = values.substring(0, values.length -2);

		$.ajax({
			url:"../library/jp/validarHorario.php",
			method:"POST",
			data:{
				selecionar:'salvar', 
				valores:values,
				idCurso: idCurso,
				idDisciplina: $('#nivelDiscHorario option:selected').attr('filtroDisc'),
				periodo: periodo,
				ano: ano
			},
			beforeSend: function(){
				//$('.'+result).html('<option class = "aguarde"><p>Carregando...</p></option>');
			},
			success:function(data){
				console.log(data);
			},
			error: function(data) {
				console.log(data);
			}
		});
	});
});


function getSemestre(nivel){
 	var mes = new Date();
 	mes = mes.getMonth() + 1;
 	if (nivel == 1) {
		if (mes > 6) {
			semestre = 2;
		} else {
			semestre = 1;
		}
	} else if (nivel == 2){
		if (mes > 6) {
			semestre = 4;
		} else {
			semestre = 3;
		}
	} else if (nivel == 3){
		if (mes > 6) {
			semestre = 6;
		} else {
			semestre = 5;
		}
	} else if (nivel == 4){
		if (mes > 6) {
			semestre = 8;
		} else {
			semestre = 7;
		}
	} else {
		semestre = 9;
	}
	return semestre;
 }

 function getTempo(nivel, periodo){
 	console.log(periodo);
 	if (periodo == 'Laboral') {
 		return nivel%2 == 0 ? 2 : 1;
 	} else {
 		return 3;
 	}
 }