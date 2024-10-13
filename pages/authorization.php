<?php
session_start();

include ('../pageController.php');
include $connect = getAbsolutePath('server/connect.php');

if (isset($_POST['login_user'])) {
    $auth_login = $_POST['auth_login'];
    $auth_password = md5($_POST['auth_password']);
    $result = mysqli_query($conn, "SELECT * FROM `patients` 
    WHERE `login` = '" . $auth_login . "' and 
    `password` = '" . $auth_password . "'");
    if (!empty($result)) {
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['user_id'] = $row['patientId'];
            $_SESSION['user_login'] = $row['login'];
            $_SESSION['user_password'] = $row['password'];
            header("Location: ../index.php");
            exit();
        } else {
            $resultManager = mysqli_query($conn, "SELECT * FROM `managers` 
            WHERE `login` = '" . $auth_login . "' and `password` = '" . $auth_password . "'");
            if (!empty($resultManager)) {
                if ($rowManager = mysqli_fetch_array($resultManager)) {
                    $_SESSION['manager_id'] = $rowManager['managerId'];
                    $_SESSION['manager_login'] = $rowManager['login'];
                    $_SESSION['manager_password'] = $rowManager['password'];
                    header("Location: ../index.php");
                    exit();
                }
            } else if (!$resultManager) {
                echo "<script>console.log('error');</script>";
            }
            ;
        }
        ;
    }
    ;
}//isset
//echo "<script>console.log('" . $row['login'] . "','" . $_SESSION['user_login'] . "');</script>";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" type="text/css" href="../design/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../design/components.css">
</head>

<body>

    <div class="wrapper">
        <header class="flex-container blockBody pad mb-5" style="width: 100%; justify-content: space-between;">

            <!--flex-container (Row №1(Header)-->

            <div class="frame pad"><!--header part №1-->
                <a href="../index.php"> <img class="headerLogo mtmb" src="../images/logo.png"
                        style="visibility: visible">
                </a>
                <p class="headerTitle mtmb"> Электронная регистратура <br>ГБУЗ «Калачевская ЦРБ» </p>
            </div><!--frame pad-->

            <!--header-right buttons were here-->

        </header><!--flex-container (Row №1(Header)-->

        <div class="content">
            <form id="form_auth" method="post"><!--AuthStartsHere-->
                <div class="blockBody container  text-sm-center">
                    <!--
                    <div class="pad" style="text-align: center;">
                        <div class="frame text-sm-center" style="text-align: center;">
                            <div class="frame" style="text-align: center;">
                                <label style="min-width: 115px !important; color: red;">Ошибка, неверный логин или
                                    пароль</label>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="pad">
                        <div class="frame text-sm-center ">
                            <div class="frame">
                                <label style="min-width: 100px !important">Логин</label>
                            </div>
                            <div class="frame">
                                <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                    id="auth_login" name="auth_login" placeholder="Введите логин" required />
                            </div>
                        </div>
                    </div>
                    <div class="pad pt-0">
                        <div class="text-sm-center">
                            <div class="frame">
                                <label style="min-width: 100px !important">Пароль</label>
                            </div>
                            <div class="frame">
                                <input type="password" class="form-control col-sm-12" style="text-align: center;"
                                    id="auth_password" name="auth_password" placeholder="Введите пароль" required />
                            </div>
                        </div>
                    </div>
                    <div class="pad pt-0">
                        <div class="text-sm-center pad">
                            <button type="submit" class="btn btn-primary btn-lg"
                                name="login_user">Авторизоваться</button><!--27.04--><!--name helps with isset($_POST[///-->
                        </div>
                        <div class="text-sm-center">
                            <a href="./patient/registration.php">Нет аккаунта?
                                Зарегистрироваться</a>
                        </div>
                    </div>
                </div>
            </form><!--Auth - form needed for POST js-php interaction-->
        </div><!--flex-container-->


        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>

    </div><!--wrapper-->


</body>

<script src="../javascript/bootstrap.bundle.min.js"></script>
<script src="../javascript/jquery-3.7.1.min.js"></script>

<!--<script src="../../javascript/sender.js"></script>-->

</html>