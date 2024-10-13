<?php
session_start();
include ('../../pageController.php');
$connect = getAbsolutePath('server/connect.php');
include $connect;


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

    $sqlUpdate = "UPDATE `patients` SET 
    `login`= '" . $login . "',
    `password`= '" . $password . "',
    `name`= '" . $name . "' ,
    `surname`= '" . $surname . "',
     `patronymic`='" . $patronymic . "',
    `email`= '" . $email . "' ,
    `birthdayDate`= '" . $birthdayDate . "' ,
    `permanentResidence`= '" . $permanentResidence . "' ,
    `passport`= '" . $passport . "' ,
    `mio`= '" . $mio . "' ,
    `policyCMI`= '" . $policyCMI . "' ,
    `policyPIP`= '" . $policyPIP . "' ,
    `disability`= '" . $disability . "' ,
    `phoneNumber`= '" . $phoneNumber . "'
    WHERE `patientId` = $_SESSION[user_id]";
    $conn->query($sqlUpdate);
    $conn->close();
    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" type="text/css" href="../../design/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">
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
                        if (isset($_SESSION['user_login']) != null) {
                            echo '<form method="post"> <button type="submit" class="btn btn-primary btn-lg" name="userLogoutFromProfile">Выйти из профиля</button> </form>
          ';//path
                        } else {
                            echo '<a href="pages/patient/registration.php"><button class="btn btn-primary btn-lg"
           >Регистрация</button></a>';//'<button type="submit" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#RegModal">Регистрация</button>'
                    
                        }
                        ;
                    } ?>
                </div>

        </header><!--flex-container (Row №1(Header)-->

        <div class="content" style="width: 100%;">

            <div class="mt-3" style="text-align: center;">
                <h3>Добро пожаловать,
                    <?php
                    $query = "SELECT `name`, `patronymic` FROM `patients` where patientId = $_SESSION[user_id]";
                    $res = mysqli_query($conn, $query);
                    while ($row = $res->fetch_assoc()) {
                        echo $row['name'] . ' ' . $row['patronymic'];
                        //echo '<h1> ' . $row['name'] . ' ' . $row['patronymic'] . ' </h1>';
                    }
                    ;
                    ?>
                </h3>
            </div>

            <div class="flex-container mb-5 mt-3"><!--blockBody-->
                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                    <div class=" justify-content-center mx-auto"><!--ms-5-->
                        <form method="post">
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM `patients` WHERE patientId= $_SESSION[user_id]");// $patientId = $_GET['patientId'];
                            $row = mysqli_fetch_array($result);
                            ?>
                            <div>
                                <div class="blockBody pad"
                                    style="margin: 10px; align-items: center; display:inline-block;">

                                    <div class="container" style="justify-content: space-between;">
                                        <div class="mb-3">
                                            <div class="d-inline-flex align-items-center justify-content-left"
                                                style="display:inline-block">
                                                <label style="min-width: 125px !important">Логин</label>

                                                <div class="form-elemnt">
                                                    <input type="text" class="form-control" name="login"
                                                        placeholder="Введите логин"
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
                                                        placeholder="Введите фамилию"
                                                        value="<?php echo $row["surname"]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                        <div class="mb-3">
                                            <div class="d-inline-flex align-items-center" style="display:inline-block">
                                                <label style="min-width: 125px !important">Имя</label>

                                                <div class="form-elemnt">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Введите имя" value="<?php echo $row["name"]; ?>">
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
                                                        placeholder="Введите отчество"
                                                        value="<?php echo $row["patronymic"]; ?>">
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
                                                        placeholder="Введите элек. почту"
                                                        value="<?php echo $row["email"]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                        <div class="mb-3">
                                            <div class="d-inline-flex align-items-center" style="display:inline-block">
                                                <label style="min-width: 125px !important">Дата рождения</label>

                                                <div class="form-elemnt">

                                                    <input class="form-control" type="date" id="birthdayDate"
                                                        name="birthdayDate" style="width: 220px;"
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
                                                    <input type="text" class="form-control" name="mio"
                                                        placeholder="Введите СМО" value="<?php echo $row["mio"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-text">СМО - страховая медицинская
                                                организация</div><!--<br>Используйте
                                                одинарные
                                                кавычки для выделения-->
                                        </div>
                                    </div>

                                    <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                        <div class="mb-3">
                                            <div class="d-inline-flex align-items-center" style="display:inline-block">
                                                <label style="min-width: 125px !important">ОМС</label>

                                                <div class="form-elemnt">
                                                    <input type="text" class="form-control" name="policyCMI"
                                                        placeholder="Введите ОМС"
                                                        value="<?php echo $row["policyCMI"]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                        <div class="mb-3">
                                            <div class="d-inline-flex align-items-center" style="display:inline-block">
                                                <label style="min-width: 125px !important">СНИЛС</label>

                                                <div class="form-elemnt">
                                                    <input type="text" class="form-control mask-policyPIP"
                                                        name="policyPIP" placeholder="Введите СНИЛС"
                                                        value="<?php echo $row["policyPIP"]; ?>">
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
                                        <input type="submit" name="edit" value="Сохранить изменения"
                                            class="btn btn-primary">
                                    </div>

                                </div><!--blockBody pad-->
                            </div>

                        </form>
                    </div>
                </div><!--1/2-->

                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6 align-items-start">
                    <div class="" style="vertical-align: top;"><!--mx-auto-->
                        <?php

                        ?>
                        <table class="table table-bordered blockBody">
                            <thead>
                                <tr><!--thead class affects the columns-->
                                    <!--<th class="flex-element">Идентификатор</th>-->

                                    <!--<th class="flex-element">Фамилия</th>-->
                                    <!--<th class="flex-element">Имя</th>-->
                                    <!--<th class="flex-element">Отчество</th>-->
                                    <th class="flex-element">Доктор</th>

                                    <th class="flex-element">Специализация</th>
                                    <th class="flex-element">Дата и время приёма</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                //$query = "SELECT doctors.doctorId, doctors.name,doctors.surname,doctors.patronymic, specializations.specializationTitle FROM doctors INNER JOIN specializations ON doctors.specializationId = specializations.specializationId WHERE ; ";
                                $query = "SELECT schedules.scheduleId, schedules.doctorId, doctors.name, doctors.surname, doctors.patronymic, specializations.specializationTitle, schedules.datetimeOfReception, schedules.patientId FROM schedules INNER JOIN doctors ON doctors.doctorId = schedules.doctorId INNER JOIN specializations ON doctors.specializationId = specializations.specializationId where schedules.patientId = $_SESSION[user_id]";
                                $result = mysqli_query($conn, $query);

                                while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <!--<td class="flex-element"><?php //echo $data['doctors.doctorId']; ?></td>-->
                                        <td class="flex-element">
                                            <?php echo $data['surname'], '&nbsp', $data['name'], '&nbsp', $data['patronymic']; ?>
                                        </td>
                                        <!--NOT doctors.name-->
                                        <!--<td class="flex-element"><?php //echo $data['name']; ?></td>--><!--NOT doctors.name-->
                                        <!--<td class="flex-element"><?php //echo $data['surname']; ?></td>-->
                                        <!--<td class="flex-element"><?php //echo $data['patronymic']; ?></td>-->
                                        <td class="flex-element"><?php echo $data['specializationTitle']; ?>
                                        </td>
                                        <td class="flex-element"><?php echo $data['datetimeOfReception']; ?></td>

                                        <td class="flex-element">
                                            <a href="deleteSchedule.php?scheduleId=<?php echo $data['scheduleId']; ?>"
                                                class="btn btn-primary">Отменить запись на приём</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ;

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div><!--2/2-(frame flex-element col-sm-6 col-md-6 col-lg-6 align-items-start)-->
            </div>

            <?php


            ?>
        </div><!--content wrapper frame-->

        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>
    </div><!--wrapper-->

    <script src="../javascript/bootstrap.bundle.min.js"></script>
    <script src="../javascript/jquery-3.7.1.min.js"></script>

</body>
<script>
    $('.mask-policyPIP').mask('999-999-999 99');
</script>

</html>