
<?php

include 'conecta_mysql.php';
$sql = "Select Mac.IdMac as 'Endereço MAC',
			Mac.Nome as 'Identificação',
			Mac.Contador as 'Qtde Envios'
		From Mac;";
	
	$result = $conecta->query($sql);
     $color="green";
	if ($result->num_rows > 0) {
		echo "<h2>Banco de dados(Triggers) ano/semestre / Monitoramento das Conexões</h2><table border=1><center>
        <tbody>
        <table border='1' class='sortable'  id='tabela_ordenavel'  width='100%'>        
        <tr style='background-color:".$color."'>	
			<th>Endereço Mac</th>
			<th>Nome</th>
			<th>Qtde envios</th>
		</tr></tbody>";
		
		
		// saída gerada em cada coluna do sql
		
		
		while($row = $result->fetch_assoc()) {
			echo "<tr>
			<td>".$row["Endereço MAC"]."</td>
			<td>".$row["Identificação"]."</td>
			<td>".$row["Qtde Envios"]."</td>

			</tr>";
		}		echo "</center></table>";
	} else {echo "Nenhuma leitura encontrada.";	}
	$conecta->close();
?>

