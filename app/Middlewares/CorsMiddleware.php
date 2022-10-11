<?php


namespace App\Middlewares;


use Core\Middleware;
use Core\Request;

class CorsMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        //TODO: some logic
        parent::handle($request);
    }
}