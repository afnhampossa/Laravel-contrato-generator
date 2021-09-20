$(function(){
	//funcoes para o primeiro formulario
	var idCurso, periodo, semestre, nivel;
	$('.selecionarLista').change(function(){
		$('.checkLista').prop('checked', $(this).prop("checked"));
 	});
	
 	$('.checkLista').change(function(){
 		if(false == $(this).prop("checked")){
 			$('.selecionarLista').prop('checked', false);
 		}

 		if($('.checkLista:checked').length == $('checkLista').length ){
 			$('.selecionarLista').prop('checked', true);
 		}
 	});

 	$('.pages').click(function(){
 		if ($('.pageActual').val() == 'Proximo') {
 			$('.page1').hide();
 			$('.page2').show();
 			$('.pages').html("<span id='pagina'>Mostrando página 2 de 2, </span><input type='button' class='pages btn btn-default' value='Anterior'/><input type='hidden' class='pageActual' value='Anterior'/>");
 		} else {
 			$('.page2').hide();
 			$('.page1').show();
 			$('.pages').html("<span id='pagina'>Mostrando página 1 de 2, </span><input type='button' class='pages btn btn-default' value='Proximo'/><input type='hidden' class='pageActual' value='Proximo'/>");
 		}
 	});

 	$('#nivel').change(function(){
 		var arraySel = [], filtroDisc = '', filtroDisc = '';
 		idCurso = $('.idCurso').val(); periodo = $('.periodo').val(); semestre = $('.semestre').val(); nivel = $('#nivel').val();
		
		$('.checkSel').each(function(){
 			arraySel.push($(this).val());
 		});
 		if (arraySel.length > 0) {
 			filtroDisc = 'AND disciplinas.idDiciplina ';
	 		for (var i = 0; i < arraySel.length - 1; i++) {
	 			filtroDisc += ' <> ' + arraySel[i] + '  AND disciplinas.idDiciplina ';
	 		}
	 		filtroDisc += ' <> ' + arraySel[arraySel.length - 1];
 		}
 		$.ajax({
				method: 'post',
				url: '../library/jp/validarInscricao.php',
				data: {
					validar:'nivel', filtroDisc : filtroDisc, 
					idCurso: idCurso, periodo:periodo, semestre: getSemestre(nivel), nivel: nivel
				},
				beforeSend: function(){
					$('.resp').html('<div class = "erros"><p>Processando Informação...</p></div>');
				},
				success: function(valor){
					var novaTabela = valor.split("||");
					$('.corpoDisc').html(novaTabela['0']);
				}

		});
 	});

 	$('.adicionar').click(function(){
 		if ($('.checkLista').is(":checked")) {
	 		var arrayLista = [], arraySel = [], filtroSel = 'AND ( disciplinas.idDiciplina ', filtroDisc = 'AND disciplinas.idDiciplina ';
	 		idCurso = $('.idCurso').val(); periodo = $('.periodo').val(); nivel = $('#nivel').val(); taxa = $('#taxa').val();
	 		$('.checkLista').each(function(){
	 			if ($(this).is(":checked")) {
	 				arrayLista.push($(this).val());
	 			}
	 		});
	 		$('.checkSel').each(function(){
	 			arraySel.push($(this).val());
	 		});
	 		if (arraySel.length + arrayLista.length > 12) {
	 			alert('O número de cadeiras a se inscrever, deve ser inferior ou igual a 12');
	 		} else {
		 		arraySel = arraySel.concat(arrayLista);
		 		for (var i = 0; i < arraySel.length - 1; i++) {
		 			filtroSel += ' = ' + arraySel[i] + '  OR disciplinas.idDiciplina ';
		 			filtroDisc += ' <> ' + arraySel[i] + '  AND disciplinas.idDiciplina ';
		 		}
		 		filtroSel += ' = ' + arraySel[arraySel.length - 1] + ' )';
		 		filtroDisc += ' <> ' + arraySel[arraySel.length - 1];
		 		$.ajax({
						method: 'post',
						url: '../library/jp/validarInscricao.php',
						data: {
							validar:'adicionar', filtroSel: filtroSel, filtroDisc : filtroDisc, 
							idCurso: idCurso, periodo:periodo, semestre: getSemestre(nivel), nivel: nivel, taxa: taxa
						},
						beforeSend: function(){
							$('.resp').html('<div class = "erros"><p>Processando Informação...</p></div>');
						},
						success: function(valor){
							console.log(valor);
							var novaTabela = valor.split("||");
							$('.corpoDisc').html(novaTabela['0']);
							$('.corpoSel').html(novaTabela['1']);
							$('.footerSel').html(novaTabela['2']);
							if (/page2/.test(novaTabela['1'])) {
								//$('.accoes').html("<input type='button' class='btn btn-danger delete-object remover' value='Remover'/> <input type='button' name='inscrever' class='btn btn-info inscrever' value='Inscrever'/>");
								$('.pages').html("<span id='pagina'>Mostrando página 1 de 2, </span><input type='button' class='pages btn btn-default' value='Proximo'/><input type='hidden' class='pageActual' value='Proximo'/>");
							} else if (/page1/.test(novaTabela['1'])){
								//$('.accoes').html("<input type='button' class='btn btn-danger delete-object remover' value='Remover'/> <input type='button' name='inscrever' class='btn btn-info inscrever' value='Inscrever'/>");
								$('.pages').html("<span id='pagina'>Mostrando página 1 de 1</span>");
							} else {
								//$('.accoes').html('');
								$('.pages').html("<span id='pagina'>Nenhuma cadeira foi selecionada</span>");
							}
						}
				});
			}
		} else {
			alert('selecione uma cadeira para proceder a Inscricao');
		}
 	});

 	$('#taxa').change(function(){
 		var arraySel = [], filtroSel = 'AND ( disciplinas.idDiciplina ';
 		idCurso = $('.idCurso').val(); taxa = $('#taxa').val();

 		$('.checkSel').each(function(){
 			arraySel.push($(this).val());
 		});
 		for (var i = 0; i < arraySel.length - 1; i++) {
 			filtroSel += ' = ' + arraySel[i] + '  OR disciplinas.idDiciplina ';
 		}
 		filtroSel += ' = ' + arraySel[arraySel.length - 1] + ' )';

 		$.ajax({
				method: 'post',
				url: '../library/jp/validarInscricao.php',
				data: {
					validar:'taxa', filtroSel: filtroSel,
					idCurso: idCurso, taxa: taxa
				},
				beforeSend: function(){
					$('.resp').html('<div class = "erros"><p>Processando Informação...</p></div>');
				},
				success: function(valor){
					var novaTabela = valor.split("||");
					$('.corpoSel').html(novaTabela['0']);
					$('.footerSel').html(novaTabela['1']);
					if (/page2/.test(novaTabela['0'])) {
						//$('.accoes').html("<input type='button' class='btn btn-danger delete-object remover' value='Remover'/> <input type='button' name='inscrever' class='btn btn-info inscrever' value='Inscrever'/>");
						$('.pages').html("<span id='pagina'>Mostrando página 1 de 2, </span><input type='button' class='pages btn btn-default' value='Proximo'/><input type='hidden' class='pageActual' value='Proximo'/>");
					} else if (/page1/.test(novaTabela['1'])){
						//$('.accoes').html("<input type='button' class='btn btn-danger delete-object remover' value='Remover'/> <input type='button' name='inscrever' class='btn btn-info inscrever' value='Inscrever'/>");
						$('.pages').html("<span id='pagina'>Mostrando página 1 de 1</span>");
					} else {
						//$('.accoes').html('');
						$('.pages').html("<span id='pagina'>Nenhuma cadeira foi selecionada</span>");
					}
				}
		});
 	});
 	$('.remover').click(function(){
 		if ($('.checkSel').is(":checked")) {
	 		var arraySel = [], filtroSel = 'AND ( disciplinas.idDiciplina ', filtroDisc = 'AND disciplinas.idDiciplina ';
	 		idCurso = $('.idCurso').val(); periodo = $('.periodo').val(); nivel = $('#nivel').val(); var taxa = $('#taxa').val();
	 		
	 		$('.checkSel').each(function(){
	 		     //   console.log('tem..'+$(this).val());    
	 			if (!$(this).is(":checked")) {
	 				arraySel.push($(this).val());
	 			//	console.log('meteu..');
	 			}
	 		});
	 	//	console.log('entraram..'+arraySel.length);
	 		if (arraySel.length > 0) {
	 		
		 		for (var i = 0; i < arraySel.length - 1; i++) {
		 		        console.log(arraySel[i] +'*');
		 			filtroSel += ' = ' + arraySel[i] + '  OR disciplinas.idDiciplina ';
		 			filtroDisc += ' <> ' + arraySel[i] + '  AND disciplinas.idDiciplina ';
		 		}
		 		filtroSel += ' = ' + arraySel[arraySel.length - 1] + ' )';
		 		filtroDisc += ' <> ' + arraySel[arraySel.length - 1];
	 		} else {
	 			filtroSel = 'AND ( disciplinas.idDiciplina = 0 )'; 
	 			filtroDisc = '';
	 		}
	 		var semestre = $("#semestree").val();
		        var ano = $("#idanoo").val();
	 		
	 		//alert('c '+idCurso+' p '+periodo+' s '+ getSemestre(nivel)+' n '+nivel+' t '+taxa+' f '+filtroSel+' f_ '+filtroDisc);
	 		
	 		$.ajax({
					method: 'post',
					url: '../library/jp/validarInscricao.php',
					data: {
						validar:'remover', filtroSel: filtroSel, filtroDisc : filtroDisc, 
						idCurso: idCurso, periodo:periodo, semestre: getSemestre(nivel), nivel: nivel, taxa: taxa
					},
					beforeSend: function(){
						$('.resp').html('<div class = "erros"><p>Processando Informação...</p></div>');
					},
					success: function(valor){
					//console.log('valor : '+valor);
					
					
					
						var novaTabela = valor.split("||");
						$('.corpoDisc').html(novaTabela['0']);
						$('.corpoSel').html(novaTabela['1']);
						$('.footerSel').html(novaTabela['2']);
						if (/page2/.test(novaTabela['1'])) {
							//$('.accoes').html("<input type='button' class='btn btn-danger delete-object remover' value='Remover'/> <input type='button' name='inscrever' class='btn btn-info inscrever' value='Inscrever'/>");
							$('.pages').html("<span id='pagina'>Mostrando página 1 de 2, </span><input type='button' class='pages btn btn-default' value='Proximo'/><input type='hidden' class='pageActual' value='Proximo'/>");
						} else if (/page1/.test(novaTabela['1'])){
							//$('.accoes').html("<input type='button' class='btn btn-danger delete-object remover' value='Remover'/> <input type='button' name='inscrever' class='btn btn-info inscrever' value='Inscrever'/>");
							$('.pages').html("<span id='pagina'>Mostrando página 1 de 1</span>");
						} else {
							//$('.accoes').html('');
							$('.pages').html("<span id='pagina'>Nenhuma cadeira foi selecionada</span>");
						}
						
					}
			}); 
		} else {
			alert('selecione uma cadeira para proceder a Remoção');
		}
 	});

 	$('.inscrever').click(function(){
		var semestre = $("#semestree").val();
		var ano = $("#idanoo").val();
		//alert(ano+'-'+semestre+'-'+$("#idanoo").val()+'-'+$("#semestree").val());
		
		idCurso = $('.idCurso').val(); idEstudante = $('.idEstudante').val(); idFunc = $('.idFunc').val();  var taxa = $('#taxa').val(); var nroRecibo = $('#nroRecibo').val();
 		if (nroRecibo != '') {
	 		var arraySel = [], valores = '', filtroInicial = "('"+idEstudante+"', '"+idCurso+"', '", filtroDel = 'DELETE FROM `discafazer` WHERE idEstudante = '+idEstudante+' AND idCurso = '+idCurso+' AND ano = '+ano+' AND semestre = '+semestre+';';
	 		if (idFunc == 0) {
	 			filtroFinal = "', '"+ano+"', SYSDATE(), 0, taxa, 0, "+semestre+", "+taxa+", '"+nroRecibo+"' )";
	 		} else {
	 			filtroFinal = "', '"+ano+"', SYSDATE(), '"+idFunc+"', taxa, 1, "+semestre+", "+taxa+", '"+nroRecibo+"' )";
	 		}
	 		$('.checkSel').each(function(){
	 			arraySel.push($(this).val());
	 		});
	 		
	 		//alert('ano-'+ano+'-sem-'+semestre+'-taxa-'+taxa+'-recibo-'+nroRecibo+'-fun-'+idFunc+'-est-'+idEstudante+'-curso-'+idCurso);
	 		//console.log('ano-'+ano+'-sem-'+semestre+'-taxa-'+taxa+'-recibo-'+nroRecibo+'-fun-'+idFunc+'-est-'+idEstudante+'-curso-'+idCurso);
	 		if (arraySel.length > 0) {
		 		for (var i = 0; i < arraySel.length - 1; i++) {
		 			valores += filtroInicial + arraySel[i] + filtroFinal + ", ";
		 		}
		 		valores += filtroInicial + arraySel[arraySel.length - 1] + filtroFinal;
		 		$.ajax({
						method: 'post',
						url: '../library/jp/validarInscricao.php',
						data: {
							validar:'inscrever', valores: valores, filtroDel:filtroDel , taxa: taxa, idEstudante:idEstudante
						},
						beforeSend: function(){
							$('.resp').html('<div class = "erros"><p>Processando Informação...</p></div>');
						},
						success: function(valor){
							if (/true/.test(valor)){
								if (idFunc != 0){
									alert('Inscrição efectuada com sucesso');
									window.location.href = "lista_estudante_inscricao.php";
								} else {
									alert('O seu pedido de Inscrição foi efectuada com sucesso');
									window.location.href = "listaCadeirasInscricao.php";
								}
							} else {
								alert('Não foi possível efectuar a Inscrição...');
							}
						}
				});
			} else {
				alert('Selecione cadeiras e adiciona para proceder a inscrição');
			}
		} else {
			alert('Preencha o campo Número do recibo');
		}
		
		
 	});
 	//funcoes para segundo formulario
 	$('.selecionarSel').change(function(){
		$('.checkSel').prop('checked', $(this).prop("checked"));
 	}); 

 	$('.checkSel').change(function(){
 		if(false == $(this).prop("checked")){
 			$('.selecionarSel').prop('checked', false);
 		}

 		if($('.checkSel:checked').length == $('checkSel').length ){
 			$('.selecionarSel').prop('checked', true);
 		}
 	});


});

function functionConfirm(msg, myYes, myNo) {
    var confirmBox = $("#confirm");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes,.no").unbind().click(function() {
       confirmBox.hide();
    });
    confirmBox.find(".yes").click(myYes);
    confirmBox.find(".no").click(myNo);
    confirmBox.show();
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