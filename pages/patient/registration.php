<?php
session_start();

include ('../../pageController.php');
include $connect = getAbsolutePath('server/connect.php');

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
    `login`, `password`,`email`,`name`,  `surname`, `patronymic`,  `gender`, `birthdayDate`, `permanentResidence`, `passport`, `mio`, 
    `policyCMI`,`policyPIP`,`disability`, `phoneNumber`) 
    VALUES ( '$reg_login','$reg_password','$reg_email','$reg_name','$reg_surname','$reg_patronymic','$reg_gender','$reg_birthdayDate', 
        '$reg_permanentResidence', '$reg_passport', '$reg_mio', '$reg_policyCMI','$reg_policyPIP', '$reg_disability','$reg_phoneNumber')";
    $res = $conn->query($query);
    $conn->close();
    header("Location: ../../pages/authorization.php");
}
//$_SESSION['user_login'] = $reg_Login;
//$_SESSION['user_password'] = $reg_Password;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="../../design/bootstrap.min.css">
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
                <p class="headerTitle mtmb"> Электронная регистратура <br>ГБУЗ «Калачевская ЦРБ» </p>
            </div><!--frame pad-->

            <!--header-right byttons were here-->

        </header><!--flex-container (Row №1(Header)-->

        <div class="content mb-3">
            <div class="container">
                <div class="row ">
                    <div class="col-md-6 offset-md-3 blockBody pad">
                        <form id="form_reg" method="post"><!--REGStartsHere-->

                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <div class="me-1"> <label>Логин</label></div>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_login" name="reg_login" required /><!--placeholder="Введите логин"-->
                                </div>
                            </div>

                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>Пароль</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_password" name="reg_password" required /> <!-- width: 311.7px;-->
                                    <!--placeholder="Введите пароль"-->
                                </div>
                            </div>



                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>Элек. почта</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_email" name="reg_email" required />
                                    <!-- placeholder="Введите электронную почту"-->
                                </div>
                            </div>



                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>Имя</label><!--style="min-width: 100px !important"-->
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_name" name="reg_name" required />
                                    <!-- placeholder="Введите имя"-->
                                </div>
                            </div>



                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>Фамилия</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_surname" name="reg_surname" required />
                                    <!-- placeholder="Введите фамилию" -->
                                </div>
                            </div>



                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>Отчество</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_patronymic" name="reg_patronymic" required />
                                    <!-- placeholder="Введите отчество" -->
                                </div>
                            </div>



                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>Пол</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <select class="form-control col-sm-12" style="color:gray; text-align: center;"
                                        onchange="this.style.color='black'" id="reg_gender" name="reg_gender" ;
                                        required>
                                        <option value="" disabled selected style='display:none;'>
                                            Выберите
                                            необходимое
                                        </option>
                                        <option value="male">Мужской</option>
                                        <option value="female">Женский</option>
                                    </select>
                                </div>
                            </div>




                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>Дата рождения</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input class="form-control col-sm-12" type="date" id="reg_birthdayDate"
                                        name="reg_birthdayDate" value="2024-01-01T00:00" min="1950-01-01T00:00"
                                        max="2025-01-01T00:00" />
                                </div>
                            </div>



                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>Прописка</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_permanentResidence" name="reg_permanentResidence"
                                        required /><!--placeholder="Место прописки из паспорта"-->
                                </div>
                            </div>




                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>Паспорт</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_passport" name="reg_passport" required />
                                    <!-- placeholder="Введите серию и номер паспорта" -->
                                </div>
                            </div>



                            <div class="flex-container mb-1" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>СМО</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_mio" name="reg_mio" required />
                                    <!--placeholder="Введите страховую медицинскую организацию"-->
                                </div>

                            </div>
                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="form-text">СМО - страховая медицинская организация</div>
                            </div>



                            <div class="flex-container mb-1" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>ОМС</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_policyCMI" name="reg_policyCMI" required />
                                    <!--placeholder="Введите номер полиса ОМС"-->

                                </div>

                            </div>
                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="form-text">ОМС - полис обязательного медицинского
                                    страхования</div><!--<br>Используйте двойные
                        кавычки для выделения-->
                            </div>



                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>СНИЛС</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_policyPIP" name="reg_policyPIP" required />
                                    <!-- placeholder="Введите номер полиса СНИЛС"-->
                                </div>
                            </div>


                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>Инвалидность</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <select class="form-control col-sm-12" style="color:gray; text-align: center; "
                                        onchange="this.style.color='black'" id="reg_disability" name="reg_disability" ;
                                        required>
                                        <option value="" disabled selected style='display:none;'>
                                            Выберите
                                            необходимое
                                        </option>
                                        <option value="none">Отсутствует</option>
                                        <option value="firstGroup">1 группа</option>
                                        <option value="secondGroup">2 группа</option>
                                        <option value="thirdGroup">3 группа</option>
                                    </select>
                                </div>
                            </div>



                            <div class="flex-container mb-2" style="justify-content: center">
                                <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                                    <label>Номер телефона</label>
                                </div>

                                <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_phoneNumber" name="reg_phoneNumber" required />
                                </div>
                            </div>

                            <div class="" style="justify-content: center">
                                <div class="text-sm-center">

                                    <button type="submit" class="btn btn-primary btn-lg"
                                        name="reg_user">Зарегистрироваться</button>
                                </div> <!--name helps with isset($_POST[///-->
                            </div>

                        </form><!--registration-->
                    </div>
                </div>
            </div>
        </div><!--content-->
        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>
    </div>

</body>

<script src="../../javascript/bootstrap.bundle.min.js"></script>
<script src="../../javascript/jquery-3.7.1.min.js"></script>
<!--<script src="../../javascript/sender.js"></script>-->

</html>

<!--   <div class="flex-container mb-2" style="justify-content: center">
                    <div class="frame col-sm-6 col-lg-1">

                    </div>

                    <div class="frame flex-element col-sm-6 col-md-3 col-lg-2">

                    </div>
                </div>-->