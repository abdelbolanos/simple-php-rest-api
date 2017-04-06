<?php
namespace Foo;

use \Api\BaseRoutes as BaseRoutes;
use \Foo\Controller as FooController;

class Routes extends BaseRoutes
{
    protected static $routes = [
        [
            'route' => '^/foo/(?P<id>[1-9\.]+)$',
            'controller' => FooController::class,
            'action' => 'getFoo',
            'method' => 'GET',
            'responseType' => 'JSON',
        ],
    ];
}