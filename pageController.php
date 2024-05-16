<?php

function getAbsolutePath($file)
{
    return realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $file;
}

//static path's
if (isset($_POST['sighUpButton'])) {
    header("Location: pages/patient/sighup.php");
    exit();
}
;

if (isset($_POST['userLogout'])) {
    session_destroy();
    $mainPage = substr(strtr(realpath('index.php'), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $mainPage");
}
;
/*
if (isset($_POST['login_manager'])) {
    header("Location: pages/manager/index.php");
    exit();
}

if (isset($_POST['mainPageImg'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['userProfile'])) {

    header("Location: pages/profile.php");
    exit();
}


*/

//redirect_by_path('../index.php');//usage exmpl redirect_by_path(__DIR__ . '/../../login.php');
//header("Location: (dirname(__FILE__).'/index.php') ");
//exit();

//header("Location:  http://c90442vo.beget.tech/ElectronicRegistry/index.php");

//header("Location: index.php");
// echo '<script>location.replace("../index.php");</script>'; exit;
/*
function redirect_by_path($path)
{
    $redirect = substr(strtr(realpath($path), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $redirect");
    exit;
}
*/
