<?php

include 'conecta_mysql.php';
$sql = "
Select Mac.IdMac as 'Endereço MAC',
		Mac.Nome as 'Identificação',
		LeituraLeMa.IdLeituraLeMa as 'IdLeituraLeMa',
		LeituraLeMa.Data_Leitura as 'Data da Leitura',
		LeituraLeMa.Hora_Leitura as 'Hora da Leitura',
		LeituraLeMa.Valor_Sensor as 'Valor do Sensor',
		Push.Nome as 'NomePush',
		Push.Contador as 'Qtde Envios'
		
		
From 	Mac, LeituraLeMa, Push
Where LeituraLeMa.Mac_idMac=Mac.idMac 
AND LeituraLeMa.Push_idPush = Push.idPush 
AND LeituraLeMa.Mac_idMac='CC:50:E3:05:19:BA' 
ORDER BY LeituraLeMa.IdLeituraLeMa DESC";

	
	$result = $conecta->query($sql);
     $color="green";
	if ($result->num_rows > 0) {
		echo "<h2>Banco de dados(Triggers) 2023/1 / Monitoramento das Conexões</h2><table border=1><center>
        <tbody>
        <table border='1' class='sortable'  id='tabela_ordenavel'  width='100%'>        
        <tr style='background-color:".$color."'>
			<th>Endereço</th>	
			<th>Identificação</th>		
			<th>Id LeituraLeMa</th>	
			<th>Data_Leitura</th>
			<th>Hora_Leitura</th>
			<th>Valor_Sensor</th>
			<th>Nome</th>
			<th>Contador</th>
		</tr></tbody>";
		// saída gerada em cada coluna do sql
		while($row = $result->fetch_assoc()) {
			echo "<tr>
				<td>".$row["Endereço MAC"]."</td>
				<td>".$row["Identificação"]."</td>
				<td>".$row["IdLeituraLeMa"]."</td>
				<td>".$row["Data da Leitura"]."</td>
				<td>".$row["Hora da Leiura"]."</td>
				<td>".$row["Valor do Sensor"]."</td>
				<td>".$row["NomePush"]."</td>
				<td>".$row["Qtde Envios"]."</td>
			</tr>";
		}		echo "</center></table>";
	} else {echo "Nenhuma leitura encontrada.";	}
	$conecta->close();
?>