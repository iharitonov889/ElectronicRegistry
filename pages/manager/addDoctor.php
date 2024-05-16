<?php
session_start();
include ('../../pageController.php');
$connect = getAbsolutePath('server/connect.php');
include $connect;
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">
    <title>Добавление доктора</title>
</head>

<body>

    <div class="wrapper">

        <?php
        $headerCover = getAbsolutePath('siteComponents/headerCover.php');
        include $headerCover;
        echo '<a href="./index.php"> <img class="headerLogo mtmb" src= "../../images/logo.png" style="visibility: visible" > </a>
<p class="headerTitle mtmb"> Электронная <br> регистратура </p>
</div>
<div class="flex-container">';//path
        
        $header = getAbsolutePath('siteComponents/header.php');
        include $header;
        ?>

        <div class="wrapper frame">

            <form method="post">

                <div>
                    <div class="blockBody pad" style="margin: 10px; align-items: center; display:inline-block;">

                        <div class="container" style="justify-content: space-between;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Фамилия</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="surname"
                                            placeholder="Введите фамилию">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Имя</label>

                                    <div class="form-elemnt">
                                        <input type="text" class="form-control" name="name" placeholder="Введите имя">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Отчество</label>

                                    <div class="form-element">
                                        <input type="text" class="form-control" name="patronymic"
                                            placeholder="Введите отчество">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center" style="display:inline-block">
                                    <label style="min-width: 125px !important">Специализация</label>

                                    <div class="form-element">

                                        <select class="form-control" id="specialization" name="specialization"
                                            style="width: 220px;">
                                            <?php
                                            $query = "SELECT * FROM `specializations`";
                                            $res = mysqli_query($conn, $query);
                                            while ($row = $res->fetch_assoc()) {
                                                echo '<option value=" ' . $row['specializationId'] . ' " > ' . $row['specializationTitle'] . ' </option>';
                                            }
                                            ;
                                            ?>
                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-element flex-element">
                            <input type="submit" name="addDoctor" value="Добавить" class="btn btn-primary">
                        </div>

                    </div><!--blockBody pad-->
                </div>

            </form>

            <?php

            if (isset($_POST["addDoctor"])) {
                $name = mysqli_real_escape_string($conn, $_POST["name"]);
                $surname = mysqli_real_escape_string($conn, $_POST["surname"]);
                $patronymic = mysqli_real_escape_string($conn, $_POST["patronymic"]);
                $specialization = mysqli_real_escape_string($conn, $_POST["specialization"]);
                $sqlUpdate = "INSERT INTO `doctors` (`name`, `surname`, `patronymic`, `specializationId`) VALUES ('" . $name . "','" . $surname . "','" . $patronymic . "', '" . $specialization . "')";
                $conn->query($sqlUpdate);
                $conn->close();

            }
            ?>

        </div>

        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>

    </div><!--wrapper-->



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

</body>

</html>