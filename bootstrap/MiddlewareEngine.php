<?php


namespace Core;


class MiddlewareEngine
{
    private Request $request;
    private static array $middlewares;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    private static function loadMiddleware():void
    {
        if (is_file('../config/middlewares.php')){
            self::$middlewares =  require_once('../config/middlewares.php');
        }else{
            self::$middlewares =  [];
        }
    }

    public static function handler($class)
    {
        $key = array_search($class, self::$middlewares['middlewares']);
        if (array_key_exists($key+1, self::$middlewares['middlewares'])){
            return new self::$middlewares['middlewares'][$key+1];
        }
        return false;
    }
    public function run()
    {
        self::loadMiddleware();

        if (self::$middlewares['middlewares'][0]){
            $class = self::$middlewares['middlewares'][0];
            if (class_exists($class)){
                $class = new $class;
                if (method_exists($class, 'handle')){
                    $class->handle($this->request);
                }
            }
        }
    }
}