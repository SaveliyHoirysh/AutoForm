<?php
$files = scandir(__DIR__ . "/uploads");
// Массив для ссылок на картинки
$links = [];
// Перебираем в папке uplooads
foreach($files as $file){
    // Усли папка текущая или корневая переходим к следующей итеррации
    if($file == "." || $file == ".."){
        continue;
    }
    echo $file . "<br>"
    // Добавляем в массив ссылки на картинки
    $link[] ="/uploads" . $file;
}
foreach($links as $link){
    echo $link . "<br>"
}
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
    <div class="div">
    <?php foreach ($links as $link) : ?>
    <img src="<? = $link; ?>" alt="" width = "100px">
    <?php if($login === null) : ?>
    </div>
        <a href="/login.php">Авторизуйтесь</a>
    <?php else: ?>
        Добро пожаловать, <?= $login ?>! <br>
        <a href="/logout.php">Выйти</a>
        <?php endif; ?>
</body>
</html>