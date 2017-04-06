<?php
namespace Foo;

use \Api\BaseController as BaseController;
use \Api\Response as Response;

class Controller extends BaseController
{
    public function getFoo($request)
    {
        return Response::responseOk([
            'idFoo' => $request->groupParams['id']
        ]);
    }
}