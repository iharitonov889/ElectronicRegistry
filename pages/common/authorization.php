<?php
session_start();

include ('../../pageController.php');
include $connect = getAbsolutePath('server/connect.php');

if (isset($_POST['login_user'])) {//name of button

    $auth_login = $_POST['auth_login'];
    $auth_password = $_POST['auth_password'];
    echo "<script>console.log('" . $auth_login . "','" . $auth_password . "');</script>";

    $result = mysqli_query($conn, "SELECT * FROM `patients` WHERE `login` = '" . $auth_login . "' and `password` = '" . md5($auth_password) . "'");//md5($Password)
    if (!empty($result)) {
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['user_id'] = $row['patientId'];
            $_SESSION['user_login'] = $row['login'];
            $_SESSION['user_password'] = $row['password'];
            header("Location: ../../index.php"); //echo "<script>console.log('" . $_SESSION['user_password'] . "');</script>";
            exit();
        }
    } else if (empty($result)) {
        echo "<script>console.log('error');</script>";
    }
    ;
}//isset

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">
</head>

<body>

    <div class="wrapper">
        <header class="flex-container blockBody pad mb-5" style="width: 100%; justify-content: space-between;">

            <!--flex-container (Row №1(Header)-->

            <div class="frame pad"><!--header part №1-->
                <a href="../../index.php"> <img class="headerLogo mtmb" src="../../images/logo.png"
                        style="visibility: visible">
                </a>
                <p class="headerTitle mtmb"> Электронная <br> регистратура </p>
            </div><!--frame pad-->

            <div class="frame"><!--header part №2-->
                <div class="frame pad"><!--header subpart №2.1-->
                    <?php {
                        if (isset($_SESSION['user_login']) != null) {
                            echo '<form method="post"> <button type="submit" class="btn btn-primary btn-lg" name="userLogout">Выйти из профиля</button> </form>
          ';//path
                        } else {
                            echo '<a href="pages/common/registration.php"><button class="btn btn-primary btn-lg"
           >Регистрация</button></a>';

                        }
                        ;
                    } ?>
                </div>

                <div class="frame pad"><!--header subpart №2.2-->
                    <?php {
                        if (isset($_SESSION['user_login']) != null) {
                            echo '<a href="./pages/patient/profile.php" class="button btn btn-primary btn-lg">Профиль</a>';//path
                        } else {
                            echo '<a href="pages/common/authorization.php"><button class="btn btn-primary btn-lg"
          >Войти в профиль</button></a>';
                        }
                        ;
                    }
                    ;
                    ?>
                </div>
            </div><!--frame header-combiner-->

        </header><!--flex-container (Row №1(Header)-->

        <div class="content">
            <form id="form_auth" method="post"><!--AuthStartsHere-->
                <div class="blockBody container  text-sm-center">
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
                            <a href="./registration.php">Нет аккаунта?
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>

<script src="../../javascript/sender.js"></script>

</html>