<?php

$servername = "localhost";
$username = "miguelde_trabalhofinal";
$database = "miguelde_trabalhofinal";
$password = "trabalhofinal";

// Create connection
$conecta  = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conecta ) {
    die("Falha de conexão: " . mysqli_connect_error());
}
echo "Banco conectado com sucesso!";
//phpinfo();
?>

