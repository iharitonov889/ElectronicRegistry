<?php
session_start();
include ('../../pageController.php');
$connect = getAbsolutePath('server/connect.php');
include $connect;

//<div class="alert alert-success">Сохранение измененений прошло успешно</div>

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../design/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">
    <title>Редактирование доктора</title>
</head>

<body>

    <div class="wrapper">
        <header class="flex-container blockBody pad" style="width: 100%; justify-content: space-between;">
            <!--flex-container (Row №1(Header)-->

            <div class="frame pad"><!--header part №1-->
                <a href="../../index.php"><img class="headerLogo mtmb" src="../../images/logo.png"
                        style="visibility: visible"></a>
                <p class="headerTitle mtmb"> Электронная регистратура <br>ГБУЗ «Калачевская ЦРБ» </p>
            </div><!--frame pad-->

            <div class="frame"><!--header part №2-->
                <div class="frame pad"><!--header subpart №2.1-->
                    <?php {
                        if (isset($_SESSION['manager_login']) != null) {
                            echo '<form method="post"> <button type="submit" class="btn btn-primary btn-lg" name="managerLogout">Выйти из профиля</button> </form>
          ';//path
                        }
                        ;
                    }
                    ; ?>
                </div>
            </div>
        </header>

        <div class="content" style="text-align: center;">

            <form method="post">
                <?php

                if (isset($_GET['doctorId'])) {

                    $doctorId = $_GET['doctorId'];

                    $result = mysqli_query($conn, "SELECT * FROM `doctors` WHERE doctorId=$doctorId");
                    $row = mysqli_fetch_array($result);
                    ?>
                    <div>
                        <div class="blockBody pad" style="margin: 10px; align-items: center; display:inline-block;">

                            <div class="container" style="justify-content: space-between;">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center" style="display:inline-block">
                                        <label style="min-width: 125px !important">Фамилия</label>

                                        <div class="form-elemnt">
                                            <input type="text" class="form-control" name="surname"
                                                placeholder="Введите фамилию" value="<?php echo $row["surname"]; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center" style="display:inline-block">
                                        <label style="min-width: 125px !important">Имя</label>

                                        <div class="form-elemnt">
                                            <input type="text" class="form-control" name="name" placeholder="Введите имя"
                                                value="<?php echo $row["name"]; ?>">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center" style="display:inline-block">
                                        <label style="min-width: 125px !important">Отчество</label>

                                        <div class="form-elemnt">
                                            <input type="text" class="form-control" name="patronymic"
                                                placeholder="Введите отчество" value="<?php echo $row["patronymic"]; ?>">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center" style="display:inline-block">
                                        <label style="min-width: 125px !important">Специализация</label>
                                        <div class="form-element">
                                            <select class="form-control" id="selectSpecialization"
                                                name="selectSpecialization"><!--style="text-align: center; "-->

                                                <?php
                                                $specRes = mysqli_query($conn, "SELECT * FROM `specializations`");
                                                while ($specRow = $specRes->fetch_assoc()) {  //echo '<option value=" ' . $specRow['specializationId'] . ' "> ' . $specRow['specializationTitle'] . ' </option>';
                                                    echo '<option value=" ' . $specRow['specializationId'] . ' "' ?>
                                                    <?php echo ($specRow['specializationId'] == $row["specializationId"]) ? 'selected' : ''; ?>
                                                    <?php echo '>'; ?>
                                                    <?php echo '' . $specRow['specializationTitle'] . '</option>';
                                                }
                                                ;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-element flex-element">
                                <input type="submit" name="edit" value="Сохранить изменения" class="btn btn-primary">
                            </div>

                        </div><!--blockBody pad-->
                    </div>
                    <?php
                }//end of isset
                ?>
            </form>

            <?php

            if (isset($_POST["edit"])) {
                $name = mysqli_real_escape_string($conn, $_POST["name"]);
                $surname = mysqli_real_escape_string($conn, $_POST["surname"]);
                $patronymic = mysqli_real_escape_string($conn, $_POST["patronymic"]);
                $specialization = mysqli_real_escape_string($conn, $_POST["selectSpecialization"]);
                $sqlUpdate = "UPDATE `doctors` SET `name`= '" . $name . "' , `surname`= '" . $surname . "', 
                `patronymic`='" . $patronymic . "', `specializationId`='" . $specialization . "'  
                WHERE `doctorId` = '" . $doctorId . "' ";
                $conn->query($sqlUpdate);
                $conn->close();
                echo "<meta http-equiv='refresh' content='0'>";
            }
            //header("Location:./indexDoctors.php");
            //exit();
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

<!--//echo "<script>console.log('" . $doctorId . "' );</script>";-->

<!--
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Редактирование доктора</h1>
            <div>
                <a href="./index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
    </div>-->

<!--
                <div class="form-elemnt my-4">
                    <select class="form-control" id="selectSpecialization" name="selectSpecialization">
                    <?php
                    /*
                    $res = mysqli_query($conn, "SELECT * FROM `specializations`");

                    while ($specrow = $res->fetch_assoc()) {
                        echo '<option value= ' . $specrow['specializationId'] . ' > ' . $specrow['specializationTitle'] . ' </option>';
                        //echo '<option value= ' . $specrow['specializationId'] . ' <?php if(' . $row['specializationId'] . '==' . $specrow['specializationId'] . ') {echo "selected"} ' .' > ' . $specrow['specializationTitle'] . ' </option>';
                        //echo '<option value=" ' . $row['specializationId'] . ' " selected> ' . $row['specializationTitle'] . ' </option>';  
                    }
                    ;*/
                    ?>
                    </select>
                </div>
                -->
<!--<input type="hidden" value="<?php //echo $doctorId; ?>" name="doctorId">-->