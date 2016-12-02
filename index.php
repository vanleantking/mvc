<?php
include 'app/core/autoload.php';

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
			echo "buzzzzz";
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