<?php
if (isset($_GET['patientId'])) {

    include ('../../pageController.php');
    $connect = getAbsolutePath('server/connect.php');
    include $connect;

    $patientId = $_GET['patientId'];
    $sql = "DELETE FROM `patients` WHERE patientId='" . $patientId . "' ";
    if (mysqli_query($conn, $sql)) {
        //session_start();
        //$_SESSION["delete"];
        header("Location: ./indexPatients.php");
    } else {
        die("Что-то пошло не так");
    }
} else {
    echo "Пациент с таким идентификатором не был найден";
}
