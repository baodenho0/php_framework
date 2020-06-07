<?php 
namespace App\Models;

use App\Models\Model;

class Product extends Model
{
	public function __construct(){
		// dd('dd');
	}

	public function get(){
		$arr = [
			'aa' => 1,
			'a' => '222'
		];
		return $arr;
	}
}