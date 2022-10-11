<?php
namespace Core;

trait Router
{
    private static $map;
    public static function get($url, $class, $method)
    {
        self::cleanUrl($url);
        self::cleanClass($class);
        self::cleanMethod($method);

        self::$map['get'][$url] = [
            'class'=>$class,
            'method'=>$method
        ];
    }

    public static function post($url, $class, $method)
    {
        self::cleanUrl($url);
        self::cleanClass($class);
        self::cleanMethod($method);

        self::$map['post'][$url] = [
            'class'=>$class,
            'method'=>$method
        ];
    }

    private static function cleanUrl($url)
    {

    }

    private static function cleanClass($class)
    {

    }

    private static function cleanMethod($method)
    {

    }

    public static function getMap(){
        return self::$map;
    }
}
