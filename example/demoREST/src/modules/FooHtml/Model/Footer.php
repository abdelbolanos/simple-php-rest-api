<?php
namespace FooHtml\Model;

use \Api\BaseModel as BaseModel;

use \FooHtml\Model\Header as Header;
use \FooHtml\Model\Body as Body;
use \FooHtml\View\FooterView as ArticleView;


class Footer extends BaseModel
{
    private function __construct()
    {
        $this->view = new FooterView();
    }

    public static function create()
    {
        return new Footer();
    }
}
