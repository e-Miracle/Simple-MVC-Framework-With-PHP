<?php


namespace App\Middlewares;


use Closure;
use Core\Middleware;
use Core\Request;

class AnotherMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        echo "another";
        parent::handle($request);
    }
}