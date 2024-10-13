<?php
include "../../Server/connect.php";
include "../../pageController.php";
session_start();
//echo "<script>console.log('" . $_SESSION['selectedSpecialization'] . "' );</script>";
//echo "<script>console.log('" . $_SESSION['selectedDoctor'] . "' );</script>";
//unset($_SESSION['selectedSpecialization']);
//unset($_SESSION['selectedDoctor']);
if (isset($_POST['selectSchedule'])) {
  $selectedSchedule = $_POST['selectSchedule'];
  $query = "UPDATE `schedules` 
  SET `patientId`= '" . $_SESSION['user_id'] . "' 
  WHERE `scheduleId` = '" . $selectedSchedule . "'";
  $res = $conn->query($query);
  $conn->close();
  unset($_SESSION['selectedSpecialization']);
  unset($_SESSION['selectedDoctor']);
  header("Location:./profile.php");
  exit();
}
;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Запись на приём</title>
  <link rel="stylesheet" type="text/css" href="../../design/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../design/components.css">
  <!--<link rel="stylesheet" type="text/css" href="./sighupWizardCss.css">-->
</head>

<body>
  <div class="wrapper">
    <header class="flex-container blockBody pad" style="width: 100%; justify-content: space-between;">
      <!--flex-container (Row №1(Header)-->
      <div class="frame pad"><!--header part №1-->
        <a href="../../index.php"> <img class="headerLogo mtmb" src="../../images/logo.png" style="visibility: visible">
        </a>
        <p class="headerTitle mtmb"> Электронная регистратура <br>ГБУЗ «Калачевская ЦРБ» </p>
      </div><!--frame pad-->
    </header><!--flex-container (Row №1(Header)-->

    <div class="content">

      <div class="frameWOIF pad ">
        <?php
        if (!(isset($_SESSION['user_login']))) {
          echo '<div class="blockBody flex-element col-sm-12 col-lg-7" style="margin-left: auto; margin-right: auto;">
            <div class="container-fluid block" style="text-align: left"><!--style=" display: table;"-->
              <h4>Запись на прием через интернет</h4>
               <p>Для того чтобы записаться на прием к врачу, необходимо пройти процедуру авторизации 
                с использованием логина и пароля - <a href="./authorization.php">авторизоваться</a>.
                Если Вы не зарегистрированы на нашем сайте, просим Вас пройти регистрацию - <a href="./registration.php">Зарегистрироваться</a>
              </p>
               <p>В случае, если Вы не хотите регистрироваться, воспользуйтесь записью на прием к врачу через Центр обработки вызовов.</p>
                <p>Запись на прием через Центр обработки вызовов (по телефону)
                  <br>Телефон - (8442) 33-03-03
                  <br>При обращении необходимо иметь следующие документы:
                  <br>- Паспорт или иной документ, удостоверяющий личность;
                  <br>- СНИЛС;
                  <br>- Полис обязательного или добровольного медицинского страхования (при наличии).
                  <br>На основании Закона № 326-ФЗ от 29.11.2010 «Об обязательном медицинском страховании в РФ» осуществляется выдача полисов ОМС единого образца, а также обмен полисов ОМС старого образца на полисы ОМС единого образца в следующих страховых компаниях:
                  <h5 style="color: #6B9AFF;">АО «СК «СОГАЗ-Мед»»  ООО «Капитал МС»</h5>
                </p>
                 <p>Пользуясь услугами Центра обработки вызовов вы даете согласие на обработку Ваших персональных данных, необходимых для записи на прием к врачу.</p>
            </div><!--container-fluid-->
        </div> <!--flex-element-->';
        } else {
          $sighupWizard = getAbsolutePath('pages/patient/sighupWizard.php');
          include $sighupWizard; ?>
        <?php }
        ;
        ?>
      </div>
    </div>
    <?php
    $footerFile = getAbsolutePath('siteComponents/footer.php');
    include $footerFile;
    ?>
  </div>
</body>
<script src="../../javascript/bootstrap.bundle.min.js"></script>
<script src="../../javascript/jquery-3.7.1.min.js"></script>
<script>
  function submitJS($formId) {
    let form = document.getElementById($formId);
    form.submit();
  }
</script>

</html>