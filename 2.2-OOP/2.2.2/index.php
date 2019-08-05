<?php
    require 'autoload.php';
    require 'config/SystemConfig.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.2.2 - Модель доступа к данным</title>
    <style>
        input {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h2>Создать пользователя</h2>
    <form action="addUser.php" method="POST">
        <label>
            Имя: 
            <input type="text" name="name" required>
        </label>
        <br/>
        <label>
            Пароль: 
            <input type="password" name="password" required>
        </label>
        <br/>
        <label>
            Электронная почта: 
            <input type="text" name="email" required>
        </label>
        <br/>
        <label>
            Рейтинг: 
            <input type="text" name="rate" required>
        </label>
        <br/>
        <button type="submit">Добавить пользователя</button>
    </form>
    <hr/>
    
    <?php
        $users = new Users('name');
        $users->displaySortedList();
    ?>
    <a href="deleteUser.php">Удалить всех пользователей</a>
</body>
</html>