<?php
namespace FooHtml\Model;

use \Api\BaseModel as BaseModel;
use \FooHtml\View\HeaderView as HeaderView;

class Header extends BaseModel
{
    private function __construct()
    {
        $this->view = new HeaderView();
    }

    public static function create()
    {
        return new Header();
    }
}
