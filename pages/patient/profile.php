<?php session_start();

include ('../../pageController.php');
$connect = getAbsolutePath('server/connect.php');
include $connect;

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../../design/components.css">
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
        ?>

        <?php
        $header = getAbsolutePath('siteComponents/header.php');
        include $header;
        ?>

        <div class="content wrapper frame" style="width: 100%;">

            <div class="frameWOIF">
                <!--<h3>Идентификатор пользователя:</h3>
                <?php //echo $_SESSION['user_id']; ?>-->
            </div>

            <div style="">
                <h3>Добро пожаловать,
                    <?php
                    $query = "SELECT `name`, `patronymic` FROM `patients` where patientId = $_SESSION[user_id]";
                    $res = mysqli_query($conn, $query);
                    while ($row = $res->fetch_assoc()) {
                        echo $row['name'] . ' ' . $row['patronymic'];
                        //echo '<h1> ' . $row['name'] . ' ' . $row['patronymic'] . ' </h1>';
                    }
                    ;
                    ?>
                </h3>
            </div>

            <div style="">
                <!--<h3>Пароль пользователя:</h3>
                <?php //echo $_SESSION['user_password']; ?>
                -->
            </div>

        </div><!--content wrapper frame-->

        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>
    </div><!--wrapper-->

</body>

</html>