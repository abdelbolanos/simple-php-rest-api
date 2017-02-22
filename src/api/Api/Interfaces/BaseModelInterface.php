<?php
namespace Api\Interfaces;

interface BaseModelInterface
{
    public static function create();

    public static function get($name);
}