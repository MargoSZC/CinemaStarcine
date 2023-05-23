<?php

include 'conecta_mysql.php';

error_reporting(E_ALL);
ini_set('display_errors', 'On');

    $conn = mysqli_connect($servername, $username, $password, $database);
	
    if ($conn->connect_error) {
        die("Falha de conexao BD: " . $conn->connect_error);}
        
    $h = "3"; //HORAS DO FUSO ((BRASÍLIA = -3) COLOCA-SE SEM O SINAL -).
    $hm = $h * 60;
    $ms = $hm * 60;
    //COLOCA-SE O SINAL DO FUSO ((BRASÍLIA = -3) SINAL -) ANTES DO ($ms). DATA
    $gmdata = gmdate("Y/m/d", time()-($ms)); 
    $gmhora = gmdate("g:i:s", time()-($ms)); 

    date_default_timezone_set('America/Sao_Paulo');    
    
    if(!empty($_POST['MMac'])){
        $Mac = $_POST['MMac'];
	    $Sensor=$_POST['SSensor'];
		$Luz=$_POST['LLuz'];

	    $sql = "INSERT INTO LeituraLeMa (dataleitura, horaleitura,Mac_idMac,Sensor_idSensor,valorsensor)
		VALUES ('".$gmdata."','".$gmhora."','".$Mac."','".$Sensor."','".$Luz."')";

		if ($conn->query($sql) === TRUE) {echo "OK";}
		else {echo "Erro SQL: " . $sql . "<br>" . $conn->error;}
	}
	
	$conn->close();
?>