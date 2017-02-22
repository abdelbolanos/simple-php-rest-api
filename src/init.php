<?php
use \Api\Router as Router;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'constants.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

$router = Router::create();
$router->processRoute();