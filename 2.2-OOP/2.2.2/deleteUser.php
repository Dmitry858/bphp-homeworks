<?php

require 'autoload.php';
require 'config/SystemConfig.php';

$user = new User;
$user->commit();
$user->delete();

header('HTTP/1.1 200 OK'); 
header('Location: http://' . $_SERVER['HTTP_HOST'] . '/bphp-homeworks/2.2-OOP/2.2.2');