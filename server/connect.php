<?php

$server = 'localhost';
$user = 'patient';
$password = 'dy04.ibk';
$db = 'c90442vo_db';

$mysqli = new mysqli($server, $user, $password, $db);
$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    echo "Не удается подключиться к серверу базы данных!";
    exit;
}