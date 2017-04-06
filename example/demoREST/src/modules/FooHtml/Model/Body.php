<?php
namespace FooHtml\Model;

use \Api\BaseModel as BaseModel;
use \FooHtml\View\BodyView as BodyView;

class Body extends BaseModel
{

    private function __construct()
    {
        $this->view = new BodyView();
    }

    public static function create()
    {
        return new Body();
    }
}
