<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "historia_brasil";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
