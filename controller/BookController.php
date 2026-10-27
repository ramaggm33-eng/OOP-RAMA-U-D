<?php
require "Controller.php";

class BookController extends Controller
{
    static function index()
    {
        return self::view("./view/book.php");
    }
}