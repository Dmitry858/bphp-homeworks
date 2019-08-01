<?php

if (count($_GET) > 0) {
    if ($_GET["action"] == "delete" && file_exists("./images/" . $_GET["file"])) {
        unlink("./images/" . $_GET["file"]);
        echo "Файл " . $_GET["file"] . " удалён";
    }
}

if (count($_FILES) > 0) {
    $uploadsDir = 'images';

    if ($_FILES["userfile"]["error"] == UPLOAD_ERR_OK) {
        $tmpName = $_FILES['userfile']['tmp_name'];
        if (is_uploaded_file($tmpName)) {
            $pathParts = pathinfo($_FILES['userfile']['name']);
            if ($pathParts['extension'] == 'jpg' || $pathParts['extension'] == 'jpeg' || $pathParts['extension'] == 'png' || $pathParts['extension'] == 'gif') {
                move_uploaded_file($tmpName, $uploadsDir . '/' . $pathParts['basename']);
                echo 'Файл успешно загружен';
            } else {
                echo 'Недопустимый формат файла. Можно загружать только изображения в формате jpg, jpeg, png или gif';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Фотогалерея</title>
</head>
<body>
    <h2>Загрузить картинку</h2>
    <form enctype="multipart/form-data" action="index.php" method="POST" style="margin-bottom: 20px;">
        <input name="userfile" type="file" />
        <input type="submit" value="Загрузить" />
    </form>

    <?php
        $images = scandir("./images");
        foreach ($images as $key => $value) {
            if ($value == "." || $value == "..") {
                unset($images[$key]);
            }
        }
        if (count($images) > 0) {
            foreach ($images as $value) {
                echo "<img src='./images/" . $value . "'> ";
                echo "<a href='index.php?action=delete&file=". $value . "'>Удалить</a> <br/><br/>";
            }
        }
    ?>
</body>
</html>