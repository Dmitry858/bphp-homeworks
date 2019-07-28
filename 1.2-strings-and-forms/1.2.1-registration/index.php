<?php
if (isset($_POST) && count($_POST) > 0) {
    $messages = array();
    $codeWord = "nd82jaake";

    foreach ($_POST as $key => $value) {
        if ($key === "login" && preg_match("/[@\/\*\?,;:]/", $value) === 1) {
            array_push($messages, "Поле 'Логин' не должно содержать символы @/*?,;:");
        } elseif ($key === "password" && strlen($value) < 8) {
            array_push($messages, "Длина пароля должна быть минимум 8 символов");
        } elseif ($key === "email" && preg_match("/^[A-Za-z0-9_.-]+\@\w+\.\D{2,7}/", $value) !== 1) {
            array_push($messages, "Почта должна быть формата почта@домен.доменнаязона");
        } elseif ($key === "firstName" && strlen($value) === 0) {
            array_push($messages, "Имя обязательно к заполнению");
        } elseif ($key === "lastName" && strlen($value) === 0) {
            array_push($messages, "Фамилия обязательна к заполнению");
        } elseif ($key === "middleName" && strlen($value) === 0) {
            array_push($messages, "Отчество обязательно к заполнению");
        } elseif ($key === "code" && $value !== $codeWord) {
            array_push($messages, "Кодовое слово введено неверно");
        }
    }

    if (count($messages) > 0) {
        foreach ($messages as $value) {
            echo $value;
            echo "<br/>";
        } 
?>
        <br/>
        <a href="/bphp-homeworks/1.2-strings-and-forms/1.2.1-registration/form.html">Вернуться к форме</a>
<?php
    } else {
        echo "Спасибо! Регистрация прошла успешно!";
    }

}
?>