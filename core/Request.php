<?php 

namespace Core;

class Request 
{
	public function __construct(){

	}

	public function getMethod(){
		return $_SERVER['REQUEST_METHOD'];
	}

	public function getUrl(){
		return strtok($_SERVER['REQUEST_URI'], "?");
	}

	public function getFullUrl(){
		return $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}

	public function params(){
		return $_REQUEST;		
	}

}