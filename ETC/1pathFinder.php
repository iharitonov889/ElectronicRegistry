<?php
function getAbsolutePath($file)
{
    return realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $file;
}

/*require_once $_SERVER['DOCUMENT_ROOT'] . '/server/connect.php';
define('SITE_ROOT', dirname(__FILE__));
        $file_path = SITE_ROOT . '/connect.php';
*/