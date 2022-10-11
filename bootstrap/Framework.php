<?php
namespace Core;


class Framework
{
    use Router, UrlEngine, View;
    private Request $request;

    public function __construct(){
        $this->request = new Request();
    }
    /**
     * @throws \Exception
     */
    public function run()
    {
        //run through our middleware
        $middleware = new MiddlewareEngine($this->request);
        $middleware->run();

        //run the match function to get the class and method
        $callable = $this->match($this->method(), $this->path());
        if (!$callable){
            throw new \Exception('Oops! you are lost', 404);
        }

        //call the class, pass the method
        //add the default namespace to the controller
        $class = "App\\Controllers\\".$callable['class'];
        if (!class_exists($class)){
            throw new \Exception('Class does not exist', 500);
        }

        $method = $callable['method'];

        if (!is_callable($class, $method)){
            throw new \Exception("$method is not a valid method in class $callable[class]", 500);
        }
        $class = new $class();

        //run the method
        $class->$method($this->request);
        return;
    }

    private function match($method, $url)
    {
        foreach (self::$map[$method] as $uri=>$call){
            //does the $url have a trailing slash? if yes, remove it
            //make sure the only string present is not the slash
            if (substr($url, -1) === '/' && $uri != '/'){
                //remove the slash
                $url = substr($url, 0, -1);
            }
            //if our $uri does not contain a pre-slash, we add it
            if ($url == $uri){
                return $call;
            }
        }
        return false;
    }
}
