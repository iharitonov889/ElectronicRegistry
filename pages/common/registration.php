<?php
session_start();

include ('../../pageController.php');
include $connect = getAbsolutePath('server/connect.php');

if (isset($_POST['login_user'])) {//name of button

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
            <form id="form_reg" method="post"><!--REGStartsHere-->

                <div class="flex-container col-sm-12" style="flex-wrap: nowrap; justify-content: space-between;">

                    <div class="container-fluid col-xs-12 col-sm-12 col-md-12 form-group form-inline text-sm-center"
                        style="justify-content: center">

                        <div class="container pt-1" style="justify-content: space-between;">

                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">Логин</label>
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_login" name="reg_login" required /><!--placeholder="Введите логин"-->
                                    <!-- width: 311.7px;-->
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">Пароль</label>
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_password" name="reg_password" required />
                                    <!--placeholder="Введите пароль"-->
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">Элек. почта</label>
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_email" name="reg_email" required />
                                    <!-- placeholder="Введите электронную почту"-->
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">Имя</label>
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_name" name="reg_name" required />
                                    <!-- placeholder="Введите имя"-->
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">Фамилия</label>
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_surname" name="reg_surname" required />
                                    <!-- placeholder="Введите фамилию" -->
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">Отчество</label>
                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_patronymic" name="reg_patronymic" required />
                                    <!-- placeholder="Введите отчество" -->
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 88px !important">Пол</label>
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
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">Дата рождения</label>

                                    <input class="form-control col-sm-12" type="date" id="reg_birthdayDate"
                                        name="reg_birthdayDate" value="2024-01-01T00:00" min="1950-01-01T00:00"
                                        max="2025-01-01T00:00" />

                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">Прописка</label>

                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_permanentResidence" name="reg_permanentResidence"
                                        required /><!--placeholder="Место прописки из паспорта"-->

                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">Паспорт</label>

                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_passport" name="reg_passport" required />
                                    <!-- placeholder="Введите серию и номер паспорта" -->

                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">

                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">СМО</label>

                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_mio" name="reg_mio" required />
                                    <!--placeholder="Введите страховую медицинскую организацию"-->

                                </div>
                                <div class="form-text">СМО - страховая медицинская организация</div>
                            </div>

                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">

                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">ОМС</label>

                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_policyCMI" name="reg_policyCMI" required />
                                    <!--placeholder="Введите номер полиса ОМС"-->
                                </div>
                                <div class="form-text">ОМС - полис обязательного медицинского
                                    страхования<br>Используйте одинарные
                                    кавычки для выделения</div>


                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 100px !important">СНИЛС</label>

                                    <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                        id="reg_policyPIP" name="reg_policyPIP" required />
                                    <!-- placeholder="Введите номер полиса СНИЛС"-->

                                </div>
                                <div class="form-text">СНИЛС - Страховой номер индивидуального лицевого
                                    счёта
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center">
                                    <label style="min-width: 125px !important">Инвалидность</label>

                                    <select class="form-control col-sm-12" style="color:gray; text-align: center;"
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
                        </div>

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3 text-sm-center pad pt-0">
                                <div class="text-sm-center">
                                    <div class="frame">
                                        <label style="min-width: 125px !important">Номер телефона</label>
                                    </div>
                                    <div class="frame">
                                        <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                            id="reg_phoneNumber" name="reg_phoneNumber" required />
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div><!--container-fluid-->





                    <div class="" style="justify-content: center">
                        <div class="text-sm-center">

                            <button type="submit" class="btn btn-primary btn-lg"
                                name="reg_user">Зарегистрироваться</button>
                        </div>
                        <!--name helps with isset($_POST[///-->
                    </div><!--modal-footer-->


                </div><!--modal-dialog-->

            </form><!--registration-->





        </div><!--content-->

        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>
    </div>
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