<?php 

namespace Core;

use Core\Request;
use App\Kernel;

class Route 
{
	private $url;
	private $param;
	private $request;
	private $kernel;

	public function __construct(Request $request){
		$this->request = $request;
		$this->kernel = new Kernel;
	}

	private function getUrl(){
		$this->url = $this->request->getUrl();		
	}

	public function run(){		
		require __DIR__.'/../routes/web.php';
	}

	private function redirectController($url, $controller){
		$this->getUrl();

		$check = $this->checkUrl($url);
	
		if($check){			
			if(!$this->hadleFunctionParam($controller)){
				$controller = explode("@", $controller);			

				$class = "\\App\\Controllers\\".$controller[0];
				$method = $controller[1]; 
				$this->checkClassAndMethod($class, $method);

				$instance = new $class;
				$instance->$method($this->param);
			}
			die;
		}		
	}

	private function checkUrl($url){ 
		$arrUrl = explode("/", $url); 

		$keyParam = NULL;
		$valueParam = NULL;
		foreach ($arrUrl as $key => $value) {
			$getHead = substr($value,0, 1);
			
			if($getHead == "{"){ 
				$keyParam = $key;
				$valueParam = $value;				
			}
		}
		
		if($keyParam){
			$this->url = $this->replaceUrl($keyParam, $valueParam);
		}

	
		if($url === $this->url){		
			return true;
		}
	}

	private function checkClassAndMethod($class, $method){
		if (!class_exists($class)) {
		    die("$class does not exis");
		}
		if(!method_exists($class, $method)){
			die("Method $method does not exis");
		}
	}

	private function replaceUrl($keyUrl, $valueUrl){
		$arrUrl = explode("/", $this->url);

		$newUrl = NULL;
		foreach ($arrUrl as $key => $value) {
			if($key == $keyUrl){ 
				$newUrl .= '/'.$valueUrl;
				$this->param = $value;

			} else {
				$newUrl .= '/'.$value;
			}
		}

		return str_replace("//","/", $newUrl);
	}

	public function get($url, $controller){
		if($this->request->getMethod() != "GET"){		
			return false;
		}
		$this->redirectController($url, $controller);
	}

	public function post($url, $controller){ 
		if($this->request->getMethod() != "POST"){
			return false;
		}
		$this->redirectController($url, $controller);
	}

	public function group($array, $function){
		$this->handleKanel($array['middleware']);
		$this->hadleFunctionParam($function);		
	}

	private function hadleFunctionParam($function){
		if(is_callable($function)){
			$function();
			return true;
		}
	}

	private function handleKanel($value){
		if(!is_array($value)){
			die("Middleware does not array");
		}

		$middleware = $this->kernel->routeMiddleware; 
		foreach ($value as $key => $element) {
			$class = $middleware[$element];
			if(class_exists($class)){
				$instance = new $class;
				$instance->handle();
			} else {
				die("Middleware does not exist");
			}
		}	
		
	}
}