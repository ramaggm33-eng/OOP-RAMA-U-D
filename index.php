<?php

require './controller/HomeController.php';
require './controller/BookController.php';
require './controller/AuthorController.php';

$server = $_SERVER["REQUEST_URI"];

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