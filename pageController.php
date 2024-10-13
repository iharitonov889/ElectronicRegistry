<?php

//$siteroot = __DIR__;
//include ($siteroot . '/server/connect.php');
//echo "<script>console.log('" . $siteroot . "' );</script>";//$server = 'localhost'; - $siteroot works

function getAbsolutePath($file)
{
    return realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $file;
}

/////static path's/////
if (isset($_POST['loginUserButton'])) {
    header("Location: pages/authorization.php");
    exit();
}
;
if (isset($_POST['sighUpButton'])) {//Patient's sighUpButton
    header("Location: pages/patient/sighup.php");
    exit();
}
;
/*
if (isset($_POST['selectSchedule'])) {//Patient's profile after sighUp
    header("Location:./profile.php");
    exit();
}
;*/
if (isset($_POST['userLogout'])) {
    session_destroy();
    $page = substr(strtr(realpath('./index.php'), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $page");
    exit();
}
;
if (isset($_POST['userLogoutFromProfile'])) {
    session_destroy();
    $page = substr(strtr(realpath('../../index.php'), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $page");
    exit();
}
;
if (isset($_POST['managerLogout'])) {
    session_destroy();
    $page = substr(strtr(realpath('../../index.php'), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $page");
    exit();
}
;
if (isset($_POST['managerLogoutFromMain'])) {
    session_destroy();
    $page = substr(strtr(realpath('./index.php'), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $page");
    exit();
}
;

//Manager control panel
if (isset($_POST['sighupPatientManager'])) {
    $page = substr(strtr(realpath('./pages/manager/sighupPatient.php'), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $page");
    exit();
}
;
if (isset($_POST['indexSchedule'])) {
    $page = substr(strtr(realpath('./pages/manager/indexSchedule.php'), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $page");
    exit();
}
;
if (isset($_POST['indexDoctors'])) {
    $page = substr(strtr(realpath('./pages/manager/indexDoctors.php'), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $page");
    exit();
}
;
if (isset($_POST['indexPatients'])) {
    $page = substr(strtr(realpath('./pages/manager/indexPatients.php'), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $page");
    exit();
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

/*
if (isset($_POST['loginManagerButton'])) {
    header("Location: pages/manager/authorization.php");
    exit();
}
;*/

/*
if (isset($_POST['mainManagerButton'])) {//Main page for manager
    header("Location: pages/manager/index.php");
    exit();
}
;*/

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
