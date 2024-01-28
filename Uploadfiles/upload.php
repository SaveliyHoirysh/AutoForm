<?php
if(!empty($_FILES["attachment"])){
    $file = $_FILES["attachment"];
    //Собираем путь для нового файла в папке
    $srcFileName = $file["name"];
    $newFilePath = __DIR__ . "/Uploads" . $srcFileName;
    $arrayExtension = ["jpg", "png", "gif"];
    $extension = pathinfo($srcFileName, PATHINFO_EXTENSION); 
    // move_uploaded_files - помещает загруженный в новое место
    // функция вернёт true если всё нормально false усли что-то пошло не так
    if(in_array($extension, $arrayExtension)){
        echo "Загрузка файла с таким расширением запрещена";
    }elseif($file["error"] !== UPLOAD_ERR_OK){
        $msg = "Ошибка при загрузке файла";
    }elseif($file_exists($newFilePath)){
        $msg = "Файл с таким именем уже существует";
    }elseif(!move_uploaded_file($file["tmp_name"],$newFilePath)){
        $msg = "Ошибка при загрузке файла";
    }elseif($file["size"]>9192){
        $msg = "Размр файла больше 8Mb";
    }else {
        $msg = `Упешно загруженно <br>`;
        echo $file["size"];
    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload files</title>
</head>
<body>
    <?php
    if(!empty($msg)){
        echo $msg;
    }
    ?>
    <form action="/upload.php" method="post" enctype="multpart/form-data">
        <input type="file" name="attachment">
        <input type="submit" value="Загрузить файл">
    </form>
</body>
</html>