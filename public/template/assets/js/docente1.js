//alert("ola mundo");


var divMensagTeste = $("#divMensagTeste");
var divMensagDisc = $("#divMensagDisc");
var disciplinas = $("#tbDisciplinas");
var testes = $("#tbTestes");
var formDadosTeste = $("#formDadosTeste");
var formDisciplinas = $("#formDisciplinas");
var formTestes = $("#formTestes");

function abilitarMensageErro(tipo, teste) {
    posicao = $(document).scrollTop();
    largura = $(window).height() / 2;
    altura = $(window).width() / 2;
    top = (100 + $(document).scrollTop());

    left = 200;
    if (tipo === 0) {
        corDeFundo = "#FF6347";

    }
    if (tipo === 1) {
        corDeFundo = "#adff2f";

    }
    if (tipo === -1) {
        corDeFundo = "#FFD700";

    }
    $("#msgError").css({"border-width": "medium", "border-style": "solid 2px", "bolder-color": "#ff0", "text-align": "center", "border-radius": "5px"});
    $("#msgErrorTesto").html(teste);
    $("#msgError").css({position: "absolute", "z-index": "1", background: corDeFundo, width: "300px", height: "30px", "transform": "translate(-50%,-50%)", "margin-left": "50%", "margin-top": posicao + "px", "box-shadow": "5px 5px 0 #C0C0C0"});
    $("#msgError").fadeIn(500);
    $("#msgError").fadeOut(2000);
}

function actualizarFrequencia() {
    idDiciplina = $(".linhasDisciplina.active").find("td[id='idDiciplina']").html();
    ano = $(".linhasDisciplina.active").find("input[id='ano']").val();
    idCurso = $(".linhasDisciplina.active").find("input[id='idCurso']").val();

    alert(idDiciplina + '*' + ano + '*' + idCurso);
    operacao = "atualizar frequencia";
    $.ajax({
        method: 'post',
        url: '../library/jp/listaDisciplina1exec.php',
        data: {
            idDiciplina: idDiciplina, operacao: operacao,
            idCurso: idCurso, ano: ano
        },
        success: function (valor) {

            //	alert("atualizar freq");
            //	console.log(valor);
        }
    });
}
function publicarTeste(botao) {
    //console.log(botao.val());
    //console.log(botao.parent().parent().find('#offline').val());

    $(".linTestes").removeClass("active");
    botao.parent().parent().addClass("active");

    if (botao.val() === "Online") {
        botao.hide();
        botao.parent().parent().find('#offline').show();
        estado = 1;
    } else {
        botao.hide();
        botao.parent().parent().find('#online').show();
        estado = 0;
    }

    idDiciplina = $(".linhasDisciplina.active").find("td[id='idDiciplina']").html();
    ano = $(".linhasDisciplina.active").find("input[id='ano']").val();
    idCurso = $(".linhasDisciplina.active").find("input[id='idCurso']").val();
    idTeste = $(".linTestes.active").find("td[id='idTeste']").html();
    tipo = $(".linTestes.active").find("td[id='tipoTeste']").html();
    idTipo = getValor(tipo);

    //	alert("*"+idDiciplina+"*"+ano+"*"+idCurso+"*"+idTeste+"*"+idTipo+"*");
    operacao = "publicar_teste";
    $.ajax({
        method: 'post',
        url: '../library/jp/listaDisciplina1exec.php',
        data: {
            idDiciplina: idDiciplina, operacao: operacao, idTeste: idTeste, idTipo: idTipo,
            idCurso: idCurso, ano: ano, estado: estado
        },
        success: function (valor) {
            //divMensagEst.show();
            //	divMensagEst.fadeOut(1500);
            //console.log(valor);
            atualizarTabelaTestes();

            abilitarMensageErro(-1, "Em processo ..");
            abilitarMensageErro(1, "Operação Efectuada com sucesso ..");
        }
    });
}
function eliminarNotaTeste(botao) {
    idDiciplina = $(".linhasDisciplina.active").find("td[id='idDiciplina']").html();
    ano = $(".linhasDisciplina.active").find("input[id='ano']").val();
    idCurso = $(".linhasDisciplina.active").find("input[id='idCurso']").val();
    idTeste = $(".linTestes.active").find("td[id='idTeste']").html();
    tipo = $(".linTestes.active").find("td[id='tipoTeste']").html();
    idTipo = getValor(tipo);
    idEstudante = botao.parent().parent().find("input[id='idEstudante']").val();

    alert("Eliminado com sucesso");

    operacao = "eliminar_nota_teste";

    $.ajax({
        method: 'post',
        url: '../library/jp/listaDisciplina1exec.php',
        data: {
            idDiciplina: idDiciplina, operacao: operacao, idTeste: idTeste, idTipo: idTipo,
            idCurso: idCurso
            , idEstudante: idEstudante, ano: ano
        },
        success: function (valor) {
            console.log(valor);
            $("#formEstudantes").css({display: "none"});
            abilitarMensageErro(1, "Operação Efectuada com sucesso ..");
        }
    });
}
function visualizarNota(chk) {
    idDiciplina = $(".linhasDisciplina.active").find("td[id='idDiciplina']").html();
    ano = $(".linhasDisciplina.active").find("input[id='ano']").val();
    idCurso = $(".linhasDisciplina.active").find("input[id='idCurso']").val();
    idTeste = $(".linTestes.active").find("td[id='idTeste']").html();
    tipo = $(".linTestes.active").find("td[id='tipoTeste']").html();
    idTipo = getValor(tipo);
    idEstudante = chk.parent().parent().find("input[id='idEstudante']").val();

    if (chk.prop('checked') === true)
        visivel = 1;
    else
        visivel = 0;

    //alert(visivel +"*"+idDiciplina+"*"+ano+"*"+idCurso+"*"+idTeste+"*"+idTipo+"*"+idEstudante);

    operacao = "visualizar_nota";

    $.ajax({
        method: 'post',
        url: '../library/jp/listaDisciplina1exec.php',
        data: {
            idDiciplina: idDiciplina, operacao: operacao, idTeste: idTeste, idTipo: idTipo,
            idCurso: idCurso, visivel: visivel
            , idEstudante: idEstudante, ano: ano
        },
        success: function (valor) {
            //divMensagEst.show();
            //	divMensagEst.fadeOut(1500);
            //	console.log(valor);
            abilitarMensageErro(1, "Operação Efectuada com sucesso ..");
        }
    });
}
function fecharForm(botao) {

    $("#formEstudantes").css({display: "none"});
}


