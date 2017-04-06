<?php
use \Api\Router as Router;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'constants.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

//index.php?_action_=/v1/article/1.345678

$router = Router::create();
$router->processRoute();