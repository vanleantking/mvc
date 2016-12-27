<?php
include 'app/core/autoload.php';
include 'app/core/DB.php';
include 'config.php';

$db = new DB();
$db->connect();
// Get URL request
$url = explode('/', trim($_SERVER['REQUEST_URI']));
if (count($url) > 0) {
	$uriController = $url['1'];
	$uriAction = $url['2'];
	
	$controller = '';
	$calledController = '';
	try {
		$controller = ucfirst($uriController) . 'Controller';
		$calledController = new $controller;

		if (method_exists($calledController, $uriAction)) {

			return $calledController->$uriAction();
		} else {
			throw new Exception("Have no action: $uriAction", 1);			
		}

	} catch(Exception $e) {
		echo $e->getMessage();
	}
	
} else {

	try {
		$homeController = new HomeController();
		return $homeController->index();
	} catch (Exception $ex) {
		echo $ex->getMessage();
	}
}

?>