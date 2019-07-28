<?php
function mb_ucfirst($text) 
{
    return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
}

if (isset($_POST)) {
    $firstName = mb_ucfirst(mb_strtolower(trim($_POST["firstName"])));
    $lastName = mb_ucfirst(mb_strtolower(trim($_POST["lastName"])));
    $middleName = mb_ucfirst(mb_strtolower(trim($_POST["middleName"])));

    $fullName = $lastName . " " . $firstName . " " . $middleName;
    $fio = mb_substr($lastName, 0, 1) . mb_substr($firstName, 0, 1) . mb_substr($middleName, 0, 1);
    $surnameAndInitials = $lastName . " " . mb_substr($firstName, 0, 1) . "." .  mb_substr($middleName, 0, 1) . ".";

    echo "Полное имя: '" . $fullName . "' <br/>";
    echo "Фамилия и инициалы: '" . $surnameAndInitials . "' <br/>";
    echo "Аббревиатура: '" . $fio . "'"; 
}
?>