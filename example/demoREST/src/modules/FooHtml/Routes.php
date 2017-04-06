<?php
namespace FooHtml;

use \Api\BaseRoutes as BaseRoutes;
use \FooHtml\Controller as PageController;

class Routes extends BaseRoutes
{
    protected static $routes = [
        [
            'route' => '^/article/(?P<id>[0-9\.]+)$',
            'controller' => PageController::class,
            'action' => 'getPage',
            'method' => 'GET',
            'responseType' => 'HTML'
        ],
    ];
}