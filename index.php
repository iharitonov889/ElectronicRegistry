<?php
session_start();
include ('./pageController.php');
include $connect = getAbsolutePath('server/connect.php');
//include $connect = getAbsolutePath('server/connect.php');//include $connect;
//$registration = getAbsolutePath('server/registration.php');include $registration;
/////"PHP-PAGE-CONTROLLER" (sort-a)
/*
<form method="post">
<button type="submit" class="btn btn-primary btn-lg" name="loginUserButton">Войти в профиль</button>
</form>
*/
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./design/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./design/components.css">
  <title>Электронная регистратура ГБУЗ «Калачевская ЦРБ»</title>
</head>

<body>

  <div class="wrapper">

    <header class="flex-container blockBody pad" style="width: 100%; justify-content: space-between;">
      <!--flex-container (Row №1(Header)-->
      <div class="frame pad"><!--header part №1-->
        <a href="./index.php"><img class="headerLogo mtmb" src="./images/logo.png" style="visibility: visible"></a>
        <p class="headerTitle mtmb"> Электронная регистратура <br>ГБУЗ «Калачевская ЦРБ» </p>
      </div><!--frame pad-->

      <div class="frame"><!--header part №2-->
        <div class="frame pad"><!--header subpart №2.1-->
          <?php {
            if (isset($_SESSION['manager_login']) != null) {
              echo '<form method="post"> <button type="submit" class="btn btn-primary btn-lg" name="managerLogoutFromMain">Выйти из профиля</button> </form>
          ';//path
            } else if (isset($_SESSION['user_login']) != null) {
              echo '<form method="post"> <button type="submit" class="btn btn-primary btn-lg" name="userLogout">Выйти из профиля</button> </form>
          ';//path
            } else {
              echo '<a href="pages/patient/registration.php"><button class="btn btn-primary btn-lg"
           >Регистрация</button></a>';//'<button type="submit" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#RegModal">Регистрация</button>'
            }
            ;
          } ?>
        </div>

        <div class="frame pad"><!--header subpart №2.2-->
          <?php {
            if (isset($_SESSION['manager_login']) != null) {//echo '<a href="./pages/manager/profile.php" class="button btn btn-primary btn-lg">Профиль</a>';//path!
            } else if (isset($_SESSION['user_login']) != null) {
              echo '<a href="./pages/patient/profile.php" class="button btn btn-primary btn-lg">Профиль</a>';//path!
            } else {
              echo '<form method="post"><button type="submit" class="btn btn-primary btn-lg" name="loginUserButton">Авторизоваться</button></form>';
            }
            ;
          }
          ;
          ?>
        </div>
      </div><!--frame header-combiner-->

    </header><!--flex-container (Row №1(Header)-->

    <div class="flex-container blockBody"><!--flex-container (Row №2(Menu under header)-->
      <?php if (isset($_SESSION['user_id']) != null) { ?>

        <ul class="nav justify-content-center border-top pt-3 mt-3">
          <form method="post">
            <div class="frame" style="display:inline-block;"><!-- color:green;-->
              <button type="submit" class="btn btn-primary btnlikelink px-5" name="sighUpButton"><img
                  class="imgbutton headerLogo mtmb" src="./images/scedulePatient.png">Записаться на
                приём</button>
            </div>
          </form>
        </ul>

      <?php } else if (isset($_SESSION['manager_id']) != null) { ?>
          <form method="post">

            <ul class="nav justify-content-center border-top pt-3 mt-3">
              <div class="frame" style="display:inline-block;">
                <form method="post">
                  <button type="submit" class="btn btn-primary btnlikelink px-5" name="sighupPatientManager"><img
                      class="imgbutton headerLogo mtmb" src="./images/scedulePatient.png">Записать пациента на
                    приём</button><!--sighUpButtonManager-->
                </form>
              </div>
            </ul>

            <ul class="nav justify-content-center border-top pt-3 mt-3">
              <div class="frame" style="display:inline-block;">
                <form method="post">
                  <button type="submit" class="btn btn-primary btnlikelink px-5" name="indexSchedule"><img
                      class="imgbutton headerLogo mtmb" src="./images/scedulePatient.png">Добавить
                    время приёма доктору</button>
                </form>
              </div>
            </ul>

            <ul class="nav justify-content-center border-top pt-3 mt-3">
              <div class="frame" style="display:inline-block;">
                <form method="post">
                  <button type="submit" class="btn btn-primary btnlikelink px-5" name="indexDoctors"><img
                      class="imgbutton headerLogo mtmb" src="./images/homeCall.png">Работа с
                    докторами</button>
                </form>
              </div>
            </ul>

            <ul class="nav justify-content-center border-top pt-3 mt-3">
              <div class="frame" style="display:inline-block;">
                <form method="post">
                  <button type="submit" class="btn btn-primary btnlikelink px-5" name="indexPatients"><img
                      class="imgbutton headerLogo mtmb" src="./images/patientIco.png">Работа с
                    пациентами</button>
                </form>
              </div>
            </ul>

          </form>
      <?php } else
        echo ''; ?>
    </div><!--flex-container (Row №2(Menu under header)-->

    <div class="content"><!--main content-->
      <div class="flex-container blockBody mb-5 mt-5">
        <div class="frame flex-element col-sm-12 col-lg-6 pad">
          <?php include ('./siteComponents/homePage/carouselindex.php'); ?>
        </div>

        <div class="frame flex-element col-sm-12 col-lg-6 pad">
          <?php include ('./siteComponents/homePage/historyindex.php'); ?>
        </div>
      </div>
    </div>

    <?php
    $footerFile = getAbsolutePath('siteComponents/footer.php');
    include $footerFile;
    ?>

  </div><!--wrapper-->

</body>

<script src="./javascript/bootstrap.bundle.min.js"></script>
<script src="./javascript/jquery-3.7.1.min.js"></script>

</html>

<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>-->

<!--   
<div class="frame" style="align-items: stretch;
     justify-content: space-around;">

      <div class="frame">
        <div class="blockBody">
          <div style=" text-align: center;">
            <img class="headerLogo mtmb" src="./images/scedulePatient.png">
          </div>
          <form method="post">
            <button type="submit" class="btnlikelink" name="sighUpButton">Записаться на
              приём</button>
          </form>
        </div>
      </div>

      <div class="frame ">
        <div class="blockBody">
          <div style=" text-align: center;">
            <img class="headerLogo mtmb" src="./images/managerIco.png">
          </div>

      
 -->
<!--modal-on button MUSNT be in FORM-->
<!--<button type="submit" class="btn btn-primary" name="sighUpButton"></button>-->
<!--</form>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->



<!--<a href="pages/common/authorization.php"><button class="btn btn-primary btn-lg">Войти в профиль</button></a>    
              //'<button type="submit" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#AuthModal">Войти в профиль</button>';-->