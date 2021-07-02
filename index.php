<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once 'Controller/HomepageController.php';
session_start();

$controller = new HomepageController();
$controller->show();

