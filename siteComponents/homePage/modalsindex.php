<form id="form_auth" method="post"><!--AuthStartsHere-->
    <div class="modal fade" id="AuthModal" tabindex="-1" aria-labelledby="AuthModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="justify-content: center">
                    <h5 class="modal-title" id="AuthModalLabel">Авторизация</h5>
                </div><!--modal-header-->
                <div class="modal-body">

                    <div class="flex-container col-sm-12" style="flex-wrap: nowrap; justify-content: space-between;">

                        <div class="container-fluid col-xs-12 col-sm-12 col-md-12 form-group form-inline">


                            <div class="container pt-1" style="justify-content: space-between;">
                                <div id="emailHelp" class="form-text">Подсказка</div>
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center">
                                        <label style="min-width: 100px !important">Логин</label>

                                        <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                            id="auth_Login" name="auth_Login" placeholder="Введите логин" required />
                                    </div>

                                </div>
                            </div>

                            <div class="container" style="justify-content: space-between;">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center">
                                        <label style="min-width: 100px !important">Пароль</label>

                                        <input type="text" class="form-control col-sm-12" style="text-align: center;"
                                            id="auth_Password" name="auth_Password" placeholder="Введите пароль"
                                            required />
                                    </div>

                                </div>
                            </div>

                        </div><!--container-fluid-->

                    </div><!--flex-container-->

                </div><!--class="modal-body"-->

                <div class="modal-footer" style="justify-content: center">
                    <div class="text-sm-center">

                        <button type="submit" class="btn btn-primary btn-lg"
                            name="login_user">Авторизоваться</button><!--27.04--><!--name helps with isset($_POST[///-->

                    </div>

                </div><!--modal-footer-->

            </div><!--modal-content-->
        </div><!--modal-dialog-->
    </div><!--modal fade-->
</form><!--Auth - form needed for POST js-php interaction-->

<form id="form_reg" method="post"><!--REGStartsHere-->
    <div class="modal fade" id="RegModal" tabindex="-1" aria-labelledby="RegModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="justify-content: center">
                    <h5 class="modal-title" id="RegModalLabel">Регистрация</h5>
                </div><!--modal-header-->
                <div class="modal-body">


                </div><!--modal-content-->
            </div><!--modal-dialog-->
        </div><!--modal fade-->
</form><!--registration-->