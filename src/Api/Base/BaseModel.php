<?php
namespace Api\Base;

use \Api\Interfaces\BaseModelInterface as BaseModelInterface;
use \Api\BaseView as BaseView;

class BaseModel implements BaseModelInterface
{
    protected $view;

    public static function create()
    {
        $this->view = new BaseView();
    }

    public function render()
    {
        $vars_array = get_object_vars($this);
        return $this->view->renderTemplate($vars_array);
    }

    public function __get($name)
    {
        return $this->$name;
    }

    protected function preventPopulateProperty()
    {
        //Add here all properties that wont be
        return [
            'view'
        ];
    }
}