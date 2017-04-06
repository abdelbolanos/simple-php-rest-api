<?php
namespace FooHtml\View;

use \Api\BaseView as BaseView;
use \Api\Utils\Utils as Utils;

class BodyView extends BaseView
{
    const TEMPLATE_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR;


    public function renderTemplate(array $vars_array)
    {
        $templateFile = self::TEMPLATE_PATH . 'BodyTemplate.phtml';
        return $this->render($templateFile, $vars_array);
    }
}