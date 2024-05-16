<?php


if (isset($_POST['login_user'])) {//name of button
    $auth_login = mysqli_real_escape_string($conn, $_POST['auth_login']);
    $auth_password = md5(mysqli_real_escape_string($conn, $_POST['auth_password']));

    $result = mysqli_query($conn, "SELECT * FROM `patients` WHERE `login` = '" . $auth_login . "' and `password` = '" . $auth_password . "'");//md5($Password)
    if (!empty($result)) {
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['user_id'] = $row['patientId'];
            $_SESSION['user_login'] = $row['login'];
            $_SESSION['user_password'] = $row['password'];

            header("Location: ./index.php");//Page
        }
    } else if (empty($result)) {
        echo "";
    }
    ;
}//isset

if (isset($_POST['login_manager'])) {//name of button
    $auth_login = mysqli_real_escape_string($conn, $_POST['auth_login']);
    $auth_password = md5(mysqli_real_escape_string($conn, $_POST['auth_password']));

    $result = mysqli_query($conn, "SELECT * FROM `managers` WHERE `login` = '" . $auth_login . "' and `password` = '" . $auth_password . "'");//md5($Password)
    if (!empty($result)) {
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['manager_id'] = $row['managerId'];
            $_SESSION['manager_login'] = $row['login'];
            $_SESSION['manager_password'] = $row['password'];

            header("Location: ./pages/manager/index.php");//Page
        }
    } else if (empty($result)) {
        echo "error";
    }
    ;
}