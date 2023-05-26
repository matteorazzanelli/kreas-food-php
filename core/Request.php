<?php

namespace App\Core;

class Request
{
    public static function uri()
    {
        // return trim($_SERVER['REQUEST_URI'],'/');
        // to remove all the args e.g. names?name=Matteo --> names
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    }

    public static function method()
    {
        // GET or POST or hidden value
        return $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
    }

    public static function filterParams()
    {
        // GET or POST or hidden value
        return $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
    }
}
