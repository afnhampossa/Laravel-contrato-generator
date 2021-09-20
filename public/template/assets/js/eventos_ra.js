$(function() {
	$('.selecionar').change(function(){
	//alert('eventos..');
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
				   //alert(indice);
				       mensagem_processamento('A processar',1);
				      $("#msgError").css({display:"block"});
				  // $("#msgError").fadeToggle(4000);
				        
					$('#'+result).html('<option class = "aguarde"><p>Carregando...</p></option>');
				},
				success:function(data){
				        $("#msgError").css({display:"none"});
					$('#'+result).html(data);
				
				}
			});
		}
 	});
 	$('.selecionarRA').change(function() {
 		if ($(this).val() != '') {
 			var indice = $(this).attr("indice"), fonte = $(this).attr("source"), destino = $(this).attr("destino");
 			var selecionar = fonte;
			var idCurso = $('[source=cursoDRA][indice='+indice+']').val();
			var result = $('[source='+destino+'][indice='+indice+']');
			var nivel = $('[source=nivelDiscRA][indice='+indice+']').val(), semestre =  getSemestre(nivel);
			var aAno = $('[source=aAno][indice='+indice+']').val();
			var aSem = $('[source=aSem][indice='+indice+']').val();
			var facul = $('[source=facDRA][indice='+indice+']').val();
			var disc = $('[source=disciplinaCurso][indice='+indice+']');
			
			//if(fonte=='facDRA') selecionar ="carregar_curso";
			//alert('indice'+indice+'-sele-'+selecionar+'-curso-'+idCurso+'-result-'+result+' nivel '+nivel+' ano '+aAno+' sem '+aSem+' fac-'+ facul);
				//console.log(idCurso + ' ' + result +' '+nivel+' '+selecionar);
			$.ajax({
				url:"../library/jp/validarEventos.php",
				method:"POST",
				data:{selecionar:selecionar, idCurso:idCurso, nivel:nivel, semestre:aSem, ano:aAno, facul:facul},
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
 	$('.selecionarRA1').change(function() {
 	    var indice = $(this).attr("indice"), fonte = $(this).attr("source"), destino = $(this).attr("destino");
 	    var idCurso = $('[source=cursoDRA][indice='+indice+']').val();
 	    var facul = $('[source=facDRA][indice='+indice+']').val();
 	    
 	    var result= $('[source=cursoDRA][indice='+indice+']');

 	    $.ajax({
				url:"../library/jp/validarEventos.php",
				method:"POST",
				data:{selecionar:'carregar_curso', idCurso:idCurso, facul:facul},
				beforeSend: function(){
					//result.html('<option class = "aguarde"><p>Carregando...</p></option>');
					$('[source=cursoDRA][indice='+indice+']').html('<option class = "aguarde"><p>Carregando...</p></option>');
				},
				success:function(data){
					//result.html(data);
					$('[source=cursoDRA][indice='+indice+']').html(data);
					console.log(data);
				},
				error:function(erro){
					//console.log(erro);
					result.html('Ocorreu um erro ao carregar');
				}
		   });

 	   
 	});
 	
});

function mensagem_processamento(tteste,tipo) {

    posicao = $(document).scrollTop();
    largura = $(window).height() / 2;
    altura = $(window).width() / 2;
    top = (300 + $(document).scrollTop());
    left = 200;
 
    corDeFundo =''; 
    url__ ='';
    if(tipo==0) {
        corDeFundo="#7EC0EE"; // azul  1E90FF  #1C86EE  #1874CD  #7EC0EE 
        url__ ="../img/icone/icon6_.png" ;
    } 
    if(tipo==1){
        corDeFundo="#FFC125"; // amarela  #FFC125  #EEB422  #CD950C  #EEAD0E
        url__ ="../img/icone/icon3_1.png" ;  
    }
    if(tipo==2){
        tteste = 'Sucesso ...';
        corDeFundo="#43CD80";// verde   #7CCD7C, #00CD66
        url__ ="../img/icone/icon2_.png" ;
    }
    $("#msgErrorIMG").attr('src',url__);
    $("#msgError").css({"border-width": "medium", "border-style": "solid 2px", "bolder-color": "#ff0", "text-align": "center", "border-radius": "5px"});
    $("#msgErrorTesto").css({color:"white","Font-size":10});
    $("#msgErrorTesto").html(tteste);
    $("#msgError").attr('z-index','1');
    $("#msgError").css({position: "absolute", "z-index": "1", background: corDeFundo, width: "300px", height: "30px", "transform": "translate(-50%,-50%)", "margin-left": "50%", "margin-top": posicao + "px", "box-shadow": "5px 5px 0 #C0C0C0"});
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