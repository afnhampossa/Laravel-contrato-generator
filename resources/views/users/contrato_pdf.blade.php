<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fatura</title>

    <link rel="icon" href="{{ asset('template/assets/img/img_uz_logo.png')}}" type="image/x-icon"/>

    
    <!-- CSS Files -->
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 4px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0);
            font-size: 14px;
            line-height: 20px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, "Times New Roman", sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 3px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 30px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 30px;
        }
        .invoice-box table tr.information2 table td {
            padding-bottom: 20px;
            line-height: 15px;
            padding: 2px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }


        /** AUMENTADO **/
        .columnw {
  float: left;
  width: 40%;
}

/* Clear floats after the columns */
.roww:after {
  content: "";
  display: table;
  clear: both;
}

.columnw {
  float: left;
}

.left, .right {
  width: 25%;
}

.middle {
  width: 50%;
}
body{
  font-family: 'Exo 2', sans-serif;
}
.maisculo {
  text-transform: uppercase;
}
p{
  margin:0;
  padding:0;
  font-size:11px;
  font-family: 'Exo 2', sans-serif;
  font-weight: lighter;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
    padding: 10px;
    width:320px;
}

.noBorder {
    border:none !important;
}
    </style>
</head>

<body>











{{-- CABECALHO --}}

<div class="roww">
  <div class="columnw">
      <div>
        <img src="template/assets/img/logo.png"  width="110" height="80">
      </div>
  </div>
  <div class="columnw">
  <div>
        <h1 style="font-family: 'Exo 2', sans-serif; font-weight: 300;"><strong>CONTRATO</strong></h1>
      </div>
  </div>
  <div class="columnw">
      <div class="maisculo">
      <p>CNPJ: 24.515.763/0001-33</p> 
       <p>rua ibipor?? - 837 - CENTRO</p>
      <p>pato branco - PR</p>  
       <p>(46) 3225 - 6938</p> 
       
      </div>
  </div>
</div>

<br>
<br>

{{-- Dados Do ALUNO --}}
    <div>
      <p style="font-family: 'Exo 2', sans-serif; line-height: 25px; font-size:14px; font-weight: lighter; font-variant:small-caps;">ALUNO CONTRATANTE: <u>{{$user->name}}</u>,  DATA DE NASCIMENTO: <u>{{$user->data_nascimento}}</u>, 
      ENDERE??O:<u> {{$user->endereco}}</u>,  N: <u>{{$user->numero}}</u>,  BAIRRO: <u>{{$user->cidade}}</u>,
      CIDADE: <u>{{$user->cidade}}</u>, CPF: <u>{{$user->cpf}}</u>, RG: <u>{{$user->rg}}</u>,
      TELEFONE: <u>{{$user->contato}}</u>,  RESPONS??VEL: <u>{{$user->responsavel}}</u>, 
      CPF: <u>{{$user->responsavel_rg}} </u>,  RG: <u>{{$user->responsavel_cpf}}</u>
    </div>

<br>
{{-- Tabela --}}
    <table>
  <tr>
    <td>
    <p style="font-family: 'Exo 2', sans-serif; text-align:center; font-size:14px; font-weight: lighter; font-variant:small-caps;">CURSO ead semipresencial ESCOLHIDO:</p>
     <p style="text-align:center; font-size:14px; font-weight: lighter; font-variant:small-caps;"><u>{{$user->curso}}</u></p>
    </td>
    <td>
        <p style="text-align:center; font-size:14px; font-weight: lighter; font-variant:small-caps;">FORMA DE PAGAMENTO</p>
        <p style="text-align:center; font-size:14px; font-weight: lighter; font-variant:small-caps;"><u>{{$user->forma_pagamento}}</u></p>
    </td>
  </tr>
</table>

<br>

{{-- Vencimento --}}

<div class="roww">
  <div class="columnw">
       <p>R$---- CART??O<p>
  </div>
  <div class="columnw">
   <p>R$---- DINHEIRO</p>
  </div>
  <div class="columnw">
<p>VENCIMENTO: <u>{{$user->dia_vencimente}}</u></p>
  </div>
</div>

