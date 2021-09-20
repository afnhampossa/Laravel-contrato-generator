			
				while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){
					extract($row); 
					echo "<tr class='linTestes'>";
					    echo "<td id='idTeste'>$row[idTeste]</td>";
					    echo "<td id='tipoTeste'>$row[tipoTeste]</td>";
						if(($row['idTipo']>=0 )&&($row['idTipo']!=4)&&($row['idTipo']!=5)&&($row['idTipo']!=6)){
					        echo "<td id='peso' style='text-align:center;'>$row[peso]"; echo"</td>";
							$total+=$row['peso'];
						} else
							echo"<td style='text-align:center;'>-</td>";
						echo "<td id='dataAfazer' style='text-align:center;'>$row[dataAfazer]";	
						echo"</td>";	
						echo "<td>";
						    ECHO "<input  type='hidden' id='idTipo1'  value='$row[idTipo]'  />";
							ECHO "<input  type='hidden' id='pesoAnterior'  value='$row[peso]'  />";
							ECHO "<input  type='hidden' id='totalPeso'  value='0'  />";
						    ECHO "<input  type='hidden' id='ano'  value='$row[ano]'  />";
							ECHO "<input  type='hidden' id='idCurso'  value='$row[idCurso]'  />";
							ECHO "<input  type='hidden' id='idDiciplina'  value='$row[idDiciplina]'  />";
							
							if($row['idTipo']>=0){
								echo"<input type='button' onClick='verTestes($(this))'  value='Ver' class='btn btn-success left-margin' />";
								echo"<input type='button' onClick='lancarNotas($(this))'  value='Notas' class='btn btn-info left-margin' />";
							}
								if($row['disponivel']==0 ) {
									$online='display:block';$offline='display:none';
								}else {
									$offline='display:block';$online='display:none';
								
								}
								echo"<input type='button' id='online' style='float:left;$online' onClick='publicarTeste($(this))'  value='Online' class='btn btn-primary left-margin' />";
							
								echo"<input type='button' id='offline' style='float:left;$offline' onClick='publicarTeste($(this))'  value='OffLine' class='btn btn-danger left-margin' />";
						//	}
						    
						echo"</td>";			
					echo"</tr>";
                }
				echo"<tr><td colspan='2'>Total dos pesos</td><td style='text-align:center;'>$total</td></tr>";