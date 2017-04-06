<?php
namespace Api\Base;

use \Api\Interfaces\BaseViewInterface as BaseViewInterface;

class BaseView implements BaseViewInterface
{
    public function render(string $templateFile, array $var_array)
    {
        extract($var_array);

        ob_start();
        include $templateFile;
        $content = ob_get_clean();
        return $content;
    }

    public function renderTemplate(array $var_array)
    {
        
    }
}