<?php
$variable = 1;
$type = "";
$description = "";

if (is_bool($variable)) {
    $type = "bool";
    $description = "Это логический тип, который выражает истинность значения. Он может быть либо TRUE, либо FALSE.";
} elseif (is_float($variable)) {
    $type = "float";
    $description = "Число с плавающей точкой.";
} elseif (is_int($variable)) {
    $type = "int";
    $description = "Это целое число.";
} elseif (is_string($variable)) {
    $type = "string";
    $description = "Это строка. Строка в PHP - это набор символов любой длины.";
} elseif (is_null($variable)) {
    $type = "null";
    $description = "Специальное значение NULL представляет собой переменную без значения.";
} else {
    $type = "other";
    $description = "Это либо Array, либо Object, либо Resource.";
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
</head>
<body>
    <?php if ($type === "float" || $type === "int" || $type === "string") { ?>
    <p><?=$variable?> is <?=$type?></p>
    <?php } else { ?>
    <p>$variable is <?=$type?></p>
    <?php } ?>

    <hr/>
    <p><?=$description?></p>
</body>
</html>