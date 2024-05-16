<?php
if (isset($_GET['doctorId'])) {

    include ('../../pageController.php');
    $connect = getAbsolutePath('server/connect.php');
    include $connect;

    $doctorId = $_GET['doctorId'];
    $sql = "DELETE FROM `doctors` WHERE doctorId='" . $doctorId . "' ";
    if (mysqli_query($conn, $sql)) {
        session_start();
        //$_SESSION["delete"];
        //header("Location: ./indexDoctors.php");
    } else {
        die("Что-то пошло не так");
    }
} else {
    echo "Доктор с таким идентификатором не был найден";
}
