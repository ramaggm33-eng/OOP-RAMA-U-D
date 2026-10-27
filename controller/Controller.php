<?php

class Controller
{
    static function view(string $page, $data = []){
        $data;
        require $page;
    }
}