<!--Image LOGO from page is here-->

<!--
<div class="frame pad">
    
    <?php {/*
echo ((isset($_SESSION['user_login']) != null)) ?
'<form method="post">          
<button type="submit" class="btn btn-primary btn-lg" name="userLogout">Выйти из профиля</button>
</form> '
:
'<button type="submit" class="btn btn-primary btn-lg" data-bs-toggle="modal"
data-bs-target="#RegModal">Регистрация</button>';
*/
    } ?>
</div>

<div class="frame pad">
    <?php {/*
echo ((isset($_SESSION['user_login']) != null)) ?
'<form method="post">          
<button type="submit" class="btn btn-primary btn-lg" name="userProfile">Профиль</button>
</form> '
:
' <button type="submit" class="btn btn-primary btn-lg" data-bs-toggle="modal"
data-bs-target="#AuthModal">Войти в профиль</button> ';
*/
    } ?>

</div>
-->
<!-- <a href="./pages/profile.php" class="button btn btn-primary btn-lg">Профиль</a> -->



<form id="form_reg" method="post"><!--REGStartsHere-->
    <div class="modal fade" id="RegModal" tabindex="-1" aria-labelledby="RegModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="justify-content: center">
                    <h5 class="modal-title" id="RegModalLabel">Регистрация</h5>
                </div><!--modal-header-->
                <div class="modal-body">

                    <div class="flex-container col-sm-12" style="flex-wrap: nowrap; justify-content: space-between;">

                        <div class="container-fluid col-xs-12 col-sm-12 col-md-12 form-group form-inline">

                            <div class="container pt-1" style="justify-content: space-between;">

                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center">
                                        <label style="min-width: 100px !important">Логин</label>
                                        <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                            id="reg_login" name="reg_login"
                                            required /><!--placeholder="Введите логин"-->
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
                                        <label style="min-width: 100px !important">Пол</label>
                                        <select class="form-control col-sm-12" style="color:gray; text-align: center;"
                                            onchange="this.style.color='black'" id="reg_gender" name="reg_gender" ;
                                            required>
                                            <option value="" disabled selected style='display:none;'>Выберите
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

                                        <input class="form-control" type="date" id="reg_birthdayDate"
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
                                    <div class="form-text">СНИЛС - Страховой номер индивидуального лицевого счёта
                                    </div>
                                </div>
                            </div>

                            <div class="container" style="justify-content: space-between;">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center">
                                        <label style="min-width: 110px !important">Инвалидность</label>

                                        <select class="form-control col-sm-12" style="color:gray; text-align: center;"
                                            onchange="this.style.color='black'" id="reg_disability"
                                            name="reg_disability" ; required>
                                            <option value="" disabled selected style='display:none;'>Выберите
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
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center">
                                        <label style="min-width: 110px !important">Номер телефона</label>

                                        <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                            id="reg_phoneNumber" name="reg_phoneNumber" required />

                                    </div>
                                </div>
                            </div>


                        </div><!--container-fluid-->

                    </div><!--flex-container-->

                </div>

                <div class="modal-footer" style="justify-content: center">
                    <div class="text-sm-center">

                        <button type="submit" class="btn btn-primary btn-lg" name="reg_user">Зарегистрироваться</button>
                    </div>
                    <!--name helps with isset($_POST[///-->
                </div><!--modal-footer-->

            </div><!--modal-content-->
        </div><!--modal-dialog-->
    </div><!--modal fade-->
</form><!--registration-->

<form id="form_auth_manager" method="post"><!--AuthStartsHere-->
    <div class="modal fade" id="AuthModalManager" tabindex="-1" aria-labelledby="AuthModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="justify-content: center">
                    <h5 class="modal-title" id="AuthModalLabel">Авторизация</h5>
                </div><!--modal-header-->
                <div class="modal-body">

                    <div class="flex-container col-sm-12" style="flex-wrap: nowrap; justify-content: space-between;">

                        <div class="container-fluid col-xs-12 col-sm-12 col-md-12 form-group form-inline">


                            <div class="container pt-1" style="justify-content: space-between;">

                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center">
                                        <label style="min-width: 100px !important">Логин</label>

                                        <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                            id="auth_login" name="auth_login" placeholder="Введите логин" required />
                                    </div>

                                </div>
                            </div>

                            <div class="container" style="justify-content: space-between;">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center">
                                        <label style="min-width: 100px !important">Пароль</label>

                                        <input type="password" class="form-control col-sm-12"
                                            style="text-align: center;" id="auth_password" name="auth_password"
                                            placeholder="Введите пароль" required />
                                    </div>

                                </div>
                            </div>

                        </div><!--container-fluid-->

                    </div><!--flex-container-->

                </div><!--class="modal-body"-->

                <div class="modal-footer" style="justify-content: center">
                    <div class="text-sm-center">

                        <button type="submit" class="btn btn-primary btn-lg"
                            name="login_manager">Авторизоваться</button><!--27.04--><!--name helps with isset($_POST[///-->

                    </div>

                </div><!--modal-footer-->

            </div><!--modal-content-->
        </div><!--modal-dialog-->
    </div><!--modal fade-->
</form><!--Auth - form needed for POST js-php interaction-->

</div><!--flex container-->

</div><!--DIV from headerCover-->