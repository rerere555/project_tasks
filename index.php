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
    <title>Вход в систему</title>
    <style>
        body { font-family: sans-serif; line-height: 1.5; padding: 20px; max-width: 400px; margin: auto; }
        input { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background: #007bff; color: white; border: none; padding: 10px 15px; cursor: pointer; width: 100%; border-radius: 4px; }
        button:hover { background: #0069d9; }
        a {text-decoration: none; background: #007bff; color: white; border: none; padding: 10px 15px; cursor: pointer; width: 100%; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Вход</h1>
    <form action="auth.php" method="POST">
        <label>имя</label>
        <input type="name" name="name" required>
        <label>Email</label>
        <input type="email" name="email" required>
        
        <label>Пароль</label>
        <input type="password" name="password" required>
        
        <a href="osnova.php" type="submit" name="login">Войти</a>
    </form>
    <br>
    <a href="register.php">Нет аккаунта? Зарегистрироваться</a>
</body>
</html>
