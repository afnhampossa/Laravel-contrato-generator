		var divMensagEst =$("#divMensagEst");
		var divMensagEst2 =$("#divMensagEst2");
	    var divMensagDisc =$("#divMensagDisc");
		var disciplinas =$("#tbDisciplinas");
		var tbEstudantes =$("#tbEstudantes");
		var formEstudantes =$("#formEstudantes");
		
		var inPesquisar =$("inPesquisar");
		
		
		function abilitarMensageErro(tipo,teste){
			posicao=$(document).scrollTop();
			largura = $(window).height()/2;
			altura = $(window).width()/2;
			top=(100 + $(document).scrollTop());

			left=200;
			if(tipo==0){
				corDeFundo = "#FF6347";
				
			}
			if(tipo==1){
				corDeFundo = "#adff2f";
				
			}
			if(tipo==-1){
				corDeFundo = "#FFD700";
				
			}
			$("#msgError").css({"border-width":"medium","border-style":"solid 2px","bolder-color":"#ff0","text-align":"center","border-radius":"5px"});
			$("#msgErrorTesto").html(teste);
			$("#msgError").css({position:"absolute","z-index":"1",background:corDeFundo,width:"300px", height:"30px","transform":"translate(-50%,-50%)","margin-left":"50%","margin-top":posicao+"px","box-shadow":"5px 5px 0 #C0C0C0"});
			$("#msgError").fadeIn(500);
			$("#msgError").fadeOut(2000);
		}
		
		
		function atualizarNotaText( campo){
			//console.log(campo.val());
			
			//console.log($(".linEstudante")[0]);
			codigo = campo.parent().parent().children("tbody :first-child")[0].innerHTML
			
			nota= campo.val();
			if(((nota>=0 )&&(nota<=20)) ||(nota==-1)) {
			
				curso=  $("#idc"+codigo).val();
				idEstudante =$("#idEst"+codigo).val();
				deee =$("#idd"+codigo).val();
			
				//alert(codigo+" c-"+ nota + " n-"+curso+" id-"+ idEstudante+" dd-"+disciplina);
			   // console.log(campo.val()+"-"+codigo);
				operacao = "nova_nota";
				
					$.ajax({
					method: 'post',
					url: '../library/jp/listaDisciplina2exec.php',
					data: {
								idDisciplina :deee, operacao : operacao,
								idCurso: curso, idFunc :funci, nota : nota, idEstudante : idEstudante
							},
				success: function(valor){
					//divMensagEst.show();
					//divMensagEst.fadeOut(1500);
					
					abilitarMensageErro(-1,"Inserido com sucesso ..");
					} 
		        });	
		     }else {
				
				divMensagEst2.show();
				divMensagEst2.fadeOut(1500);
				$("#tbEstudantes").ajax.reload();
			}
			
		};
		
		function atualizarEstudantePesquisa(campo){
			var linhas=$(".linDisciplina.active");
			param = campo.val();
			operacao = "atualizar_tabela";	
			deee=linhas.children("tbody :first-child")[0].innerHTML;//id disciplina
			idc=idccc; // variavel global console.log(idccc);
			$.ajax({
				method: 'post',
				url: '../library/jp/listaDisciplina2exec.php',
				data: {
					idDisciplina :deee, operacao : operacao,
					idCurso: idc, idFunc :funci, param : param
				},
				success: function(valor){
					
					$("#tbEstudantes tbody").html("");
					$("#tbEstudantes tbody").append(valor);
					$("#tbEstudantes").ajax.reload();
					
				}
		}); 	
		}


		function load_configuracao(){
			formEstudantes.css({display:"none"})
			divMensagEst.css({display:"none"});
			divMensagEst2.css({display:"none"});
			divMensagDisc.css({display:"none"});
			disciplinas.css({width:"100%"});
			tbEstudantes.css({width:"100%"});
		}
		function load_por_botao(botao){
            //$(".linEstudante")[0].addClass("active");
		  //  console.log($(".linEstudante")[0]);
			codigo = botao.parent().parent().children("tbody :first-child")[0].innerHTML
			
			nota= $("#"+codigo).val();
			if(((nota>=0 )&&(nota<=20)) ||(nota==-1)) {
			
				curso=  $("#idc"+codigo).val();
				idEstudante =$("#idEst"+codigo).val();
				deee =$("#idd"+codigo).val();
			
				//alert(codigo+" c-"+ nota + " n-"+curso+" id-"+ idEstudante+" dd-"+disciplina);
			
				operacao = "nova_nota";			
				$.ajax({
					method: 'post',
					url: '../library/jp/listaDisciplina2exec.php',
					data: {
								idDisciplina :deee, operacao : operacao,
								idCurso: curso, idFunc :funci, nota : nota, idEstudante : idEstudante
							},
				success: function(valor){
					divMensagEst.show();
					divMensagEst.fadeOut(1500);
					} 
		        });
			}else {
				
				divMensagEst2.show();
				divMensagEst2.fadeOut(1500);
				$("#tbEstudantes").ajax.reload();
			}
		}
		
		$(".seleciona").click( function(){

			var linhas=$(".linDisciplina");	
			disc= $(this).parent().parent().children("tbody :first-child")[0].innerHTML;
			
			linhas.removeClass("active");
			
			$(this).parent().parent().addClass("active");
			
			$("#tbEstudantes").attr("disc",disc);
			var curso =$(this).parent().parent().attr("idc");
            operacao = "atualizar_tabela";	
         //   alert(disc+"-"+curso);			
		$.ajax({
				method: 'post',
				url: '../library/jp/listaDisciplina2exec.php',
				data: {
					idDisciplina :disc, operacao : operacao,
					idCurso: curso, idFunc :funci
				},
				success: function(valor){
					
					$("#tbEstudantes tbody").html("");
					$("#tbEstudantes tbody").append(valor);
					$("#tbEstudantes").ajax.reload();
					//console.log(valor);	
				}
				
		    });
			abilitarMensageErro(-1,"Em processo ..");
			formEstudantes.css({display:"block"});
		      //  alert("olaaa");
		});
		
	