<?php 

if (!function_exists('dd')) {
    function dd($value){
        if(is_array($value)){
        	echo "<pre>";
                print_r($value);
            echo "</pre>";
        } else {
        	echo $value;            
        }
        die;
    }
}

if (!function_exists('view')) {
    function view($value, $data = NULL){
        if(file_exists(__DIR__.'/../resources/views/'.$value)){
            require __DIR__.'/../resources/views/'.$value;
        } else {
            die("$value does not exits");
        }
    }
}

if (!function_exists('json')) {
    function json($data){
        echo json_encode($data);
    }
}

if (!function_exists('abort')) {
    function abort($value){
        switch ($value) {
            case 404:
                require __DIR__.'/../resources/errors/404.php';
                break;
            case 401:
                require __DIR__.'/../resources/errors/401.php';
                break;
            
            default:      
                break;
        }     
        die;
    }
}