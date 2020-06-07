<?php 
namespace App;

class Kernel 
{
	public $routeMiddleware = [
        'auth' => "\App\Middleware\Authenticate",
        'api' => "\App\Middleware\CheckApi",
    ];
}