<?php
namespace Foo\Exceptions;

/**
* 
*/
class FooNotFoundException extends \Exception
{
    public function __construct($id)
    {
        parent::__construct();
        $this->message = sprintf("Foo with name '%s' not found in API", $id);
    }
}
