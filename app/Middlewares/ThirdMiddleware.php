<?php


namespace App\Middlewares;


use Closure;
use Core\Middleware;
use Core\Request;

class ThirdMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        echo "third";
        parent::handle($request);
    }
}