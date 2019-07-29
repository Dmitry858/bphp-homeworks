<?php
function generate($rows, $placesPerRow, $avaliableCount)
{
    if ($rows * $placesPerRow > $avaliableCount) return false;

    $map = [];

    for ($i = 1; $i <= $rows; $i++) {
        $row = [];
        for ($place = 1; $place <= $placesPerRow; $place++) {
           $row[$place] = false; 
        }
        $map[$i] = $row;
    }

    return $map;
}

function reserve(&$map, $row, $place)
{
    if ($map[$row][$place] === false) {
        $map[$row][$place] = true;
        return true;
    } else {
        return false;
    }
}

// Проверка
$chairs = 50;
$map = generate(5, 8, $chairs);
$requiredRow = 3;
$requiredPlace = 5;

$reverve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reverve);

$reverve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reverve);

function logReserve($row, $place, $result){
    if ($result) {
        echo "Ваше место забронировано! Ряд $row, место $place" . PHP_EOL;
    } else {
        echo "Что-то пошло не так=( Бронь не удалась" . PHP_EOL;
    }
}

?>