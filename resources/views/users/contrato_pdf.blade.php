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
       <p>rua ibiporã - 837 - CENTRO</p>
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
      ENDEREÇO:<u> {{$user->endereco}}</u>,  N: <u>{{$user->numero}}</u>,  BAIRRO: <u>{{$user->cidade}}</u>,
      CIDADE: <u>{{$user->cidade}}</u>, CPF: <u>{{$user->cpf}}</u>, RG: <u>{{$user->rg}}</u>,
      TELEFONE: <u>{{$user->contato}}</u>,  RESPONSÁVEL: <u>{{$user->responsavel}}</u>, 
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
       <p>R$---- CARTÃO<p>
  </div>
  <div class="columnw">
   <p>R$---- DINHEIRO</p>
  </div>
  <div class="columnw">
<p>VENCIMENTO: <u>{{$user->dia_vencimente}}</u></p>
  </div>
</div>

{{-- Texto de Instrução --}}

 <br>

    <P style="text-align: center; font-size: 14px;">*Suporte Pedagógico: Material Didático, Professores, Coordenação, Manutenção Predial, Plataforma EAD e Manutenção Pedagógica.</P>
    <P>Por este instrumento de garantia e compromisso mútuo, estabelecido entre o aluno e/ou seu responsável acima citado doravante denominado simplesmente CONTRATANTE e a YUPE 
      EDUCAÇÃO PROFISSIONAL, situado na Rua Ibiporã, 837, Centro. CEP 85501-282, - Pato Branco - PR, CNPJ 24.515.763/0001-33 ora denominada CONTRATADA, fica estabelecido:</P>


    <p>1ª - A CONTRATADA ministra cursos preparatórios para formação e apoio profissional, conforme relacionados e especificados ACIMA.</p>
    <p>2ª - Por este contrato a contratada efetua o treinamento e o Contratante adquire direito ao treinamento preparatório para formação profissional com o curso ora descritos acima.</p>
    <p>3ª - O valor do referido CURSO SUPRACITADO trata-se da cobrança de mensalidades para suporte pedagógico, de professores e materiais oferecido pela CONTRATADA.</p>
    <p>4ª - Para executar a prestação de serviço, a contratada se compromete a manter em seu quadro, instrutores selecionados, treinados e assessorados, bem como utilizar material e 
      produto altamente especializado.</p>
    <p>5ª - O aluno tem por obrigação cursar 95% (noventa e cinco por cento) do total do curso, caso não o faça, ao término do pagamento do contrato, a escola fica desobrigada a finalizar 
      seu treinamento, concedendo ainda, um mês de tolerância além do prazo de finalização do curso</p>
    <p>6ª - Fica autorizada a CONTRATADA a emitir boleto bancário ou outro meio de cobrança, para a CONTRATANTE, sem o prévio aviso, sem o desconto da bolsa, quando da inadimplência 
      do suporte pedagógico. Como também fazer o envio de SMS, ligações e cartas de cobrança até que um novo acordo seja firmado entre as partes.</p>
    <p>7ª - O cancelamento/desistência deste contrato a qualquer tempo deverá ser comunicado e formalizado por escrito na secretaria da prestadora de serviços e implicará em uma multa 
      rescisória no valor de 20% do saldo de parcelas remanescentes do curso referido, sem os descontos de pontualidade para sua efetivação. O cancelamento só é efetivado na secretaria da escola, não podendo por tanto ser solicitado por telefone. A ausência as aulas/abandono do curso, não caracteriza cancelamento, que deverá ser feito pelo responsável do 
      contrato pessoalmente e por escrito à secretaria da escola. </p>
    <p>8ª - A simples interrupção na frequência das aulas ou abandono não ocasionam o cancelamento da matrícula, ocasião em que as parcelas da mensalidade continuarão sendo 
      computadas pelo sistema de cobrança, para todos os efeitos. A emissão e entrega do Certificado só ocorrerá após a quitação de todas as mensalidades do curso.</p>
    <p>9ª - Na ocorrência de inadimplência de alguma das parcelas do CURSO, o nome do contratante será incluso no registro dos órgãos de proteção ao crédito. Para efeitos jurídicos em 
      caso de inadimplemento este contrato transforma-se em confissão de dívida na totalidade de seu valor, conforme artigo 855, inciso II do SPC.</p>
    <p>10ª - Neste caso as despesas com cobrança judicial, como juros, correção monetária, honorários advocatícios e custas processuais ficarão por conta do CONTRATANTE.</p>
    <p>11ª - O CONTRATANTE DECLARA NESTA PRESENTE DATA QUE TEM PLENAS CONDIÇÕES FINANCEIRAS PARA ARCAR COM TODAS AS PARCELAS DO PRESENTE CONTRATO.</p>
    <p>12ª - O contratante que optar pelo pagamento do CURSO à vista ou no cartão no dia da inscrição terá desconto do valor total e não terá direito a estorno ou devolução do valor pago 
      em caso de desistência podendo apenas retirar as apostilas do curso sem devolução de valor.</p>
    <p>13ª - FORO - As partes elegem o foro de Pato Branco - PR como o único competente para dirimir qualquer questão oriunda do presente contrato, em detrimento de qualquer outro, 
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
        <p style="text-align: center; font-size: 14px;">YUPE EDUCAÇÃO PROFISSIONAL</p>
 </td>
    <td>
              <p style="text-align: center; font-size: 14px;">_______________________________________</p>
        <p style="text-align: center; font-size: 14px;">RESPONSÁVEL CONTRATANTE</p>
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
