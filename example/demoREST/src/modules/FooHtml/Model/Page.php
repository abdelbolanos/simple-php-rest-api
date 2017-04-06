<?php
namespace FooHtml\Model;

use \Api\BaseModel as BaseModel;
use \FooHtml\Model\Header as Header;
use \FooHtml\Model\Body as Body;
use \FooHtml\Model\Footer as Footer;
use \FooHtml\View\PageView as PageView;

class Page extends BaseModel
{
    protected $header;
    protected $body;
    protected $footer;

    private function __construct()
    {
        $this->header = Header::create();
        $this->body = Body::create();
        $this->footer = Footer::create();
        $this->view = new PageView();
    }

    public static function create()
    {
        return new Page();
    }
}