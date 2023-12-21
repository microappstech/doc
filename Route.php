<?php 


// Simple routing mechanism
$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
    case '/':
        include 'pages/home.php';
        break;

    case '/about':
        include 'pages/about.php';
        break;

    case '/contact':
        include 'pages/contact.php';
        break;

    default:
        include 'pages/404.php';
        break;
}





