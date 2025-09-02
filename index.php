<?php include "./pages/db.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>To-Do List em PHP</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <h1>To-Do List</h1>

  <!-- Formulário de nova tarefa -->
  <form action="./pages/add.php" method="POST">
    <!-- Alterado de 'servicos' para 'titulo', pois essa é a coluna no banco -->
    <input type="text" name="titulo" placeholder="Digite uma tarefa..." required>
    <button type="submit">Adicionar</button>
  </form>

  <!-- Filtros -->
  <div class="filtros">
    <a href="index.php">Todas</a> | 
    <a href="index.php?filtro=pendente">Pendentes</a> | 
    <a href="index.php?filtro=concluida">Concluídas</a>
  </div>
  
  <h2>Lista de Tarefas</h2>
  <ul>
    <?php
      // Verifica filtro selecionado
      $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'todas';

      // Monta a SQL de acordo com o filtro
      if ($filtro === "pendente") {
          $sql = "SELECT * FROM servicos WHERE status='pendente' ORDER BY id DESC";
      } elseif ($filtro === "concluida") {
          $sql = "SELECT * FROM servicos WHERE status='concluida' ORDER BY id DESC";
      } else {
          $sql = "SELECT * FROM servicos ORDER BY id DESC";
      }

      // Executa a consulta
      $result = $conn->query($sql);

      // Verifica se houve erro na consulta
      if (!$result) {
          echo "<li>Erro ao buscar tarefas: " . $conn->error . "</li>";
      } elseif ($result->num_rows > 0);
          while($row = $result->fetch_assoc()):
    ?>
      <li>
        <span class="<?= $row['status']; ?>">
          <!-- Alterado para 'titulo', que é a coluna correta -->
          <?= htmlspecialchars($row['titulo']); ?>
        </span>
        
        <?php if($row['status'] === 'pendente'): ?>
          <a href="./pages/update.php?id=<?= $row['id']; ?>">Concluir</a>
        <?php endif; ?>

        <a href="./pages/delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Excluir tarefa?')">Excluir</a>
      </li>
    <?php 
        endwhile;
    ?>
      <li>Nenhuma tarefa encontrada.</li>
  </ul>
</body>
</html>
