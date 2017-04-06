<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'constants.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

function includeFiles($class)
{
    $file_path = false;
    $file_name = str_replace("\\", DIRECTORY_SEPARATOR, $class) . '.php';

    foreach(AUTOLOAD_PATHS as $folder) {
        $file_expected = __DIR__ . DIRECTORY_SEPARATOR .$folder . DIRECTORY_SEPARATOR . $file_name;
        if (file_exists($file_expected)) {
            $file_path = $file_expected;
            break;
        }
    }

    if ($file_path) {
        require_once $file_path;
    } else {
        $error_msg = sprintf("%s not found", $class);
        throw new \Exception($error_msg, 1);
    }
}

spl_autoload_register('includeFiles');