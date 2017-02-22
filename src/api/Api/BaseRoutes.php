<?php
namespace Api;

use \Api\Interfaces\BaseRoutesInterface as BaseRoutesInterface;

class BaseRoutes implements BaseRoutesInterface
{
    protected static $routes = array();

    private function __construct()
    {

    }

    public static function getRoutes()
    {
        return static::$routes;
    }
}