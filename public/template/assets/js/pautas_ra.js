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
	
	var indice = $(this).attr("indice");
	var ano= $('[source=aAno][indice='+indice+']').val();
	//alert("pautas selsx-"+ ano);
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
						ano:ano,
						nomeTeste: $(this).children('option:selected').html()
						
					},
					beforeSend: function () {
						
						// console.log('aleluiaaaa'+idTipo);
					},
					success:function(data){
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
                },
                success:function(data){
                    console.log(data);
                    $('.pauta'+pauta).html(data);
                }
            });
    });
});