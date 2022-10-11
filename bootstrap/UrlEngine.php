<?php
namespace Core;

trait UrlEngine
{
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function path()
    {
        return strtok($_SERVER["REQUEST_URI"], '?');
    }
}
