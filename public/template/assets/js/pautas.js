$(function(){
	$(".print").on('click', function() {
        //Print ele4 with custom options

        $(".pauta"+$(this).attr('name')).print({
            globalStyles : false,
            mediaPrint : false,
            stylesheet : "",
            iframe : false,
            noPrintSelector : ".avoid-this"
        }); 
    }); 
	$('.selecionar').change(function() {
	    //alert('Pautas-'+$("#aano").val()+'-'+$("#ssem").val());
	    pauta = $(this).attr('name');
            $('[name="'+pauta+'"]').fadeIn('slow');
            $('#pauta'+pauta).fadeIn('slow');
		if($(this).val() == ''){
			$('#pauta'+pauta).html(' ');
		}else{
			
			idTipo =$(this).children('option:selected').attr('idTipo');
			$.ajax({
					url:"../library/jp/validarPautas.php",
					method:"POST",
					data:{
						selecionar:'pauta', 
						idCurso: $(this).children('option:selected').attr('idCurso'),
						idDisciplina: $(this).children('option:selected').attr('idDisc') , 
						curso: $(this).children('option:selected').attr('curso') + ( $(this).children('option:selected').attr('lab') == 1 ? " ( Laboral )" : " ( Pós-Laboral )"),
						departamento: $(this).children('option:selected').attr('curso'),
						nivel: $(this).children('option:selected').attr('niv'),
						semestre: $(this).children('option:selected').attr('sem') % 2 == 0 ? 2: 1,
						semestreDisc: $(this).children('option:selected').attr('sem'),
						disciplina: $(this).children('option:selected').attr('nomeDisc'), 
						tipoPauta: pauta,
						idTipo: idTipo,
						idTeste: $(this).val(),
						nomeTeste: $(this).children('option:selected').html(),
						ano:$("#aano").val(),
						semestre:$("#ssem").val()
					},
					beforeSend: function () {
						mensagem_processamento('A processar...',1) ;  
            					$("#msgError").css({display:"block"});
					},
					success:function(data){
					        $("#msgError").css({display:"none"});
						console.log(data)
						if (pauta != 'Testes') {
							$('.pauta'+pauta).html(data);
							console.log(11);
						} else {
							$('#pauta'+pauta).html(data);
							console.log(22);
						}
					}
				});
		}
	});
    $('.teste').change(function() {
		console.log('Aquii teste');
        $('[name="'+$(this).attr('name')+'"]').fadeIn('slow');
        pauta = $(this).attr('name');
		
        $.ajax({
                url:"../library/jp/validarPautas.php",
                method:"POST",
                data:{
                    selecionar:'pauta', 
                    idCurso: $(this).children('option:selected').attr('idCurso'),
                    idDisciplina: $(this).val(), 
                    curso: $(this).children('option:selected').attr('curso') + ( $(this).children('option:selected').attr('lab') == 1 ? " ( Laboral )" : " ( Pós-Laboral )"),
                    departamento: $(this).children('option:selected').attr('curso'),
                    nivel: $(this).children('option:selected').attr('niv'),
                    semestre: $(this).children('option:selected').attr('sem') % 2 == 0 ? 2: 1,
                    semestreDisc: $(this).children('option:selected').attr('sem'),
                    disciplina: $(this).children('option:selected').text(),
                    tipoPauta: $(this).attr('name'),
                    idTeste: 3
                },
                beforeSend: function () {
                    console.log('aleluia');
                   // alert('ollll');
                },
                success:function(data){
                    console.log(data);
                    $('.pauta'+pauta).html(data);
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