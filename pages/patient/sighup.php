<?php
include "../../Server/connect.php";

include "../../pageController.php";

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Запись на приём</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="../../design/components.css">
  <!--
  <link rel="stylesheet" type="text/css" href="./sighupWizardCss.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
-->
</head>

<body>
  <div class="wrapper">
    <?php
    $headerCover = getAbsolutePath('siteComponents/headerCover.php');
    include $headerCover;
    echo '<a href="../../index.php"> <img class="headerLogo mtmb" src= "../../images/logo.png" style="visibility: visible" > </a>
        <p class="headerTitle mtmb"> Электронная <br> регистратура </p>
       </div><!--framePad in headerCover-->
      <div class="flex-container">';//path
    
    $header = getAbsolutePath('siteComponents/header.php');
    include $header;
    ?>

    <div class="content wrapper">

      <div class="frameWOIF pad ">

        <?php

        if (!(isset($_SESSION['user_login']))) {
          echo '<div class="blockBody flex-element col-sm-12 col-lg-6" style="margin-left: auto; margin-right: auto;">
            <div class="container-fluid block" style="text-align: left"><!--style=" display: table;"-->
              <h4>Запись на прием через интернет</h4>
               <p>Для того чтобы записаться на прием к врачу, необходимо пройти процедуру авторизации 
                с использованием логина и пароля. Если Вы не зарегистрированы на нашем сайте, просим Вас пройти регистрацию, кнопка для начала регистрации находится на главной странице
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
                 <p>Пользуясь услугами Центра обработки вызовов вы даете согласие на обработку Ваших персональных данных,  необходимых для записи на прием к врачу.</p>
            </div><!--container-fluid-->
        </div> <!--flex-element-->';
        } else {
          $historyindex = getAbsolutePath('pages/patient/sighupWizard.php');
          include $historyindex;
        }
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
  integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script src="./sighupWizardJS.js"></script>
<!--<script src="../../javascript/sender.js"></script>-->
<!--<script src="./sighupWizardSender.js"></script>-->

<!--sighupWizard.php forms-->
<script>
  function submitJS($formId) {
    /*
    selectedSpecialization = document.getElementById("selectSpecialization").value;
    console.log(selectSpecialization);
    $.ajax({
      url: './sighup.php',
      type: 'POST',
      data: {
        selectedSpecialization: selectedSpecialization
      }
    });
*/

    let form = document.getElementById($formId);
    form.submit();

  }

  /*
    document.getElementById("form_auth").addEventListener("submit", function (e) { 
    auth_Login = document.getElementById("auth_login").value;
    auth_Password = document.getElementById("auth_password").value; 
      $(document).ready(function(){
        $.ajax({
          url: './server/authorization.php',
          type: 'POST',
          data: {// Get value into
            auth_login: auth_login,
            auth_password: auth_password
           
          }
        });
      });
  });*/


</script>

</html>