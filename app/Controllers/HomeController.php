<?php
namespace App\Controllers;

use Core\Request;

class HomeController
{
    public function test(Request $request)
    {
        $string = "My First Framework";
        $test = "Welcome";
        return view('home.index', compact('string', 'test'));
    }
}
