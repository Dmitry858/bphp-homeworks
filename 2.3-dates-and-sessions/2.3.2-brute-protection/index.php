<?php
$users = [
    'admin' => 'admin1234',
    'randomUser' => 'somePassword',
    'janitor' => 'nimbus2000'
];

function is_brute_force() 
{
    if (isset($_COOKIE['try_per_5sec']) || isset($_COOKIE['try2_pre_1min'])) {
        return true; 
    } else {
        return false;
    }
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    if (is_brute_force()) {
        $file = './brute_force_logs/' . $_POST['login'] . '.txt';
        $f = fopen($file, 'a');
        $string = date('d.m.Y H:i:s', time()) . "\n";
        fwrite($f, $string);
        fclose($f);
        echo 'Слишком часто вводите пароль. Попробуйте еще раз через минуту.';
    } else {
        foreach ($users as $key => $value) {
            if ($key === $_POST['login'] && $value === $_POST['password']) {
                echo 'Авторизация прошла успешно! Привет, ' . $_POST['login'];
                return;
            }
        }
        setcookie('try_per_5sec', time(), time() + 5);
        if (isset($_COOKIE['try_pre_1min'])) {
            $expire = time() + (60 - (time() - $_COOKIE['try_pre_1min']));
            setcookie('try2_pre_1min', time(), $expire);
        } else {
            setcookie('try_pre_1min', time(), time() + 60);
        }
        echo "Учётные данные введены неверно, попробуйте ещё раз. <br/>";
        echo '<a href="./form.html">Вернуться к форме</a>';
    }
}