function atualizarNotaText(campo) {

    idDiciplina = $(".linhasDisciplina.active").find("td[id='idDiciplina']").html();
    ano = $(".linhasDisciplina.active").find("input[id='ano']").val();
    idCurso = $(".linhasDisciplina.active").find("input[id='idCurso']").val();
    idTeste = $(".linTestes.active").find("td[id='idTeste']").html();
    tipo = $(".linTestes.active").find("td[id='tipoTeste']").html();
    idTipo = getValor(tipo);
    idEstudante = campo.parent().parent().find("input[id='idEstudante']").val();
    nota = campo.val();

    //alert("Ola mundooo");
    //	alert(nota +"*"+idDiciplina+"*"+ano+"*"+idCurso+"*"+idTeste+"*"+idTipo+"*"+idEstudante);
    //codigo = campo.parent().parent().children("tbody :first-child")[0].innerHTML

    if (((nota >= 0) && (nota <= 20)) || (nota === -1)) {


        operacao = "nova_nota";

        $.ajax({
            method: 'post',
            url: '../library/jp/listaDisciplina1exec.php',
            data: {
                idDiciplina: idDiciplina, operacao: operacao, idTeste: idTeste, idTipo: idTipo,
                idCurso: idCurso, nota: nota, idEstudante: idEstudante, ano: ano
            },
            success: function (valor) {
                //divMensagEst.show();
                //	divMensagEst.fadeOut(1500);
                console.log(valor);
                abilitarMensageErro(1, " Efectuada com sucesso ..");
            }
        });
    } else {
        abilitarMensageErro(-1, "A nota de Avaliação deve estar entre Zero a 20 ..");
        //abilitarMensageErro(1,"Operação Efectuada com sucesso ..");
        //divMensagEst2.show();
        //divMensagEst2.fadeOut(1500);
        //$("#tbEstudantes").ajax.reload();
    }

}
function atualizarEstudantePesquisa(campo) {
    var linhas = $(".linDisciplina.active");
    param = campo.val();

    idDiciplina = $(".linhasDisciplina.active").find("td[id='idDiciplina']").html();
    ano = $(".linhasDisciplina.active").find("input[id='ano']").val();
    idCurso = $(".linhasDisciplina.active").find("input[id='idCurso']").val();
    idTeste = $(".linTestes.active").find("td[id='idTeste']").html();

    tipo = $(".linTestes.active").find("td[id='tipoTeste']").html();
    idTipo = getValor(tipo);


    //alert(param +"*"+idDiciplina+"*"+ano+"*"+idCurso+"*"+idTeste+"*"+idTipo);
    operacao = "lancar_notas";

    $.ajax({
        method: 'post',
        url: '../library/jp/listaDisciplina1exec.php',
        data: {
            idDiciplina: idDiciplina, operacao: operacao,
            idCurso: idCurso, ano: ano, param: param, idTeste: idTeste, idTipo: idTipo
        },
        success: function (valor) {
            //	console.log(valor);
            $("#tbEstudantes tbody").html("");
            $("#tbEstudantes tbody").append(valor);
            $("#tbEstudantes").ajax.reload();



        }
    });
}
function lancarNotas(botao) {


    $(".linTestes").removeClass("active");
    botao.parent().parent().addClass("active");

    $("#formEstudantes").css({display: "block"});

    operacao = "lancar_notas";
    idDiciplina = $(".linhasDisciplina.active").find("td[id='idDiciplina']").html();
    ano = $(".linhasDisciplina.active").find("input[id='ano']").val();
    idCurso = $(".linhasDisciplina.active").find("input[id='idCurso']").val();
    idTeste = $(".linTestes.active").find("td[id='idTeste']").html();
    tipo = botao.parent().parent().find("td[id='tipoTeste']").html();
    idTipo = getValor(tipo);
    //	alert(idDiciplina+"*"+ano+"*"+idCurso+"*"+idTeste+"*"+idTipo);


    $.ajax({
        method: 'post',
        url: '../library/jp/listaDisciplina1exec.php',
        data: {
            operacao: operacao, idTeste: idTeste,
            idTipo: idTipo, idCurso: idCurso, idDiciplina: idDiciplina,
            ano: ano
        },
        success: function (valor) {

            console.log(valor);
            $("#tbEstudantes tbody").html("");
            $("#tbEstudantes tbody").append(valor);
            $("#tbEstudantes").ajax.reload();


        }
    });

}
function eliminarTeste(botao) {

    disc = $(".linhasDisciplina.active").find("td[id='idDiciplina']").html();
    ano = $(".linhasDisciplina.active").find("input[id='ano']").val();
    idCurso = $(".linhasDisciplina.active").find("input[id='idCurso']").val();
    idTeste = $(".linTestes.active").find("td[id='idTeste']").html();
    tipoTeste = formDadosTeste.find("select[name='tipoTeste']").val();
    operacao = "eliminar_teste";

    //	alert("op "+operacao+" tp-"+tipoTeste+" dc-"+disc+" an-"+ano+" id-"+idCurso+" dt-"+idTeste);

    $.ajax({
        method: 'post',
        url: '../library/jp/listaDisciplina1exec.php',
        data: {
            operacao: operacao, tipoTeste: tipoTeste, disc: disc,
            ano: ano, idCurso: idCurso, idTeste: idTeste
        },
        success: function (valor) {

            //	$("#tbEstudantes tbody").html("");
            //	$("#tbEstudantes tbody").append(valor);
            //	$("#tbEstudantes").ajax.reload();
            //console.log(valor);
            if (valor === "true")
                abilitarMensageErro(1, "Eliminado com sucesso..");
            if (valor === "false")
                abilitarMensageErro(0, "Operação não  Efectuada ..");

            atualizarTabelaTestes();
            abilitarFormNovoTeste(1, 0);



        }
    });



}

