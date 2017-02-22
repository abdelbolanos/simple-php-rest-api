<?php
namespace Foo;

use \Api\BaseController as BaseController;
use \Api\Response as Response;
use \Foo\Exception\FooNotFoundException as FooNotFoundException;

class Controller extends BaseController
{
    public function getFoo($request)
    {
        try {
            
            $foo = FooModel::get($request->groupParams['name']);
            return Response::responseOk($foo->name);

        } catch(FooNotFoundException $e) {

            return Response::responseNotFound($e->getMessage());
        }
    }
}