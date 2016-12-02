<?php
function controllerLoader($controller) {
	$path = 'app/controller/' . $controller . '.php';
	if (file_exists($path)) {
    	include 'app/controller/' . $controller . '.php';
    } else {
    	throw new Exception("Have no controller: $controller");
    }
}

spl_autoload_register('controllerLoader');
?>