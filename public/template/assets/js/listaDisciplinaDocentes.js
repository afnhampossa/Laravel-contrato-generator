$(function() {
    //$('table').fadeOut('slow');
    //$('table').DataTable();
    //alert($('.panel-default').outerHeight())
    $("#print").on('click', function() {
        //Print ele4 with custom options
        $(".panel-body").print({
            globalStyles : false,
            mediaPrint : false,
            stylesheet : "",
            iframe : false,
            noPrintSelector : ".avoid-this"
        }); 
    }); 
    $('.selecionar').change(function() {
        $('#idCurso').attr('value', $(this).val());
        $('#filtro').attr('value', '');
        if ($(this).val() != '') {
            $('#tituloCurso').html($(this).children(':selected').text().toUpperCase());
            $('#nomeCurso').attr('value',$(this).children(':selected').text().toUpperCase());
            $('#print').fadeIn('slow');
            var idCurso = $(this).val();
            var semestre;
            if ((new Date()).getMonth() < 6) {
                semestre = '(1, 3, 5, 7)';
            } else {
                semestre = '(2, 4, 6, 8)';
            }
            $('#filtro').attr('value', semestre);
            $.ajax({
                url:"../library/jp/validarDisciplinaDocente.php",
                method:"POST",
                data:{
                    selecionar:'lista', 
                    idCurso: $(this).val(), 
                    filtro: semestre
                },
                success:function(data){
                    if (data.length > 1) {
                        $('#lista').html(data);
                        $('table').fadeIn('slow');
                    } else {
                        $('table').fadeOut('slow');
                        $('#print').fadeOut('slow');
                    }
                }
            });
        } else {
            $('#tituloCurso').html('Nenhum curso foi selecionado');
            $('table').fadeOut('slow');
            $('#print').fadeOut('slow');
        }
    });
});