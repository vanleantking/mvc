<?php
function controllerLoader($controller)
{
	$path = 'app/controller/' . $controller . '.php';
	if (file_exists($path)) {
    	include_once 'app/controller/' . $controller . '.php';
    } else {
    	throw new Exception("Have no controller: $controller");
    }
}

function modelLoader($model)
{
	$path = 'app/model/' . $model . '.php';
	if (file_exists($path)) {
		include_once 'app/model/' . $model . '.php';
	} else {
    	throw new Exception("Have no model: $model");
    }
}

function logLoader()
{
	if (file_exists('app/core/Log.php')) {
		include_once 'app/core/Log.php';
	} else {
		throw new Exception("Error on load log loader");		
	}
}
?>