{{-- Texto de Instru????o --}}

 <br>

    <P style="text-align: center; font-size: 14px;">*Suporte Pedag??gico: Material Did??tico, Professores, Coordena????o, Manuten????o Predial, Plataforma EAD e Manuten????o Pedag??gica.</P>
    <P>Por este instrumento de garantia e compromisso m??tuo, estabelecido entre o aluno e/ou seu respons??vel acima citado doravante denominado simplesmente CONTRATANTE e a YUPE 
      EDUCA????O PROFISSIONAL, situado na Rua Ibipor??, 837, Centro. CEP 85501-282, - Pato Branco - PR, CNPJ 24.515.763/0001-33 ora denominada CONTRATADA, fica estabelecido:</P>


    <p>1?? - A CONTRATADA ministra cursos preparat??rios para forma????o e apoio profissional, conforme relacionados e especificados ACIMA.</p>
    <p>2?? - Por este contrato a contratada efetua o treinamento e o Contratante adquire direito ao treinamento preparat??rio para forma????o profissional com o curso ora descritos acima.</p>
    <p>3?? - O valor do referido CURSO SUPRACITADO trata-se da cobran??a de mensalidades para suporte pedag??gico, de professores e materiais oferecido pela CONTRATADA.</p>
    <p>4?? - Para executar a presta????o de servi??o, a contratada se compromete a manter em seu quadro, instrutores selecionados, treinados e assessorados, bem como utilizar material e 
      produto altamente especializado.</p>
    <p>5?? - O aluno tem por obriga????o cursar 95% (noventa e cinco por cento) do total do curso, caso n??o o fa??a, ao t??rmino do pagamento do contrato, a escola fica desobrigada a finalizar 
      seu treinamento, concedendo ainda, um m??s de toler??ncia al??m do prazo de finaliza????o do curso</p>
    <p>6?? - Fica autorizada a CONTRATADA a emitir boleto banc??rio ou outro meio de cobran??a, para a CONTRATANTE, sem o pr??vio aviso, sem o desconto da bolsa, quando da inadimpl??ncia 
      do suporte pedag??gico. Como tamb??m fazer o envio de SMS, liga????es e cartas de cobran??a at?? que um novo acordo seja firmado entre as partes.</p>
    <p>7?? - O cancelamento/desist??ncia deste contrato a qualquer tempo dever?? ser comunicado e formalizado por escrito na secretaria da prestadora de servi??os e implicar?? em uma multa 
      rescis??ria no valor de 20% do saldo de parcelas remanescentes do curso referido, sem os descontos de pontualidade para sua efetiva????o. O cancelamento s?? ?? efetivado na secretaria da escola, n??o podendo por tanto ser solicitado por telefone. A aus??ncia as aulas/abandono do curso, n??o caracteriza cancelamento, que dever?? ser feito pelo respons??vel do 
      contrato pessoalmente e por escrito ?? secretaria da escola. </p>
    <p>8?? - A simples interrup????o na frequ??ncia das aulas ou abandono n??o ocasionam o cancelamento da matr??cula, ocasi??o em que as parcelas da mensalidade continuar??o sendo 
      computadas pelo sistema de cobran??a, para todos os efeitos. A emiss??o e entrega do Certificado s?? ocorrer?? ap??s a quita????o de todas as mensalidades do curso.</p>
    <p>9?? - Na ocorr??ncia de inadimpl??ncia de alguma das parcelas do CURSO, o nome do contratante ser?? incluso no registro dos ??rg??os de prote????o ao cr??dito. Para efeitos jur??dicos em 
      caso de inadimplemento este contrato transforma-se em confiss??o de d??vida na totalidade de seu valor, conforme artigo 855, inciso II do SPC.</p>
    <p>10?? - Neste caso as despesas com cobran??a judicial, como juros, corre????o monet??ria, honor??rios advocat??cios e custas processuais ficar??o por conta do CONTRATANTE.</p>
    <p>11?? - O CONTRATANTE DECLARA NESTA PRESENTE DATA QUE TEM PLENAS CONDI????ES FINANCEIRAS PARA ARCAR COM TODAS AS PARCELAS DO PRESENTE CONTRATO.</p>
    <p>12?? - O contratante que optar pelo pagamento do CURSO ?? vista ou no cart??o no dia da inscri????o ter?? desconto do valor total e n??o ter?? direito a estorno ou devolu????o do valor pago 
      em caso de desist??ncia podendo apenas retirar as apostilas do curso sem devolu????o de valor.</p>
    <p>13?? - FORO - As partes elegem o foro de Pato Branco - PR como o ??nico competente para dirimir qualquer quest??o oriunda do presente contrato, em detrimento de qualquer outro, 
      por mais privilegiado que possa ser.</p>
    <p>Por estarem justas e contratadas, as Partes firmam este contrato em 02 (duas) vias de igual teor e forma, para os fins legais e de direitos</p>


<br>
<br>
<br>

{{-- ASSINATURA --}}


    <table style="border: 0px solid white;" class="noBorder">
  <tr>
    <td>
         <p style="text-align: center; font-size: 14px;">_______________________________________</p>
        <p style="text-align: center; font-size: 14px;">YUPE EDUCA????O PROFISSIONAL</p>
 </td>
    <td>
              <p style="text-align: center; font-size: 14px;">_______________________________________</p>
        <p style="text-align: center; font-size: 14px;">RESPONS??VEL CONTRATANTE</p>
 </td>
  </tr>
</table>







{{-- 
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="3">
                <table>
                    <tr>
                        <td class="title">
                            <div class="receipt-left">
                                <img class="img-responsive" alt="iamgurdeeposahan" src="assets/images/logo/logo.png" style="width: 88px; border-radius: 0px;">
                            </div>
                        </td>
                           <td class="title">
                            <div class="receipt-left">
                                <img class="img-responsive" alt="iamgurdeeposahan" src="assets/images/logo/logo.png" style="width: 88px; border-radius: 0px;">
                            </div>
                        </td>
                      <td class="title">
                            <div class="receipt-left">
                                <img class="img-responsive" alt="iamgurdeeposahan" src="assets/images/logo/logo.png" style="width: 88px; border-radius: 0px;">
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            AGUAS SAIA, EI.<br>
                            Melhor para o consumo<br>
                            Gaza, Manjacaze
                        </td>

                        <td>
                            87 475 7230 <br>
                            arjochuas@yahoo.com.br<br>
                            103944686: NUIT
                        </td>
                    </tr>
                </table>
            </td>
        </tr>




    </table>
    Factura processada por computador,
</div> --}}

</body>
</html>
