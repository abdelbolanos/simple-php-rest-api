<?php
namespace Api\Interfaces;

interface BaseViewInterface
{
    public function render(string $templateFile, array $var_array);

    public function renderTemplate(array $var_array);
}