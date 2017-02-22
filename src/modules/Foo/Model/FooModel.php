<?php
namespace Foo\Model;

use \Api\BaseModel as BaseModel;

/**
* 
*/
class FooModel extends BaseModel
{
    protected $name;

    private function __construct($name='')
    {
        
    }

    public static function create()
    {
        return new FooModel();
    }

    public static function get($name)
    {
        return new FooModel($name);
    }
}
