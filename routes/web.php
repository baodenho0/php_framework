<?php 

/**
 * web routes
 */

$this->get('/', 'HomeController@index');
$this->get('/get', 'HomeController@get');
$this->get('/get/1', 'HomeController@get');

$this->post('/post', 'HomeController@post');



$this->group(['middleware'=>['auth','api']], function(){

	$this->get('/get-auth', 'HomeController@getAuth');

	$this->get('/function' , function(){
		echo " e ?? $a";
	});
});



// $this->group(['middleware'=>'auth'], function(){
// 	echo "d";
// });
