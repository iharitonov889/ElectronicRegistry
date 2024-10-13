<?php
include ('../../pageController.php');
$connect = getAbsolutePath('server/connect.php');
include $connect;
if (isset($_GET['scheduleId'])) {
    $scheduleId = $_GET['scheduleId'];
    $sql = "UPDATE `schedules` SET `patientId`= null 
    WHERE `scheduleId` = $scheduleId; ";
    if (mysqli_query($conn, $sql)) {
        header("Location: ./profile.php");
    } else {
        die("Что-то пошло не так");
    }
} else {
    echo "Записи на приём с таким идентификатором не было найдено";
}
