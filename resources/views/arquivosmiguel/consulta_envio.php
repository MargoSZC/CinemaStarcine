<?php

include 'conecta_mysql.php';
$sql = "
Select Mac.IdMac as 'Endereço MAC',
		Mac.Nome as 'Identificação',
		LeituraLeMa.IdLeituraLeMa as 'IdLeituraLeMa',
		LeituraLeMa.DataLeitura as 'Data da Leitura',
		LeituraLeMa.HoraLeitura as 'Hora da Leitura',
		LeituraLeMa.ValorSensor as 'Valor do Sensor',
		Sensor.Nome as 'NomeSensor',
		Sensor.Contador as 'Qtde Envios'
		
		
From 	Mac, LeituraLeMa, Sensor
Where LeituraLeMa.Mac_idMac=Mac.idMac 
AND LeituraLeMa.Sensor_idSensor = Sensor.idSensor 
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
			<th>DataLeitura</th>
			<th>HoraLeitura</th>
			<th>ValorSensor</th>
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
				<td>".$row["NomeSensor"]."</td>
				<td>".$row["Qtde Envios"]."</td>
			</tr>";
		}		echo "</center></table>";
	} else {echo "Nenhuma leitura encontrada.";	}
	$conecta->close();
?>