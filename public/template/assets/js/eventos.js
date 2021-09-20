$(function() {
	$('.selecionar').change(function(){
	//alert('estudante - enviu..');
		if($(this).val() != ''){
			var selecionar = $(this).attr("id");
			var query = $(this).val();
			var idCurso;
			var result = '';
			var nivel = 1, semestre =  getSemestre(nivel);
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
			} else if(selecionar == "faculdadeCD"){
				result = 'cursoD';
			} else if(selecionar == "faculdadeTot"){
				result = 'cursoTot';
			}  else if(selecionar == "cursoD"){
				result = 'disciplinaCurso';
				if ($('#nivelDisc').val() != '') {
					var nivel = $('#nivelDisc').val(), semestre =  getSemestre(nivel);
				}
			} else if(selecionar == "nivelDisc"){
				result = 'disciplinaCurso';
				idCurso = $('#cursoD').val();
				var nivel = $('#nivelDisc').val(), semestre =  getSemestre(nivel);
			}   else if(selecionar == "cursoDRA"){
				result = 'disciplinaCurso';
				if ($('#nivelDisc').val() != '') {
					nivel = $('#nivelDiscRA').val(); semestre =  getSemestre(nivel);
				}
			} else if(selecionar == "nivelDiscRA"){
				result = 'disciplinaCurso';
				idCurso = $('#cursoDRA').val();
				var nivel = $(this).val(), semestre =  getSemestre(nivel);
			} 
			
			$.ajax({
				url:"../library/jp/validarEventos.php",
				method:"POST",
				data:{selecionar:selecionar, idCurso:idCurso, query:query, nivel:nivel, semestre:semestre},
				beforeSend: function(){
					$('#'+result).html('<option class = "aguarde"><p>Carregando...</p></option>');
				},
				success:function(data){
					$('#'+result).html(data);
				}
			});
		}
 	});
 	$('.selecionarRA').change(function() {
 	//alert('gooooo');
 		if ($(this).val() != '') {
 			var indice = $(this).attr("indice"), fonte = $(this).attr("source"), destino = $(this).attr("destino");
 			var selecionar = fonte;
			var idCurso = $('[source=cursoDRA][indice='+indice+']').val();
			var result = $('[source='+destino+'][indice='+indice+']');
			var nivel = $('[source=nivelDiscRA][indice='+indice+']').val(), semestre =  getSemestre(nivel);
				//console.log(idCurso + ' ' + result +' '+nivel+' '+selecionar);
			$.ajax({
				url:"../library/jp/validarEventos.php",
				method:"POST",
				data:{selecionar:selecionar, idCurso:idCurso, nivel:nivel, semestre:semestre},
				beforeSend: function(){
					result.html('<option class = "aguarde"><p>Carregando...</p></option>');
				},
				success:function(data){
					result.html(data);
					//console.log(data);
				},
				error:function(erro){
					//console.log(erro);
					result.html('Ocorreu um erro ao carregar');
				}
			});
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