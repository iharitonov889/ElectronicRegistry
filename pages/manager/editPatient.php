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
    <link rel="stylesheet" type="text/css" href="../../design/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">
    <title>Редактирование пациента</title>
</head>

<body>

    <div class="wrapper">

        <header class="flex-container blockBody pad" style="width: 100%; justify-content: space-between;">
            <!--flex-container (Row №1(Header)-->

            <div class="frame pad"><!--header part №1-->
                <a href="../../index.php"><img class="headerLogo mtmb" src="../../images/logo.png"
                        style="visibility: visible"></a>
                <p class="headerTitle mtmb"> Электронная регистратура <br>ГБУЗ «Калачевская ЦРБ» </p>
            </div><!--frame pad-->

            <div class="frame"><!--header part №2-->
                <div class="frame pad"><!--header subpart №2.1-->
                    <?php {
                        if (isset($_SESSION['manager_login']) != null) {
                            echo '<form method="post"> <button type="submit" class="btn btn-primary btn-lg" name="managerLogout">Выйти из профиля</button> </form>
          ';//path
                        }
                        ;
                    }
                    ; ?>
                </div>
            </div>
        </header>

        <div class="content" style="text-align: center;">

            <form method="post">
                <?php

                if (isset($_GET['patientId'])) {

                    $patientId = $_GET['patientId'];

                    $result = mysqli_query($conn, "SELECT * FROM `patients` WHERE patientId=$patientId");
                    $row = mysqli_fetch_array($result);
                    ?>
                    <div>
                        <div class="blockBody pad" style="margin: 10px; align-items: center; display:inline-block;">

                            <div class="container" style="justify-content: space-between;">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center" style="display:inline-block">
                                        <label style="min-width: 125px !important">Логин</label>

                                        <div class="form-elemnt">
                                            <input type="text" class="form-control" name="login" placeholder="Введите логин"
                                                value="<?php echo $row["login"]; ?>">
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
                                                placeholder="Введите пароль"
                                                value="<?php echo $row["password"]; ?>"><!--readonly-->
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
                                                placeholder="Введите фамилию" value="<?php echo $row["surname"]; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center" style="display:inline-block">
                                        <label style="min-width: 125px !important">Имя</label>

                                        <div class="form-elemnt">
                                            <input type="text" class="form-control" name="name" placeholder="Введите имя"
                                                value="<?php echo $row["name"]; ?>">
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
                                                placeholder="Введите отчество" value="<?php echo $row["patronymic"]; ?>">
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
                                                placeholder="Введите элек. почту" value="<?php echo $row["email"]; ?>">
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
                                                style="width: 220px;"
                                                value="<?php echo date('Y-m-d', strtotime($row["birthdayDate"])); ?>" />
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
                                                placeholder="Введите прописку"
                                                value="<?php echo $row["permanentResidence"]; ?>">
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
                                                placeholder="Введите пасспортные данные"
                                                value="<?php echo $row["passport"]; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center" style="display:inline-block">
                                        <label style="min-width: 125px !important">СМО</label>

                                        <div class="form-elemnt">
                                            <input type="text" class="form-control" name="mio" placeholder="Введите СМО"
                                                value="<?php echo $row["mio"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-text">СМО - страховая медицинская организация</div><!--<br>Используйте одинарные
                                        кавычки для выделения-->
                                </div>
                            </div>

                            <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center" style="display:inline-block">
                                        <label style="min-width: 125px !important">ОМС</label>

                                        <div class="form-elemnt">
                                            <input type="text" class="form-control" name="policyCMI"
                                                placeholder="Введите ОМС" value="<?php echo $row["policyCMI"]; ?>">
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
                                                placeholder="Введите СНИЛС" value="<?php echo $row["policyPIP"]; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center" style="display:inline-block">
                                        <label style="min-width: 125px !important">Инвалидность</label>

                                        <!--<div class="form-elemnt">
                                            <input type="text" class="form-control" name="disability"
                                                placeholder="Введите СНИЛС" value="<?php //echo $row["disability"]; ?>">
                                        </div>-->

                                        <select class="form-control col-sm-12" id="disability" name="disability"
                                            style="width:220px;" required>
                                            <!--<option value="" disabled selected style='display:none;'>Выберите необходимое</option>-->
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
                                                placeholder="Введите номер телефона"
                                                value="<?php echo $row["phoneNumber"]; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-element flex-element">
                                <input type="submit" name="edit" value="Сохранить изменения" class="btn btn-primary">
                            </div>

                        </div><!--blockBody pad-->
                    </div>
                    <?php
                }//end of isset
                ?>
            </form>

            <?php

            if (isset($_POST["edit"])) {
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

                $sqlUpdate = "UPDATE `patients` SET `login`= '" . $login . "',`password`= '" . $password . "',`name`= '" . $name . "' , `surname`= '" . $surname . "', `patronymic`='" . $patronymic . "',
                `email`= '" . $email . "' ,`birthdayDate`= '" . $birthdayDate . "' ,`permanentResidence`= '" . $permanentResidence . "' ,`passport`= '" . $passport . "' ,
                `mio`= '" . $mio . "' ,`policyCMI`= '" . $policyCMI . "' ,`policyPIP`= '" . $policyPIP . "' ,`disability`= '" . $disability . "' ,`phoneNumber`= '" . $phoneNumber . "'
                WHERE `patientId` = '" . $patientId . "' ";
                $conn->query($sqlUpdate);
                $conn->close();
                echo "<meta http-equiv='refresh' content='0'>";
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