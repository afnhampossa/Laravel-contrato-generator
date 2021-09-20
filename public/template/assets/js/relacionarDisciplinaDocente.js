$(function() {

	$('.selecionar').change(function() {

		if($(this).val() != ''){
			var selecionar = $(this).attr("id");
			var query = $(this).val();
			var idCurso = $('#curso').val();;
			var result = '';
			var nivel = $('#nivelDisc').val(), semestre =  getSemestre(nivel);
			if(selecionar == "curso"){
				result = 'disciplinaCurso';
			} else if(selecionar == "nivelDisc"){
				result = 'disciplinaCurso';
			}
			
			$.ajax({
				url:"../library/jp/validarDisciplinaDocente.php",
				method:"POST",
				data:{
					selecionar:selecionar, 
					idCurso:idCurso, 
					query:query, 
					nivel:nivel, 
					semestre:semestre
				},
				beforeSend: function(){
					$('#'+result).html('<option class = "aguarde"><p>Carregando...</p></option>');
				},
				success:function(data){
				console.log(data);
					$('#'+result).html(data);
				}
			});
		}
	});

	$('#nivelDiscSel').change(function() {
	    //  alert("Olaaa mundooooo");
		if($('#curso').val() != '' && $(this).val() != ''){
			var idCurso = $('#curso').val();
			var nivel = $('#nivelDiscSel').val(); var semestre =  getSemestre(nivel);
			$.ajax({
				url:"../library/jp/validarDisciplinaDocente.php",
				method:"POST",
				data:{
					selecionar:'nivelDiscSel', 
					idCurso:idCurso, 
					nivel:nivel, 
					semestre:semestre
				},
				beforeSend: function(){
					$('.resp').html('Processando Dados...').css({'display': 'block', 'z-index': '1'}).fadeIn('fast');
				}
			}).done(function(data){
				console.log("done "+data);
				$('#accordion').html(data).accordion('refresh');
				$('.resp').fadeOut('slow');
			}).fail(function(data){
				$('.resp').html('Processamento de Dados  falhou...').css({'display': 'block', 'z-index': '1'}).fadeIn('fast');
			}).always(function(data){
				$('.resp').delay(10000).fadeOut('slow');
			});;
		}else{
			$('.resp').html('Selecione um curso...').css({'display': 'block', 'z-index': '1'}).fadeIn('fast');
			$('.resp').delay(10000).fadeOut('slow');
		}
	});
 
	$('#salvar').click(function() {
		if($('#curso').val() != '' && $('#idDisciplina').val() != ''){
			var idCurso = $('#curso').val();
			var nivel = $('#nivelDisc').val(); var semestre =  getSemestre(nivel);
			var idDisciplina = $('#idDisciplina').val();
			var filtroDel = "DELETE FROM `leciona` WHERE idCurso = "+idCurso+" AND `idDiciplina` = "+idDisciplina+" AND `ano` = (SELECT  w.ano FROM temporada w where w.activo= 1);";
			var filtro = "( docente, "+idCurso+ ", " + idDisciplina + ", (SELECT  w.ano FROM temporada w where w.activo= 1), 'tipoDocente')";
			var valores = '';
			
			$('.checkDocSel').each(function(){
	 				filtro1 = filtro.replace('docente', $(this).val());
	 				filtro2 = filtro1.replace('tipoDocente', $(this).parent().parent().children(':last-child').children().children(':selected').val());
	 				
	 				valores += filtro2 + ', ';
	 		});
	 		console.log(valores)
	 		valores = valores.substring(0, valores.length - 2);
			var nivel = $('#nivelDiscSel').val(); var semestre =  getSemestre(nivel);
			$.ajax({
				url:"../library/jp/validarDisciplinaDocente.php",
				method:"POST",
				data:{
					selecionar:'salvar', 
					filtroDel:filtroDel, 
					valores:valores,
					nivel:nivel,
					semestre:semestre,
					idCurso:idCurso
				},
				beforeSend: function(){
					$('.resp').html('Processando dados...').css({'display': 'block', 'z-index': '1'});
				},
				success:function(data){
				//alert(data);
								console.log(data);
					if (!data) {
						$('.resp').html('Não foi possivel processar a informacao...').css({'display': 'block', 'z-index': '1'});
					} else {
						$('.resp').fadeOut('slow');
						$('#accordion').html(data).accordion('refresh');
					}
				}
			});
		}else{
			$('.resp').html('Verifique o curso e a cadeira a Relacionar...').css({'display': 'block', 'z-index': '1'}).fadeIn('fast');
			$('.resp').delay(10000).fadeOut('slow');
		}
	});

	$('.checkDocs').change(function(){
		$('.checkDocSel').prop('checked', $(this).prop("checked"));
 	});
	
 	$('.checkDocSel').change(function(){
 		if(false == $(this).prop("checked")){
 			$('.checkDocs').prop('checked', false);
 		}

 		if($('.checkDocSel:checked').length == $('checkDocSel').length ){
 			$('.checkDocs').prop('checked', true);
 		}
 	});

 	$('#disciplinaCurso').change(function() {
 		$('#idDisciplina').attr('value', $(this).val());
 		$('#nomeDisc').html('Docentes da Cadeira: ' + $('#disciplinaCurso option:selected').text());
 		$('#editarRelacao').empty();
 	});


	$("#adicionar").click(function() {
		var idDocente = $('#idDocenteLista').val();
		var nomeDocente = $('#idDocenteLista option:selected').text();
		var idTipoDocente = $('#idTipoDocenteLista').val();
		if (nomeDocente == 'Selecione o Docente') {
			$('.resp').html('selecione um docente para proceder...').css({'display': 'block', 'z-index': '1'}).fadeIn('fast');
			$('.resp').delay(10000).fadeOut('slow');
		} 
		else if ((new RegExp(nomeDocente)).test($('#editarRelacao')[0].innerHTML)) {
			$('.resp').html(nomeDocente + ' já foi adicionado, podes editar suas competencias...').css({'display': 'block', 'z-index': '1'}).fadeIn('fast');
			$('.resp').delay(10000).fadeOut('slow');
		} else {
			adicionarLinha(idDocente, nomeDocente, idTipoDocente);
		}
		
	});



	$('#remover').click(function() {
		removerLinha();
	});


	$("form").on('click', '.editar',function() {
		var parent = $(this).parent().parent('div');
		var head = parent.prev('h3');
		$('#idDisciplina').attr('value', head.attr('class').split(' ')[0]);
		$('#nomeDisc').html('Docentes da Cadeira: ' + head.text());
		$('#editarRelacao').empty();
		
		for (var i = $('.' + parent.attr('class').split(' ')[0] + ' tr').length - 1; i >= 0; i--) {
			var newRow = $('<tr>');
			var linha = $('.' + parent.attr('class').split(' ')[0] + ' tr')[i].innerHTML.replace(' style="display: none;"', '');
			newRow.append(criarSelect(linha.replace('checkDoc', 'checkDocSel')));
			$('#editarRelacao').append(newRow);
		}
	});


	$('form').on('click', '.remove', function() {
		if($('#curso').val() != ''){
			var parent = $(this).parent().parent('div');
			var head = parent.prev('h3');
			var nivel = $('#nivelDisc').val(); var semestre =  getSemestre(nivel);

			$.ajax({
				url:"../library/jp/validarDisciplinaDocente.php",
				method:"POST",
				data:{
					selecionar:'remover', 
					idDiciplina:head.attr('class').split(' ')[0],
					nivel:nivel,
					semestre:semestre,
					idCurso:$('#curso').val()
				},
				beforeSend: function(){
					$('.resp').html('Processando dados...').css({'display': 'block', 'z-index': '1'});;
				},
				success:function(data){
					if (!data) {
						$('.resp').html('Não foi possivel processar a informacao...').css({'display': 'block', 'z-index': '1'});
					} else {
						$('.resp').fadeOut('slow');
						$('#accordion').html(data).accordion('refresh');
					}
				}
			});
		} else {
			$('.resp').html('Selecione um curso para proceder a remoção...').css({'display': 'block', 'z-index': '1'}).fadeIn('fast');
			$('.resp').delay(10000).fadeOut('slow');
		}
/* 		codigo para remover u item do acordion
		parent.add(head).fadeOut('fast', function() {
			$(this).remove();
		});
*/
	});
});

