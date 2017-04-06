<?php
namespace FooHtml\View;

use \Api\BaseView as BaseView;

class FooterView extends BaseView
{
    const TEMPLATE_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR;

    public function renderTemplate(array $vars_array)
    {
        $templateFile = self::TEMPLATE_PATH . 'FooterTemplate.phtml';
        return $this->render($templateFile, $vars_array);
    }
}