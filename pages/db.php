<?php
// Conexão com o banco
$host = "127.0.0.1";
$user = "root";
$pass = "Mileny11@@";
$db   = "todolist";
$port = 3306;

$conn = new mysqli($host, $user, $pass, $db, $port);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Opcional: mensagem de conexão
// echo "Banco de dados conectado: " . $conn->query("SELECT DATABASE()")->fetch_row()[0];
?>