function pesoTotal(disc, ano, idCurso) {
    var soma = 1;

    //alert("func-"+idCurso+"-"+ano+"-"+disc);

    operacao = "soma_peso";
    $.ajax({
        method: 'post',
        url: '../library/jp/listaDisciplina1exec.php',
        data: {
            operacao: operacao, disc: disc,
            ano: ano, idCurso: idCurso
        },
        success: function (valor) {
            //	valor=7;
            //alert("retorno-"+ valor);
            soma = valor;
            //console.log($("*peso atual - "+valor);
            $("#totalPesoForm").val(valor).trigger('change');

        }
    });
    return soma;
}
$("#formDadosTeste").submit(function (event) {

    event.preventDefault();

    var form = $(this);

    //	console.log($(this).html());

    peso = form.find("input[name='peso']").val();
    data = form.find("input[name='data']").val();
    tipoTeste = form.find("select[name='tipoTeste']").val();

    peso = form.find("input[name='peso']").val();
    pesoCorrente = $("#totalPesoForm").val();
    pesoAnterior = $(".linTestes.active").find("input[id='pesoAnterior']").val();

    if ($(".linTestes").length === 0)
        pesoCorrente = 0;
    //console.log($(".linTestes").length);

    //alert("-p-"+tipoTeste);

    disc = $(".linhasDisciplina.active").find("td[id='idDiciplina']").html();
    ano = $(".linhasDisciplina.active").find("input[id='ano']").val();
    idCurso = $(".linhasDisciplina.active").find("input[id='idCurso']").val();
    func = $(".linhasDisciplina.active").find("input[id='idFunc']").val();

    idTeste = $(".linTestes.active").find("td[id='idTeste']").html();
    operacao = "salvar_teste";

    if ($("#operacao").val() === 1)
        novo = 1;
    else
        novo = 0;// nao tem sentido

    if (novo === 0) {
        pesoAceitavel = parseInt(peso) + parseInt(pesoCorrente);
        if ((pesoAceitavel <= 100) && (pesoAceitavel >= 0))
            pass = 1;
        else
            pass = 0;
        //alert(pesoAceitavel);
    } else {
        pesoAceitavel = parseInt(peso) + parseInt(pesoCorrente) - pesoAnterior;
        if ((pesoAceitavel <= 100) && (pesoAceitavel >= 0))
            pass = 1;
        else
            pass = 0;
        //alert(pesoAceitavel);
    }
    if ((tipoTeste === 4) || (tipoTeste === 5) || (tipoTeste === 6))
        peso = 50;
    if ((pass === 1) || (tipoTeste === 4) || (tipoTeste === 5) || (tipoTeste === 6)) {
        $.ajax({
            method: 'post',
            url: '../library/jp/listaDisciplina1exec.php',
            data: {
                operacao: operacao, data: data,
                tipoTeste: tipoTeste, idFunc: func, disc: disc, peso: peso,
                ano: ano, idCurso: idCurso, novo: novo, idTeste: idTeste
            },
            success: function (valor) {
                atualizarTabelaTestes();
                abilitarFormNovoTeste(1, 0);
            }
        });

        abilitarMensageErro(-1, "Inserido com Sucesso");
    }
    if (pass === 0)
        abilitarMensageErro(-1, "Erro, o peso deve ser positivo e menor que 100");
});

