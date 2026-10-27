<?php

require_once './controller/HomeController.php';
require_once './controller/BookController.php';
require_once './controller/AuthorController.php';

$server = $_SERVER["REQUEST_URI"];

if (preg_match('#^/author/([0-9]+)/edit$#', $server, $matches)) {
    return AuthorController::edit($matches[1]);
}

if (preg_match('#^/author/([0-9]+)/delete$#', $server, $matches)) {
    return AuthorController::delete($matches[1]); 
}

switch($server) {
    case $server == "/":
        return HomeController::index();
    case $server == "/book":
        return BookController::index();
    case $server == "/author":
        return AuthorController::index();
    case $server == "/author/create":

        if (isset($_POST['name'])) {
            return AuthorController::store($_POST['name']);
        }       
        return AuthorController::create();
    case $server == "/profile":
        require "./view/profile.php";
    break;
    default:
        require "./view/404-page.php";
}   