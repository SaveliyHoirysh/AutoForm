<?php
require __DIR__."/auth.php";

$login = getUserLogin();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
</head>
<body>
    <?php if($login === null): ?>
        <a href="/login.php">Авторизуйтесь</a>
    <?php else: ?>
        Добро пожаловать, <?= $login ?>! <br>
        <a href="/logout.php">Выйти</a>
        <?php endif; ?>
</body>
</html>