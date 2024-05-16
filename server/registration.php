<?php

if (isset($_POST['reg_user'])) {

    $reg_login = $_POST['reg_login'];

    $reg_password = md5($_POST['reg_password']);

    $reg_email = $_POST['reg_email'];
    $reg_name = $_POST['reg_name'];
    $reg_surname = $_POST['reg_surname'];
    $reg_patronymic = $_POST['reg_patronymic'];
    $reg_gender = $_POST['reg_gender'];
    $reg_birthdayDate = $_POST['reg_birthdayDate'];
    $reg_permanentResidence = $_POST['reg_permanentResidence'];
    $reg_passport = $_POST['reg_passport'];
    $reg_mio = $_POST['reg_mio'];
    $reg_policyCMI = $_POST['reg_policyCMI'];
    $reg_policyPIP = $_POST['reg_policyPIP'];
    $reg_disability = $_POST['reg_disability'];
    $reg_phoneNumber = $_POST['reg_phoneNumber'];


    $query = "INSERT INTO `patients` (
        `login`, 
        `password`, 
        `email`, 
        `name`, 
        `surname`,
        `patronymic`, 
        `gender`, 
        `birthdayDate`, 
        `permanentResidence`, 
        `passport`,
        `mio`, 
        `policyCMI`,
        `policyPIP`, 
        `disability`, 
        `phoneNumber`) 
        VALUES (
            '$reg_login', 
            '$reg_password',
            '$reg_email', 
            '$reg_name', 
            '$reg_surname', 
            '$reg_patronymic', 
            '$reg_gender', 
            '$reg_birthdayDate', 
            '$reg_permanentResidence',
            '$reg_passport', 
            '$reg_mio', 
            '$reg_policyCMI', 
            '$reg_policyPIP', 
            '$reg_disability', 
            '$reg_phoneNumber')";

    $res = $conn->query($query);
    $conn->close();

    //$_SESSION['user_login'] = $reg_Login;
    //$_SESSION['user_password'] = $reg_Password;
    header("Location: ./index.php");//Page //./Pages/test.php
}