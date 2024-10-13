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
    <link rel="stylesheet" type="text/css" href="../../design/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">
    <title>Добавление доктора</title>
</head>

<body>
    <div class="wrapper">

        <header class="flex-container blockBody pad" style="width: 100%; justify-content: space-between;">
            <div class="frame pad"><!--header part №1-->
                <a href="./index.php"><img class="headerLogo mtmb" src="../../images/logo.png"
                        style="visibility: visible"></a>
                <p class="headerTitle mtmb"> Электронная регистратура <br>ГБУЗ «Калачевская ЦРБ» </p>
            </div><!--frame pad-->
        </header><!--flex-container (Row №1(Header)-->

        <div class="content justify-content-center" style="text-align: center;">
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
                $query = "INSERT INTO `doctors` (`name`, `surname`, `patronymic`, `specializationId`) VALUES 
                ('" . $name . "','" . $surname . "','" . $patronymic . "', '" . $specialization . "')";
                $conn->query($query);
                $conn->close();
            }
            ?>
        </div>

        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>

    </div><!--wrapper-->

    <script src="../../javascript/bootstrap.bundle.min.js"></script>
    <script src="../../javascript/jquery-3.7.1.min.js"></script>

</body>

</html>