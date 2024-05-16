<?php
session_start();

include ('./pageController.php');

$connect = getAbsolutePath('server/connect.php');
include $connect;

$registration = getAbsolutePath('server/registration.php');
include $registration;

$authorization = getAbsolutePath('server/authorization.php');
include $authorization;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="./design/components.css">
  <title>Электронная регистратура</title>
</head>

<body>

  <div class="wrapper">
    <?php
    $headerCover = getAbsolutePath('siteComponents/headerCover.php');
    include $headerCover;
    echo '<a href="./index.php"> <img class="headerLogo mtmb" src= "./images/logo.png" style="visibility: visible" > </a>
        <p class="headerTitle mtmb"> Электронная <br> регистратура </p>
       </div><!--framePad in headerCover-->
      <div class="flex-container">';//path
    ?>

    <div class="frame pad">
      <?php {
        if (isset($_SESSION['user_login']) != null) {
          echo '<form method="post"> <button type="submit" class="btn btn-primary btn-lg" name="userLogout">Выйти из профиля</button> </form>
          ';//path
        } else {
          echo '<button type="submit" class="btn btn-primary btn-lg" data-bs-toggle="modal"
            data-bs-target="#RegModal">Регистрация</button>';
        }
        ;
      } ?>
    </div>

    <div class="frame pad">
      <?php {
        if (isset($_SESSION['user_login']) != null) {
          echo '<a href="./pages/patient/profile.php" class="button btn btn-primary btn-lg">Профиль</a>';//path
        } else {
          echo '<button type="submit" class="btn btn-primary btn-lg" data-bs-toggle="modal"
          data-bs-target="#AuthModal">Войти в профиль</button>';
        }
      }
      ;
      //<form method="post"> <button type="submit" class="btn btn-primary btn-lg" name="userLogout">Выйти из профиля</button> </form>
      //<form method="post"> <button type="submit" class="btn btn-primary btn-lg" name="userProfile">Профиль</button> </form> 
      ?>
    </div>

    <?php
    $header = getAbsolutePath('siteComponents/header.php');
    include $header;
    ?>

    <div class="wrapper">
      <div class="frame " style="align-items: stretch;
     justify-content: space-around;"><!--menu under header-->

        <div class="frame"><!--Button №1-->
          <div class="blockBody">
            <div style=" text-align: center;">
              <img class="headerLogo mtmb" src="./images/scedulePatient.png">
            </div>
            <form method="post">
              <button type="submit" class="btn btn-primary" name="sighUpButton">Записаться на приём</button>
            </form>
          </div>
        </div>

        <div class="frame "><!--Button №2-->
          <div class="blockBody">
            <div style=" text-align: center;">
              <img class="headerLogo mtmb" src="./images/managerIco.png">
            </div>

            <?php
            if (isset($_SESSION['manager_login']) != null) {
              echo '<a href="./pages/manager/index.php" class="button btn btn-primary btn-lg">Главная страница</a>';//path
            } else {
              echo '<button type="submit" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#AuthModalManager">Авторизоваться</button>';
            }
            ?>

            <!--modal-on button MUSNT be in FORM-->
            <!--<button type="submit" class="btn btn-primary" name="sighUpButton"></button>-->
            <!--</form>-->
          </div>
        </div>

      </div>

      <div class="frameWOIF pad">
        <div class="flex-container col-sm-12 col-lg-12">
          <div class="flex-element col-sm-12 col-lg-6">
            <?php include ('./siteComponents/homePage/carouselindex.php'); ?>
          </div>
          <div class="flex-element col-sm-12 col-lg-6">
            <?php include ('./siteComponents/homePage/historyindex.php'); ?>
          </div>
        </div>
      </div>
    </div>

    <?php
    $footerFile = getAbsolutePath('siteComponents/footer.php');
    include $footerFile;
    ?>
  </div>

</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
  integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script src="./javascript/sender.js"></script>

</html>