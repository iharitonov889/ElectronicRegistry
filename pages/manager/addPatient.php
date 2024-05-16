<?php
session_start();
include ('../../pageController.php');
$connect = getAbsolutePath('server/connect.php');
include $connect;
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">
    <title>Добавление доктора</title>
</head>

<body>

    <div class="wrapper">

        <?php
        $headerCover = getAbsolutePath('siteComponents/headerCover.php');
        include $headerCover;
        echo '<a href="./index.php"> <img class="headerLogo mtmb" src= "../../images/logo.png" style="visibility: visible" > </a>
<p class="headerTitle mtmb"> Электронная <br> регистратура </p>
</div>
<div class="flex-container">';//path
        
        $header = getAbsolutePath('siteComponents/header.php');
        include $header;
        ?>

        <div class="wrapper frame">

            <form method="post">

                <div>
                    <div class="blockBody pad" style="margin: 10px; align-items: center; display:inline-block;">

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Логин</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="login"
                                            placeholder="Введите логин">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Пароль</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="password"
                                            placeholder="Введите пароль">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Фамилия</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="surname"
                                            placeholder="Введите фамилию">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Имя</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="name" placeholder="Введите имя">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Отчество</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="patronymic"
                                            placeholder="Введите отчество">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Элек. почта</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Введите элек. почту">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Дата рождения</label>

                                    <div class="form-elemnt">

                                        <input class="form-control" type="date" id="birthdayDate" name="birthdayDate"
                                            style="width: 220px;" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Прописка</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="permanentResidence"
                                            placeholder="Введите прописку">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Паспорт</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="passport"
                                            placeholder="Введите пасспортные данные">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">СМО</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="mio" placeholder="Введите СМО">
                                    </div>
                                </div>
                                <div class="form-text">СМО - страховая медицинская организация <br>Используйте одинарные
                                    кавычки для выделения
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">ОМС</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="policyCMI"
                                            placeholder="Введите ОМС">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">СНИЛС</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="policyPIP"
                                            placeholder="Введите СНИЛС">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Инвалидность</label>

                                    <select class="form-control col-sm-12" id="disability" name="disability"
                                        style="width:220px;" required>
                                        <option value="none" selected>Отсутствует</option>
                                        <option value="firstGroup">1 группа</option>
                                        <option value="secondGroup">2 группа</option>
                                        <option value="thirdGroup">3 группа</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Телефон</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="phoneNumber"
                                            placeholder="Введите номер телефона">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-element flex-element">
                            <input type="submit" name="addPatient" value="Добавить" class="btn btn-primary">
                        </div>

                    </div><!--blockBody pad-->
                </div>

            </form>

            <?php

            if (isset($_POST["addPatient"])) {
                $login = mysqli_real_escape_string($conn, $_POST["login"]);
                $password = md5(mysqli_real_escape_string($conn, $_POST["password"]));
                $name = mysqli_real_escape_string($conn, $_POST["name"]);
                $surname = mysqli_real_escape_string($conn, $_POST["surname"]);
                $patronymic = mysqli_real_escape_string($conn, $_POST["patronymic"]);

                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                $birthdayDate = mysqli_real_escape_string($conn, $_POST["birthdayDate"]);
                $permanentResidence = mysqli_real_escape_string($conn, $_POST["permanentResidence"]);
                $passport = mysqli_real_escape_string($conn, $_POST["passport"]);
                $mio = mysqli_real_escape_string($conn, $_POST["mio"]);
                $policyCMI = mysqli_real_escape_string($conn, $_POST["policyCMI"]);
                $policyPIP = mysqli_real_escape_string($conn, $_POST["policyPIP"]);
                $disability = mysqli_real_escape_string($conn, $_POST["disability"]);
                $phoneNumber = mysqli_real_escape_string($conn, $_POST["phoneNumber"]);

                $sqlInsert = "INSERT INTO `patients` (`login`, `password`, `name`, `surname`, `patronymic`, 
                `email`, `birthdayDate`, `permanentResidence`, `passport`, `mio`, `policyCMI`, `policyPIP`, `disability`, `phoneNumber`) 
                
                VALUES ('" . $login . "','" . $password . "','" . $name . "', '" . $surname . "','" . $patronymic . "','" . $email . "','" . $birthdayDate . "', '" . $permanentResidence . "'
                ,'" . $passport . "','" . $mio . "', '" . $policyCMI . "','" . $policyPIP . "','" . $disability . "', '" . $phoneNumber . "')";
                $conn->query($sqlInsert);
                $conn->close();

            }
            ?>

        </div>

        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>

    </div><!--wrapper-->



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

</body>

</html>