<?php
include (__DIR__ . '/pageController.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">

    <title>Title</title>
</head>

<body>

    <div class="wrapper">

        <?php
        $headerCover = getAbsolutePath('siteComponents/headerCover.php');
        include $headerCover;
        echo '<a href="./index.php"> <img class="headerLogo mtmb" src= "../../images/logo.png" style="visibility: visible" > </a>
        <p class="headerTitle mtmb"> Электронная <br> регистратура </p>
       </div><!--framePad in headerCover-->
      <div class="flex-container">';//path
        ?>

        <!--Buttons in right side of header-->
        <div class="frame pad">
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

        <?php
        echo '</div><!--flex container-->
    </div><!--DIV from headerCover-->';
        ?>

        <div class="content">
            <!--content-->
        </div>

        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>

    </div><!--wrapper-->



</body>

</html>