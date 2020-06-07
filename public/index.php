<?php 
error_reporting(E_ALL);
require __DIR__.'/../vendor/autoload.php';


$route = new \Core\Route(new Core\Request);
$route->run();
 

