<?php 
namespace App\Controllers;

use App\Controllers\Controller;
use Core\Request;
use App\Models\Product;

class HomeController extends Controller
{
	private $request;

	public function __construct(){
		$this->request = new Request;
		$this->product = new Product;
	}

	public function index($id){

		
		
	}

	public function get(){
		$get = $this->product->get();
		$str = "string from controller";

		$data = [
			'str' => $str,
			'arr' => $get,
		];

		return json($data);		
	}

	public function post(){
		echo "post 1";
		$this->$request->params()['name'];
	}

	public function getAuth(){
		$get = $this->product->get();
		$str = "string from controller";

		$data = [
			'str' => $str,
			'arr' => $get,
		];

		return json($data);	
	}

	
}
