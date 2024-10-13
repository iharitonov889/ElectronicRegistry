<?php
session_start();

include ('../../pageController.php');//path
$connect = getAbsolutePath('server/connect.php');
include $connect;

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../design/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">
    <title> Электронная регистратура ГБУЗ «Калачевская ЦРБ»
    </title>
</head>

<body>

    <div class="wrapper">

        <header class="flex-container blockBody pad" style="width: 100%; justify-content: space-between;">
            <!--flex-container (Row №1(Header)-->

            <div class="frame pad"><!--header part №1-->

                <a href="../../index.php"> <img class="headerLogo mtmb" src="../../images/logo.png"
                        style="visibility: visible"> </a>
                <p class="headerTitle mtmb"> Электронная регистратура <br>ГБУЗ «Калачевская ЦРБ» </p>
            </div><!--frame pad-->

            <div class="frame"><!--header part №2-->
                <div class="frame pad">
                    <?php {
                        if (isset($_SESSION['manager_login']) != null) {
                            echo '<form method="post"> <button type="submit" class="btn btn-primary btn-lg" name="managerLogout">Выйти из профиля</button> </form>';//path
                        } else {
                            echo '';
                        }
                        ;
                    } ?>
                </div>
                <!--
                <div class="frame pad">
                    <?php /*{
    if (isset($_SESSION['manager_login']) != null) {
    echo '<a href="./profile.php" class="button btn btn-primary btn-lg">Профиль</a>';//path
    } else {
    echo '';
    }
    }
    ;*/
                    //'<form method="post"><button type="submit" class="btn btn-primary btn-lg" name="managerAuthorization">Войти в профиль</button></form>';
                    ?>
                </div>
                -->
            </div><!--frame header-combiner-->

        </header><!--flex-container (Row №1(Header)-->



        <div class="content">

            <?php

            if (!(isset($_SESSION['manager_login']))) {
                echo '<div class="frameWOIF pad">
                            <div class="blockBody flex-element col-sm-12 col-lg-6" style="margin-left: auto; margin-right: auto;">
            <div class="container-fluid block text-sm-center" style="text-align: left"><!--style=" display: table;"-->
            <h4>Меню управления менеджера недоступно</h4>
            <p>Ошибка - не была пройдена авторизация</p>
            <h5 style="color: #6B9AFF;">Доступ запрещен</h5>
            </div><!--container-fluid-->
        </div> <!--flex-element-->
        </div>';
            } else { ?>

                <div class="flex-container my-5" style="align-items: stretch;
     justify-content: space-around;"><!--menu under header frameWOIF-->

                    <ul class="nav justify-content-center pt-3 mt-3"><!--new design-->
                        <div class="frame"><!--Button №1-->
                            <div class="blockBody">
                                <a href="./indexSchedule.php" class="btn btn-primary btnlikelink px-5"><img
                                        class="imgbutton headerLogo mtmb" src="../../images/scedulePatient.png">Добавить
                                    время приёма доктору
                                </a>
                            </div>
                        </div>
                    </ul>

                    <ul class="nav justify-content-center pt-3 mt-3">
                        <div class="frame "><!--Button №2-->
                            <div class="blockBody">
                                <div style=" text-align: center;">
                                    <img class="headerLogo mtmb" src="../../images/homeCall.png">
                                </div>
                                <a href="./indexDoctors.php"> <button class="btn btn-primary" name="indexDoctors">Работа с
                                        докторами</button>
                                </a>
                            </div>
                        </div>
                    </ul>

                    <ul class="nav justify-content-center pt-3 mt-3">
                        <div class="frame "><!--Button №3-->
                            <div class="blockBody">
                                <div style=" text-align: center;">
                                    <img class="headerLogo mtmb" src="../../images/patientIco.png">
                                </div>
                                <a href="./indexPatients.php"> <button class="btn btn-primary" name="indexPatients">Работа с
                                        пациентами</button>
                                </a>
                            </div>
                        </div>
                    </ul>

                    <!--manager menu buttons-->

                </div>

            <?php }
            ; ?>

        </div><!--wrapper (content here)-->


        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>
    </div>

</body>

<script src="../../javascript/bootstrap.bundle.min.js"></script>
<script src="../../javascript/jquery-3.7.1.min.js"></script>

</html>

<?php
//$indexModals = getAbsolutePath('pages/manager/indexModals.php'); include $indexModals;
?>

<!--<div class="frameWOIF pad">
                <div class="flex-container col-sm-12 col-lg-12">
                    <div class="flex-element col-sm-12 col-lg-6">
                    <?php //include ('./siteComponents/homePage/carouselindex.php'); ?>
                    </div>
                    <div class="flex-element col-sm-12 col-lg-6">
                        <?php //include ('./siteComponents/homePage/historyindex.php'); ?>
                    </div>
                </div>
</div>-->