<?php
namespace Api;

use \Api\Interfaces\BaseModelInterface as BaseModelInterface;
use \Api\BaseView as BaseView;

class BaseModel implements BaseModelInterface
{
    public static function create()
    {
        return new BaseModel();
    }

    public static function get($name)
    {
        return new BaseModel($name);
    }

    public function __get($name)
    {
        return $this->$name;
    }

}