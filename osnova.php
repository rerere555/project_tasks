<?php
require 'dbconnect.php';
// session_start();$_SESSION['user_id'];

$sql = "SELECT tasks.title, categories.name as category_name 
        FROM tasks 
        LEFT JOIN categories ON tasks.category_id = categories.id ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$tasks = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мои задачи</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        .task { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        .category { color: #666; font-size: 0.8em; text-transform: uppercase; }
        .status { font-weight: bold; }
        /* .done { color: green; text-decoration: line-through; } */
    </style>
</head>
<body>
    <h1>Список дел</h1>
    <a href="add.task.php">+ Добавить задачу</a>
    <hr>
    <?php if (empty($tasks)): ?>
        <p>Задач пока нет. Время отдыхать!</p>
    <?php else: ?>
        <?php foreach ($tasks as $task): ?>
            <div class="task">
                <span class="category"><?= htmlspecialchars($task['category_name'] ?? 'Без категории') ?></span>
                <h3><?= htmlspecialchars($task['title']) ?></h3>
                <p><?= htmlspecialchars($task['description']) ?></p>
                <p class="status <?= $task['status'] ? 'done' : '' ?>">
                    Статус: <?= $task['status'] ? 'Выполнено' : 'В процессе' ?>
                </p>
                <a href="$?id=<?= $task['id'] ?>">Подробнее / Комментарии</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
