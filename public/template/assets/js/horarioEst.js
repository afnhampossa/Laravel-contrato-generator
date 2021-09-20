$(function() {
	$('.selecionar').change(function() {
		if($(this).val() != ''){
			var selecionar = $(this).attr("id");
			var idCurso = $(this).children(':selected').attr("idCurso");
			var nivel = $(this).val(), semestre =  getSemestre(nivel);
			var periodo = getTempo(nivel, $(this).children(':selected').attr('periodo'));
			var idDisciplina = $(this).children(':selected').attr('filtroDisc');

			$.ajax({
				url:"../library/jp/validarHorario.php",
				method:"POST",
				data:{
					selecionar:selecionar, 
					idCurso:idCurso, 
					nivel:nivel, 
					semestre:semestre,
					idperiodo: periodo,
					idDisciplina: idDisciplina,
					ano: 2018
				},
				beforeSend: function(){
					//$('.'+result).html('<option class = "aguarde"><p>Carregando...</p></option>');
					console.log({
					selecionar:selecionar, 
					idCurso:idCurso, 
					nivel:nivel, 
					semestre:semestre,
					idperiodo: periodo,
					idDisciplina: idDisciplina,
					ano: 2018
				})
				},
				success:function(data){
					var dados = data.split('||');
					console.log(data);
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
		}else {
			$('td').removeAttr('idDisciplina').removeAttr('rowspan').removeAttr('style').removeAttr('title').css('height', '40px').text('');
		}
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
 	if (periodo == 'Laboral') {
 		return nivel%2 == 0 ? 2 : 1;
 	} else {
 		return 3;
 	}
 }