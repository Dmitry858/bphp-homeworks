<?php
/*Подключение необходимых файлов*/
require 'autoload.php';
require 'config/SystemConfig.php';

/*Создание объекта*/
$user = new User;

/*Передача значений свойств из формы в объект*/
$user->addUserFromForm($_POST);

/*Сохранение*/
$user->commit();

/*Далее перенаправление на страницу, с которой производилась отправка формы:*/
header('HTTP/1.1 200 OK'); 
header('Location: http://' . $_SERVER['HTTP_HOST'] . '/bphp-homeworks/2.2-OOP/2.2.2');