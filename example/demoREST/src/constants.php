<?php
//Folders in the src from where classes can be autoloaded
//Add more folders to the array
define('AUTOLOAD_PATHS', array('modules'));

//Path to module folder
define('MODULES_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'modules');

//Path PUBLIC folder
define('PUBLIC_PATH', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public');

//Path CSS folder
define('CSS_PATH', PUBLIC_PATH . DIRECTORY_SEPARATOR . 'css');

//Route param in index.php
//so the request will be localhost/index.php?_route_=/path/endpoint
define('ROUTE_PARAM', '_route_');

//Host
define('HOST', $_SERVER['SERVER_NAME']);