function load_configuracao() {

    divMensagTeste.css({display: "none"});
    divMensagDisc.css({display: "none"});
    disciplinas.css({width: "100%"});
    testes.css({width: "100%"});
    //esconder formulariois
    configurarConteiners();
}

function atualizarTabelaTestes() {
    operacao = "load_teste";

    ano = $(".linhasDisciplina.active").find('#ano').val();
    curso = $(".linhasDisciplina.active").find('#idCurso').val();
    disc = $(".linhasDisciplina.active").find('#idDiciplina').html();

    $.ajax({
        method: 'post',
        url: '../library/jp/listaDisciplina1exec.php',
        data: {
            operacao: operacao, disc: disc,
            ano: ano, curso: curso
        },
        success: function (valor) {

            $("#tbTestes tbody").html("");
            $("#tbTestes tbody").append(valor);
            $("#tbTestes tbody").ajax.reload();

        }
    });
}
function abilitarTestes(botao) {
    abilitarMensageErro(-1, "A processar...");
    $("#formEstudantes").css({display: "none"});
    $("#formDadosTeste").css({display: "none"});
    //botao.preventDefault();
    $(".linhasDisciplina").removeClass("active");
    formTestes.css({display: "block"});
    botao.parent().parent().addClass("active");

    //	idDisciplina = botao.parent().parent().children("tbody :first-child")[0].innerHTML
    operacao = "load_teste";
    ano = botao.parent().parent().find('#ano').val();
    curso = botao.parent().parent().find('#idCurso').val();
    disc = botao.parent().parent().find('#idDiciplina').html();

    //$("#formDadosTeste").find("input[id='totalPesoForm']").val(somaPeso).trigger('change');
    nomeDisc = "Testes da disciplina : " + botao.parent().parent().find("td[id='nomeDisc']").html();


    $("#lblDiscTeste").text(nomeDisc);
    //	<h4 id='lblDiscTeste'>Testes da disciplina :</h4>
    $.ajax({
        method: 'post',
        url: '../library/jp/listaDisciplina1exec.php',
        data: {
            operacao: operacao, disc: disc,
            ano: ano, curso: curso
        },
        success: function (valor) {
            $("#tbTestes tbody").html("");
            $("#tbTestes tbody").append(valor);
            $("#tbTestes tbody").ajax.reload();
        }
    });

}
function configurarConteiners() {
    formDadosTeste.css({display: "none"});
    formTestes.css({display: "none"});

}
function abilitarFormNovoTeste(flag, va) {
    abilitarMensageErro(-1, "A processar...");


    ano = $(".linhasDisciplina.active").find('#ano').val();
    curso = $(".linhasDisciplina.active").find('#idCurso').val();
    disc = $(".linhasDisciplina.active").find('#idDiciplina').html();
    pesoTotal(disc, ano, curso);

    $("#operacao").val(va).trigger('change');

    if (flag === 1)
        $("#formDadosTeste").css({display: "block"});
    else
        $("#formDadosTeste").css({display: "none"});

    if (va === 0)
        $("#apagar").css({display: "none"});
    else
        $("#apagar").css({display: "block"});


    $("#formDadosTeste").find("input[name='peso']").val("").trigger('change');
    $("#formDadosTeste").find("input[name='data']").val("").trigger('change');
    $("#tipoTeste option[value='0']").prop('selected', true);
}

