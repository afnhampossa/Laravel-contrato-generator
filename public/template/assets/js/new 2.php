
        <form id="formDisciplinas" method="post" action="../report/inscritos.php" style="background: white;
              border: 0 none;
              border-radius: 5px;
              -moz-border-radius: 5px;
              -webkit-border-radius: 5px;
              box-shadow:0 0 15px 1px rgba(0,0,0,0.4);
              padding:20px 30px;

              box-sizing: border-box;
              margin: 0 10%;
              margin-top: 20px;">

            <div id="divMensagDisc" style="display:none;" class="alert alert-success" role="alert">
                <strong>Sucesso!</strong> A Operação. foi efectuada com sucesso.....
            </div>
            <h4 > Lista de disciplinas :  <?php

                ?></h4>
            <table id="tbDisciplinas" class='table table-hover table-responsive table-bordered'style="margin-top:20px; width: inherit;">
                <Tbody>
                    <tr>
                        <TD>
                            <table id="tbDisciplinas" class='table table-hover table-responsive table-bordered'style="margin-top:20px; width: 100%;">
                                <?php
                                echo "<tr>";
                                echo "<th>#</th>";
                                echo "<th>Codigo</th>";
                                echo "<th>Disciplina</th>";
                                echo "<th>Curso</th>";
                                echo "<th>Periodo</th>";
                                echo "<th>Operação</th>";
                                echo "</tr>";
                                $leciona = new Leciona($db);
                                $leciona->Func_ID=$idFunc;
                                $prep_state = $leciona->disciplinaDocente(2);

                                while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){
                                extract($row); //Import variables into the current symbol table from an arra
                                echo "<tr class='linhasDisciplina'>";
                                echo "<td id='idDiciplina'>$row[idDiciplina]</td>";
                                echo "<td>$row[codigo]</td>";
                                echo "<td id='nomeDisc'>".utf8_encode($row['nomeDisc'])."</td>";

                                echo "<td>".utf8_encode($row['curso']); 
                                ECHO "<input class='ano' type='hidden' id='ano'  value='$row[ano]'  />";
                                ECHO "<input type='hidden' id='idCurso'  value='$row[idCurso]'  />";


                                ECHO "<input type='hidden' id='idFunc'  value='$idFunc'  />";
                                echo"</td>";
                                if($row["laboral"]==1)
                                echo "<td class='periodo'>Laboral</td>";
                                else
                                echo "<td class='periodo'>Pos-Laboral</td>";
                                echo "<td>";
                                echo "<a href='../report/inscritos.php?operacao=1&idCursoDisc=$row[idCurso]&idDisciplina=$row[idDiciplina]' class='btn btn-success left-margin'>";
                                echo "<span class='glyphicon glyphicon-edit'></span> Lista";
                                echo "</a>";
                                ECHO "<input type='button' onClick='abilitarTestes($(this))'  value='Testes' class='btn btn-info left-margin '   />";
                                echo "</td>";						
                                echo"</tr>";
                                }	
                                ?>
                            </table>
                        </td>	
                    </tr>
                </Tbody>
            </table>
        </form>
		
		
		
		

        <form id="formTestes" method="post" action="../report/inscritos.php" style="background: white;
              border: 0 none;
              border-radius: 5px;
              -moz-border-radius: 5px;
              -webkit-border-radius: 5px;
              box-shadow:0 0 15px 1px rgba(0,0,0,0.4);
              padding:20px 30px;

              box-sizing: border-box;
              margin: 0 10%;
              margin-top: 20px;">
            <h4 id='lblDiscTeste'>Testes da disciplina :</h4>
            <table id="tbTestes" class='table table-hover table-responsive table-bordered' style="margin-top:20px;width: inherit;">
                <tbody></tbody>
            </table>

        </form>

		
		
		
        <form id="formDadosTeste" method="post"  style="background: white;
              border: 0 none;
              border-radius: 5px;
              -moz-border-radius: 5px;
              -webkit-border-radius: 5px;
              box-shadow:0 0 15px 1px rgba(0,0,0,0.4);
              padding:20px 30px;
              box-sizing: border-box;
              margin: 0 10%;
              margin-top: 20px;">
            <div id="divFormDisc">
                <div id="divMensagTeste" style="display:none;" class="alert alert-success" role="alert">
                    <strong>Sucesso!</strong> A Operação. foi efectuada com sucesso.....
                </div>
                <h4> Formulario para preenchimento de dados do teste:</h4>
                <table class='table table-hover table-responsive table-bordered'>
                    <tr>
                        <td>Tipo de Avaliação</td>
                        <td id="divTipoTeste">
                            <?php
                            $tipoTeste = new TipoTeste($db);

                            $prep_state1 = $tipoTeste->getTipoTeste();

                            echo "<select class='form-control' name='tipoTeste' id='tipoTeste'>";

                            echo "<option value='0'>--- Selecionar o tipo de Avaliação ---</option>";

                            while ($row_tipoTeste = $prep_state1->fetch(PDO::FETCH_ASSOC)){

                            extract($row_tipoTeste);

                            echo "<option value='".$row_tipoTeste['idTipo']."'>". $row_tipoTeste['tipoTeste']."</option>";
                            }



                            echo "</select>";
                            ?>


                        </td>
                    </tr>

                    <tr>
                        <td>peso da Avaliação</td>
                        <td><input type='number' min="1" pattern="^[0-9]+" name='peso'  class='form-control' placeholder="Peso" required></td>
                    </tr>
                    <tr>
                        <td>Data de realiação da Avaliação</td>
                        <td><input type='date' name='data' class='form-control' placeholder="Data de Realização" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style='margin-left:auto, text-align:left;' >  
                            <?php
                            //	ECHO "<input type='button' onClick='eliminarTeste($(this))' id='eliminar'  value='eliminar' class='btn btn-danger' style='margin-top:0'   />";	
                            ECHO "<input  type='hidden' id='totalPesoForm' value='0'  />";

                            ?>

                            <button style='margin-left:auto;margin-top:0' type="submit" class="btn btn-success" id="salvarTeste" >
                                <span class="glyphicon glyphicon-plus"></span> salvar
                            </button>

                            <?php

                            ECHO "<input class='operacao' type='hidden' id='operacao' value='1'   />";
                            ECHO "<input type='button' id='Fechar' onClick='abilitarFormNovoTeste(0,1)'  value='Fechar' class='btn btn-info left-margin '   />";
                            ?>
                            <button style='margin-left:161px; margin-top:-34px' class="btn btn-danger" id="apagar" onClick="eliminarTeste($(this))">
                                <span class="glyphicon glyphicon-plus"></span> apagar
                            </button>
                        </td>


                    </tr>
                </table>
            </div>

        </form>

        <form id="formEstudantes" method="post" action="../report/inscritos.php" style="background: white;
              border: 0 none;
              border-radius: 5px;
              -moz-border-radius: 5px;
              -webkit-border-radius: 5px;
              box-shadow:0 0 15px 1px rgba(0,0,0,0.4);
              padding:20px 30px;
              box-sizing: border-box;
              margin: 0 10%;
              margin-top: 20px; display:none ">

            <div class='row'> 
                <?php
                echo"<input type='button' style='float:left' onClick='fecharForm($(this))'   value='Fechar' class='btn btn-info ' />";

                ?>
                <h4 style='float:left'> Lista de Estudantes :</h4> 

            </div>

            <table border="1" class='table table-hover table-responsive table-bordered'style="margin-top:20px; width: 100%;">
                <tr>
                    <td>	
                        <div class="md-form" >
                            <input id="inPesquisar" onkeyup="atualizarEstudantePesquisa($(this))" class ="form-control" type="text" style="width:200px;" placeholder="Pesquisar" >

                        </div>



                    </td>
                </tr>
                </div>
            </table> 
            <table id="tbEstudantes" class='table table-hover table-responsive table-bordered'style="margin-top:20px; width: 100%;" idCur="" disc="">
                <?php
                echo "<thead>";
                echo "<tr>";
                echo "<th>Codigo</th>";
                echo "<th>Apelido</th>";
                echo "<th>Nome</th>";
                echo "<th>Nota</th>";
                echo "<th>Visivel</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";


                echo "</tbody>";			
                ?>			
            </table>


        </form>
        <form id="formEncerrar Semestre" method="post" action="" style="background: white;
              border: 0 none;
              border-radius: 5px;
              -moz-border-radius: 5px;
              -webkit-border-radius: 5px;
              box-shadow:0 0 15px 1px rgba(0,0,0,0.4);
              padding:20px 30px;
              box-sizing: border-box;
              margin: 0 10%;
              margin-top: 20px; display:none ">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>
                        <?php

                        ECHO "<input type='button' onClick='actualizarFrequencia()'  value='Actualizar Freq.' class='btn btn-info left-margin '   />";
                        ECHO "<input type='button' onClick='actualizarActa()'  value='Actualizar Acta' class='btn btn-secondary left-margin '   />";

                        ?>

                    </td>
                </tr>
            </table>
        </form>