<?php 
namespace App\Middleware;

class Authenticate
{
	/**
	 * check 
	 * @return about($value)
	 */
	public function handle(){
		if(1 == 2){
			return abort(401);
		}
	}
}