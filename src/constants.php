<?php
//Folders in the src from where classes can be autoloaded
define('AUTOLOAD_PATHS', ['api', 'modules', 'utils']);

//Path to module folder
define('MODULES_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'modules');

//Path PUBLIC folder
define('PUBLIC_PATH', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public');

//Path CSS folder
define('CSS_PATH', PUBLIC_PATH . DIRECTORY_SEPARATOR . 'css');

//Route param in index.php
define('ROUTE_PARAM', '_route_');
