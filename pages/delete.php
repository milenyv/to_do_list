<?php
include "./db.php"; 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Prepara a query para deletar
    $stmt = $conn->prepare("DELETE FROM servicos WHERE id = ?");
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $id);

    if (!$stmt->execute()) {
        die("Erro ao excluir a tarefa: " . $stmt->error);
    }

    $stmt->close();
}

$conn->close();
header("Location: ../index.php");
exit();
?>