function adicionarLinha(idDocente, nomeDocente, idTipoDocente) {
	var tb = document.getElementById("editarRelacao");
	var row =  tb.insertRow(-1);
	var cel0 = row.insertCell(0);
	var cel1 = row.insertCell(1);
	var cel2 = row.insertCell(2);
	cel0.innerHTML = "<input type='checkbox' class='checkDocSel' value='"+idDocente+"'>";
	cel1.appendChild(document.createTextNode(nomeDocente));
	var select = $('#idTipoDocenteLista').clone().removeAttr('id style')[0].innerHTML;
	console.log(select.replace(">"+$('#idTipoDocenteLista option:selected').text(), " selected>"+$('#idTipoDocenteLista option:selected').text()));
	cel2.innerHTML = '<select class="form-control">' + select.replace('<option value="">Tipo</option>', '').replace(">"+$('#idTipoDocenteLista option:selected').text(), " selected>"+$('#idTipoDocenteLista option:selected').text()) +'</select>';
	//$('#idTipoDocenteLista').clone().removeAttr('id style').appendTo(cel2);
	//$('#editarRelacao').find(':last-child select').removeAttr('id style');
	//$('#editarRelacao').find(':last-child option[value='+$('#idTipoDocenteLista').val()+']').prop('selected', true);
}

function removerLinha() {
	cklist = document.querySelectorAll(".checkDocSel:checked");
	cklist.forEach(function(linha) {
		linha.parentElement.parentElement.remove();
	});
}
function criarSelect(texto) {
		var text = texto.substring(texto.lastIndexOf('<td>') + 4, texto.lastIndexOf('</td>'))
		return texto.replace(text, '\n'+
'											<select class="form-control">\n'+
                                                $('#idTipoDocenteLista').clone().html()+
'                                            </select>').replace(">"+text, ' selected>'+text).replace('<option value="">Tipo</option>', '');
}

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