function verTestes(botao) {

    $(".linTestes").removeClass("active");
    botao.parent().parent().addClass("active");

    curso = botao.parent().parent().find("#idCurso").val();
    ano = botao.parent().parent().find("#ano").val();
    disc = botao.parent().parent().find("#idDiciplina").val();
    idTeste = botao.parent().parent().find("#idTeste").html();


    pesoTotal(disc, ano, curso);
    abilitarFormNovoTeste(1, 1);

    peso = botao.parent().parent().find("td[id='peso']").html();
    $("#formDadosTeste").find("input[name='peso']").val(peso).trigger('change');

    data = botao.parent().parent().find("td[id='dataAfazer']").html();
    $("#formDadosTeste").find("input[name='data']").val(data).trigger('change');

    tipo = botao.parent().parent().find("td[id='tipoTeste']").html();
    $("#tipoTeste option[value='" + getValor(tipo) + "']").prop('selected', true);
}
function getValor(tipo) {
    if ("--- Selecionar o tipo de Avaliação ---" === tipo)
        return 0;
    if ("Teste" === tipo)
        return 1;
    if ("Mini Teste" === tipo)
        return 2;
    if ("Trabalho" === tipo)
        return 3;
    if ("Exame Normal" === tipo)
        return 4;
    if ("Exame de Recorrencia" === tipo)
        return 5;
    if ("Frequencia" === tipo)
        return -1;
    if ("Acta" === tipo)
        return -2;
}