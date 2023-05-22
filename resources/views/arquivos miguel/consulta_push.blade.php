<?php

include 'conecta_mysql.php';
$sql = "Select Push.IdPush as 'Endereço PUSH',
			Push.Nome as 'NomePush',
			Push.Contador as 'Qtde Envios'
		From Push;";
	
	$result = $conecta->query($sql);
     $color="green";
	if ($result->num_rows > 0) {
		echo "<h2>Banco de dados(Triggers) ano/semestre / Monitoramento das Conexões</h2><table border=1><center>
        <tbody>
        <table border='1' class='sortable'  id='tabela_ordenavel'  width='100%'>        
        <tr style='background-color:".$color."'>	
			<th>Endereço Push</th>
			<th>Identificação</th>
			<th>Qtde Envios</th>
		</tr></tbody>";
		
		
		// saída gerada em cada coluna do sql
		
		
		while($row = $result->fetch_assoc()) {
			echo "<tr>
			<td>".$row["Endereço PUSH"]."</td>
			<td>".$row["NomePush"]."</td>
			<td>".$row["Qtde Envios"]."</td>

			</tr>";
		}		echo "</center></table>";
	} else {echo "Nenhuma leitura encontrada.";	}
	$conecta->close();
?>