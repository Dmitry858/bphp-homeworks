<?php
    $time = date("H");

    function getMessage($workday) 
    {
        if ($workday === true && date("N") < 3) {
            return "Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 09:00";
        } elseif ($workday === true && date("N") >= 3 && date("N") < 6) {
            return "Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 10:00";
        } elseif ($workday === true && date("N") == 6) {
            return "Послезавтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 09:00";
        } elseif ($workday === false) {
            return "Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 09:00";
        }
    }

    switch (date("N")) {
        case 1:
            $day = "понедельник";
            $workday = true;
            $start_hour = "09";
            break;
        case 2:
            $day = "вторник";
            $workday = true;
            $start_hour = "09";
            break;
        case 3:
            $day = "среда";
            $workday = true;
            $start_hour = "09";
            break;
        case 4:
            $day = "четверг";
            $workday = true;
            $start_hour = "10";
            break;
        case 5:
            $day = "пятница";
            $workday = true;
            $start_hour = "10";
            break;
        case 6:
            $day = "суббота";
            $workday = true;
            $start_hour = "10";
            break;
        case 7:
            $day = "воскресенье";
            $workday = false;
            $start_hour = null;
            break;
    }

    if ($time >= 6 && $time < 11) {
        $text = 'Доброе утро!';
        $image = 'img/morning.jpg';
        if ($workday === true && $time < $start_hour) {
            $message = "Сегодня - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с ${$start_hour}:00";
        } elseif ($workday === true && $time >= $start_hour) {
            $message = "Это лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас до 18:00";
        } elseif ($workday === false) {
            $message = "Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 09:00";
        }
    } elseif ($time >= 11 && $time < 18) {
        $text = 'Добрый день!';
        $image = 'img/afternoon.jpg';
        if ($workday === true) {
            $message = "Это лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас до 18:00";
        } elseif ($workday === false) {
            $message = "Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 09:00";
        }
    } elseif ($time >= 18 && $time < 23) {
        $text = 'Добрый вечер!';
        $image = 'img/evening.jpg';
        $message = getMessage($workday);
    } else {
        $text = 'Доброй ночи!';
        $image = 'img/night.jpg';
        if ($time >= 23) {
            $message = getMessage($workday);
        } elseif ($workday === true) {
            $message = "Сегодня - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с ${$start_hour}:00";
        } elseif ($workday === false) {
            $message = "Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 09:00";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="img" style="background-image: url(<?= $image; ?>)">
        <div class="greeting">
            <h1><?= $text; ?></h1>
            <hr/>
            <h3>Сегодня <?= $day; ?>.</h3>
            <h3><?= $message; ?></h3>
        </div>
    </div>
</body>
</html>