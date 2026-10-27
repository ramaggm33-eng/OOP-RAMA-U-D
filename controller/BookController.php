<?php
require_once "Controller.php";

class BookController extends Controller
{
    static function index()
    {
        return self::view("./view/book.php");
    }
}