<?php
// Adding composer autoload
require __DIR__ . '/../vendor/autoload.php';
// Preload environment variable
foreach (parse_ini_file('../.env') as $key => $value) {
    $_ENV[$key] = $value;
}
Sentry\init(['dsn' => $_ENV['SENTRY_DSN']]);
// Set timezone
date_default_timezone_set($_ENV['TIMEZONE']);

$request = $_SERVER["REQUEST_URI"];

if (strpos($request, "/computer-info") === 0) {
    include("pages/nav.php");
    include 'pages/ComputerInfo.php';
    echo exec('pages/ComputerInfo.php');
}
else if (strpos($request, "/computers") === 0) {
    include("pages/nav.php");
    include 'pages/computers.php';
    echo exec('pages/computers.php');
} else if (strpos($request, "/home") === 0) {
    include("pages/nav.php");
} else if (strpos($request, "/login") === 0) {
    include 'pages/login.php';
    echo exec('pages/login.php');
} else if (strpos($request, "/css") === 0) {
    include 'css/style.css';
    include 'css/nav.css';
} else {
    include 'pages/404.php';
    echo exec('pages/404.php');
}