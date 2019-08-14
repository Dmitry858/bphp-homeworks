<?php
/**
 * frontfile of order create
 *
 * @var array $menu
 * @var array $post
 */

require_once 'const.php';
require_once 'loadJSON.php';
require_once 'renderView.php';
require_once 'countBill.php';
$menu = loadJSON('menu');
$services = loadJSON('services');
$post = $_POST;

renderView('default', 'order', ['order' => countBill($menu, $services, $post)]);