<?php
session_start();

// Inicializa a lista de tarefas se não existir
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

$tasks = $_SESSION['tasks'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <nav class="navbar navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <h1 class="navbar-brand mb-0">📝 Lista de Tarefas</h1>
            <a href="reset_tasks.php" class="btn btn-outline-light btn-sm">Limpar Tudo</a>
        </div>
    </nav>

    <div class="container flex-grow-1">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="add_task.php" method="POST" class="d-flex gap-2">
                    <input type="text" name="task" class="form-control" placeholder="Digite uma nova tarefa..." required>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </form>
            </div>
        </div>

        <div class="mt-4">
            <?php if (empty($tasks)): ?>
                <div class="alert alert-info text-center">Nenhuma tarefa adicionada ainda.</div>
            <?php else: ?>
                <ul class="list-group">
                    <?php foreach ($tasks as $index => $task): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="<?= $task['done'] ? 'text-decoration-line-through text-muted' : '' ?>">
                                <?= htmlspecialchars($task['text']) ?>
                            </span>
                            <div class="btn-group">
                                <?php if (!$task['done']): ?>
                                    <a href="complete_task.php?index=<?= $index ?>" class="btn btn-outline-success btn-sm">Concluir</a>
                                <?php endif; ?>
                                <a href="delete_task.php?index=<?= $index ?>" class="btn btn-outline-danger btn-sm">Excluir</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>

    <footer class="text-center mt-auto py-3 bg-white border-top">
        <small>Feito com em PHP básico</small>
    </footer>

</body>
</html>
