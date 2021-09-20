$(function() {
    //funcoes para o primeiro formulario
    $('.selecionar').click(function(){

        nivel = $("#nivel").val();
        semestre = $("#semestre").val();
        idEstudante = $("#idEstudante").val();
        idCurso = $("#idCurso").val();
       // alert('Oplu' + nivel + '-' + semestre+'-'+idEstudante+'-'+idCurso);

        $.ajax({
            url: "../library/jp/historico_notas.php",
            method: "POST",
            data: {
                selecionar: "visualizar",nivel:nivel,semestre:semestre,idCurso:idCurso, idEstudante:idEstudante
            },
            beforeSend: function(){
            	 mensagem_processamento('A processar...',1) ;  
            	 $("#msgError").css({display:"block"});
               // $('.' + result).html('<option class = "aguarde"><p>Carregando...</p></option>');
               
            },
            success: function(data) { 
               // console.log(data);
               $("#msgError").css({display:"none"});
               $('#disciplinas_notas').html('');
               if(data!=0) 
                     $('#disciplinas_notas').html(data);  
                  
            },
            error: function(data){
              //  alert(data);
                console.log(data);
            }
        });
        
        

    });
});
function mensagem_processamento(tteste, tipo) {

		    posicao = $(document).scrollTop();
		    largura = $(window).height() / 2;
		    altura = $(window).width() / 2;
		    top = (300 + $(document).scrollTop());
		    left = 200;
		
		    corDeFundo = '';
		    url__ = '';
		    if (tipo == 0) {
		        corDeFundo = "#7EC0EE"; // azul  1E90FF  #1C86EE  #1874CD  #7EC0EE 
		        url__ = "../img/icone/icon6_.png";
		    }
		    if (tipo == 1) {
		        corDeFundo = "#FFC125"; // amarela  #FFC125  #EEB422  #CD950C  #EEAD0E
		        url__ = "../img/icone/icon3_1.png";
		    }
		    if (tipo == 2) {
		        tteste = 'Sucesso ...';
		        corDeFundo = "#43CD80"; // verde   #7CCD7C, #00CD66
		        url__ = "../img/icone/icon2_.png";
		    }
		    $("#msgErrorIMG").attr('src', url__);
		    $("#msgError").css({
		        "border-width": "medium",
		        "border-style": "solid 2px",
		        "bolder-color": "#ff0",
		        "text-align": "center",
		        "border-radius": "5px"
		    });
		    $("#msgErrorTesto").css({
		        color: "white",
		        "Font-size": 10
		    });
		    $("#msgErrorTesto").html(tteste);
		    $("#msgError").attr('z-index', '1');
		    $("#msgError").css({
		        position: "absolute",
		        "z-index": "1",
		        background: corDeFundo,
		        width: "300px",
		        height: "30px",
		        "transform": "translate(-50%,-50%)",
		        "margin-left": "50%",
		        "margin-top": posicao + "px",
		        "box-shadow": "1px 1px 0 #C0C0C0"
		    });
}  