<?php
include "./db.php"; 

// Verifica se o campo título foi enviado e não está vazio
if (isset($_POST['titulo']) && !empty(trim($_POST['titulo']))) {
    $titulo = trim($_POST['titulo']);

    // Prepara a query para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO servicos (titulo) VALUES (?)");
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Faz o bind do parâmetro e executa a query
    $stmt->bind_param("s", $titulo);

    if ($stmt->execute()) {
        // Tudo certo, redireciona de volta para a página inicial
        header("Location: ../index.php");
        exit();
    } else {
        echo "Erro ao adicionar tarefa: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "O campo título não pode estar vazio!";
}

$conn->close();
?>
