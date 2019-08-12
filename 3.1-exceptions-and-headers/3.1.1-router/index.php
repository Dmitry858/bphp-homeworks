<?php
/**
 * Доступные страницы на сайте
 *
 * @var array $availableLinks
 */
$availableLinks = include './availableLinks.php';
include './classes/Router.php';

if (isset($_GET['page'])) {
    $pagename = $_GET['page'];
    $router = new Router($availableLinks);

    try {
        if ($router->isAvailablePage($pagename)) {
            echo 'Вы находитесь на странице ' . $pagename;
        }
    } catch (Exception $e) {
        header('HTTP/1.1 404 Not Found');
        header('Location: 404.php');
    }
} else {
    header('HTTP/1.1 400 Bad Request');
    header('Location: error.php');
}
