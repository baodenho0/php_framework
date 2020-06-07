<?php 
namespace App\Middleware;

class CheckApi
{
	public function handle(){
		if(1 == 2){
			return abort(401);
		}
	}
}