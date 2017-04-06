<?php
namespace FooHtml;

use \Api\BaseController as BaseController;
use \Api\Response as Response;

use \FooHtml\Model\Page as Page;

class Controller extends BaseController
{
    public function getPage($request)
    {
        $page = Page::create();
        $page->populateFromId($request->groupParams['id']);
        return Response::responseOk($article->render());
    }
}