<?php
session_start();
include ('../../pageController.php');
$connect = getAbsolutePath('server/connect.php');
include $connect;
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../design/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">
    <title>Работа с расписанием докторов</title>
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

        <div class="content  mt-3">
            <div class="container">
                <div class="row text-sm-center">
                    <div class="col-md-6 offset-md-3 blockBody pad">

                        <div id="div_Doctors" class="flex-container mb-2" style="justify-content: center">
                            <div class="frame col-sm-3 col-lg-3">
                                <div class="text-sm-center" style="text-align: center;"><label>Доктор</label></div>
                            </div>

                            <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                                <form id="form_select_Doctor" method="post">
                                    <div class="form-card col-lg-12" style="margin: 10px">

                                        <select class="form-control flex-element " id="selectDoctor"
                                            name="selectDoctor"><!-- multiple="multiple" onchange="this.form.submit()"-->
                                            <?php
                                            $query = "SELECT * FROM `doctors`";
                                            $res = mysqli_query($conn, $query);
                                            while ($row = $res->fetch_assoc()) {
                                                echo '<option value=" ' . $row['doctorId'] . ' " > ' . $row['surname'] . ' ' . $row['name'] . ' ' . $row['patronymic'] . ' </option>';
                                            }
                                            ; ?>
                                        </select>

                                    </div>
                            </div>
                            <input name="buttonDoctorAddSchedule" id="buttonDoctorAddSchedule" class="btn btn-primary"
                                value="Подтвердить выбор" type="submit" /><!--Приступить к добавлению времени приёма-->
                            </form>
                        </div>



                        <div id="div_schedules">
                            <form id="form_addSchedule" method="post">
                                <div class="form-card">

                                    <?php
                                    if (isset($_POST['selectDoctor'])) {
                                        $selectedDoctor = $_POST['selectDoctor'];  //echo '<h1>' . $selectedDoctor . '</h1>';
                                    }
                                    ;
                                    ?>

                                    <div class="pad" style="margin: 10px;">
                                        <!--
                                        <div class="container" style="justify-content: space-between;">
                                            <div class="mb-3 frame">
                                                <div class="d-inline-flex align-items-center"
                                                    style="display:inline-block">
                                                    <label> Идентификатор доктора</label>
                                                    <input id="selectedDoctor" name="selectedDoctor" type="text"
                                                        class="form-control flex-element" value="<?php //if (isset($_POST['selectDoctor'])) {echo $selectedDoctor;} ?> " readonly />
                                                </div>
                                            </div>
                                        </div>-->

                                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                            <div class="mb-3">
                                                <div class="d-inline-flex align-items-center"
                                                    style="display:inline-block">
                                                    <label style="min-width: 125px !important">Дата и время</label>

                                                    <input id="scheduleDT" name="scheduleDT" type="datetime-local" />

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input name="buttonAddSchedule" id="buttonAddSchedule" class="btn btn-primary"
                                    value="Добавить время приёма" type="submit" />
                            </form>
                        </div><!--id="div_schedules"-->

                    </div><!--flex-element-->
                </div><!--flex-container-->
            </div>


        </div><!--wrapper-->

        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>

    </div><!--wrapper-->

    <!--modals - https://stackoverflow.com/questions/63517642/open-bootstrap-modal-when-enter-pressed-on-form -->

    <div>
        <?php
        if (isset($_POST['scheduleDT'])) {
            $selectedDoctor = $_POST['selectedDoctor'];
            $scheduleDT = $_POST['scheduleDT'];
            $query = mysqli_query($conn, "INSERT INTO `schedules` 
            (`doctorId`, `datetimeOfReception`) 
            VALUES ('$selectedDoctor','$scheduleDT')");
            $res = $conn->query($query);
            $conn->close();
        }
        ?>
    </div>

</body>



<script src="../../javascript/bootstrap.bundle.min.js"></script>
<script src="../../javascript/jquery-3.7.1.min.js"></script>


</html>